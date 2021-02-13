@extends('layout.adminLayout')
@section('title') {{ucwords(__('cp.dashboard'))}}
@endsection
@section('css')

    <style>
        a:link {
            text-decoration: none;
        }
    </style>

@endsection
@section('content')

    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="d-flex flex-column-fluid">
            <div class="container">
                @if(!auth()->user()->is_admin)

                    <div class="row">
                        <div class="col-lg-12 col-xl-12 mb-5">
                            <div class="card card-custom wave wave-animate-fast">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>{{__('cp.keyword')}} <span class="text-danger">*</span></label>
                                                <select name="keyword_id" class="form-control">
                                                    <option value="0">@lang('cp.select')</option>
                                                    @foreach($keywords as $keyword)
                                                        <option value="{{$keyword->id}}">
                                                            {{$keyword->title}}
                                                        </option>
                                                    @endforeach
                                                </select></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-xl-12 mb-5">
                            <div class="card card-custom wave wave-animate-fast">
                                <div class="card-body">
                                    <div class="row table-responsive">
                                        <table class="table-striped table-bordered table-hover table col-12   datatable"  >
                                            <thead>
                                            <tr>
                                                <th>@lang('cp.title')</th>
                                                <th>@lang('cp.description')</th>
                                                <th>@lang('cp.content')</th>
                                                <th>@lang('cp.date')</th>
                                                <th>@lang('cp.category')</th>
                                                <th>@lang('cp.action')</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>

                @else
                    <div class="row">
                        <div class="col-lg-6 col-xl-3 mb-5">
                            <!--begin::Iconbox-->
                            <div class="card card-custom wave wave-animate-fast">
                                <div class="card-body">
                                                                            <span
                                                                                class="svg-icon svg-icon-2x svg-icon-success">
                                                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-opened.svg-->
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                     xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                     width="24px" height="24px"
                                                                                     viewBox="0 0 24 24" version="1.1">
                                                                                    <g stroke="none" stroke-width="1"
                                                                                       fill="none" fill-rule="evenodd">
                                                                                        <rect x="0" y="0" width="24"
                                                                                              height="24"/>
                                                                                        <path
                                                                                            d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z"
                                                                                            fill="#000000"
                                                                                            fill-rule="nonzero"
                                                                                            opacity="0.3"/>
                                                                                        <path
                                                                                            d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z"
                                                                                            fill="#000000"
                                                                                            fill-rule="nonzero"/>
                                                                                        <rect fill="#000000"
                                                                                              opacity="0.3" x="9"
                                                                                              y="10.5" width="4"
                                                                                              height="1" rx="0.5"/>
                                                                                    </g>
                                                                                </svg>
                                                                                <!--end::Svg Icon-->
                                                                            </span>
                                    <span
                                        class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block">{{$keywords_count}}</span>
                                    <span class="font-weight-bold text-muted font-size-sm">@lang('cp.keyword')</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-3 mb-5">
                            <!--begin::Iconbox-->
                            <div class="card card-custom wave wave-animate-fast">
                                <div class="card-body">
                                                                            <span
                                                                                class="svg-icon svg-icon-2x svg-icon-success">
                                                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-opened.svg-->
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                     xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                     width="24px" height="24px"
                                                                                     viewBox="0 0 24 24" version="1.1">
                                                                                   <g stroke="none" stroke-width="1"
                                                                                      fill="none" fill-rule="evenodd">
                                                                                        <polygon
                                                                                            points="0 0 24 0 24 24 0 24"/>
                                                                                        <path
                                                                                            d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z"
                                                                                            fill="#000000"
                                                                                            fill-rule="nonzero"
                                                                                            opacity="0.3"/>
                                                                                        <path
                                                                                            d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
                                                                                            fill="#000000"
                                                                                            fill-rule="nonzero"/>
                                                                                    </g>
                                                                                </svg>
                                                                                <!--end::Svg Icon-->
                                                                            </span>
                                    <span
                                        class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block">{{$users_count}}</span>
                                    <span class="font-weight-bold text-muted font-size-sm">@lang('cp.users')</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-3 mb-5">
                            <!--begin::Iconbox-->
                            <div class="card card-custom wave wave-animate-fast">
                                <div class="card-body">
                                                                            <span
                                                                                class="svg-icon svg-icon-2x svg-icon-success">
                                                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-opened.svg-->
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                     xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                     width="24px" height="24px"
                                                                                     viewBox="0 0 24 24" version="1.1">
                                                                                     <g stroke="none" stroke-width="1"
                                                                                        fill="none" fill-rule="evenodd">
                                                                                        <rect x="0" y="0" width="24"
                                                                                              height="24"/>
                                                                                        <path
                                                                                            d="M10.5,5 L19.5,5 C20.3284271,5 21,5.67157288 21,6.5 C21,7.32842712 20.3284271,8 19.5,8 L10.5,8 C9.67157288,8 9,7.32842712 9,6.5 C9,5.67157288 9.67157288,5 10.5,5 Z M10.5,10 L19.5,10 C20.3284271,10 21,10.6715729 21,11.5 C21,12.3284271 20.3284271,13 19.5,13 L10.5,13 C9.67157288,13 9,12.3284271 9,11.5 C9,10.6715729 9.67157288,10 10.5,10 Z M10.5,15 L19.5,15 C20.3284271,15 21,15.6715729 21,16.5 C21,17.3284271 20.3284271,18 19.5,18 L10.5,18 C9.67157288,18 9,17.3284271 9,16.5 C9,15.6715729 9.67157288,15 10.5,15 Z"
                                                                                            fill="#000000"/>
                                                                                        <path
                                                                                            d="M5.5,8 C4.67157288,8 4,7.32842712 4,6.5 C4,5.67157288 4.67157288,5 5.5,5 C6.32842712,5 7,5.67157288 7,6.5 C7,7.32842712 6.32842712,8 5.5,8 Z M5.5,13 C4.67157288,13 4,12.3284271 4,11.5 C4,10.6715729 4.67157288,10 5.5,10 C6.32842712,10 7,10.6715729 7,11.5 C7,12.3284271 6.32842712,13 5.5,13 Z M5.5,18 C4.67157288,18 4,17.3284271 4,16.5 C4,15.6715729 4.67157288,15 5.5,15 C6.32842712,15 7,15.6715729 7,16.5 C7,17.3284271 6.32842712,18 5.5,18 Z"
                                                                                            fill="#000000"
                                                                                            opacity="0.3"/>
                                                                                    </g>
                                                                                </svg>
                                                                                <!--end::Svg Icon-->
                                                                            </span>
                                    <span
                                        class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block">{{$category_count}}</span>
                                    <span class="font-weight-bold text-muted font-size-sm">@lang('cp.categories')</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-3 mb-5">
                            <!--begin::Iconbox-->
                            <div class="card card-custom wave wave-animate-fast">
                                <div class="card-body">
                                                                            <span
                                                                                class="svg-icon svg-icon-2x svg-icon-success">
                                                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-opened.svg-->
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                     xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                     width="24px" height="24px"
                                                                                     viewBox="0 0 24 24" version="1.1">
                                                                                    <g stroke="none" stroke-width="1"
                                                                                       fill="none" fill-rule="evenodd">
                                                                                        <rect x="0" y="0" width="24"
                                                                                              height="24"/>
                                                                                        <path
                                                                                            d="M4.5,3 L19.5,3 C20.3284271,3 21,3.67157288 21,4.5 L21,19.5 C21,20.3284271 20.3284271,21 19.5,21 L4.5,21 C3.67157288,21 3,20.3284271 3,19.5 L3,4.5 C3,3.67157288 3.67157288,3 4.5,3 Z M8,5 C7.44771525,5 7,5.44771525 7,6 C7,6.55228475 7.44771525,7 8,7 L16,7 C16.5522847,7 17,6.55228475 17,6 C17,5.44771525 16.5522847,5 16,5 L8,5 Z"
                                                                                            fill="#000000"/>
                                                                                    </g>
                                                                                </svg>
                                                                                <!--end::Svg Icon-->
                                                                            </span>
                                    <span
                                        class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block">{{$articles_count}}</span>
                                    <span class="font-weight-bold text-muted font-size-sm">@lang('cp.news')</span>
                                </div>
                            </div>
                        </div>

                        @endif

                    </div>
            </div>
        </div>

