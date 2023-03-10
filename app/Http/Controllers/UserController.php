<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
// to add others later..

class UserController extends Controller
{
    public function UserLogin()
    {
        return view('user.user_login');
    }

    // public function UserDashboard()
    // {
    //     return view('user.index');
    // }
/* Datatable */
    public function transanctions()
    {
        // return view('transanctions');
        $transactdata = Transaction::All();
        return view('user.index', compact('transactdata'));
    }

    /* Add MONEY */

    public function create() {
        return view('user.index');
    }
 
 
    public function store(Request $request)
    {
        $validated = $request->validate([
            // "name" => ['required'],
            "method" => ['required'],
            "invest_amount" => ['required'],
            
        ]);
    
        $validated['type'] = 'Deposit';
        $validated['user_id'] = auth()->id();
     //    $validated['description'] = transanction()->Method();
 
        Transaction::create($validated);
 
        return view('user.index');
 
     //    return redirect('pages/transanctions');
    }


    public function UserDestroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array(
            'message' => 'User Logout Successfully',
            'alert-type' => 'success'
        );

        return redirect('/user/login')->with($notification);
    }
    public function UserProfile()
    {
        $id = Auth::user()->id;
        $adminData = User::find($id);
        return view('user.user_profile_view', compact('adminData'));
    }

    public function EditProfile()
    {
        $id = Auth::user()->id;
        $editData = User::find($id);
        return view('user.user_profile_edit', compact('editData'));
    }

    //
    public function UserProfileStore(Request $request)
    {

        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;


        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/user_images/' . $data->photo));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/user_images'), $filename);
            $data['photo'] = $filename;
        }

        $data->save();

        $notification = array(
            'message' => 'User Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // End Method

    //
    public function UserChangePassword()
    {

        return view('user.user_change_password');
    } // End Method
    public function UpdateHome()
    {

        return view('user.Home.testing');
    } // End Method


    public function UserUpdatePassword(Request $request)
    {
        // Validation 
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        // Match The Old Password
        if (!Hash::check($request->old_password, auth::user()->password)) {
            return back()->with("error", "Old Password Doesn't Match!!");
        }

        // Update The new password 
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)

        ]);
        return back()->with("status", " Password Changed Successfully");
    } // End Method 
}
