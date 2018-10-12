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
                <h1 class="fadeInRight-1 dark-bg light-color" style="left: -15px;">
                    <span>{{$item->title}}</span>
                </h1>
            </div>
        </div>
    </div>
    @endforeach
</div>
</section>

<section id="team" class="">    
    <div class="container inner-top inner-bottom-sm">
        <div class="row">
            <div class="col-md-8 col-sm-10 center-block text-center">
                <header>5th National
                <h1>DUITS Campus IT Fest 2018</h1>
                </header>
                <a href="{{ asset('files/Call_For_Participation.pdf') }}" target="_blank" title="View or Download the Call For Participation PDF file"><i class="fa fa-file-pdf-o" aria-hidden="true"></i>
 Call For Participation</a>
            </div>
        </div>
        <div class="row inner-top-sm">
            
        </div>
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
            <div class="col-sm-4 inner-bottom-sm inner-left inner-right" style="min-height: 490px;">
                <figure class="member">
                    <div class="icon-overlay icn-link">
                        <a href="javascript:void(0)">
                        @if($item->photo != NULL)
                            @if (file_exists(public_path('/uploads/itFest5/guest/'. $item->photo)))
                            <img src="/uploads/itFest5/guest/{{$item->photo}}" class="img-circle">
                            @else
                                <img src="/uploads/itFest5/guest/default.jpg" class="img-circle">
                            @endif
                        @else
                            <img src="/uploads/itFest5/guest/default.jpg" class="img-circle">
                        @endif
                        </a>
                    </div>
                    <figcaption>
                        <h2> {{$item->name}}
                        <span>{{$item->designation}}</span>
                        <span>{{$item->institution}}</span>
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
                            <div class="col-md-12 col-sm-12">
                                <img src="{{ asset('images/day_1_1.jpg') }}" class="img-responsive">
                                <br/>
                                <img src="{{ asset('images/day_1_2.jpg') }}" class="img-responsive">
                            </div>
                        </div>
                    </div>
                    <div class="tab-content" id="tab-2">
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <img src="{{ asset('images/day_2_1.jpg') }}" class="img-responsive">
                                <br/>
                                <img src="{{ asset('images/day_2_2.jpg') }}" class="img-responsive">
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
                <h1>Want To Register Now?</h1>
                </header>
                <a href="#modalRegistration" class="btn btn-large" data-toggle="modal" data-backdrop="static">Registration</a>
            </div>
        </div>
    </div>
    <div class="container inner">
        <div class="row">
            <div class="col-md-8 col-sm-9 center-block text-center">
                <header>
                <h2>Check Your Registration Status</h2>
                </header>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Enter Registration ID" id="registration_id_to_search">
                    <button type="submit" class="btn btn-w-m btn-primary" id="registrationStatusCheck">Search</button>
                </div>
            </div>
        </div>
    </div>
    </section>
    <div class="modal fade" id="modalRegistration" tabindex="-1" role="dialog" aria-labelledby="modalRegistration" aria-hidden="true">
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
                        <option value="1,Apps in Life">Apps in Life</option>
                        <option value="2,IT Project Showcasing">IT Project Showcasing</option>
                        <option value="3,IT Noesis Quiz">IT Noesis Quiz</option>
                        <option value="5,Gaming Contest (NFS Most Wanted)">Gaming Contest (NFS Most Wanted)</option>
                        <option value="6,Gaming Contest (FIFA-14)">Gaming Contest (FIFA-14)</option>
                        <option value="7,Brainstorming: IT based business idea Contest">Brainstorming: IT based business idea Contest</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label">Participant's Name/ Team</label>
                    <input type="text" class="form-control" placeholder="" required name="team" value="{{ old('team') }}">
                </div>
                <div class="form-group">
                    <label class="control-label">Member 1 Name (if any):</label>
                    
                    <input type="text" class="form-control" placeholder="" name="member1" value="{{ old('member1') }}">
                </div>
                <div class="form-group">
                    <label class="control-label">Member 2 Name (if any):</label>
                    <input type="text" class="form-control" placeholder="" name="member2" value="{{ old('member2') }}">
                </div>
                <div class="form-group">
                    <label class="control-label">Member 3 Name (if any):</label>
                    <input type="text" class="form-control" placeholder="" name="member3" value="{{ old('member3') }}">
                </div>
                <div class="form-group">
                    <label class="control-label">Member 4 Name (if any):</label>
                    <input type="text" class="form-control" placeholder="" name="member4" value="{{ old('member4') }}">
                </div>
                <div class="form-group">
                    <label class="control-label">Institution:</label>
                    <input type="text" class="form-control" placeholder="" required name="institution" value="{{ old('institution') }}">
                </div>
                <div class="form-group">
                    <label class="control-label">Address:</label>
                    <input type="text" class="form-control" placeholder="" required name="address" value="{{ old('address') }}">
                </div>
                <div class="form-group">
                    <label class="control-label">Email Address</label>
                    <input type="email" class="form-control" placeholder="" required name="email" value="{{ old('email') }}">
                </div>
                <div class="form-group">
                    <label class="control-label">Mobile No: (11 digit number)</label>
                    <input type="text" class="form-control" placeholder="" required name="mobile" value="{{ old('mobile') }}" pattern="\d*" maxlength="11">
                </div>
                <div class="form-group">
                    <label class="control-label">Emergency Contact No: (11 digit number)</label>
                    <input type="text" class="form-control" placeholder="" required name="emergencycontact" value="{{ old('emergencycontact') }}" pattern="\d*" maxlength="11">
                </div>
                <div class="form-group"><label class="control-label">Photo of Applicant (300x300)</label>
                    <input type="file" name="image" accept="image/*" required>
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

    @section('scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            $("#registrationStatusCheck").click(function(){
                window.open(window.location.protocol + "//" + window.location.host + "/it-fest-5/registration/"+$("#registration_id_to_search").val(), '_blank');
            });
        });
    </script>
    @if (count($errors) > 0)
        <script>
            $( document ).ready(function() {
                $('#modalRegistration').modal('show');
            });
        </script>
    @endif
    @endsection