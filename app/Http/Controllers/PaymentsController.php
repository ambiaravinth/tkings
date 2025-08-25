<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\PaymentsModel;
use Illuminate\Support\Facades\Log;

class PaymentsController extends Controller
{
    /*
    *Add all Receipts...
    */
    public function addpayment(Request $request)
    {
        try {
            $payment = new PaymentsModel;
            $payment->user_id = auth()->user()->id;
            $payment->amount = $request->amount;
            $payment->pay_time = $request->date;
            $payment->status = 0;

            if ($request->hasFile('screenshot')) {
                $file = $request->file('screenshot');
                $extension = $file->getClientOriginalExtension();
                $filename = 'prof_' . time() . '' . rand(111, 999) . '.' . $extension;
                $path = $file->storeAs('profs', $filename, 'public');
                $payment->prof = "storage/" . $path;
            } else {
                $payment->prof = null;
            }

            $payment->save();

            return redirect()->back()->with('success', 'Receipt Added Successfully!');
        } catch (Exception $e) {
            Log::error('receipt added Error: ' . $e->getMessage());
            return redirect()->back()->with('danger', 'Receipt added Failed!');
        }
    }

    public function acceptpayment($id)
    {
        try {
            $payment = PaymentsModel::find($id);
            $payment->status = 1;
            $payment->update();
            return redirect()->back()->with('success', 'Receipt Accepted Successfully!');
        } catch (Exception $e) {
            Log::error('Receipt status Error: ' . $e->getMessage());
            return redirect()->back()->with('danger', 'Receipt status Failed!');
        }
    }

    public function rejectpayment($id)
    {
        try {
            $payment = PaymentsModel::find($id);
            $payment->status = 2;
            $payment->update();
            return redirect()->back()->with('success', 'Receipt Rejected Successfully!');
        } catch (Exception $e) {
            Log::error('Receipt status Error: ' . $e->getMessage());
            return redirect()->back()->with('danger', 'Receipt status Failed!');
        }
    }
}
