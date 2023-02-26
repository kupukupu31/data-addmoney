<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransactionController extends Controller
{
    public function transactions()
    {
        $transactdata = Transaction::All();
        return view('frontend.user.transaction.index', compact('transactdata'));
    }
}
