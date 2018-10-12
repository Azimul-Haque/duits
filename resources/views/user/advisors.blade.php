@extends('layouts.user')
@section('title')
    DUITS | Advisory Committee
@endsection
@section('content')
    <section id="team" class="light-bg">
        <div class="container inner-top inner-bottom-sm">
            <div class="row inner-top-sm text-center">
                @if(sizeof($advisors)>0)
                    @foreach($advisors as $member)
                        <div class="col-sm-4 inner-bottom-sm inner-left inner-right" style="min-height: 490px;">
                            <figure class="member">
                                <div class="icon-overlay icn-link">
                                    <a href="javascript:void(0);">
                                        @if($member->photo != NULL)
                                            @if (file_exists(public_path('images/advisors/'. $member->photo)))
                                            <img src="/images/advisors/{{$member->photo}}" class="img-circle">
                                            @else
                                                <img src="/images/advisors/default.jpg" class="img-circle">
                                            @endif
                                        @else
                                            <img src="/images/advisors/default.jpg" class="img-circle">
                                        @endif
                                    </a>
                                </div>
                                <figcaption>
                                    <h2>
                                        {{$member->name}}
                                        <span>{{$member->designation}}</span>
                                        <span>{{$member->institution}}</span>
                                    </h2>
                                </figcaption>
                            </figure>
                        </div>
                    @endforeach
                    @else
                       SORRY, NO ADVISORY COMMITTEE MEMBER FOUND
                    @endif
            </div>
        </div>
    </section>

@endsection