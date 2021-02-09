@extends('blog.index')
@section('content')



    <div class="col-md-12">

        <ul class="breadcrumb">
            <li><a href="{{ url('bloger') }}">{{ trans('admin.home') }}</a>
            </li>
            <li>{{ trans('admin.My_account') }}</li>
        </ul>

    </div>

    <div class="col-md-3">
        <!-- *** CUSTOMER MENU ***-->
        <div class="panel panel-default sidebar-menu">

            <div class="panel-heading">
                <h3 class="panel-title">{{ trans('admin.Customer_section') }}</h3>
            </div>

            <div class="panel-body">

            </div>
            <ul class="nav nav-pills nav-stacked">
                <li class="active">
                    <a href="{{ url('bloger/account') }}"><i class="fa fa-users"></i> {{ trans('admin.My_account') }}
                    </a>
                </li>
                <li class="">
                    <a href="{{ url('bloger/account/Account_information') }}"><i
                            class="fa fa-cog"></i> {{ trans('admin.Account_information') }}</a>
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
              <li class="">
                      <a href="{{ url('bloger/account/social-media') }}"><i
                              class="	fa fa-pinterest-square"></i> @awt('Social Media','ar')</a>
                  </li>
                  @endif
                <li>
                    <a href="{{ url('bloger/logout') }}"><i class="fa fa-sign-out"></i> {{ trans('admin.logout') }}</a>
                </li>
            </ul>


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

            <h3>{{ trans('admin.Change_password') }}</h3>

            {!! Form::open(['url'=>url('/bloger/account/Change_password') ,'method'=>'post']) !!}
            <div class="row">
                <div class="col-sm-6" @if(app('l') == 'ar') style="float: right;" @endif>
                    <div class="form-group  {{$errors->has('current_password') ? 'has-error' : '' }}">
                        <label for="password_old">{{ trans('admin.Oldpassword') }}</label>
                        <input class="form-control" id="password_old" name="Oldpassword" type="password">
                        {{-- <input type="password" name="Oldpassword" --}}



                        @if ($errors->has('current_password'))
                            <span class="help-block">
{{ $errors->first('current_password') }}
</span>
                        @endif
                    </div>
                </div>
            </div>
            @if(app('l') == 'ar')
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group {{$errors->get('Retype_new_password') ? 'has-error' : '' }}">
                            <label for="password_2">{{ trans('admin.Retype_new_password') }}</label>
                            <input class="form-control" id="password_2" name="Retype_new_password" type="password">
                            @if($errors->get('Retype_new_password') )
                                <span class="help-block">
{{ $errors->first('Retype_new_password') }} </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group {{$errors->get('password') ? 'has-error' : '' }}">
                            <label for="password_1">{{ trans('admin.New_password') }}</label>
                            <input type="password" name="password" class="form-control"/>
                            @if ($errors->has('password'))
                                <span class="help-block">
{{ $errors->first('password') }}
</span>
                            @endif
                        </div>

                    </div>
                </div>
            @else

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group {{$errors->get('password') ? 'has-error' : '' }}">
                            <label for="password_1">{{ trans('admin.New_password') }}</label>
                            <input type="password" name="password" class="form-control"/>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                {{ $errors->first('password') }}
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group {{$errors->get('Retype_new_password') ? 'has-error' : '' }}">
                        <label for="password_2">{{ trans('admin.Retype_new_password') }}</label>
                        <input class="form-control" id="password_2" name="Retype_new_password" type="password">
                        @if($errors->get('Retype_new_password') )
                            <span class="help-block">
{{ $errors->first('Retype_new_password') }} </span>
                        @endif
                    </div>
                </div>
        </div>
    @endif

    <!-- /.row -->

        <div class="col-sm-12 text-center">
            <button type="submit" class="btn btn-primary"><i
                    class="fa fa-save"></i> {{ trans('admin.Save_new_password') }}</button>
        </div>
        </form>

        <hr>


        <!-- /.container -->
    </div>
    </div>
    </div>
    </div>


@stop
