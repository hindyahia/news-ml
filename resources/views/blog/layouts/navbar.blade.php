<!-- *** NAVBAR ***
_________________________________________________________ -->

<div class="navbar navbar-default yamm" role="navigation" id="navbar">
    <div class="container">
        <div class="navbar-header">

            <a class="navbar-brand home" href="{{url('bloger')}}" data-animate-hover="bounce">
                <img src="{{url('shop/')}}/img/logo.png" alt="Obaju logo" class="hidden-xs">
                <img src="{{url('shop/')}}/img/logo-small.png" alt="Obaju logo" class="visible-xs"><span
                    class="sr-only">Obaju - go to homepage</span>
            </a>
            <div class="navbar-buttons">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                    <span class="sr-only">Toggle navigation</span>
                    <i class="fa fa-align-justify"></i>
                </button>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search">
                    <span class="sr-only">Toggle search</span>
                    <i class="fa fa-search"></i>
                </button>
                <a class="btn btn-default navbar-toggle" href="basket.html">
                    <i class="fa fa-shopping-cart"></i> <span class="hidden-xs">3 items in cart</span>
                </a>
            </div>
        </div>
        <!--/.navbar-header -->

        <div class="navbar-collapse collapse" id="navigation">

            <ul class="nav navbar-nav navbar-left">
            <li class="{{request()->segment(3) == 'post'  ? '' : 'active' }} "><a href="{{url('bloger')}}">{{trans('admin.home')}}</a>
                </li>
                <li class="dropdown yamm-fw  ">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">{{trans('admin.categories')}}
                        <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                            <li >
                                <div class="yamm-content">
                                    <div class="row">
                                        @foreach(get_tag_all() as $tag)
                                    <div class="col-sm-3">


                                        <ul>
                                                @if(app('l') == 'en')
                                                <li>  <h5> <a href="{{url('bloger/category/'.$tag->name_en)}}">{{$tag->name_en}}</a>
                                                </h5>
                                                @else
          <h5><a href="{{url('bloger/category/'.$tag->name_en)}}">{{$tag->name_ar}}</a></h5>
                                                @endif
                                        </ul>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <!-- /.yamm-content -->
                        </li>
                    </ul>
                </li>
                <li><a href="{{url('E-commerce')}}" >{{trans('admin.store')}}</a></li>
                
                @if(Auth::check()and Auth::user()->hasRole('Editor'))
                <li class="{{request()->segment(3) == 'post' ? 'active' : ''}}"><a href="{{url('bloger/add/post')}}" >{{awTtrans('add post','en')}}</a></li>
                @endif
            @if(app('l') == 'ar')

                         <li><a href="{{aurl('lang/en')}}" >{{trans('admin.en')}} </a></li>
                         @else
                         <li><a href="{{aurl('lang/ar')}}" >{{trans('admin.ar')}} </a></li>

                         @endif

            </ul>

        </div>
        <!--/.nav-collapse -->

        <div class="navbar-buttons">

            <div class="navbar-collapse collapse right" id="basket-overview">
                <a href="{{url('/E-commerce/cart')}}" class="btn btn-primary navbar-btn"><i class="fa fa-shopping-cart"></i><span
                        class="hidden-sm">{{Cart::count()}} {{ trans('admin.items_in_cart') }}</span></a>
            </div>
            <!--/.nav-collapse -->

            <div class="navbar-collapse collapse right" id="search-not-mobile">
                <button type="button" class="btn navbar-btn btn-primary" data-toggle="collapse" data-target="#search">
                    <span class="sr-only">Toggle search</span>
                    <i class="fa fa-search"></i>
                </button>
            </div>

        </div>

        <div class="collapse clearfix" id="search">
               {!! Form::open(['url'=>url('/bloger/search'),'method'=>'post','role'=>'search' ,'class'=>'navbar-form']) !!}
                <div class="input-group">
                    <input type="text" class="form-control" name="search" required placeholder="{{ trans('admin.search') }}">
                    <span class="input-group-btn">
                }

            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>

            </span>
                </div>
{!! Form::close() !!}
  {{--           <form class="navbar-form" role="search" method="post">
                <div class="input-group">
                    <input type="text" class="form-control"  placeholder="Search">
                    <span class="input-group-btn">

			<button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>

		    </span>
                </div>
            </form> --}}

        </div>
        <!--/.nav-collapse -->

    </div>
    <!-- /.container -->
</div>
<!-- /#navbar -->

<!-- *** NAVBAR END *** -->
<div id="all">

        <div id="content">
            <div class="container">
