<?php

namespace App\Http\Controllers;

use App\Models\Footer;
use Illuminate\Http\Request;
use League\CommonMark\Extension\Footnote\Node\FootnoteRef;

class FooterController extends Controller
{
    public function edit() {
       $footer = Footer::findOrFail(1);
       return view('backend.footer.edit', compact('footer'));
    }

    public function update(Request $request) {
        $footer = Footer::findOrFail(1);

        $footer->phone = $request->phone;
        $footer->address = $request->address;
        $footer->mail = $request->mail;
        $footer->facebook = $request->facebook;
        $footer->twitter = $request->twitter;
        $footer->linkdeen = $request->linkdeen;
        $footer->instagram = $request->instagram;
        $footer->save();

        $notification = array(
            'message' => 'you have update the footer section successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
     }
}
