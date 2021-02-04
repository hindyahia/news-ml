@extends('layout.adminLayout')
@section('title')
    {{__('cp.promises_management')}}
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
                        <h3>{{__('cp.add_donation')}}</h3>
                    </div>
                </div>
                <!--end::Info-->
                <!--begin::Toolbar-->
                <div class="d-flex align-items-center">
                    <a href="{{route('admin.donations.index')}}"
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
                    <form class="form" method="post" action="{{route('admin.donations.store')}}"
                          enctype="multipart/form-data">
                        @csrf
                        @isset($promise)
                            <input type="hidden" name="promise_id" value="{{$promise->id}}">
                        @endisset
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{__('cp.mediator')}} <span class="text-danger">*</span></label>
                                        <select name="mediator_id" id="mediator_id" required
                                                class="form-control form-control-solid">
                                            <option value="">@lang('cp.select')</option>
                                            @foreach($mediators as $item)
                                                <option
                                                    value="{{$item->id}}" {{old('mediator_id', @$promise->mediator_id) == $item->id?"selected":""}}>{{$item->name . "|  " . $item->nickname}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{__('cp.benefactor')}} <span class="text-danger">*</span></label>
                                        <select name="benefactor_id" id="benefactor_id" required
                                                class="form-control form-control-solid">
                                            <option value="" disabled>@lang('cp.select')</option>
                                            @foreach($benefactors as $item)
                                            <option value="{{$item->id}}" {{old('mediator_id', @$promise->benefactor_id) == $item->id?"selected":""}}>{{$item->name}}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{__('cp.delegate')}} <span class="text-danger">*</span></label>
                                        <select name="delegate_id" id="delegate_id" required
                                                class="form-control form-control-solid">
                                            <option value="">@lang('cp.select')</option>
                                            @foreach($delegates as $item)
                                                <option value="{{$item->id}}" >{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{__('cp.price_from_benefactor')}}  <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control form-control-solid"
                                               name="price_from_benefactor"
                                               value="{{ old('price_from_benefactor' , @$promise->price)}}" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{__('cp.currency')}} <span class="text-danger">*</span></label>
                                        <select class="form-control form-control-solid" name="currency_id"
                                                required>
                                            @foreach($currencies as  $one)
                                                <option value="{{$one->id}}" {{ old('currency_id', @$promise->currency_id) == $one->id?"selected":""}}>{{$one->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{__('cp.price_for_exchanged')}} <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control form-control-solid"
                                               name="price_for_exchanged"
                                               value="{{ old('price_for_exchanged')}}" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{__('cp.commission')}} <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control form-control-solid" name="commission"
                                               value="{{ old('commission')}}" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{__('cp.date')}} <span class="text-danger">*</span></label>
                                        <input type="date" class="form-control form-control-solid" name="date"
                                               value="{{ old('date')}}" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{__('cp.projects')}} <span class="text-danger">*</span></label>
                                        <select name="project_id" id="project_id" required
                                                class="form-control form-control-solid">
                                            <option value="" disabled>@lang('cp.select')</option>
                                            @foreach($projects as $item)
                                                <option value="{{$item->id}}" {{old('project_id' , @$promise->project_id) == $item->id ?'selected':''}}>{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{__('cp.notes')}} <span class="text-danger">*</span></label>
                                        <textarea class="form-control form-control-solid" required
                                                  name="notes">{{old('notes',@$promise->notes)}}</textarea>
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
    <script>
        jQuery(document).on('change', '#mediator_id', function (e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            // alert( $('#category').val());
            //
            jQuery.ajax({
                url: "{{route('ajax.benefactor')}}",
                method: 'get',
                data: {
                    id: $('#mediator_id').val(),
                },
                success: function (result) {
                    $('#benefactor_id').html('');

                    $.each(result.benefactors, function (key, benefactor) {
                        $('#benefactor_id').append("<option value=\"" + benefactor.id + "\">" + benefactor.name + "</option>");

                    });
                    $('#benefactor_id').trigger("change");
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert('error');
                }
            });
        });
    </script>
@endsection