@endsection
@section('js')

@endsection

@section('script')
            <script  >
                $(document).on('change','[name="keyword_id"]',function (){
                   $val= $(this).val();
                    $table = $('.datatable').DataTable();
                    $table.clear().draw();;
                   $.get(`{{route('admin.getCustomNews')}}?keyword_id=${$val}`,function ($response){
                       $rows  =[] ;
                       $response.data.forEach(function ($item){
                           $table.row.add( [
                               $item.title,
                               $item.description,
                               $item.content,
                               $item.content,
                               $item.category.title,
                               ` <div class="btn-group btn-action">
                                                <a href="${$item.id}"
                                                   class="btn btn-xs btn-icon btn-clean blue tooltips"
                                                   data-container="body" data-placement="top"
                                                   data-original-title="{{__('cp.show')}}"><i
                                                        class="fa fa-eye"></i></a>
                                                        <a href="${$item.link}" target="_blank
                                                   class="btn btn-xs btn-icon btn-clean blue tooltips"
                                                   data-container="body" data-placement="top"
                                                   data-original-title="{{__('cp.link')}}"><i
                                                        class="fa fa-link"></i></a>

                                            </div>`
                           ] ).draw()
                           $rows+=`
                           <td> ${$item.title}</td>
                           <td> ${$item.description}</td>
                           <td> ${$item.content}</td>
                           <td> ${$item.date}</td>
                           <td> ${$item.category.title}</td>
                                        <td>
                                            <div class="btn-group btn-action">
                                                <a href="${$item.id}"
                                                   class="btn btn-xs btn-icon btn-clean blue tooltips"
                                                   data-container="body" data-placement="top"
                                                   data-original-title="{{__('cp.show')}}"><i
                                                        class="fa fa-eye"></i></a>
                                                        <a href="${$item.link}" target="_blank
                                                   class="btn btn-xs btn-icon btn-clean blue tooltips"
                                                   data-container="body" data-placement="top"
                                                   data-original-title="{{__('cp.link')}}"><i
                                                        class="fa fa-link"></i></a>

                                            </div>
                                        </td>
                           `;
                       });
                       // $('.datatable tbody').html($rows);
                       // $('.datatable').DataTable().draw();
                       // $('.datatable').dataTable().ajax().reload();
                       //
                   });

                });

            </script>
@endsection
