@extends('layouts.user')
@section('title')
    DUITS | NOTICE
@endsection
@section('content')
    <section id="blog" class="light-bg">
        <div class="container inner-top-sm inner-bottom classic-blog no-sidebar">
            <div class="row">
                @foreach($notice as $item)
                    <div class="col-md-9 center-block">
                    <div class="posts sidemeta">
                        <div class="post format-standard">
                            <div class="date-wrapper">
                                <div class="date"><span class="day"><?php
                                        echo (date("j", strtotime($item->created_at)));
                                        ?></span><span class="month"><?php
                                        echo (date("M", strtotime($item->created_at)));
                                        ?></span></div>
                            </div>
                            <div class="post-content">
                                <h2 class="post-title"><a href="/detail/notice/{{$item->id}}">{{$item->headline}}</a></h2>
                                <p>{{$item->body}}</p>
                            </div>
                        </div>
                    </div>
                    {{$notice->links()}}
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection