@extends('layouts.user')

@section('body')
    <div class="main-content-wrapper">
        <!-- Sign In Option 1 -->
        <div id="sign_in1">
            <div class="container">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12 header">
                            <h4 style="color: white;">Create Your Account</h4>
                        </div>

                        <form id="registration_form" action="{{Route('register')}}" method="post">
                            {{csrf_field()}}
                            <div class=" col-md-12 footer">
                                <div class="form-group">
                                    <input id="name" type="text" placeholder="Name" class="form-control" name="name" required>
                                    @if ($errors->has('name'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <input id="email" type="email" placeholder="Email" class="form-control" name="email" required>
                                    @if ($errors->has('email'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <input type="text" placeholder="Phone" class="form-control" name="phone">
                                </div>
                                <div class="form-group">
                                    <input type="password" placeholder="Password" class="form-control" id="password" name="password" required>
                                    @if ($errors->has('password'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <input id="password_confirmation" type="password" placeholder="Re Enter Password" class="form-control" name="password_confirmation" required>
                                </div>

                                <div class="form-group">
                                    <input type="submit" value="sign up">
                                </div>
                            </div>
                        </form>

                        <div class="col-md-12 proof">

                            <div class="">
                                <div style="color: white;">
                                    <span>Already have an account?</span>
                                    <a style="text-decoration: underline; color: white;" href="{{Route('login')}}">Sign in</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript" src="/js/validators/validator.js"></script>
    <script type="text/javascript" src="/js/validators/registrationValidator.js"></script>
    @endsection
