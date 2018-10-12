<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ITFest5Registration as ITFestRegistration;

use Shipu\Aamarpay\Aamarpay;
use Session;

class PaymentController extends Controller
{
    public function paymentSuccessOrFailed(Request $request)
    {
        $registration_id = $request->get('opt_a');
        if($request->get('pay_status') == 'Failed') {
            Session::flash('info',$registration_id.': You need to make the payment!');
            return redirect()->back();
        }
        
        $amount_request = $request->get('opt_b');
        $amount_paid = $request->get('amount');
        
        if($amount_paid == $amount_request) {
          $registration = ITFestRegistration::where('registration_id', $registration_id)->first();
          $registration->trxid = $request->get('mer_txnid');
          $registration->payment_status = 1;
          $registration->save();
          Session::flash('success','Registration is complete!');
        } else {
           // Something went wrong.
          Session::flash('info', $registration_id.': You need to make the payment!');
          return redirect(Route('it.Fest5.payorcheck', $registration_id));
        }
        
        return redirect(Route('it.Fest5.payorcheck', $registration_id));
    }
}
