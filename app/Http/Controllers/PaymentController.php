<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Shipu\Aamarpay\Facades\Aamarpay;

class PaymentController extends Controller
{
    public function paymentSuccessOrFailed(Request $request)
    {
        if($request->get('pay_status') == 'Failed') {
            return redirect()->back();
        }
        
        $amount = $request->get('amount');
        $valid  = Aamarpay::valid($request, $amount);
        
        if($valid) {
          // post the trxid into the db
          $registration_id = $request->get('opt_a');
        } else {
           // Something went wrong. 
        }
        
        //return redirect()->back();
        return 'Its working!';
    }
}
