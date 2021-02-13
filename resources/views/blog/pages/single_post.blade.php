@extends('blog.index')
@push('css')
    {{--        <meta name="keywords" content="{{$post->keyword}}">--}}

@endpush
@section('content')


    <div class="col-sm-9" id="blog-post">


        <div class="box text-center">

            <h1>{{ $post->title }}</h1>
            <p class="author-date">@lang('cp.By') <a href="#">{{@$post->user->name}}</a> | {{$post->created_at->toDayDateTimeString()}}</p>

                        <p class="lead">{!! $post->description !!}</p>

            <div id="post-content ">
                @if($post->image_url != null)

                    <img src="{{ $post->image_url }}" class="img-responsive" alt="" style="width: 80% ; height: 300px; ">


                @endif
                <p class="lead">{!! $post->content !!}</p>


            </div>
            <!-- /#post-content -->


        </div>
        <!-- /.box -->
    </div>
    <!-- /#blog-post -->

    <div class="col-md-3">
        <!-- *** BLOG MENU *** -->
        <div class="panel panel-default sidebar-menu">

            <div class="panel-heading">
                <h3 class="panel-title">{{trans('cp.categories')}}</h3>
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


        <!-- *** BLOG MENU END *** -->

        <div class="banner">
            <a href="#">
                {{-- <img src="{{url('shop')}}/img/banner.jpg" alt="sales 2014" class="img-responsive"> --}}
            </a>
        </div>
    </div>


    </div>
    <!-- /.container -->

        </div>
        <!-- /#content -->
        @push('js')



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
                                url: " ",
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
