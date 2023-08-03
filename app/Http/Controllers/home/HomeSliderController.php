<?php

namespace App\Http\Controllers\home;

use App\Models\HomeSlide;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeSliderController extends Controller
{
    public function homeSlide()
    {
        $data = HomeSlide::findOrFail(1);
        return view('backend.home_slide.home_slide_all', compact('data'));
    }


    public function homeSlideUpdate(Request $request)
    {

        $data = HomeSlide::findOrFail(1);
        $data->title = $request->title;
        $data->short_title = $request->short_title;
        $data->video_url = $request->video_url;


        if ($request->hasFile('home_slide')) {
            $file = $request->file('home_slide');
            $path = 'upload/home_slide';
            $filename = $file->getClientOriginalName();
            $file->move(public_path($path), $filename);
            $data->home_slide = $path . '/' . $filename;
        }

        $data->save();


        $notification = array(
            'message' => 'you have updated your about page successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
