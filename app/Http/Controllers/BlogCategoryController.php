<?php

namespace App\Http\Controllers;

use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    public function index()
    {
        $blogCategories = BlogCategory::latest()->get();
        return view('backend.blog_category.index', compact('blogCategories'));
    }
    public function create()
    {
        return view('backend.blog_category.create');
    }
    public function store(Request $request)
    {

        $request->validate([
            'blog_category_name' => 'required|unique:blog_categories,blog_category_name',
        ]);

        BlogCategory::create([
            'blog_category_name' => $request->blog_category_name,
        ]);
        $notification = array(
            'message' => 'you have created new blog category successfully',
            'alert-type' => 'success'
        );


        return redirect()->route('blog.category.index')->with($notification);
    }


    public function edit($id) {
        $BlogCategory = BlogCategory::findOrfail($id);
        return view('backend.blog_category.edit', compact('BlogCategory'));
  }

    public function update(Request $request, $id) {

        $BlogCategory = BlogCategory::findOrfail($id);
        $BlogCategory->blog_category_name = $request->blog_category_name;
        $BlogCategory->save();

        $notification = array(
            'message' => 'you have updated a blog category successfully',
            'alert-type' => 'success'
        );


        return redirect()->route('blog.category.index')->with($notification);
    }



    public function destroy($id)
    {
        $BlogCategory = BlogCategory::findOrfail($id);
        $BlogCategory->delete();

        $notification = array(
            'message' => 'you have deleted a blog category successfully',
            'alert-type' => 'success'
        );


        return redirect()->route('blog.category.index')->with($notification);
    }
}
