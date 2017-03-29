<?php

namespace App\Http\Controllers;

use App\Models\PayPeriod;

class PayPeriodController extends Controller
{
    public function index()
    {
        $payPeriods = PayPeriod::latest('start_date')->get();

        return view('pay-periods.index', compact('payPeriods'));
    }

    public function store()
    {
        PayPeriod::create(request()->all() + [
            'company_id' => auth()->user()->company_id
        ]);

        return redirect()->route('payPeriodsIndex');
    }
}
