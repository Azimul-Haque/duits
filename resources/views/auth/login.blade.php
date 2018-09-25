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
                            <h4 style="color: white;">Log in to your account</h4>
                        </div>

                        <form method="post" action="{{Route('login')}}">
                            {{csrf_field()}}
                            <div class=" col-md-12 footer">
                                <div class="form-group">
                                    <input type="email" placeholder="Email" class="form-control" name="email">
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <input type="password" placeholder="Password" class="form-control" name="password">
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Log In">
                                </div>
                            </div>
                        </form>

                        <div class="col-md-12 proof">

                            <div class="">
                                <div style="color: white;">
                                    <span>Don’t have an account?</span>
                                    <a style="text-decoration: underline; color: white;" href="{{Route('register')}}">Sign up</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
