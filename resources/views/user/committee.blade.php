@extends('layouts.user')
@section('title')
    DUITS | {{$type->name}}
@endsection
@section('content')
    <section id="who-we-are">
        <div class="container inner-md">
            <div class="row inner-top-xs">
                <div class="col-sm-12 inner-right-xs inner-bottom-xs">
                    <h2>About {{$type->name}}</h2>
                    <p>{{$type->description}}</p>
                </div>
            </div>
        </div>
    </section>
    <section id="team" class="light-bg">
        <div class="container inner-top inner-bottom-sm">
            <div class="row inner-top-sm text-center">
                @if(sizeof($committees)>0)
                    @foreach($committees as $member)
                        <div class="col-sm-4 inner-bottom-sm inner-left inner-right">
                            <figure class="member">
                                <div class="icon-overlay icn-link">
                                    <a href="javascript:void(0);">
                                        <img src="/images/committees/{{$member->photo}}" class="img-circle">
                                    </a>
                                </div>
                                <figcaption>
                                    <h2>
                                        {{$member->name}}
                                        <span>{{$member->designation}}</span>
                                        <span style="border-bottom: 1px solid #ddd;">{{$member->status}} Member</span>
                                    </h2>
                                    <ul class="social">
                                        <li>
                                            <?php
                                                if($member->fb) $fb = $member->fb;
                                                else $fb = "javascript:void(0);";
                                            ?>
                                            <a href="{{$fb}}" target="_blank">
                                                <i class="icon-s-facebook"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <?php
                                            if($member->g_plus) $g_plus = $member->g_plus;
                                            else $g_plus = "javascript:void(0);";
                                            ?>
                                            <a href="{{$g_plus}}" target="_blank">
                                                <i class="icon-s-gplus"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <?php
                                            if($member->twitter) $twitter = $member->twitter;
                                            else $twitter = "javascript:void(0);";
                                            ?>
                                            <a href="{{$twitter}}" target="_blank">
                                                <i class="icon-s-twitter"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </figcaption>
                            </figure>
                        </div>
                    @endforeach
                    @else
                       SORRY NO COMMITTEE MEMBER FOUND
                    @endif
            </div>
            <center> {{$committees->links()}}</center>
        </div>
    </section>

@endsection