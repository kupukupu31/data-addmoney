<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function UserLogin()
    {
        return view('user.user_login');
    }

    public function UserDashboard()
    {
        return view('user.user_dashboard');
    }
}
