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

    @if(auth()->user()->is_admin)
        <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
            <div class="d-flex flex-column-fluid">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-xl-12 mb-5">
                            <div class="card card-custom wave wave-animate-fast">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>{{__('cp.keyword')}} <span class="text-danger">*</span></label>
                                                <select name="keyword_id" class="form-control">
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
                                        <table class="table-striped table-bordered table-hover table col-12">
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


                        <!--                                    <div class="col-lg-6 col-xl-3 mb-5">
                            &lt;!&ndash;begin::Iconbox&ndash;&gt;
                            <div class="card card-custom wave wave-animate-fast">
                                <div class="card-body">
                                    <span class="svg-icon svg-icon-2x svg-icon-success">
                                        &lt;!&ndash;begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-opened.svg&ndash;&gt;
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path d="M6,2 L18,2 C18.5522847,2 19,2.44771525 19,3 L19,12 C19,12.5522847 18.5522847,13 18,13 L6,13 C5.44771525,13 5,12.5522847 5,12 L5,3 C5,2.44771525 5.44771525,2 6,2 Z M7.5,5 C7.22385763,5 7,5.22385763 7,5.5 C7,5.77614237 7.22385763,6 7.5,6 L13.5,6 C13.7761424,6 14,5.77614237 14,5.5 C14,5.22385763 13.7761424,5 13.5,5 L7.5,5 Z M7.5,7 C7.22385763,7 7,7.22385763 7,7.5 C7,7.77614237 7.22385763,8 7.5,8 L10.5,8 C10.7761424,8 11,7.77614237 11,7.5 C11,7.22385763 10.7761424,7 10.5,7 L7.5,7 Z" fill="#000000" opacity="0.3" />
                                                <path d="M3.79274528,6.57253826 L12,12.5 L20.2072547,6.57253826 C20.4311176,6.4108595 20.7436609,6.46126971 20.9053396,6.68513259 C20.9668779,6.77033951 21,6.87277228 21,6.97787787 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,6.97787787 C3,6.70173549 3.22385763,6.47787787 3.5,6.47787787 C3.60510559,6.47787787 3.70753836,6.51099993 3.79274528,6.57253826 Z" fill="#000000" />
                                            </g>
                                        </svg>
                                        &lt;!&ndash;end::Svg Icon&ndash;&gt;
                                    </span>
                                    <span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block">$5,209</span>
                                    <span class="font-weight-bold text-muted font-size-sm">SAP UI Progress</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-3 mb-5">
                            &lt;!&ndash;begin::Iconbox&ndash;&gt;
                            <div class="card card-custom wave wave-animate-fast">
                                <div class="card-body">
                                    <span class="svg-icon svg-icon-2x svg-icon-success">
                                        &lt;!&ndash;begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-opened.svg&ndash;&gt;
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path d="M6,2 L18,2 C18.5522847,2 19,2.44771525 19,3 L19,12 C19,12.5522847 18.5522847,13 18,13 L6,13 C5.44771525,13 5,12.5522847 5,12 L5,3 C5,2.44771525 5.44771525,2 6,2 Z M7.5,5 C7.22385763,5 7,5.22385763 7,5.5 C7,5.77614237 7.22385763,6 7.5,6 L13.5,6 C13.7761424,6 14,5.77614237 14,5.5 C14,5.22385763 13.7761424,5 13.5,5 L7.5,5 Z M7.5,7 C7.22385763,7 7,7.22385763 7,7.5 C7,7.77614237 7.22385763,8 7.5,8 L10.5,8 C10.7761424,8 11,7.77614237 11,7.5 C11,7.22385763 10.7761424,7 10.5,7 L7.5,7 Z" fill="#000000" opacity="0.3" />
                                                <path d="M3.79274528,6.57253826 L12,12.5 L20.2072547,6.57253826 C20.4311176,6.4108595 20.7436609,6.46126971 20.9053396,6.68513259 C20.9668779,6.77033951 21,6.87277228 21,6.97787787 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,6.97787787 C3,6.70173549 3.22385763,6.47787787 3.5,6.47787787 C3.60510559,6.47787787 3.70753836,6.51099993 3.79274528,6.57253826 Z" fill="#000000" />
                                            </g>
                                        </svg>
                                        &lt;!&ndash;end::Svg Icon&ndash;&gt;
                                    </span>
                                    <span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block">$5,209</span>
                                    <span class="font-weight-bold text-muted font-size-sm">SAP UI Progress</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-3 mb-5">
                            &lt;!&ndash;begin::Iconbox&ndash;&gt;
                            <div class="card card-custom wave wave-animate-fast">
                                <div class="card-body">
                                    <span class="svg-icon svg-icon-2x svg-icon-success">
                                        &lt;!&ndash;begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-opened.svg&ndash;&gt;
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path d="M6,2 L18,2 C18.5522847,2 19,2.44771525 19,3 L19,12 C19,12.5522847 18.5522847,13 18,13 L6,13 C5.44771525,13 5,12.5522847 5,12 L5,3 C5,2.44771525 5.44771525,2 6,2 Z M7.5,5 C7.22385763,5 7,5.22385763 7,5.5 C7,5.77614237 7.22385763,6 7.5,6 L13.5,6 C13.7761424,6 14,5.77614237 14,5.5 C14,5.22385763 13.7761424,5 13.5,5 L7.5,5 Z M7.5,7 C7.22385763,7 7,7.22385763 7,7.5 C7,7.77614237 7.22385763,8 7.5,8 L10.5,8 C10.7761424,8 11,7.77614237 11,7.5 C11,7.22385763 10.7761424,7 10.5,7 L7.5,7 Z" fill="#000000" opacity="0.3" />
                                                <path d="M3.79274528,6.57253826 L12,12.5 L20.2072547,6.57253826 C20.4311176,6.4108595 20.7436609,6.46126971 20.9053396,6.68513259 C20.9668779,6.77033951 21,6.87277228 21,6.97787787 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,6.97787787 C3,6.70173549 3.22385763,6.47787787 3.5,6.47787787 C3.60510559,6.47787787 3.70753836,6.51099993 3.79274528,6.57253826 Z" fill="#000000" />
                                            </g>
                                        </svg>
                                        &lt;!&ndash;end::Svg Icon&ndash;&gt;
                                    </span>
                                    <span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block">$5,209</span>
                                    <span class="font-weight-bold text-muted font-size-sm">SAP UI Progress</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-3 mb-5">
                            &lt;!&ndash;begin::Iconbox&ndash;&gt;
                            <div class="card card-custom wave wave-animate-fast">
                                <div class="card-body">
                                    <span class="svg-icon svg-icon-2x svg-icon-success">
                                        &lt;!&ndash;begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-opened.svg&ndash;&gt;
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path d="M6,2 L18,2 C18.5522847,2 19,2.44771525 19,3 L19,12 C19,12.5522847 18.5522847,13 18,13 L6,13 C5.44771525,13 5,12.5522847 5,12 L5,3 C5,2.44771525 5.44771525,2 6,2 Z M7.5,5 C7.22385763,5 7,5.22385763 7,5.5 C7,5.77614237 7.22385763,6 7.5,6 L13.5,6 C13.7761424,6 14,5.77614237 14,5.5 C14,5.22385763 13.7761424,5 13.5,5 L7.5,5 Z M7.5,7 C7.22385763,7 7,7.22385763 7,7.5 C7,7.77614237 7.22385763,8 7.5,8 L10.5,8 C10.7761424,8 11,7.77614237 11,7.5 C11,7.22385763 10.7761424,7 10.5,7 L7.5,7 Z" fill="#000000" opacity="0.3" />
                                                <path d="M3.79274528,6.57253826 L12,12.5 L20.2072547,6.57253826 C20.4311176,6.4108595 20.7436609,6.46126971 20.9053396,6.68513259 C20.9668779,6.77033951 21,6.87277228 21,6.97787787 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,6.97787787 C3,6.70173549 3.22385763,6.47787787 3.5,6.47787787 C3.60510559,6.47787787 3.70753836,6.51099993 3.79274528,6.57253826 Z" fill="#000000" />
                                            </g>
                                        </svg>
                                        &lt;!&ndash;end::Svg Icon&ndash;&gt;
                                    </span>
                                    <span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block">$5,209</span>
                                    <span class="font-weight-bold text-muted font-size-sm">SAP UI Progress</span>
                                </div>
                            </div>
                        </div>-->
                    </div>
                </div>
            </div>
        </div>
    @endif

@endsection
@section('js')

@endsection

@section('script')

@endsection
