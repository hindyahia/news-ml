@extends('blog.index')
@section('content')
    <div id="content">
        <div class="container">

            <div class="col-md-12">

                <ul class="breadcrumb">
                    <li><a href="{{url('bloger')}}">{{trans('admin.home')}}</a>
                    </li>
                    <li>{{awtTrans('New account / Sign in')}}</li>
                </ul>

            </div>

            <div class="col-md-6">
                <div class="box">
                    <h1>{{trans('admin.New_account')}}</h1>

                    <p class="lead">{{trans('admin.Nrcy')}}</p>
                    <p>{{trans('admin.pnewaccount')}}</p>
                    <p class="text-muted">{!! trans('admin.newaccount_contact') !!}</p>

                    <hr>

                    {!! Form::open(['url'=>url('/bloger/register'),'method'=>'post']) !!}
                    <div class="form-group {{$errors->get('username') ? 'has-error' : '' }}">
                        <label for="name">{{trans('admin.username')}}</label>
                        <input class="form-control" id="name" name="username" value="{{old('username')}}" type="text"
                        pattern="[A-Za-z]+" title="{{awTtrans('A letter from A to Z','en')}}">
                        @if($errors->get('username') )
                            <span class="help-block">
{{ $errors->first('username') }} </span>
                        @endif
                    </div>
                    <div class="form-group {{$errors->get('email') ? 'has-error' : '' }}">
                        <label for="email">{{trans('admin.email')}}</label>
                        <input class="form-control" id="email" name="email" value="{{old('email')}}" type="email">
                        @if($errors->get('email') )
                            <span class="help-block">
{{ $errors->first('email') }} </span>
                        @endif
                    </div>
                    <div class="form-group {{$errors->get('password') ? 'has-error' : '' }}">
                        <label for="password">{{trans('admin.password')}}</label>
                        <input class="form-control" id="password" name="password" type="password"
                        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="{{awTtrans('Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters','en')}}">
                        @if($errors->get('password') )
                            <span class="help-block">
                            {{ $errors->first('password') }}
                            </span>
                        @endif
                    </div>
                       <div class="form-group {{$errors->get('password_confirmation') ? 'has-error' : '' }}">
                        <label for="password">{{trans('admin.password_confirmation')}}</label>
                        <input class="form-control" id="password_confirmation" name="password_confirmation" type="password">
                        @if($errors->get('password_confirmation') )
                            <span class="help-block">
                            {{ $errors->first('password_confirmation') }}
                            </span>
                        @endif
                    </div>
                    <div class="form-group {{$errors->get('g-recaptcha-response') ? 'has-error' : '' }}">
                        {!! NoCaptcha::display() !!}
                        @if($errors->get('g-recaptcha-response') )
                            <span class="help-block">
                            {{ $errors->first('g-recaptcha-response') }}
                            </span>
                        @endif
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-user-md"></i> {{trans('admin.register')}}
                        </button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>

            <div class="col-md-6">
                <div class="box">
                    <h1>{{trans('admin.login')}}</h1>

                    <p class="lead">{{trans('admin.AlreadyOC')}}</p>
                    <p class="text-muted">{{awtTrans('Sign in to get more privileges .')}}</p>

                    <hr>
                    <div class="alert alert-danger {{ session()->has('error')?'':'hide' }} ">
                        <button class="close" data-close="alert"></button>
                        @if(session()->has('error'))
                            <span> {{ session('error') }} </span>
                        @else
                            <span> {{ trans('admin.enter_email_and_password') }} </span>
                        @endif
                    </div>
                    {!! Form::open(['url'=>url('/bloger/login_ecommerce'),'method'=>'post']) !!}
                    <div class="form-group">
                        <label for="email">{{trans('admin.email')}}</label>
                        <input class="form-control" id="email" name="email" type="text">
                    </div>
                    <div class="form-group">
                        <label for="password">{{trans('admin.password')}}</label>
                        <input class="form-control" id="password" name="password" type="password">
                    </div>
                    <div class="form-group">
                        <label for="forget"><a href="{{ url('password/reset') }}">{{awtTrans('did you forget your password?')}}</a></label>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-sign-in"></i> {{trans('admin.Log_in')}}</button>
                    </div>
                    {!! Form::close() !!}                </div>
            </div>


        </div>
        <!-- /.container -->
    </div>


@stop
