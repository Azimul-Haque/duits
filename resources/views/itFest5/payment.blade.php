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
                    <h3>Pay Tk. {{ $registration->amount }}/- following this process...</h3>
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