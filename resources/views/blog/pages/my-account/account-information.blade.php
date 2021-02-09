@extends('blog.index')
@section('content')



    <div class="col-md-12">

        <ul class="breadcrumb">
            <li><a href="{{ url('bloger') }}">{{ trans('admin.home') }}</a>
            </li>
            <li><a href="{{ url('bloger/account') }}">{{ trans('admin.My_account') }}</a>
            </li>
            <li>{{ trans('admin.Account_information') }}</li>
        </ul>

    </div>

    <div class="col-md-3">
        <!-- *** CUSTOMER MENU ***-->
        <div class="panel panel-default sidebar-menu">

            <div class="panel-heading">
                <h3 class="panel-title">{{ trans('admin.Customer_section') }}</h3>
            </div>

            <div class="panel-body">
                <ul class="nav nav-pills nav-stacked">
                    <li class="">
                        <a href="{{ url('bloger/account') }}"><i
                                    class="fa fa-users"></i> {{ trans('admin.My_account') }}</a>
                    </li>
                    <li class="active">
                        <a href="{{ url('bloger/account/Account_information') }}"><i
                                    class="fa fa-cog"></i>{{trans('admin.Account_information') }}</a>
                    </li>
                    <li class="">
                        <a href="{{ url('bloger/account/Change_profile') }}"><i
                                    class="fa fa-user"></i> {{ trans('admin.Change_profile') }}</a>
                    </li>
                    @if(\Auth::user()->teams == 'yes' )
                        <li class="">
                            <a href="{{ url('bloger/account/exp') }}"><i
                                        class="fa fa-user"></i> @awt('add experiences','en')</a>
                        </li>

                    @endif
                    @if(\Auth::user()->Informations_users_de or \Auth::user()->Informations_users_team)
                        <li class="">
                            <a href="{{ url('bloger/account/social-media') }}"><i
                                        class="	fa fa-pinterest-square"></i> @awt('Social Media','ar')</a>
                        </li>
                    @endif
                    <li>
                        <a href="{{ url('bloger/logout') }}"><i class="fa fa-sign-out"></i> {{ trans('admin.logout') }}
                        </a>
                    </li>
                </ul>

            </div>

        </div>
        <!-- /.col-md-3 -->

        <!-- *** CUSTOMER MENU END *** -->
    </div>

    <div class="col-md-9">
        @if(session()->has('success'))
            <div class="alert alert-success">
                <button class="close" data-close="alert"></button>
                @if(session()->has('success'))
                    <span> {{ session('success') }} </span>
                @endif
            </div>
        @endif
        <div class="box">
            <h1>{{ trans('admin.My_account') }}</h1>
            <p class="lead">{{ trans('admin.Change_your_personal_details_or_your_password_here.')}}</p>
            <p class="text-muted"></p>

            <h3>{{ trans('admin.Account_information') }}</h3>

            {!! Form::open(['url'=>url('/bloger/account/Account_information') ,'method'=>'post']) !!}
            <div class="row">
                @if(app('l') == 'ar')
                    <div class="col-sm-6">
                        <div class="form-group {{$errors->get('Last_name') ? 'has-error' : '' }}">
                            <label for="lastname">{{ trans('admin.Lastname') }}</label>
                            <input class="form-control" value="{{$user->Last_Name}}" name="Last_name"
                                   id="lastname" type="text">
                            @if($errors->get('Last_name') )
                                <span class="help-block">
{{ $errors->first('Last_name') }} </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group  {{$errors->get('First_name') ? 'has-error' : '' }}">
                            <label for="firstname">{{ trans('admin.Firstname') }}</label>
                            <input class="form-control" value="{{$user->First_Name}}"
                                   name="First_name" id="firstname" type="text">
                            @if($errors->get('First_name') )
                                <span class="help-block">
{{ $errors->first('First_name') }} </span>
                            @endif
                        </div>
                    </div>

                @else
                    <div class="col-sm-6">
                        <div class="form-group {{$errors->get('First_name') ? 'has-error' : '' }}">
                            <label for="firstname">{{ trans('admin.Firstname') }}</label>
                            <input class="form-control" value="{{ $user->First_Name }}"
                                   name="First_name" id="firstname" type="text">
                            @if($errors->get('First_name') )
                                <span class="help-block">
{{ $errors->first('First_name') }} </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group {{$errors->get('Last_name') ? 'has-error' : '' }}">
                            <label for="lastname">{{ trans('admin.Lastname') }}</label>
                            <input class="form-control" value="{{ $user->Last_Name}}" name="Last_name"
                                   id="lastname" type="text">
                            @if($errors->get('Last_name') )
                                <span class="help-block">
{{ $errors->first('Last_name') }} </span>
                            @endif
                        </div>
                    </div>
                @endif
            </div>
            <!-- /.row -->
            @if(Auth::check())
                    <div class="row ">
                        <div class="col-sm-6" @if(app('l') == 'ar') style="float: right;" @endif>
                            <div class="form-group">
                                <label for="company">{{ trans('admin.Gender') }}</label>
                                <select class="form-control" id="state" name="Gender">
                                    <option
                                            value="Male" @if (isset($Informations_users_de))
                                        {{$Informations_users_de->Gender  =='Male' ? 'selected' :''}}
                                            @endif >{{ trans('admin.Male') }}</option>
                                    <option
                                            value="female"  @if (isset($Informations_users_de))
                                        {{$Informations_users_de->Gender =='female' ? 'selected' :''}}
                                            @endif >{{ trans('admin.female') }}</option>
                                </select>

                            </div>
                        </div>
                        <div class="col-sm-6" @if(app('l') == 'ar') style="float: right;" @endif>
                            <div class="form-group {{$errors->get('Phone') ? 'has-error' : '' }}">
                                <label for="company">{{ trans('admin.Phone') }}</label>
                                <input class="form-control" name="Phone" value="@if (isset($Informations_users_de)) {{$Informations_users_de->Phone}}@endif"

                                       type="text">
                                @if($errors->get('Phone') )
                                    <span class="help-block">
{{ $errors->first('Phone') }} </span>
{{--                                @endif--}}
                                @endif

                            </div>
                        </div>

                    </div>
            @endif
            <!-- /.row -->

                <div class="row">

                    <div class="col-sm-12 text-center">
                        <button type="submit" class="btn btn-primary"><i
                                    class="fa fa-save"></i>{{ trans('admin.Save_changes')}} </button>

                    </div>
                </div>
            {!! Form::close() !!}
            <!-- /.row -->


                <hr>


        </div>
    </div>

    </div>
    <!-- /.container -->
    </div>


@stop
