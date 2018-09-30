@extends('layouts.user')
@section('title')
5th IT FEST
@endsection
@section('content')
    <section id="hero">
    <div id="owl-main" class="owl-carousel height-md owl-inner-nav owl-ui-lg">
        @foreach($covers as $item)
        <div class="item" style="background-image: url(/uploads/itFest5/cover/<?php echo $item->image; ?>);">
            <div class="container">
                <div class="caption vertical-center text-center">
                <p class="fadeInDown-2 medium-color">{{$item->title}}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    </section>
    
    <section id="team" class="light-bg">
    <div class="container inner-top inner-bottom-sm">
        <div class="row">
            <div class="col-md-8 col-sm-10 center-block text-center">
                <header>
                <h1>Guest List</h1>
                </header>
            </div>
        </div>
        <div class="row inner-top-sm text-center">
            @foreach($guests as $item)
            <div class="col-sm-4 inner-bottom-sm inner-left inner-right">
                <figure class="member">
                    <div class="icon-overlay icn-link">
                        <a href="javascript:void(0)">
                        <img src="/uploads/itFest5/guest/{{$item->photo}}" class="img-circle">
                        </a>
                    </div>
                    <figcaption>
                        <h2> {{$item->name}}
                        <span>{{$item->designation}}</span>
                        </h2>
                    </figcaption>
                </figure>
            </div>
            @endforeach
        </div>

    </div>
