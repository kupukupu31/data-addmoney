<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $transactdata = Transaction::All();
        $users = User::count();
        $transanctions = Transaction::count();
        $amount = Transaction::sum('invest_amount');
        return view('frontend.user.dashboard', compact('transactdata', 'users', 'transanctions', 'amount'));
    }
}
