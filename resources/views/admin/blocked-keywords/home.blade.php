@extends('layout.adminLayout')
@section('title') {{ucwords(__('cp.blocked_keywords_management'))}}
@endsection
@section('css')
@endsection
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Subheader-->
        <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Info-->
                <div class="d-flex align-items-center flex-wrap mr-1">
                    <div class="d-flex align-items-baseline mr-5">
                        <h3>{{ucwords(__('cp.blocked_keywords_management'))}}</h3>
                    </div>
                </div>
                <!--end::Info-->
                <!--begin::Toolbar-->


                <div class="btn-group mb-2 m-md-3 mt-md-0 ml-2 ">

                    <a href="{{route('admin.blocked-keywords.create')}}" style="margin-right: 5px"
                       class="btn btn-success"><i class="fa fa-plus"></i>{{__('cp.add')}}
                    </a>

                    {{--                    <button type="button" class="btn btn-default has-icon event" href="#activation" role="button"  data-toggle="modal">--}}
                    {{--                        <i class="fas fa-check"></i>--}}
                    {{--                        <span>{{__('cp.active')}}</span>--}}
                    {{--                    </button>--}}
                    {{--                    <button type="button" class="btn btn-default  has-icon event" href="#cancel_activation" role="button"  data-toggle="modal">--}}
                    {{--                        <i class="fas fa-times"></i>--}}
                    {{--                        <span>{{__('cp.not_active')}}</span>--}}
                    {{--                    </button>--}}
                    <button type="button" class="btn btn-default  has-icon event" href="#deleteAll" role="button"
                            data-toggle="modal">
                        <i class="fas fa-trash"></i>
                        <span>{{__('cp.delete')}}</span>
                    </button>
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
                <div class="gutter-b example example-compact">
                    <div class="contentTabel">
                        <div
                            class="card-header d-flex flex-column flex-sm-row align-items-sm-start justify-content-sm-between">
                            <div>


                            </div>
                            <div class="btn-group ">
<!--                                <form class="input-group">
                                    <input type="text" class="form-control" name="search" placeholder="بحث">
                                    <div class="input-group-append">
                                        <button class="btn btn-secondary">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </form>-->
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover tableWithSearch datatable" id="tableWithSearch">
                                <thead>
                                <tr>
                                    <th>

                                    </th>
                                    <th> {{ucwords(__('cp.title'))}}</th>
                                    <th> {{ucwords(__('cp.action'))}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($items as $item)
                                    <tr class="odd gradeX" id="tr-{{$item->id}}">
                                        <td>
                                            <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                <input type="checkbox" class="checkboxes chkBox" value="{{$item->id}}"
                                                       name="chkBox"/>
                                                <span></span>
                                            </label>
                                        </td>
                                        <td> {{$item->title}}</td>
                                        <td>
                                            <div class="btn-group btn-action">
                                                <a href="{{route('admin.blocked-keywords.edit',$item->id)}}"
                                                   class="btn btn-xs btn-icon btn-clean blue tooltips"
                                                   data-container="body" data-placement="top"
                                                   data-original-title="{{__('cp.edit')}}"><i
                                                        class="fa fa-edit"></i></a>
                                                <a data-action-url="{{route('admin.blocked-keywords.destroy',$item->id)}}"
                                                    class="btn btn-xs btn-icon btn-clean blue tooltips"
                                                   data-container="body" data-placement="top" data-action="delete"
                                                   data-original-title="{{__('cp.delete')}}"><i
                                                        class="fa fa-trash"></i></a>
                                            </td>
                                    </tr>

                                @empty
                                    <tr>














                                        <td class="text-center lead  " colspan="8">
                                            {{__('cp.no')}} </td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!--end::Card-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
@endsection
