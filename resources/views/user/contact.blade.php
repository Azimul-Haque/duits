@extends('layouts.user')
@section('title')
    DUITS | Contact
@endsection
@section('content')
    <section id="contact-form">
        <div class="container inner">
            <div class="row">
                <div class="col-md-8 col-sm-9 center-block text-center">
                    <header>
                        <h1>Get in touch</h1>
                    </header>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-6 outer-top-md inner-right-sm">
                            <h2>Leave a Message</h2>
                            <form id="" class="forms" action="{{ route('user.submit.message') }}" method="post">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-sm-12"><input type="text" name="name" class="form-control" placeholder="Your Name" required></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12"><input type="text" name="phone" class="form-control" placeholder="Phone"></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12"><input type="email" name="email" class="form-control" placeholder="Email"></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12"><textarea name="message" class="form-control" placeholder="How may we assist you?"></textarea></div>
                                </div>
                                <button type="submit" class="btn btn-default btn-submit">Submit message</button>
                            </form>
                            <div id="response"></div>
                        </div>
                        <div class="col-sm-6 outer-top-md inner-left-sm border-left">
                            <h3>DUITS</h3>
                            <ul class="contacts">
                                <li><i class="icon-location contact"></i> TSC, University of Dhaka</li>
                                <li><i class="icon-mobile contact"></i> +8801923734867</li>
                                <li><a href="mailto:info@reen.com"><i class="icon-mail-1 contact"></i> duits.official@gmail.com</a></li>
                            </ul>
                            <div class="social-network">
                                <h3>Social</h3>
                                <ul class="social">
                                    <li><a href="#"><i class="icon-s-facebook"></i></a></li>
                                    <li><a href="#"><i class="icon-s-gplus"></i></a></li>
                                    <li><a href="#"><i class="icon-s-twitter"></i></a></li>
                                    <li><a href="#"><i class="icon-s-pinterest"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3652.429386583551!2d90.39349371456134!3d23.732062784598376!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8e99b9de929%3A0x7250f88da2943ad4!2sDhaka+University+IT+Society!5e0!3m2!1sen!2sbd!4v1531043058251" width="100%" height="500" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
    </section>
@endsection