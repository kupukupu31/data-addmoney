<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Transaction;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DepositController extends Controller
{

    public function deposit()
    {
        return view('frontend.deposit.now');
    }

    public function depositNow(Request $request)
    {

        $validated = $request->validate([
            "method" => ['required'],
            "invest_amount" => ['required', 'regex:/^[0-9]+(\.[0-9][0-9]?)?$/']
        ]);

        $validated['type'] = 'Deposit';
        $validated['status'] = 'Pending';
        $validated['user_id'] = auth()->id();

        Transaction::create($validated);


        // $transaction = Transaction::create($request->validate([
        //     "method" => 'required',
        //     "invest_amount" => 'required|email',
        //     'type' => 'Deposit',
        //     'user_id' => auth()->id(),
        // ]));

        return redirect('user.deposit.index');
    }

    public function depositLog()
    {
        return view('user.deposit.log');
    }
}
