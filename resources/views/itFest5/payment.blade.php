@extends('layouts.user')
@section('title')
5th IT FEST | Registration
@endsection
@section('content')
    <section id="reasons">
    <div class="container inner">
        <div class="row">
            <div class="col-md-12 center-block text-center">
                <header>
                <h2>5th IT FEST | Registration</h2>
                </header>
            </div>
            <div class="col-sm-12">
                @if($registration)
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Team</th>
                                <th>Registration Id</th>
                                <th>Event</th>
                                <th>Amount</th>
                                <th>Payment Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $registration->team }}</td>
                                <td>{{ $registration->registration_id }}</td>
                                <td>{{ $registration->event_name }}</td>
                                <td>{{ $registration->amount }}/-</td>
                                <td>
                                    @if($registration->payment_status == 0)
                                        <span style="color: red;"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Not Paid</span>
                                    @elseif($registration->payment_status == 1)
                                        <span style="color: green;"><i class="fa fa-check" aria-hidden="true"></i> Paid</span>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                @if($registration->payment_status == 0)
                    <center>
                        <h3>Pay Tk. {{ $registration->amount }}/- following this process in the Next page, Click the button below.</h3>
                        {!! 
                        aamarpay_post_button([
                            'cus_name'  => $registration->team, // Customer name
                            'cus_email' => $registration->email, // Customer email
                            'cus_phone' => $registration->mobile, // Customer Phone
                            'desc' => 'Registration Fee', // Customer Phone
                            'opt_a' => $registration->registration_id // Customer Phone
                        ], $registration->amount, '<i class="fa fa-money"></i> Pay Through AamarPay', 'btn btn-sm btn-success') 
                        !!}
                    </center>
                @elseif($registration->payment_status == 1)
                    <h3>Download the Registration Receipt</h3>
                @endif
                @else
                <h3 class="text-center">No Team Found! Search Again.</h3>
                @endif
            </div>
        </div>
    </div>
    </section>
    
    @endsection