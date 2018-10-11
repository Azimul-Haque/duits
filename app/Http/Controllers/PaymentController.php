<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ITFest5Registration as ITFestRegistration;

use Shipu\Aamarpay\Facades\Aamarpay;
use Session;

class PaymentController extends Controller
{
    public function paymentSuccessOrFailed(Request $request)
    {
        if($request->get('pay_status') == 'Failed') {
            Session::flash('error',$registration_id.': You need to make the payment!');
            return redirect()->back();
        }
        
        $amount = $request->get('opt_b');
        $aamarpay = new Aamarpay();
        $valid  = $aamarpay->valid($request, $amount);
        
        if($valid) {
          $registration_id = $request->get('opt_a');

          $registration = ITFestRegistration::where('registration_id', $registration_id);
          $registration->trxid = $request->get('mer_txnid');
          $registration->payment_status = 1;
          $registration->save();
          Session::flash('success','Registration is complete!');
        } else {
           // Something went wrong.
          Session::flash('error', $registration_id.': You need to make the payment!');
        }
        
        return redirect()->back();
        //return 'Its working!';
    }
}
