<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <title>@yield('title')</title>
      <script src="/js/user/page-preloading.js"></script>
      <link href="/css/user/bootstrap.min.css" rel="stylesheet">
      <link href="/css/user/main.css" rel="stylesheet">
      <link href="/css/user/green.css" rel="stylesheet" title="Color">
      <link href="/css/user/owl.carousel.css" rel="stylesheet">
      <link href="/css/user/owl.transitions.css" rel="stylesheet">
      <link href="/css/user/animate.min.css" rel="stylesheet">
      <link href="/css/user/aos.css" rel="stylesheet">
      <link href="/css/user/custom.css" rel="stylesheet">
      <link href="/font-awesome/css/font-awesome.css" rel="stylesheet">
      <link href='https://fonts.googleapis.com/css?family=Roboto Mono' rel='stylesheet'>
      <link href="http://fonts.googleapis.com/css?family=Lato:400,900,300,700" rel="stylesheet">
      <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700,400italic,700italic" rel="stylesheet">
      <!-- Toastr style -->
      <link href="/css/admin/plugins/toastr/toastr.min.css" rel="stylesheet">
      <link href="/fonts/fontello.css" rel="stylesheet">
      <link rel="shortcut icon" href="/images/favicon.png">
      <script>(function (d, e, j, h, f, c, b) { d.GoogleAnalyticsObject = f; d[f] = d[f] || function () { (d[f].q = d[f].q || []).push(arguments) }, d[f].l = 1 * new Date(); c = e.createElement(j), b = e.getElementsByTagName(j)[0]; c.async = 1; c.src = h; b.parentNode.insertBefore(c, b) })(window, document, "script", "../../../www.google-analytics.com/analytics.js", "ga"); ga("create", "UA-35598290-4", "fuviz.com"); ga("send", "pageview");</script>
      @yield('styles')
</head>

<body>
      <header>
            <div class="navbar">
            <div class="navbar-header">
               <div class="container">
                  <ul class="info pull-left">
                     <li><a href="#" style="color:white;"><i class="icon-mail-1 contact"></i>info@duits-bd.org</a></li>
                     <li style="color:white;"><i class="icon-mobile contact"></i> +8801923734867</li>
                  </ul>
                  <ul class="social pull-right">
                     <li><a href="https://www.facebook.com/Dhaka.University.IT.Society.DUITS" target="_blank"><i class="icon-s-facebook"></i></a></li>
                     <li><a href="#"><i class="icon-s-gplus"></i></a></li>
                     <li><a href="#"><i class="icon-s-twitter"></i></a></li>
                     <li><a href="#"><i class="icon-s-pinterest"></i></a></li>
                  </ul>
                  <a class="navbar-brand" href="/"><img src="/images/logo.png" class="logo" alt=""></a><a class="navbar-toggle btn responsive-menu pull-right" data-toggle="collapse" data-target=".navbar-collapse"><i class='icon-menu-1'></i></a>
               </div>
            </div>
                  <div class="yamm">
                        <div class="navbar-collapse collapse">
                              <div class="container">
                                    <a class="navbar-brand" href="/">
                                          <img src="/images/logo.png" class="logo" alt="">
                                    </a>
                                    <ul class="nav navbar-nav">
                                          <li class="dropdown">
                                                <a href="/">Home</a>
                                          </li>
                                          <li class="dropdown">
                                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                                                      <i class="icon-down-open-1"></i> Committee</a>
                                                <ul class="dropdown-menu">
                                                    <?php
                                                    use App\Committee_type as Committee;
                                                    $committee = Committee::orderBy('serial')->get();
                                                    ?>
                                                      @foreach($committee as $item)
                                                            <li>
                                                                  <a href="/committee/{{$item->name}}">{{$item->name}}</a>
                                                            </li>
                                                            @endforeach
                                                </ul>
                                          </li>
                                          <!-- <li class="dropdown">
                                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                                                      <i class="icon-down-open-1"> </i>More</a>
                                                <ul class="dropdown-menu">
                                                      <li>
                                                            <a href="/news">News</a>
                                                      </li>
                                                      <li>
                                                            <a href="/events">Events</a>
                                                      </li>
                                                      <li>
                                                            <a href="/notice">Notice</a>
                                                      </li>
                                                </ul>
                                          </li>-->
                                          <li>
                                                <a href="{{ route('user.advisors') }}">Advisory Committee</a>
                                          </li>
                                          <li>
                                                <a href="/news">News</a>
                                          </li>
                                          <li>
                                                <a href="/events">Events</a>
                                          </li>
                                          <li>
                                                <a href="/notice">Notice</a>
                                          </li>
                                          <li class="dropdown">
                                                <a href="{{Route('user.contact')}}">Contact Us</a>
                                          </li>
                                          <li class="dropdown">
                                                <a href="/it-fest-5" style="color: chartreuse;">DUITS 5th IT Fest</a>
                                          </li>
                                          <li class="dropdown pull-right searchbox">
                                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                                                      <i class="icon-search"></i>
                                                </a>
                                                <div class="dropdown-menu">
                                                      <form id="search" class="navbar-form search" role="search">
                                                            <input type="search" class="form-control" placeholder="Type to search">
                                                            <button type="submit" class="btn btn-default btn-submit icon-right-open"></button>
                                                      </form>
                                                </div>
                                          </li>
                                    </ul>
                              </div>
                        </div>
                  </div>
            </div>
      </header>
      <main style="min-height: 400px;">
            @yield('content')
      </main>
      <footer class="dark-bg">
            <div class="container inner">
                  <div class="row">
                        <div class="col-md-3 col-sm-6 inner">
                              <h4>Follow Us</h4>
                              <div class="social-network" style="padding-top: 0px;">
                                    <ul class="social">
                                          <li>
                                                <a href="https://www.facebook.com/Dhaka.University.IT.Society.DUITS" target="_blank">
                                                      <i class="icon-s-facebook"></i>
                                                </a>
                                          </li>
                                          <li>
                                                <a href="#">
                                                      <i class="icon-s-gplus"></i>
                                                </a>
                                          </li>
                                          <li>
                                                <a href="#">
                                                      <i class="icon-s-twitter"></i>
                                                </a>
                                          </li>
                                          <li>
                                                <a href="#">
                                                      <i class="icon-s-pinterest"></i>
                                                </a>
                                          </li>
                                    </ul>
                              </div>
                        </div>
                        <div class="col-md-3 col-sm-6 inner">
                              <h4>Menu</h4>
                              <ul class="" style="padding-left: 0px;">
                                    <li>
                                          <a href="{{ url('/') }}">Home</a>
                                    </li>
                                    <li>
                                          <a href="{{ url('/news') }}">News</a>
                                    </li>
                                    <li>
                                          <a href="{{ url('/contact') }}">Contact</a>
                                    </li>
                              </ul>
                        </div>
                        <div class="col-md-3 col-sm-6 inner">
                              <h4>Get In Touch</h4>
                              <ul class="contacts">
                                    <li>
                                          <i class="icon-location contact"></i> TSC, University of Dhaka</li>
                                    <li>
                                          <i class="icon-mobile contact"></i> +8801923734867</li>
                                    <li>
                                          <a href="#">
                                                <i class="icon-mail-1 contact"></i> info@duits-bd.org</a>
