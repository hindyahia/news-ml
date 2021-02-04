@extends('layout.adminLayout')
@section('title') {{ucwords(__('cp.promises_management'))}}
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
                        <h3>{{__('cp.edit')}}</h3>
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
                    <form method="post" action="{{route('admin.donations.update',$item->id)}}"
                          enctype="multipart/form-data" class="form-horizontal" role="form" id="form_company">
                        {{ csrf_field() }}
                        {{ method_field('PATCH')}}
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{__('cp.mediator')}} <span class="text-danger">*</span></label>
                                        <select name="mediator_id" id="mediator_id" required
                                                class="form-control form-control-solid">
                                            <option value="">@lang('cp.select')</option>
                                            @foreach($mediators as $it)
                                                <option
                                                    value="{{$it->id}}" {{$item->mediator_id == $it->id ? 'selected' : ''}} >{{$it->name . "|  " . $item->nickname}}</option>
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
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{__('cp.delegate')}} <span class="text-danger">*</span></label>
                                        <select name="delegate_id" id="mediator_id" required class="form-control form-control-solid" >
                                            <option value="" >@lang('cp.select')</option>
                                            @foreach($delegates as $one)
                                                <option value="{{$one->id}}" {{ $one->id == $item->delegate_id }}>{{$one->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{__('cp.price_from_benefactor')}}<span class="text-danger">*</span></label>
                                        <input type="number" class="form-control form-control-solid"
                                               name="price_from_benefactor"
                                               value="{{ old('price_from_benefactor',$item->price_from_benefactor)}}"
                                               required/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{__('cp.currency')}}<span class="text-danger">*</span></label>
                                        <select class="form-control form-control-solid" name="currency_id"
                                                required>
                                            @foreach($currencies as  $one)
                                                <option value="{{$one->id}}" {{ old('currency_id', $item->currency_id) == $one->id?"selected":""}}>{{$one->name}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{__('cp.price_for_exchanged')}}</label>
                                        <input type="number" class="form-control form-control-solid"
                                               name="price_for_exchanged"
                                               value="{{ old('price_for_exchanged',$item->price_for_exchanged)}}"
                                               required/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{__('cp.commission')}}<span class="text-danger">*</span></label>
                                        <input type="number" class="form-control form-control-solid" name="commission"
                                               value="{{ old('commission', $item->commissions->commission)}}" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{__('cp.date')}}<span class="text-danger">*</span></label>
                                        <input type="date" class="form-control form-control-solid" name="date"
                                               value="{{ old('date',$item->date)}}" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{__('cp.projects')}} <span class="text-danger">*</span></label>
                                        <select name="project_id" id="mediator_id" required
                                                class="form-control form-control-solid">
                                            <option value="" disabled>@lang('cp.select')</option>
                                            @foreach($projects as $it)
                                                <option
                                                    value="{{$it->id}}" {{$it->project_id == $it->id ? 'selected' : ''}}>{{$it->name}}</option>
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
                                                  name="notes">{{old('notes',$item->notes)}}</textarea>
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
@section('js')
@endsection

@section('script')
    <script>
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

