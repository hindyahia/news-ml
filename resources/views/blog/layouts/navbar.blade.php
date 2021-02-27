<!-- *** NAVBAR ***
_________________________________________________________ -->

<div class="navbar navbar-default yamm" role="navigation" id="navbar">
    <div class="container">
        <div class="navbar-header">

            <a class="navbar-brand home" href="{{url('/')}}" data-animate-hover="bounce">
                <img src="{{asset('admin_assets/logo-black.jpg')}}" style="height: 60px;" alt="News logo" class="hidden-xs">
                <img src="{{asset('admin_assets/logo-black.jpg')}}" style="height: 60px;" alt="News logo" class="visible-xs"><span
                    class="sr-only">News homepage</span>
            </a>
<!--            <div class="navbar-buttons">
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
            </div>-->
        </div>
        <!--/.navbar-header -->

        <div class="navbar-collapse collapse" id="navigation">

            <ul class="nav navbar-nav navbar-left">
                <li class="{{request()->segment(3) == 'post'  ? '' : 'active' }} "><a
                        href="{{url('/')}}">{{trans('cp.home')}}</a>
                </li>
                <li class="dropdown yamm-fw  ">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                       data-delay="200">{{trans('admin.categories')}}
                        <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <div class="yamm-content">
                                <div class="row">
                                                                            @foreach(categories() as $tag)
                                                                        <div class="col-sm-3">


                                                                            <ul>

                                                                                    <li>  <h5> <a href="{{url('category/'.$tag->id)}}">{{$tag->title}}</a>
                                                                                    </h5>

                                                                            </ul>
                                                                        </div>
                                                                        @endforeach
                                </div>
                            </div>
                            <!-- /.yamm-content -->
                        </li>
                    </ul>
                </li>

            </ul>

        </div>
        <!--/.nav-collapse -->
        @if(!request()->routeIs('website.home'))
        <div class="navbar-buttons">


            <div class="navbar-collapse collapse right" id="search-not-mobile">
                <button type="button" class="btn navbar-btn btn-primary" data-toggle="collapse" data-target="#search">
                    <span class="sr-only">Toggle search</span>
                    <i class="fa fa-search"></i>
                </button>
            </div>

        </div>
        <div class="collapse clearfix" id="search">
            <form action="{{url('/bloger/search')}}" method="get" class="navbar-form">
                 <div class="input-group">
                    <input type="text" class="form-control" name="search" required
                           placeholder="{{ trans('cp.search') }}">
                    <span class="input-group-btn">

            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>

            </span>
                </div>
            </form>


        </div>
        <!--/.nav-collapse -->
        @endif

    </div>
    <!-- /.container -->
</div>
<!-- /#navbar -->

<!-- *** NAVBAR END *** -->
<div id="all">

    <div id="content">
        <div class="container">
