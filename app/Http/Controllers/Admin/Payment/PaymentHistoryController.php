<?php

namespace App\Http\Controllers\Admin\Payment;

use App\Http\Controllers\Controller;
use App\Models\Payment\MidtransHistory;
use Illuminate\Http\Request;

class PaymentHistoryController extends Controller
{
    public function index()
    {
        $payment = MidtransHistory::all();
        return view('admin.pages.history.payment_history', compact('payment'));
    }

    //please make two function store and update

}