</li>
</ul>
</div>
<div class="col-md-3 col-sm-6 inner">
    <h4>Useful Links</h4>
    <ul style="padding-left: 0px;">
        <li>
            <a href="http://du.ac.bd/">University of Dhaka</a>
        </li>
        <li>
            <a href="http://jobs.du.ac.bd/">Jobs</a>
        </li>
        <li>
            <a href="https://duaa-bd.org/">Alumni Association</a>
        </li>
        <li>
            <a href="http://www.library.du.ac.bd/">Library</a>
        </li>
    </ul>
</div>
</div>
</div>
<div class="footer-bottom">
    <div class="container inner">
        <p class="pull-left">© 2018 DUITS. All rights reserved.</p>
        <p class="pull-right">Developed By: Soft360d.com</p>
    </div>
</div>
</footer>
<script src="/js/user/jquery.min.js"></script>
<script src="/js/user/jquery.easing.1.3.min.js"></script>
<script src="/js/user/jquery.form.js"></script>
<script src="/js/user/jquery.validate.min.js"></script>
<script src="/js/user/bootstrap.min.js"></script>
<script src="/js/user/aos.js"></script>
<script src="/js/user/owl.carousel.min.js"></script>
<script src="/js/user/jquery.isotope.min.js"></script>
<script src="/js/user/imagesloaded.pkgd.min.js"></script>
<script src="/js/user/jquery.easytabs.min.js"></script>
<script src="/js/user/viewport-units-buggyfill.js"></script>
<script src="/js/user/selected-scroll.js"></script>
<script src="/js/user/scripts.js"></script>
<script src="/js/user/custom.js"></script>
<!-- Toastr -->
<script src="/js/admin/plugins/toastr/toastr.min.js"></script>
<link href="/css/user/green.css" rel="alternate stylesheet" title="Green color">
<link href="/css/user/blue.css" rel="alternate stylesheet" title="Blue color">
<link href="/css/user/red.css" rel="alternate stylesheet" title="Red color">
<link href="/css/user/pink.css" rel="alternate stylesheet" title="Pink color">
<link href="/css/user/purple.css" rel="alternate stylesheet" title="Purple color">
<link href="/css/user/orange.css" rel="alternate stylesheet" title="Orange color">
<link href="/css/user/navy.css" rel="alternate stylesheet" title="Navy color">
<link href="/css/user/gray.css" rel="alternate stylesheet" title="Gray color">
<script src="/switchstylesheet/switchstylesheet.js"></script>
<script>$(document).ready(function () { $(".changecolor").switchstylesheet({ seperator: "color" }) });</script>
@yield('scripts')
@include('partials._messages')
</body>

</html>