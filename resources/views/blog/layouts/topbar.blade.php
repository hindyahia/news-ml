<!-- *** TOPBAR ***
_________________________________________________________ -->
<div id="top">
    <div class="container">
        <div class="col-md-6 offer" data-animate="fadeInDown">
            {{--<a href="#" class="btn btn-success btn-sm" data-animate-hover="shake">Offer of the day</a> <a href="#">Get--}}
            {{--flat 35% off on orders over $50!</a>--}}
        </div>
        <div class="col-md-6" data-animate="fadeInDown">
            <ul class="menu">
                @if(Auth::check())
                    <li><a href="{{url('/bloger/logout')}}" >{{empty(Auth::user()->First_Name.Auth::user()->Last_Name) ? Auth::user()->username : Auth::user()->First_Name .' '.Auth::user()->Last_Name }}</a>
                    </li>
                    <li>
                            <a href="{{ url('bloger/account') }}">{{ trans('admin.My_account') }}</a>

                    </li>
                @else
                <li><a href="#" data-toggle="modal" data-target="#login-modal">{{trans('admin.login')}}</a>
                    </li>
                    <li><a href="{{url('/bloger/register')}}">{{trans('admin.register')}}</a>
                    </li>
                @endif
                <li><a href="{{url('/bloger/contact')}}">{{trans('admin.contact')}}</a>
                </li>
             
            </ul>
        </div>
    </div>
    <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
        <div class="modal-dialog modal-sm">

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="Login">{{trans('admin.Customer_login')}}</h4>
                </div>
                <div class="modal-body">
                    {!! Form::open(['route'=>'shop.login','method'=>'post']) !!}
                    <div class="form-group">
                        <input type="email" class="form-control" name="email"
                               pattern="[a-zA-Z0-9.!#$%&amp;’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)+"
                               title="default@example.com"
                               required=""
                               id="email-modal" placeholder="email">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" required="" id="password-modal"
                               placeholder="password">
                    </div>

                    <p class="text-center">
                        <button class="btn btn-primary"><i class="fa fa-sign-in"></i> {{trans('admin.Log_in')}}</button>
                    </p>

                    </form>

                    <p class="text-center text-muted">{{trans('admin.Not_registered_yet')}}</p>
                    <p class="text-center text-muted"><a href="{{url('bloger/register')}}"><strong>{{trans('admin.register_now')}}</strong></a>! {{trans('admin.It_is_easy')}}</p>

                </div>
            </div>
        </div>
    </div>

</div>

<!-- *** TOP BAR END *** -->
