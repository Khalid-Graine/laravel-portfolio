<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class demoController extends Controller
{
    public function home() {
        return view('frontend.pages.index');
    }

    public function contact() {
        return view('frontend.pages.contact');
    }
}
