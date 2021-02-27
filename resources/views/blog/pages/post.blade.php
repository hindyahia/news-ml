@extends('blog.index')
@section('content')

    <!-- *** LEFT COLUMN ***  -->

    <div class="col-sm-9" id="blog-listing">

        <div class="box">
            <h1>

                {{$tagname->title}}

            </h1>
            {{--<p>Pellesasdntesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.--}}
            {{--Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu--}}
            {{--libero sit amet quam egestas semper.</p>--}}

        </div>
        <div id="load-data">

            @foreach ($posts as $post)
                <div class="post">
                    <h2>
                        <a href="/post/{{ $post->id }}">{{ $post->title}}</a>
                    </h2>
                    <p class="author-category">   @lang('cp.By') <a
                            href="/post/{{ $post->id }}">{{$post->user->name}}</a>
                        @lang('cp.in'){{$post->created_at->toDayDateTimeString()}}
                        @if($post->category)
                            <a href="{{url('/category/'.$post->category_id)}}">{{$post->category->title}}
                            </a>
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
            <div class="pages" id="remove-row">
                {{$posts->links()}}
            </div>
            <br/>
        </div>


    </div>


    <!-- /.col-md-9 -->

    <!-- *** LEFT COLUMN END *** -->


    <div class="col-md-3">
        <!-- *** BLOG MENU *** -->
        <div class="panel panel-default sidebar-menu">

            <div class="panel-heading">
                <h3 class="panel-title">{{trans('admin.categories')}}</h3>
            </div>

            <div class="panel-body">

                <ul class="nav nav-pills nav-stacked">
                    @foreach(categories() as $tag)
                        <li @if(request()->segment(3) == $tag->title) class="active" @endif>
                            <a href="{{url('category/'.$tag->id)}}">
                                {{$tag->title}}

                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

        </div>
        <!-- /.col-md-3 -->

        <!-- *** BLOG MENU END *** -->

        <div class="banner">
            <a href="#">
                {{--                <img src="{{url('shop')}}/img/banner.jpg" alt="sales 2014" class="img-responsive">--}}
            </a>
        </div>
    </div>


    </div>
    <!-- /.container -->
    </div>
    <!-- /#content -->
    @push('js')
    @endpush
@stop
