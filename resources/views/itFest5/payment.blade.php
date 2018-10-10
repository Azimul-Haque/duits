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
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Team</th>
                                <th>Registration ID</th>
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
                        <h3>Pay Tk. {{ $registration->amount }}/- following this process...</h3>
                    </center>
                    <div class="row">
                        <div class="col-md-8" style="font-size: 14px;">
                            <p>01. Go to your bKash Mobile Menu by dialing *247#<br />
                            02. Choose “Payment”<br />
                            03. Enter the Merchant bKash Account Number: 017*******<br />
                            04. Enter the amount: {{ $registration->amount }}<br />
                            05. Enter reference: 1<br />
                            06. Enter Counter Number: 1<br />
                            07. Now enter your bKash Mobile Menu PIN to confirm<br />
                            08. Put Registration Id and TrxId in the box and 
                            <br /><br />
                            Done! You will receive a confirmation message from bKash and a Registration Receipt here.</p>
                        </div>
                        <div class="col-md-4">
                            <form method="post" action="{{Route('it.Fest5.chekcbkash')}}" class="bkashform">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Registration Id" required name="registration_id">
                                    <input type="text" class="form-control" placeholder="Transaction Id" required name="trxid">
                                    <button type="submit" class="btn btn-w-m btn-primary">Check Payment</button>
                                </div>
                            </form>
                        </div>
                        
                    </div>
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