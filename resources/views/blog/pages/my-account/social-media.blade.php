@extends('blog.index')
@section('content')



    <div class="col-md-12">

        <ul class="breadcrumb">
            <li><a href="{{ url('bloger') }}">{{ trans('admin.home') }}</a>
            </li>
            <li><a href="{{ url('bloger/account') }}">{{ trans('admin.My_account') }}</a>
            </li>
            <li>{{ $title }}</li>
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
                    <li class="">
                        <a href="{{ url('bloger/account/Account_information') }}"><i class="fa fa-cog"></i>{{trans('admin.Account_information') }}</a>
                    </li>
                    <li class="">
                        <a href="{{ url('bloger/account/Change_profile') }}"><i
                                class="fa fa-user"></i> {{ trans('admin.Change_profile') }}</a>
                    </li>
                    @if(\Auth::user()->teams == 'yes')
                    <li class="">
                        <a href="{{ url('bloger/account/exp') }}"><i
                                class="fa fa-user"></i> @awt('add experiences','en')</a>
                    </li>
               
                  @endif
                  @if(\Auth::user()->Informations_users_de or \Auth::user()->Informations_users_team)
                  <li class="active">
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
            <p class="lead">@awt('Add information to social networking sites','en')</p>
            <p class="text-muted"></p>

            <h3>{{ $title }}</h3>

            {!! Form::open(['url'=>url('/bloger/account/social-media') ,'method'=>'post']) !!}
            <div class="row">
               
                    <div class="col-sm-6">
                        <div class="form-group {{$errors->get('linkedin') ? 'has-error' : '' }}">
                            <label for="firstname"><i class="fa fa-linkedin-square"></i>{{ awTtrans('linkedin','en') }}</label>
                            <input class="form-control" value="{{$user->linkedin}}"
                                   name="linkedin" id="linkedin" type="text">
                            @if($errors->get('linkedin') )
                                <span class="help-block">
{{ $errors->first('linkedin') }} </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group {{$errors->get('instagram') ? 'has-error' : '' }}">
                            <label for="instagram"><i class="fa fa-instagram"></i>{{ awTtrans('instagram','en') }}</label>
                            <input class="form-control" value="{{$user->instagram}}" name="instagram"
                                   id="instagram" type="text">
                            @if($errors->get('instagram') )
                                <span class="help-block">
{{ $errors->first('instagram') }} </span>
                            @endif
                        </div>
                    </div>
            
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-sm-6" @if(app('l') == 'ar') style="float: right;" @endif>
                    <div class="form-group">
                        <label for="company"><i class="fa fa-facebook-square"></i>{{ awTtrans('facebook','en') }}</label>
                        <input class="form-control" name="facebook" value="{{$user->facebook}}"
                        type="text">
                        @if($errors->get('facebook') )
                        <span class="help-block">
{{ $errors->first('facebook') }} </span>
                    @endif
                    </div>
                </div>
                <div class="col-sm-6" @if(app('l') == 'ar') style="float: right;" @endif>
                    <div class="form-group {{$errors->get('twitter') ? 'has-error' : '' }}">
                        <label for="company"><i class="fa fa-twitter-square"></i>{{ awTtrans('twitter','en') }}</label>
                        <input class="form-control" name="twitter" value="{{$user->twitter}}"
                               type="text">
                        @if($errors->get('twitter') )
                            <span class="help-block">
{{ $errors->first('twitter') }} </span>
                        @endif

                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-sm-6" @if(app('l') == 'ar') style="float: right;" @endif>
                    <div class="form-group {{$errors->get('pinterest') ? 'has-error' : '' }}">
                        <label for="company"><i class="fa fa-pinterest"></i>{{ awTtrans('pinterest','en') }}</label>
                        <input class="form-control" name="pinterest" value="{{$user->pinterest}}"
                               type="text">
                        @if($errors->get('pinterest') )
                            <span class="help-block">
{{ $errors->first('pinterest') }} </span>
                        @endif

                    </div>
                </div>

            </div>
            <!-- /.row pinterest -->

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
