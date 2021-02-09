@extends('blog.index')
@section('content')



    <div class="col-md-12">

        <ul class="breadcrumb">
            <li><a href="{{ url('bloger') }}">{{ trans('admin.home') }}</a>
            </li>
            <li><a href="{{ url('bloger/account') }}">{{ trans('admin.My_account') }}</a>
            </li>
            <li> @awt('add experiences','en')</li>
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
                    <li class="active">
                        <a href="{{ url('bloger/account/exp') }}"><i
                                class="fa fa-user"></i> @awt('add experiences','en')</a>
                    </li>
                  @endif
                  @if(\Auth::user()->Informations_users_de or \Auth::user()->Informations_users_team)
                  <li class="">
                          <a href="{{ url('bloger/account/social-media') }}"><i
                                  class="fa fa-pinterest-square"></i> @awt('Social Media','ar')</a>
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
            <p class="lead">@awt('Here skills and experiences are added','en')</p>
            <p class="text-muted"></p>

            <h3>@awt('add experiences','en')</h3>

            {!! Form::open(['url'=>url('/bloger/account/exp') ,'method'=>'post']) !!}
            <div class="row">
                @if(app('l') == 'ar')
                    <div class="col-sm-6">
                      <div class="form-group  {{$errors->get('exp') ? 'has-error' : '' }}">
                          <label for="firstname">{{ trans('admin.exp') }}</label>
                          <input class="form-control"  name="exp"  type="text">
                          @if($errors->get('exp') )
                              <span class="help-block">
                    {{ $errors->first('exp') }} </span>
                          @endif
                      </div>
                    </div>
                    <div class="col-sm-6">

                    </div>

                @else
                    <div class="col-sm-6">
                      <div class="form-group  {{$errors->get('exp') ? 'has-error' : '' }}">
                          <label for="firstname">{{ trans('admin.exp') }}</label>
                          <input class="form-control"  name="exp"  type="text">
                          @if($errors->get('exp') )
                              <span class="help-block">
      {{ $errors->first('exp') }} </span>
                          @endif
                      </div>
                    </div>
                    <div class="col-sm-6">


                    </div>
                @endif
            </div>
            <!-- /.row -->

            <!-- /.row -->

            <div class="row">

                <div class="col-sm-12 text-center">
                    <button type="submit" class="btn btn-primary"><i
                            class="fa fa-plus"></i>{{ trans('admin.add')}} </button>

                </div>
            </div>
        {!! Form::close() !!}
        <!-- /.row -->


            <hr>
            <div class="row">
                <div class="col-sm-6" @if(app('l') == 'ar') style="float: right;" @endif>
                    <div class="form-group">
                        <label for="company">@awt('Experiences and Skills','en')</label>
                        <ul>
                        @foreach ($exp as $exp)
                          <li>{{$exp->exp}}  <a href="{{url('/bloger/account/exp/'.$exp->id)}}"><i
                                  class="fa fa-trash"></i>{{trans('admin.delete')}} </a> </li>

                        @endforeach

                        </ul>

                    </div>
                </div>

        </div>
    </div>

    </div>
    <!-- /.container -->
    </div>


@stop
