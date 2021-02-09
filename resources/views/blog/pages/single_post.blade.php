@extends('blog.index')
@push('css')
        <meta name="keywords" content="{{$post->keyword}}">

@endpush
@section('content')

    {{--<div id="content">--}}
        {{--<div class="container">--}}

            {{--<div class="col-sm-12">--}}

                {{--<ul class="breadcrumb">--}}

                    {{--<li><a href="index.html">Home</a>--}}
                    {{--</li>--}}
                    {{--<li><a href="blog.html">Blog</a>--}}
                    {{--</li>--}}
                    {{--<li>Blog post</li>--}}
                {{--</ul>--}}
            {{--</div>--}}

            <div class="col-sm-9" id="blog-post">


                <div class="box">

           <h1>@if(app('l') == 'ar'){{ $post->title_ar}}@else{{ $post->title_en }}@endif   @if(Auth::check() and Auth::user()->hasRole('Editor'))<a href="{{url('/bloger/post/'.$post->id .'/edit')}}" ><i class="fa fa-edit"></i></a> @endif</h1>  
                    <p class="author-date">@awt('By','ar') <a href="#">@if($post->user->First_Name){{$post->user->First_Name .' '.$post->user->Last_Name}} @else  {{$post->user->username}} @endif</a> | {{$post->created_at->toDayDateTimeString()}}</p>
                    <p class="lead">@if(app('l') == 'ar'){!! $post->content_ar !!}@else{!! $post->content_en !!}@endif</p>

                    <div id="post-content">
                        <p>
                     
                            @if($post->image_post != null)
                              <img src="{{ Storage::url($post->image_post) }}" class="img-responsive" alt="">
                            @endif
                        </p>
                    </div>
                    <!-- /#post-content -->


                    <div id="comments" data-animate="fadeInUp">
                        <div class="social">
                            <h4>{{ trans('admin.Show_it_to_your_friends') }}</h4>
                            <p>
                                <a href="javascript: void(0)"
                                   onclick="popup('http://www.facebook.com/sharer.php?u={{Request::url()}}')"
                                   class="external facebook" data-animate-hover="pulse"><i
                                        class="fa fa-facebook"></i></a>
                                <a href="javascript: void(0)"
                                   onclick="popup('https://plus.google.com/share?url={{Request::url()}}')"
                                   class="external gplus" data-animate-hover="pulse"><i
                                        class="fa fa-google-plus"></i></a>
                                <a href="javascript: void(0)"
                                   onclick="popup('https://twitter.com/home?status={{Request::url()}}')"
                                   class="external twitter" data-animate-hover="pulse"><i
                                        class="fa fa-twitter"></i></a>
                                <a href="javascript: void(0)"
                                   onclick="popup('https://pinterest.com/pin/create/button/?url={{Request::url()}}&media=https%3A//bit.ly/fcc-relaxing-cat&description=@if(app('l') == 'ar'){{ $post->title_ar}}@else{{ $post->title_en }}@endif')"
                                   class="email" data-animate-hover="pulse"><i class="fa fa-pinterest"></i></a>
                            </p>
                        </div>
                        <h4>{{count($post->comments)}} {{ awTtrans('comments','ar') }}</h4>

                        @foreach($post->comments as $comment)
                            <div class="row comment">
                                <div class="col-sm-3 col-md-2 text-center-xs">
                                    <p>
                                        <img src="{{ Storage::url( $comment->post->user->user_image ) }}" class="img-responsive img-circle" alt="">
                                    </p>
                                </div>
                                <div class="col-sm-9 col-md-10">
                                    <h5>{{$comment->author}}</h5>
                                    <p class="posted"><i class="fa fa-clock-o"></i> {{$comment->created_at->toDayDateTimeString()}} </p>
                                    <p>{{$comment->content}}</p>
                                    </p>
                                </div>
                            </div>
                    @endforeach
                    <!-- /.comment -->
                        <div id="old_comment"></div>

                    </div>
                    <!-- /#comments -->

                    <div id="comment-form" data-animate="fadeInUp">

                        <h4>@awt('Leave comment','en')</h4>
                        @if (Auth::check())
                            <form method="POST" id="formComent">
                                {{ csrf_field() }}
                                <input type="hidden" name="post_id" id="post_id" value="{{ $post->id }}">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="comment">@awt('Comment','ar') <span class="required">*</span>
                                            </label>
                                            <textarea id="contentComment" class="form-control" name="content"  rows="4"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 text-right">
                                        <button class="btn btn-primary" id="btnpostComent" type="submit" ><i class="fa fa-comment-o"></i> @awt('Post comment','ar')</button>
                                    </div>
                                </div>
                            </form>
                        @else
                            <center>
                                <div class="post-footer ">
                                    <div class="middle-area" style="display: block;background-color: #F2F2F2;">
                                        <span><a href="#" data-toggle="modal" data-target="#login-modal">{{trans('admin.login')}}</a></span> |
                                        <span><a href="{{url('/E-commerce/register')}}">{{trans('admin.register')}}</a></span>
                                    </div>
                                </div>
                            </center>
                        @endif

                    </div>
                    <!-- /#comment-form -->

                </div>
                <!-- /.box -->
            </div>
            <!-- /#blog-post -->

            <div class="col-md-3">
                <!-- *** BLOG MENU *** -->
                <div class="panel panel-default sidebar-menu">

                    <div class="panel-heading">
                        <h3 class="panel-title">{{trans('admin.categories')}}</h3>
                    </div>

                    <div class="panel-body">

                        <ul class="nav nav-pills nav-stacked">
                            @foreach(get_tag() as $tag)
                                <li>
                                    <a href="{{url('bloger/category/'.$tag->name_en)}}">
                                        @if(app('l') == 'ar')
                                            {{$tag->name_ar}}
                                        @else
                                            {{$tag->name_en}}
                                        @endif
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                </div>
                <div class="panel panel-default sidebar-menu">

                    <div class="panel-heading">
                        <h3 class="panel-title">@awt('rating','en')</h3>
                    </div>

                    <div class="panel-body">

                        <ul class="nav nav-pills nav-stacked">
                            <div id="ratingsuccess"></div>
                                {!!Form::open(['id'=>'formrating','method'=>'post','name'=>'formid'])!!}
                                <div id="rating">
                                <li id="d">
                                        <input type="hidden" name="id" value="{{$post->id}}">
            <input type="hidden" id="input-1" name="input-1" class="rating rating-loading" data-min="0" data-max="5" data-step="0.1" value="{{ $post->averageRating }}" data-size="xs" >
                                    <button type="submit" class="btn btn-sm btn-info" >rating</button>

                                                </li>

                                            </div>
                                            {!!Form::close()!!}
                        </ul>
                    </div>

                </div>
                @if(setting()->facebook)
                <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">@awt('Follow us on Facebook','en')</h3>
                        </div>
    
                        <div class="panel-body">
                                <div id="fb-root"></div>
                                <script>(function(d, s, id) {
                                  var js, fjs = d.getElementsByTagName(s)[0];
                                  if (d.getElementById(id)) return;
                                  js = d.createElement(s); js.id = id;
                                  js.src = 'https://connect.facebook.net/ar_AR/sdk.js#xfbml=1&version=v3.1&appId=1134975683208848&autoLogAppEvents=1';
                                  fjs.parentNode.insertBefore(js, fjs);
                                }(document, 'script', 'facebook-jssdk'));</script>
                             <div class="fb-page" data-href="{{setting()->facebook}}" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="{{setting()->facebook}}" class="fb-xfbml-parse-ignore"><a href="{{setting()->facebook}}"> </a></blockquote></div>
                        </div>
    
                    </div>
                    @endif
                <!-- /.col-md-3 -->

                <!-- *** BLOG MENU END *** -->

                <div class="banner">
                    <a href="#">
                        {{-- <img src="{{url('shop')}}/img/banner.jpg" alt="sales 2014" class="img-responsive"> --}}
                    </a>
                </div>
            </div>


        </div>
        <!-- /.container -->
    @if (!Auth::check())
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
                            <input type="text" class="form-control" name="email" id="email-modal" placeholder="email">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" id="password-modal"
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
        @endif
    </div>
    <!-- /#content -->
