<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Models\about;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class AboutController extends Controller
{
    public function index()
    {
        return view('frontend.pages.about');
    }
    public function show()
    {
        $cp = 'about';

        if (Cache::has($cp)) {
            $data = Cache::get($cp);
        } else {
            $data = about::findOrFail(1);
            Cache::put($cp, $data, 30);
        }

        return view('backend.about.show', compact('data'));
    }

    public function update(Request $request)
    {
        $data = about::findOrFail(1);

        $data->title =  $request->title;
        $data->short_title = $request->short_title;
        $data->short_description = $request->short_description;
        $data->long_description = $request->long_description;

        if ($request->hasFile('about_image')) {

            $file = $request->file('about_image');
            $filename = $file->getClientOriginalName();
            $path = 'upload/about_page/';
            $file->move(public_path($path), $filename);
            $data->about_image = $path . $filename;
        }

        $data->save();

        $notification = array(
            'message' => 'you have updated your about section successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('about.show')->with($notification);
    }
}
