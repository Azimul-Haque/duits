@extends('layouts.user')
@section('title')
    DUITS | {{$event->headline}}
@endsection
@section('content')
    <section id="blog-post" class="light-bg">
        <div class="container inner-top-sm inner-bottom classic-blog">
            <div class="row">
                <div class=" col-md-offset-1 col-md-9 inner-right-sm">
                    <div class="sidemeta">
                        <div class="post format-gallery">
                            <div class="date-wrapper">
                                <div class="date">
                                    <span class="day"><?php
                                        echo (date("j", strtotime($event->created_at)));
                                        ?></span>
                                    <span class="month"><?php
                                        echo (date("M", strtotime($event->created_at)));
                                        ?></span>
                                </div>
                            </div>
                            <div class="post-content">
                                <figure>
                                    <?php
                                        if(!$event->imagepath == NULL){
                                            $path = $event->imagepath;
                                        }
                                        else {
                                            $path ="default.jpg";
                                        }
                                    ?>
                                    <img src="/images/events/{{$path}}" alt=""></a>
                                </figure>
                                <h1 class="post-title">{{$event->headline}}</h1>
                                <p style="text-align: justify">
                                    <?php echo $event->body; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection