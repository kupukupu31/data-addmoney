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

    public function depositLog()
    {
        $transactdata = Transaction::All();
        return view('user.log', compact('transactdata'));
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

         // Alert::success('Deposit Successfully', 'Added to Transanctions Log');
    // alert()->success('SuccessAlert','Lorem ipsum dolor sit amet.')->showConfirmButton('Confirm', '#3085d6');
    // example:
alert()->success('Deposit Successfully','Added to Transanctions Log.')->persistent(true,false);

        return redirect()->back();
    }
}
