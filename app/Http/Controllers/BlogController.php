<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class BlogController extends Controller
{

    public function blog()
    {
        $blogs = Cache::remember('Portfolios', 10, function () {
            return  Blog::latest()->paginate(3);
        });

        $BlogCategories = Cache::remember('BlogCategories', 10, function () {
            return  BlogCategory::latest()->take(5)->get();
        });

        return view('frontend.pages.blog', compact('blogs', 'BlogCategories'));
    }

    public function details($id)
    {
        $blog = Cache::remember('Portfolios_' . $id, 10, function () use ($id) {
            return  Blog::findOrfail($id);
        });


        return view('frontend.pages.blog_details', compact('blog'));
    }

    public function index()
    {
        $blogs = Blog::all();
        return view('backend.blog.index', compact('blogs'));
    }

    public function create()
    {

        $BlogCategory = Cache::remember('BlogCategory', 10, function () {
            return  BlogCategory::all();
        });
        return view('backend.blog.create', compact('BlogCategory'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'blog_category_id' => 'required',
            'description' => 'required',
        ]);

        $blog = new Blog();
        $blog->title = $request->title;
        $blog->blog_category_id  = $request->blog_category_id;
        $blog->description = $request->description;

        if ($request->hasFile('image')) {
            $path = 'upload/blog';
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $file->move(public_path($path), $filename);
            $blog->image = $path . '/' . $filename;
        };

        $blog->save();

        $notification = array(
            'message' => 'you have created new blog successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('blog.index')->with($notification);
    }

    public function show($id)
    {

        $blog = Cache::remember('Portfolios_' . $id, 10, function () use ($id) {
            return  Blog::findOrfail($id);
        });
        return view('blogs.show', compact('blog'));
    }

    public function edit($id)
    {

        $blog = Blog::findOrFail($id);
        $BlogCategory = BlogCategory::all();
        return view('backend.blog.edit', compact('blog', 'BlogCategory'));
    }

    public function update(Request $request, $id)
    {

        $blog = Blog::findOrFail($id);
        $blog->title = $request->title;
        $blog->blog_category_id  = $request->blog_category_id;
        $blog->description = $request->description;

        if ($request->hasFile('image')) {
            $path = 'upload/blog';
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $file->move(public_path($path), $filename);
            $blog->image = $path . '/' . $filename;
        };

        $blog->save();

        return redirect()->route('blog.index')->with('success', 'Blog updated successfully!');
    }

    public function delete($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();


        $notification = array(
            'message' => 'Blog deleted successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('blog.index')->with($notification);
    }
}
