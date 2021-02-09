@extends('blog.index')


@section('content')

@push('js')
<script src="{{url('design/admin_panel')}}/assets/apps/scripts/lang-hide-and-show-form.js"></script>
<script src="{{url('tag/jquery.tagsinput.js')}}" type="text/javascript"></script>
<link href="{{url('tag/jquery.tagsinput.css')}}" rel="stylesheet" type="text/css"/>
<script type="text/javascript">
    $('#tags').tagsInput({
        'placeholderColor' : '#fff',
        'defaultText':'Add A keyword',
        // 'defaultText': 'Add Keyword',
        'width':'100%',
    });
</script>
@endpush
<div class="col-sm-9" id="blog-listing">

        
        
        
        
        

        
    <div id="load-data">
                        <div class="post">

                                <div class="portlet-body form">
                                        <div class="col-md-12">
                                                {!! Form::open(['url'=> url('bloger/post/'.$post->id.'/update'),'method'=>'post','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}

                                            <div id="post_en">
                                                <div class="form-group">
                                                    {!! Form::label('title_en',trans('admin.title_en'),['class'=>'col-md-3 control-label']) !!}
                                                    <div class="col-md-9">
                                                        {!! Form::text('title_en',$post->title_en,['class'=>'form-control','placeholder'=>trans('admin.title_en')]) !!}
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="form-group">
                                                    {!! Form::label('content_en',trans('admin.content_en'),['class'=>'col-md-3 control-label']) !!}
                                                    <div class="col-md-9">
                                                        {!! Form::textarea('content_en',$post->content_en,['class'=>'form-control ckeditor','placeholder'=>trans('admin.content_en')]) !!}
                                                    </div>
                                                </div>
                    
                                            </div>
                    
                                            <div id="post_ar">
                                                <br>
                                                <div class="form-group">
                                                    {!! Form::label('title_ar',trans('admin.title_ar'),['class'=>'col-md-3 control-label']) !!}
                                                    <div class="col-md-9">
                                                        {!! Form::text('title_ar',$post->title_ar,['class'=>'form-control','placeholder'=>trans('admin.title_ar')]) !!}
                                                    </div>
                                                </div>
                                                <br>
                    
                                                <div class="form-group">
                                                    {!! Form::label('content_ar',trans('admin.content_ar'),['class'=>'col-md-3 control-label']) !!}
                                                    <div class="col-md-9">
                                                        {!! Form::textarea('content_ar',$post->content_ar,['class'=>'form-control ckeditor','placeholder'=>trans('admin.content_ar')]) !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                                                <div class="form-group">
                                                            <div class="col-md-offset-3 col-md-9">
                    
                                        <a href="javascript:;" id="hideshowpostform" class="btn btn-sm btn-primary">
                                                                    <i class="fa fa-language fa-lg "></i> {{trans('admin.Writing_in_another_language')}}
                                                                </a>
                                                                <br>
                                                                <br>
                                            </div>
                                            </div>
                    
                                            <br>
                                            <div class="form-group">
                                                {!! Form::label('keyword',trans('admin.keyword'),['class'=>'col-md-3 control-label']) !!}
                                                <div class="col-md-9">
                                                    {!! Form::text('keyword',$post->keyword,['class'=>'form-control ckeditor','id'=>'tags','placeholder'=>trans('admin.keyword')]) !!}
                                                </div>
                                            </div>
                                            <br>
                                
                                            <br>
                                            <div class="form-group">
                                                {!! Form::label('tag_id',trans('admin.tag_id'),['class'=>'col-md-3 control-label']) !!}
                                                <div class="col-md-9">
                                                        {!! Form::select('tag_id',tag_pluck(),$post->tag_id,['class'=>'form-control','required','placeholder'=>trans('admin.tag_id_enter')]) !!}
                                                    </div>
                                            </div>
                                            <br/>
                                            <div class="form-group">
                                                <br/>
                                                {!! Form::label('image_post',trans('admin.image_post'),['class'=>'col-md-3 control-label']) !!}
                                                <div class="col-md-9">
                                                    {!! Form::file('image_post', old('image_post'),['class'=>'form-control','placeholder'=>trans('admin.image_post')]) !!}
                                                    @if($post->image_post != null)
                                                    <br>
                                                    <img src="{{ Storage::url( $post->image_post ) }}" width="50px">
                                                @endif
                                                </div>
                    
                                            </div>
                                            <div class="form-actions">
                                                <div class="row">
                                                    <br/>
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-offset-3 col-md-9">
                                                                {!! Form::submit(trans('admin.edit'),['class'=>'btn btn-sm btn-primary']) !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {!! Form::close() !!}
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>







                        </div>
                        </div>
                        </div>




</div>


@stop