</section>
    
    <section id="reasons">
    <div class="container inner">
        <div class="row">
            <div class="col-md-8 col-sm-9 center-block text-center">
                <header>
                <h1>Program Schedule</h1>
                </header>
            </div>
        </div>
        <div class="row inner-top-sm">
            <div class="col-xs-12">
                <div class="tabs tabs-reasons tabs-circle-top tab-container">
                <ul class="etabs text-center">
                    <li class="tab">
                        <a href="#tab-1">                                 
                            Day 01
                        </a>
                    </li>
                    <li class="tab">
                        <a href="#tab-2">
                            Day 02
                        </a>
                    </li>
                    </li>
                </ul>
                <div class="panel-container">
                    <div class="tab-content" id="tab-1">
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                            <h3>First Half</h3>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                    <th>Time Slot</th>
                                    <th>Program</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <td>9.00 AM - 9.30 AM</td>
                                    <td>Registration Process & Team arrival</td>
                                    </tr>
                                    <tr>
                                    <td>9.30 AM - 10.00 AM</td>
                                    <td>Colorful Rally of the participants</td>
                                    </tr>
                                    <tr>
                                    <td>10.00 AM - 12.30 PM</td>
                                    <td>Inauguration Ceremony at Senate building</td>
                                    </tr>
                                    <tr>
                                    <td>12.30 PM - 1.30 PM</td>
                                    <td>Project briefing on TSC stage</td>
                                    </tr>
                                    <tr>
                                    <td>01.30 PM - 02.30 PM</td>
                                    <td>Lunch break</td>
                                    </tr>
                                    
                                </tbody>
                                </table>
                            </div>
                            <div class="col-md-6 col-sm-6">
                            <h3>Second Half</h3>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                    <th>Time Slot</th>
                                    <th>Program</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <td>02.30 PM - 03.30 PM</td>
                                    <td>Round table conference with the policy makers</td>
                                    </tr>
                                    <tr>
                                    <td>03.30 PM - 04.30 PM</td>
                                    <td>Problem solving, Gaming Contest start at gaming room</td>
                                    </tr>
                                    <tr>
                                    <td>04.30 PM - 05.30 PM</td>
                                    <td>Open discussion & Meet the personality at auditorium</td>
                                    </tr>
                                    <tr>
                                    <td>05.30 PM</td>
                                    <td>Movie Show</td>
                                    </tr>
                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content" id="tab-2">
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                            <h3>First Half</h3>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                    <th>Time Slot</th>
                                    <th>Program</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <td>10.00 AM - 11.00 AM</td>
                                    <td>Workshop on Freelancing (How to start)</td>
                                    </tr>
                                    <tr>
                                    <td>11.00 AM - 12.00 AM</td>
                                    <td>ICT in Education: Prospect of Bangladesh</td>
                                    </tr>
                                    <tr>
                                    <td>12.00 PM - 01.30 PM</td>
                                    <td>Debate: Role of ICT to Prevention of violence against Women</td>
                                    </tr>
                                    <tr>
                                    <td>01.30 PM - 02.30 PM</td>
                                    <td>Lunch break</td>
                                    </tr>
                                    
                                </tbody>
                                </table>
                            </div>
                            <div class="col-md-6 col-sm-6">
                            <h3>Second Half</h3>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                    <th>Time Slot</th>
                                    <th>Program</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <td>02.30 PM - 04.30 PM</td>
                                    <td>Quiz Contest on stage</td>
                                    </tr>
                                    <tr>
                                    <td>04.30 PM - 05.30 PM</td>
                                    <td>Closing & Award giving Ceremony Started</td>
                                    </tr>
                                    <tr>
                                    <td>05.30 PM</td>
                                    <td>Musical Blast</td>
                                    </tr>
                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    </section>
    <section id="get-in-touch" class="inner-bottom">
    <div class="container inner light-bg">
        <div class="row">
            <div class="col-md-8 col-sm-9 center-block text-center">
                <header>
                <h1>Want To Registration Now?</h1>
                </header>
                <a href="#modal-contact01" class="btn btn-large" data-toggle="modal" data-backdrop="static">Registration</a>
            </div>
        </div>
    </div>
    </section>
    <div class="modal fade" id="modal-contact01" tabindex="-1" role="dialog" aria-labelledby="modal-contact01" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-static">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="icon-cancel-1"></i></span></button>
                <h4 class="modal-title">Registration</h4>
            </div>
            <form method="post" action="{{Route('it.Fest5.store')}}" enctype="multipart/form-data">
            <div class="modal-body">
                {{csrf_field()}}
                <div class="form-group">
                    <label class="control-label">Event Name:</label>
                    <select class="form-control" name="event" required>
                        <option value="" selected="" disabled="">Select Event Name</option>
                        <option value="1">Smart Idea COntest</option>
                        <option value="2">Apps in Life</option>
                        <option value="3">IT Project Showcasing</option>
                        <option value="4">IT Noesis Quiz</option>
                        <option value="5">Gaming Contest</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label">Participant's Name/ Team</label>
                    <input type="text" class="form-control" placeholder="" required name="name">
                </div>
                <div class="form-group">
                    <label class="control-label">Member 1 Name (if any):</label>
                    
                    <input type="text" class="form-control" placeholder="" name="member1">
                </div>
                <div class="form-group">
                    <label class="control-label">Member 2 Name (if any):</label>
                    <input type="text" class="form-control" placeholder="" name="member2">
                </div>
                <div class="form-group">
                    <label class="control-label">Member 3 Name (if any):</label>
                    <input type="text" class="form-control" placeholder="" name="member3">
                </div>
                <div class="form-group">
                    <label class="control-label">Institution:</label>
                    <input type="text" class="form-control" placeholder="" required name="institution">
                </div>
                <div class="form-group">
                    <label class="control-label">Class:</label>
                    <input type="text" class="form-control" placeholder="" required name="class">
                </div>
                <div class="form-group">
                    <label class="control-label">Address:</label>
                    <input type="text" class="form-control" placeholder="" required name="address">
                </div>
                <div class="form-group">
                    <label class="control-label">Mobile No:</label>
                    <input type="text" class="form-control" placeholder="" required name="mobile">
                </div>
                <div class="form-group">
                    <label class="control-label">Emergency Contact No:</label>
                    <input type="text" class="form-control" placeholder="" required name="emergencycontact">
                </div>
                <div class="form-group"><label class="control-label">Photo</label>
                    <input type="file" name="image" accept="image/*">
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-w-m btn-primary">Save</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
    </div>
    @endsection