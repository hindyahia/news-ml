@extends('auth.auth_layout')
@section('title' ,__('cp.register') )

@section('content')
    <form class="form" method="post" action="{{ route('register') }}" novalidate="novalidate"
          id="kt_login_signin_form">
        <!--begin::Title-->
        @csrf

        <div class="pb-13 pt-lg-0 pt-5 text-right" >
            <h3 class="font-weight-bolder text-dark font-size-h4 font-size-h1-lg text-center">@lang('cp.welcome')</h3>
            <span class="text-muted font-weight-bold font-size-h4">@lang("cp.I_have_account ?")
									<a href="{{route('login')}}" id="kt_login_signup" class="text-primary font-weight-bolder">@lang("cp.login")</a></span>
        </div>
        <!--begin::Title-->
        <!--begin::Form group-->
        <div class="form-group text-right">
            <label class="font-size-h6 font-weight-bolder text-dark">@lang('cp.name')</label>
            <input class="form-control form-control-solid h-auto py-7 px-6 text-right rounded-lg"
                   type="text" required value="{{old('name')}}" name="name" autocomplete="off"/>
        </div>
        <!--end::Form group-->
        <!--begin::Form group-->
        <div class="form-group text-right">
            <label class="font-size-h6 font-weight-bolder text-dark">@lang('cp.mobile')</label>
            <input class="form-control form-control-solid h-auto py-7 px-6 text-right rounded-lg"
                   type="text" required value="{{old('mobile')}}" name="mobile" autocomplete="off"/>
        </div>
        <!--end::Form group-->
        <!--begin::Form group-->
        <div class="form-group text-right">
            <label class="font-size-h6 font-weight-bolder text-dark">@lang('cp.email')</label>
            <input class="form-control form-control-solid h-auto py-7 px-6 text-right rounded-lg"
                   type="email" required value="{{old('email')}}" name="email" autocomplete="off"/>
        </div>
        <!--end::Form group-->
        <!--begin::Form group-->
        <div class="form-group text-right">
            <div class="d-flex justify-content-end mt-n5 text-right">
                <label
                    class="font-size-h6 font-weight-bolder text-dark pt-5 ">@lang('cp.password')</label>
                {{--                                <a href="javascript:;" class="text-primary font-size-h6 font-weight-bolder text-hover-primary pt-5" id="kt_login_forgot">@lang('cp.forget_password') ?</a>--}}
            </div>
            <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg text-right"
                   type="password" name="password" required autocomplete="off"/>
        </div>
        <!--end::Form group-->
        <!--begin::Form group-->
        <div class="form-group text-right">
            <div class="d-flex justify-content-end mt-n5 text-right">
                <label
                    class="font-size-h6 font-weight-bolder text-dark pt-5 ">@lang('cp.confirm_password')</label>
                {{--                                <a href="javascript:;" class="text-primary font-size-h6 font-weight-bolder text-hover-primary pt-5" id="kt_login_forgot">@lang('cp.forget_password') ?</a>--}}
            </div>
            <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg text-right"
                   type="password" name="password_confirmation" required autocomplete="off"/>
        </div>
        <!--end::Form group-->
        <!--begin::Action-->
        <div class="pb-lg-0 pb-5">
            <button type="submit"

                    class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">@lang('cp.register')</button>
            {{--                            <button type="button" id="kt_login_signin_submit" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">@lang('cp.Sign_in')</button>--}}

        </div>
        <!--end::Action-->
    </form>

@endsection

