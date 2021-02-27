@extends('layout.adminLayout')
@section('title') {{ucwords(__('cp.contents_management'))}}
@endsection
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Subheader-->
        <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Info-->
                <div class="d-flex align-items-center flex-wrap mr-1">
                    <div class="d-flex align-items-baseline mr-5">
                        <h3>{{__('cp.edit')}}</h3>
                    </div>
                </div>
                <!--end::Info-->
                <!--begin::Toolbar-->
                <div class="d-flex align-items-center">
                    <a href="{{route('admin.contents.index')}}"
                       class="btn btn-secondary  mr-2">{{__('cp.cancel')}}</a>
                    <button id="submitButton" class="btn btn-success ">{{__('cp.save')}}</button>
                </div>
                <!--end::Toolbar-->
            </div>
        </div>
        <!--end::Subheader-->
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Card-->
                <div class="card card-custom gutter-b example example-compact">
                    <form method="post" action="{{route('admin.contents.update',$item->id)}}"
                          enctype="multipart/form-data" class="form-horizontal" role="form" id="form_company">
                        {{ csrf_field() }}
                        {{ method_field('PATCH')}}
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{__('cp.title')}} <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control form-control-solid"
                                               name="title"
                                               value="{{ old('title', @$item->title)}}" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{__('cp.content')}} <span class="text-danger">*</span></label>
                                        <textarea class="form-control form-control-solid" required name="content" id="content" required>{{ old('content', @$item->content)}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{__('cp.description')}} <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control form-control-solid"
                                               name="description"
                                               value="{{ old('description', @$item->description)}}" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{__('cp.category')}} <span class="text-danger">*</span></label>
                                        <select name="category_id" required class="form-control">
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}" {{$item->category_id == $category->id ? 'selected' : ''}}>
                                                    {{$category->title}}
                                                </option>
                                            @endforeach
                                        </select></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{__('cp.keyword')}} <span class="text-danger">*</span></label>
                                        <select name="keyword_id" required class="form-control">
                                            @foreach($keywords as $keyword)
                                                <option value="{{$keyword->id}}"  {{$item->keyword_id == $keyword->id ? 'selected' : ''}}>
                                                    {{$keyword->title}}
                                                </option>
                                            @endforeach
                                        </select></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{__('cp.image')}} <span class="text-danger">*</span></label>
                                        <input name="image" type="file" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" id="submitForm" style="display:none"></button>
                    </form>
                </div>
                <!--end::Card-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script src="//cdn.ckeditor.com/4.14.0/full-all/ckeditor.js"></script>
    <script>
        $(".js-example-disabled-multi").select2();
    </script>
    <script>
        CKEDITOR.replace('content', {
            contentsLangDirection: "rtl",
        });
    </script>
@endsection
