@extends('blog.index')
@section('content')



    <!-- *** LEFT COLUMN ***  -->

    <div class="col-sm-9" id="blog-listing">


        <div id="load-data">


            @isset($news)
                <div class="row">

                    @foreach ($news as $items)

                        {{--       <h3 class="pb-5" style="    border-bottom: 2px solid #4fbfa8;
               padding-bottom: 22px;">{{$key}}</h3>--}}
                        {{-- <hr>
                         <br>--}}

                        @foreach($items as $one)
                            <div class="col-md-6"  >

                                <div class="post" style="height: 200px">
                                    <h2>
                                        <a target="_blank" href="{{$one->link}}" title="{{$one->title}}">
                                            {{strlen(trim($one->title)) > 70  ? \Illuminate\Support\Str::substr($one->title,0,70) . "...": $one->title}}</a>
                                    </h2>

                                    <p class="read-more">
                                        <a target="_blank" href="{{$one->link}}"
                                           class="btn btn-primary">{{ trans('cp.read_more') }}</a>
                                    </p>
                                </div>
                            </div>
                        @endforeach

                @endforeach
                </div>

            @endisset
            @isset($posts)

                @foreach (@$posts as $post)
                    <div class="post">
                        <h2>
                            <a href="/post/{{ $post->id }}">{{ $post->title}}</a>
                        </h2>
                        <p class="author-category">   @lang('cp.By') <a
                                href="/post/{{ $post->id }}">{{$post->user->name}}</a>
                            @if($post->category)
                                -
                                ( <a href="{{url('/category/'.$post->category_id)}}">{{@$post->category->title}}
                                </a>)
                            @endif
                        </p>
                        <hr/>
                        <p class="date-comments">
                            <a href="/post/{{ $post->id }}"><i
                                    class="fa fa-calendar-o"></i> {{$post->created_at->toDayDateTimeString()}}</a>

                        </p>
                        <div class="image">
                            <a href="/post/{{ $post->id }}">
                                <img src="{{$post->image_url}}" class="img-responsive"
                                     alt="Example blog post alt"/>
                            </a>
                        </div>
                        <p class="intro">{!! $post->description !!}</p>
                        <p class="read-more">
                            <a href="/post/{{ $post->id }}" }
                               class="btn btn-primary">{{ trans('cp.read_more') }}</a>
                        </p>
                    </div>

                @endforeach
                {{@$posts->links()}}

            @endisset
            <br/>
        </div>


    </div>
    <!-- /.col-md-9 -->

    <!-- *** LEFT COLUMN END *** -->


    <div class="col-md-3">
        <!-- *** BLOG MENU *** -->
        <div class="panel panel-default sidebar-menu">

            <div class="panel-heading">
                <h3 class="panel-title">@lang('admin.categories')</h3>
            </div>

            <div class="panel-body">

                <ul class="nav nav-pills nav-stacked">
                    @foreach(categories() as $tag)
                        <li>
                            <a href="{{url('category/'.$tag->id)}}">

                                {{$tag->title}}

                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

        </div>
    {{--          @if(setting()->facebook)--}}
    {{--                <div class="panel panel-default sidebar-menu">--}}

    {{--                        <div class="panel-heading">--}}
    {{--                            <h3 class="panel-title">@awt('Follow us on Facebook','en')</h3>--}}
    {{--                        </div>--}}

    {{--                        <div class="panel-body">--}}
    {{--                                <div id="fb-root"></div>--}}
    {{--                                <script>(function(d, s, id) {--}}
    {{--                                  var js, fjs = d.getElementsByTagName(s)[0];--}}
    {{--                                  if (d.getElementById(id)) return;--}}
    {{--                                  js = d.createElement(s); js.id = id;--}}
    {{--                                  js.src = 'https://connect.facebook.net/ar_AR/sdk.js#xfbml=1&version=v3.1&appId=1134975683208848&autoLogAppEvents=1';--}}
    {{--                                  fjs.parentNode.insertBefore(js, fjs);--}}
    {{--                                }(document, 'script', 'facebook-jssdk'));</script>--}}
    {{--                             <div class="fb-page" data-href="{{setting()->facebook}}" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="{{setting()->facebook}}" class="fb-xfbml-parse-ignore"><a href="{{setting()->facebook}}"> </a></blockquote></div>--}}
    {{--                        </div>--}}

    {{--                    </div>--}}
    {{--                    @endif--}}
    <!-- /.col-md-3 -->

        <!-- *** BLOG MENU END *** -->

        <div class="banner">
            <!--<a href="#">-->
        <!--    <img src="{{url('shop')}}/img/banner.jpg" alt="sales 2014" class="img-responsive">-->
            <!--</a>-->
        </div>
    </div>


    </div>
    <!-- /.container -->
    </div>
    </div>

    <!-- /#content -->
    @push('js')
    @endpush
@stop
