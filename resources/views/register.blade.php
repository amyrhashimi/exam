@extends('layouts.master')

@section('content')
    <!--begin::Authentication - Sign-up -->
    <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url(/assets/media/illustrations/sketchy-1/14.png">
        <!--begin::Content-->
        <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
            <!--begin::Logo-->
            <a href="{{ route('home') }}" class="mb-12">
                <img alt="Logo" src="{{ asset('assets/media/logos/logo-1.svg') }}" class="h-40px" />
            </a>
            <!--end::Logo-->
            <!--begin::Wrapper-->
            <div class="w-lg-600px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
                <!--begin::Form-->
                <form class="form w-100" action="{{ route('register.post') }}" method="POST">
                    @csrf
                    <!--begin::Heading-->
                    <div class="mb-10 text-center">
                        <!--begin::Title-->
                        <h1 class="text-dark mb-3">ثبت نام </h1>
                        <!--end::Title-->
                        <!--begin::Link-->
                        <div class="text-gray-400 fw-bold fs-4">از قبل حساب کاربری دارید؟
                            <a href="{{ route('login') }}" class="link-primary ">اینجا وارد شوید</a></div>
                        <!--end::Link-->
                    </div>
                    <!--end::Heading-->

                    <!--begin::Input group-->
                    <div class="row fv-row mb-7">
                        <!--begin::Col-->
                        <div class="col-xl-6">
                            <label class="form-label  text-dark fs-6">نام </label>
                            <input class="form-control form-control-lg form-control-solid" type="text" name="name" autocomplete="off" value="{{ old('name') }}" />
                            @error('name')
                                <div class="fv-plugins-message-container invalid-feedback"><div data-field="first-name" data-validator="notEmpty">{{ $message }}</div></div>
                            @enderror
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-xl-6">
                            <label class="form-label  text-dark fs-6">نام خانوادگی</label>
                            <input class="form-control form-control-lg form-control-solid" type="text" name="family" autocomplete="off"  value="{{ old('family') }}" />
                            @error('family')
                            <div class="fv-plugins-message-container invalid-feedback"><div data-field="first-name" data-validator="notEmpty">{{ $message }}</div></div>
                            @enderror
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->

                      <!--begin::Input group-->
                      <div class="row fv-row mb-7">
                        <!--begin::Col-->
                            <label class="form-label  text-dark fs-6">نام کاربری </label>
                            <input class="form-control form-control-lg form-control-solid" name="username" id="kt_inputmask_11" inputmode="text" value="{{ old('username') }}">
                            @error('username')
                                <div class="fv-plugins-message-container invalid-feedback"><div data-field="first-name" data-validator="notEmpty">{{ $message }}</div></div>
                            @enderror
                    </div>
                    <!--end::Input group-->

                    <!--begin::Input group-->
                    <div class="row fv-row mb-7">
                        <!--begin::Col-->
                            <label class="form-label  text-dark fs-6">تلفن همراه </label>
                            <input class="form-control form-control-lg form-control-solid" name="phone" id="kt_inputmask_11" inputmode="text" value="{{ old('phone') }}">
                            @error('phone')
                                <div class="fv-plugins-message-container invalid-feedback"><div data-field="first-name" data-validator="notEmpty">{{ $message }}</div></div>
                            @enderror
                    </div>
                    <!--end::Input group-->

                    <!--begin::Input group-->
                    <div class="row fv-row mb-7">
                        <!--begin::Col-->
                            <label class="form-label  text-dark fs-6">ایمیل (اختیاری) </label>
                            <input class="form-control form-control-lg form-control-solid" type="email" name="email" value="{{ old('email') }}">
                            @error('email')
                            <div class="fv-plugins-message-container invalid-feedback"><div data-field="first-name" data-validator="notEmpty">{{ $message }}</div></div>
                            @enderror

                    </div>
                    <!--end::Input group-->
                    

                    <!--begin::Input group-->
                    <div class="mb-10 fv-row" data-kt-password-meter="true">
                        <!--begin::Wrapper-->
                        <div class="mb-1">
                            <!--begin::Label-->
                            <label class="form-label  text-dark fs-6">کلمه عبور</label>
                            <!--end::Label-->
                            <!--begin::Input wrapper-->
                            <div class="position-relative mb-3">
                                <input class="form-control form-control-lg form-control-solid" type="password" name="password" autocomplete="off" />
                                <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                                    <i class="bi bi-eye-slash fs-2"></i>
                                    <i class="bi bi-eye fs-2 d-none"></i>
                                </span>
                                @error('password')
                                <div class="fv-plugins-message-container invalid-feedback"><div data-field="first-name" data-validator="notEmpty">{{ $message }}</div></div>
                                @enderror
                            </div>
                            <!--end::Input wrapper-->
                            <!--begin::Meter-->
                            <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                            </div>
                            <!--end::Meter-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Input group=-->

                    <!--begin::Actions-->
                    <div>
                        <button type="submit" id="kt_sign_up_submit" class="btn btn-lg btn-primary">
                            <span class="indicator-label">ارسال</span>
                            <span class="indicator-progress">لطفا صبر کنید...
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Authentication - Sign-up-->
@endsection