<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    // public function transanctions()
    // {
    //     // return view('transanctions');
    //     $transactdata = Transaction::All();
    //     return view('user.index', compact('transactdata'));
    // }



    // public function create() {
    //     return view('addmoney');
    // }
 
 
    // public function store(Request $request)
    // {
    //     $validated = $request->validate([
    //         // "name" => ['required'],
    //         "method" => ['required'],
    //         "invest_amount" => ['required'],
    //     ]);
    
        
    //     $validated['user_id'] = auth()->id();
    //  //    $validated['description'] = transanction()->Method();
 
    //     Transaction::create($validated);
 
    //     return redirect('addmoney');
 
    //  //    return redirect('pages/transanctions');
    // }
}