@push('js')
<script type="text/javascript">
    $(document).ready(function(){
        $('#formrating').on('submit', function (e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var formdata = $(this).serialize();
            $.ajax({
                type: 'POST',
                url: '{{ route('bloger.rating') }}',
                data: formdata,
                dataType: 'json',
                success: function (rating) {

                    var success = '<div class="alert alert-success"><span><i class="fa fa-check-circle" aria-hidden="true"></i> {{trans("admin.the_rating_has_a_success")}}</span></div>';
                    if (rating){
                        $('#ratingsuccess').html(success);
                    }
                },
                error: function () {
                    var error = '<div class="alert alert-danger"><span><i class="fa fa-check-circle" aria-hidden="true"></i> {{trans("admin.the_rating_has_not_a_success")}}</span></div>';
                    $('#ratingsuccess').html(error);
                }
            });
        });
    });

    $("#input-rating").rating();
    $(document).ready(function(){
        $('#d').click(function () {
            $('#d').change(function() {
        this.form.submit();
    });
    $('form[name=formid]').submit(function() {
                    alert('Submit blocked!');
                    return false;
                });
                        });
        $('#d').change(function() {
        this.form.submit();
    });
    $('form[name=formid]').submit(function() {
                    alert('Submit blocked!');
                    return false;
                });
        });

</script>

   <link rel="stylesheet" href="{{url('design')}}/bootstrap-star-rating/4.0.3/css/star-rating.min.css" />
   <script src="{{url('design')}}/bootstrap-star-rating/4.0.3/js/star-rating.min.js"></script>


@endpush
        @if (Auth::check())
            @push('js')

                <script type="text/javascript">
                    $(document).ready(function(){
                        $("#hidshowformComent").hide();
                        $("#hideshowcomments").click(function(){
                            $("#hidshowformComent").slideToggle("slow");
                        });
                    });
                    $(document).ready(function () {

                        $('#btnpostComent').click(function () {
                            var post_id = $('#post_id').val();
                            var contentComment = $('#contentComment').val();
                        });
                        $('#formComent').on('submit', function (e) {
                            e.preventDefault();
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });

                            var ts = new Date();

                            // $("#old_comment").html("posting comment ...");
                            var formdata = $(this).serialize();

                            $.ajax({
                                type: 'POST',
                                url: "{{ route('bloger.comment')}}",
                                data: formdata,
                                dataType: 'json',
                                success: function (data) {
                                    var div = '<div class="row comment last"><div class="col-sm-3 col-md-2 text-center-xs"><p><img src="{{ empty(Auth::user()->user_image) ? '' : Storage::url(Auth::user()->user_image) }}" class="img-responsive img-circle" alt=""></p></div><div class="col-sm-9 col-md-10"><h5>' +data.author+ '</h5><p class="posted"><i class="fa fa-clock-o"></i>'  + ts.toUTCString() +  '</p><p>' + data.content + '</p></div></div>';
                                    $("#old_comment").append(div);
                                    $('#formComent')[0].reset();
                                },
                                error: function () {
                                    alert("Error reaching the server. Check your connection");
                                }

                            });
                        });
                    });
                </script>
            @endpush
        @endif

@stop
