<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Shipu\Aamarpay\Facades\Aamarpay;

class PaymentController extends Controller
{
    public function paymentSuccessOrFailed(Request $request)
    {
        if($request->get('pay_status') == 'Failed') {
            Session::flash('error',$registration_id.': You need to make the payment!');
            return redirect()->back();
        }
        
        $amount = $request->get('amount');
        $valid  = Aamarpay::valid($request, $amount);
        
        if($valid) {
          Session::flash('success','Registration is complete!');
          $registration_id = $request->get('opt_a');
        } else {
           // Something went wrong.
          Session::flash('error',$registration_id.': You need to make the payment!');
        }
        
        return redirect()->back();
        //return 'Its working!';
    }
}
