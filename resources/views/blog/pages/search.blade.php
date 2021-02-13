@extends('blog.index')
@section('content')
      <div class="col-sm-9" id="blog-listing">


          <div id="load-data">
              <?php
              $post = null;
              ?>
              @foreach ($posts as $post)
                  <div class="post">
                      <h2>
                          <a href="/post/{{ $post->id }}">{{ $post->title}}</a>
                      </h2>
                      <p class="author-category">@lang('cp.by') <a href="/post/{{ $post->id }}">{{$post->user->name}}</a>
                          @awt('in','en')
                          <a href="{{url('/category/'.$post->category->id)}}">{{$post->category->title}}

                          </a>
                      </p>
                      <hr/>
                      <p class="date-comments">
                          <a href="/post/{{ $post->id }}" }><i
                                  class="fa fa-calendar-o"></i> {{$post->created_at->toDayDateTimeString()}}</a>

                      </p>
                      <div class="image">
                          <a href="/post/{{ $post->id }}" >
                              <img src="{{$post->image_url}}" class="img-responsive"
                                   alt="Example blog post alt"/>
                          </a>
                      </div>
                      <p class="intro">{{$post->content}}</p>
                      <p class="read-more">
                          <a href="/post/{{ $post->id }}"
                             class="btn btn-primary">{{ trans('admin.continue_reading') }}</a>
                      </p>
                  </div>

              @endforeach
              <div class="pages" id="remove-row">
             {{$posts->links()}}
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
                      @foreach(categories() as $tag)
                          <li @if(request()->segment(3) == $tag->title) class="active" @endif>
                              <a href="{{url('/category/'.$tag->id)}}">

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
{{--                  <img src="{{url('shop')}}/img/banner.jpg" alt="sales 2014" class="img-responsive">--}}
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
