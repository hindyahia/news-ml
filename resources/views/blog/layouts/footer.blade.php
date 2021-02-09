
<!-- *** FOOTER ***
_________________________________________________________ -->
<div id="footer" data-animate="fadeInUp">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <h4>{{trans('admin.Pages')}}</h4>

                <ul>
                    <li><a href="{{url('/')}}">{{trans('admin.home_page')}}</a>
                    </li>
                    <li><a href="{{url('E-commerce')}}">{{trans('admin.store')}}</a>
                    </li>
                    <li><a href="{{url('bloger')}}">{{trans('admin.bloger')}}</a>
                    </li>
                    <li><a href="{{url('bloger/contact')}}">{{trans('admin.Contact_us')}}</a>
                    </li>
                </ul>
                @if(!Auth::check())
                <hr>

                <h4>{{trans('admin.User_section')}}</h4>

                <ul>
                    <li><a href="#" data-toggle="modal" data-target="#login-modal">{{trans('admin.login')}}</a>
                    </li>
                    <li><a href="{{url('/bloger/register')}}">{{trans('admin.register')}}</a>
                    </li>
                </ul>
@endif
                <hr class="hidden-md hidden-lg hidden-sm">

            </div>
            <!-- /.col-md-3 -->

            <div class="col-md-3 col-sm-6">

                <h4>{{trans('admin.Top_categories')}}</h4>


                <ul>
{{--                    @foreach(get_tag() as $tag)--}}
{{--                        @if(app('l')=='en')--}}
{{--                        <li>--}}
{{--                    <a  href="{{url('bloger/category/'.$tag->name_en)}}">{{$tag->name_en}}</a>--}}
{{--                        </li>--}}
{{--                        @else--}}
{{--                        <li>--}}
{{--                        <a  href="{{url('bloger/category/'.$tag->name_en)}}">{{$tag->name_ar}}</a>--}}
{{--                        </li>--}}
{{--                        @endif--}}
{{--                        @endforeach--}}
                </ul>



                <hr class="hidden-md hidden-lg">

            </div>
            <!-- /.col-md-3 -->

            <div class="col-md-3 col-sm-6">

                <h4>{{trans('admin.information_about_us')}}</h4>
{{--@if(app('l')=='en')--}}
{{--{!! setting('site_desc_en') !!}--}}

{{--@else--}}
{{--{!! setting('site_desc_ar') !!}--}}

{{--@endif--}}
<br>
                <a href="{{url('bloger/contact')}}">{{trans('admin.Go_to_contact_page')}}</a>

                <hr class="hidden-md hidden-lg">

            </div>
            <!-- /.col-md-3 -->



            <div class="col-md-3 col-sm-6">

                <h4>@lang('cp.Get the news')</h4>

                <p class="text-muted">@LANG('cp.You will not take your time in minutes and in return will send all new emails to you
').</p>

{{--{!!Form::open(['url'=>url('/E-commerce/New_news'),'method'=>'post'])!!}--}}
                <div class="input-group">

                        <input type="email" class="form-control" name="email_news" required>

                        <span class="input-group-btn">

			    <button class="btn btn-default" type="button">@awt('Subscribe','en')!</button>

			</span>

                    </div>
                    <!-- /input-group -->
{{--{!!Form::close()!!}--}}
                <hr>

                <h4>{{trans('admin.Stay_in_touch')}}</h4>

                <p class="social">
{{--                    @if(setting('facebook'))--}}

{{--                        <a href="{{setting('facebook')}}" class="facebook external" data-animate-hover="shake"><i class="fa fa-facebook"></i></a>--}}
{{--                    @endif--}}
{{--                        @if(setting('twitter'))--}}

{{--                        <a href="{{setting('twitter')}}" class="twitter external" data-animate-hover="shake"><i class="fa fa-twitter"></i></a>--}}
{{--                    @endif--}}
{{--                        @if(setting('instagram'))--}}

{{--                        <a href="{{setting('instagram')}}" class="instagram external" data-animate-hover="shake"><i class="fa fa-instagram"></i></a>--}}
{{--                    @endif--}}

                </p>


            </div>
            <!-- /.col-md-3 -->

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->
</div>
<!-- /#footer -->

<!-- *** FOOTER END *** -->




<!-- *** COPYRIGHT ***
_________________________________________________________ -->
<div id="copyright">
    <div class="container">
        <div class="col-md-6">
{{--            <p class="pull-left">{{setting('copyright')}}.</p>--}}

        </div>
        <div class="col-md-6">
                <!-- Not removing these links is part of the license conditions of the template. Thanks for understanding :) If you want to use the template without the attribution links, you can do so after supporting further themes development at https://bootstrapious.com/donate  -->
            </p>
        </div>
    </div>
</div>
<!-- *** COPYRIGHT END *** -->



</div>
<!-- /#all -->




<!-- *** SCRIPTS TO INCLUDE ***

____________________________________________ -->

<script src="{{url('shop/js/jquery-1.11.0.min.js')}}"></script>

<script src="{{url('shop/js/bootstrap.min.js')}}"></script>
<script src="{{url('shop/js/jquery.cookie.js')}}"></script>
<script src="{{url('shop/js/waypoints.min.js')}}"></script>
<script src="{{url('shop/js/modernizr.js')}}"></script>
<script src="{{url('shop/js/bootstrap-hover-dropdown.js')}}"></script>
<script src="{{url('shop/js/owl.carousel.min.js')}}"></script>
<script src="{{url('shop/js/front.js')}}"></script>
<script src="//cdn.ckeditor.com/4.10.0/full/ckeditor.js"></script>
@toastr_js
@toastr_render
<script>
    ClassicEditor
        .create( document.querySelector( '#ckeditor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@stack('js')
{!! NoCaptcha::renderJs() !!}
</body>

</html>
