<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class AdminController extends Controller
{
    public function Dashboard()
    {
        return view('backend.index');
    }

    public function Logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }

    public function Login()
    {

        return view('backend.login');
    }

    public function Profile()
    {

        $id =  Auth::user()->id;
        $profile = User::findOrFail($id);

        return view('backend.admin_profile_view', compact('profile'));
    }


    public function ProfileStore(Request $request)
    {

        $id = Auth::user()->id;
        $profile = User::findOrFail($id);

        $profile->username = $request->username;
        $profile->name =  $request->name;
        $profile->email = $request->email;
        $profile->phone = $request->phone;

        $profile->address = $request->address;


        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/admin_images' . $profile->photo));
            $filename = $file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'), $filename);
            $profile->photo = $filename;
        }

        $profile->save();

        $notification = array(
            'message' => 'you have updated your profile successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function ChangePassword()
    {
        return view('backend.admin_change_password');
    }



    public function UpdatePassword(Request $request)
    {


        $profile = User::findOrFail(Auth::user()->id);

        $request->validate([
            'old_password' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required|confirmed',
        ]);

        $newpassword = $request->password;

        $check = Hash::check($request->old_password, Auth::user()->password);

        if ($check) {
            $profile->password = Hash::make($newpassword);
            $profile->save();
            $notification = array(
                'message' => 'you have updated the password successfully',
                'alert-type' => 'success'
            );
        } else {

            $notification = array(
                'message' => 'the old password does not match',
                'alert-type' => 'error'
            );
        }


        return redirect()->back()->with($notification);
    }
}
