@extends('blog.index')
@section('content')

    <!-- *** LEFT COLUMN ***  -->

    <div class="col-sm-9" id="blog-listing">

        <div class="box">
            <h1>
                @if(app('l') == 'ar')
                    {{$tagname->name_ar}}
                @else
                    {{$tagname->name_en}}
                @endif
            </h1>
            {{--<p>Pellesasdntesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.--}}
            {{--Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu--}}
            {{--libero sit amet quam egestas semper.</p>--}}

        </div>
        <div id="load-data">
            <?php
            $post = null;
            ?>
            @foreach ($posts as $post)
                <div class="post">
                    <h2>
                        <a href="/bloger/post/{{ $post->id }}">@if(app('l') == 'ar'){{ $post->title_ar}}@else{{ $post->title_en }}@endif   @if(Auth::check() and Auth::user()->hasRole('Editor'))<a href="{{url('/bloger/post/'.$post->id .'/edit')}}" ><i class="fa fa-edit"></i></a> @endif</a>
                    </h2>
                    <p class="author-category">   @awt('By','en') <a href="/bloger/post/{{ $post->id }}">@if($post->user->First_Name !=null){{$post->user->First_Name .' '.$post->user->Last_Name}}@else{{$post->user->username}} @endif</a>
                        @awt('in','en')
                        <a href="{{url('bloger/category/'.$post->tag->name_en)}}">@if(app('l') == 'ar'){{$post->tag->name_ar}}@else
                                {{$post->tag->name_en}}
                            @endif
                        </a>
                    </p>
                    <hr/>
                    <p class="date-comments">
                        <a href="/bloger/post/{{ $post->id }}" }><i
                                class="fa fa-calendar-o"></i> {{$post->created_at->toDayDateTimeString()}}</a>
                        <a href="/bloger/post/{{ $post->id }}" }><i
                                class="fa fa-comment-o"></i> {{count($post->comments)}} @awt('Comments','en')</a>
                    </p>
                    <div class="image">
                        <a href="/bloger/post/{{ $post->id }}" }>
                            <img src="{{Storage::url($post->image_post)}}" class="img-responsive"
                                 alt="Example blog post alt"/>
                        </a>
                    </div>
                    <p class="intro">@if(app('l') == 'ar'){!! str_limit($post->content_ar, 300,'...') !!}@else{!! str_limit($post->content_en, 300,'...') !!}@endif</p>
                    <p class="read-more">
                        <a href="/bloger/post/{{ $post->id }}" }
                           class="btn btn-primary">{{ trans('admin.continue_reading') }}</a>
                    </p>
                </div>

            @endforeach
            <div class="pages" id="remove-row">
                @if($post != null)
                    <button id="btn-more" data-id="{{ $post->id }}" data-tagid="{{ $post->tag_id }}"
                            class="btn btn-primary btn-lg"> {{ trans('admin.load_more') }}
                    </button>
                @endif
            </div>
            <br/>
        </div>
        {{--<ul class="pager">--}}
        {{--<li class="previous"><a href="#">&larr; Older</a>--}}
        {{--</li>--}}
        {{--<li class="next disabled"><a href="#">Newer &rarr;</a>--}}
        {{--</li>--}}
        {{--</ul>--}}


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
                    @foreach(get_tag() as $tag)
                        <li @if(request()->segment(3) == $tag->name_en) class="active" @endif>
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
        <!-- /.col-md-3 -->

        <!-- *** BLOG MENU END *** -->

        <div class="banner">
            <a href="#">
                <img src="{{url('shop')}}/img/banner.jpg" alt="sales 2014" class="img-responsive">
            </a>
        </div>
    </div>


    </div>
    <!-- /.container -->
    </div>
    <!-- /#content -->
    @push('js')
        <script>
            $(document).ready(function () {
                $(document).on('click', '#btn-more', function (e) {
                    e.preventDefault();
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    var id = $(this).data('id');
                    var tagid = $(this).data('tagid');
                    console.log(tagid);
                    $("#btn-more").html("Loading....");
                    $.ajax({
                        url: '{{ route('bloger.loaddataposts') }}',
                        method: "POST",
                        data: {id: id, tag_id: tagid, _token: "{{csrf_token()}}"},
                        dataType: "text",
                        success: function (data) {
                            if (data != '') {
                                $('#remove-row').remove();
                                $('#load-data').append(data);
                            }
                            else {
                                $('#btn-more').html("No Data");
                            }
                        }
                    });
                });
            });
        </script>
    @endpush
@stop
