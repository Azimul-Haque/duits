@extends('layouts.user')
@section('title')
    DUITS | NEWS
@endsection
@section('content')
    <section id="blog" class="light-bg">
        <div class="container inner-top-sm inner-bottom classic-blog sidebar-left">
            <div class="row">
                <div class="col-md-9 col-md-push-3 inner-left-sm">
                    <div class="posts sidemeta">
                        @foreach($news as $item)
                            <div class="post format-image">
                            <div class="date-wrapper">
                                <div class="date"><span class="day">
                                        <?php
                                        echo (date("j", strtotime($item->created_at)));
                                        ?>
                                    </span><span class="month"><?php echo (date("M", strtotime($item->created_at))); ?></span></div>
                            </div>
                            <div class="post-content">
                                <figure class="icon-overlay icn-link post-media">
                                    <a href="/detail/news/{{$item->headline}}">
                                        <?php
                                            if(sizeof($item->broadcasts_image)>0){
                                                $path = $item->broadcasts_image[0]->path;
                                            }
                                            else $path ="default.jpg";
                                        ?>
                                        <img src="/images/news/{{$path}}" alt=""></a>
                                </figure>
                                <h2 class="post-title"><a href="/detail/news/{{$item->headline}}">{{$item->headline}}</a></h2>
                                <p>
                                    <?php
                                        echo $item->body;
                                    ?>
                                </p>
                                <a href="/detail/news/{{$item->headline}}" class="btn">Read more</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    {{$news->links()}}
                </div>
            </div>
        </div>
    </section>
@endsection