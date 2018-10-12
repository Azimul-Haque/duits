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
                <div class="table-responsive" style="padding:15px;">
                    <table class="table table-bordered table-schedule">
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
                                <td><big><b>{{ $registration->registration_id }}</b></big></td>
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
                        <tfoot>
                            <tr>
                                <td colspan="5">* Please remeber the <b>Registration Id</b></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                @if($registration->payment_status == 0)
                    <center>
                        <h3>Please pay Tk. {{ $registration->amount }}/- following the process in the Next page, Click the button below.</h3>
                        <div style="border: 2px solid #ddd; margin: 25px; max-width: 400px;">
                            <img src="{{ asset('images/aamarpay.png') }}" class="img-responsive">
                            {!! 
                            aamarpay_post_button([
                                'cus_name'  => $registration->team,
                                'cus_email' => $registration->email,
                                'cus_phone' => $registration->mobile,
                                'desc' => 'Registration Fee',
                                'opt_a' => $registration->registration_id,
                                'opt_b' => $registration->amount
                            ], $registration->amount, '<i class="fa fa-money"></i> Pay Through AamarPay', 'btn btn-sm btn-success') 
                            !!}
                        </div>
                    </center>
                @elseif($registration->payment_status == 1)
                    <center>
                        <h3>Download the Registration Receipt</h3>
                        <div style="border: 2px solid #ddd; margin: 25px; max-width: 400px;">
                            <span style="word-wrap: break-word;">Transaction ID: {{ $registration->trxid }}</span><br/>
                            <a href="{{ route('it.Fest5.printreceipt', $registration->registration_id) }}" class="btn btn-success" target="_blank"><i class="fa fa-print"></i> Print Registration Receipt</a>
                        </div>
                    </center>
                @endif
                @else
                <h3 class="text-center">No Team Found! Search Again.</h3>
                @endif
            </div>
        </div>
    </div>
    </section>
    
    @endsection