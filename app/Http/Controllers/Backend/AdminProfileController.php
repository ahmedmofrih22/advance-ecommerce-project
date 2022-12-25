<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    public function AdminProfile()
    {
        $AdminDate = Admin::find(1);
        return view('admin.admin_profile_view', compact('AdminDate'));
    }

    public function AdminProfileEdit()
    {
        $EditAdminDate = Admin::find(1);
        return view('admin.admin_profile_edit', compact('EditAdminDate'));
    }
    public function AdminProfileStore(Request $request)
    {
        $data = Admin::find(1);
        $data->name = $request->name;
        $data->email = $request->email;
        $old_image =  $request->old_image;
        if ($request->file('profile_photo_path')) {

            $file = $request->file('profile_photo_path');
            @unlink(public_path('upload/admin_image/' . $data->profile_photo_path));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/admin_image'), $filename);

            $data['profile_photo_path'] =   $filename;
        }

        $notifcation = array(
            'message' => 'admin profile Successfully',
            'alert-type' => 'success'
        );
        $data->save();
        return  redirect()->route('admin.profile')->with($notifcation);
    }

    public function AdminChangePassword()
    {
        return view('admin.Admin_change_password');
    }

    public function AdminUpdataChangePassword(Request $request)
    {
    $validateData=    $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed',

        ]);
        $hashedpassword= Admin::find(1)->password;
        if (Hash::check($request->oldpassword,$hashedpassword)) {
           $Admin= Admin::find(1);
           $Admin->password = Hash::make($request->password);
           $Admin->save();
           Auth::logout();
           return redirect()->route('admin.logout');

        }else{
            return redirect()->back();
        }

    }//end Method


    public function AllUsers(){
        $users = User::latest()->get();
        return view('admin.backend.user.all_user',compact('users'));
    }
}
