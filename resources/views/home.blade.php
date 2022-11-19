@extends('layouts.master')

@section('content')
    <!--begin::Projects Section-->
    <div class=" mt-auto mb-auto">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Card-->
            <div class="card" style="filter: drop-shadow(0px 0px 40px rgba(68, 81, 96, 0.08))">
                <!--begin::Card body-->
                <div class="card-body p-lg-20">
                     <!--begin::Row-->
                    <div class="row g-10">

                        <!--begin::Col-->
                        <div class="col-lg-6" style="border-left: 3px solid #eff2f5;">
                            <a href="{{ route('register') }}" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
                                <span class="indicator-label">ثبت نام</span>
                            </a>
                        </div>
                        <!--end::Col-->

                        <!--begin::Col-->
                        <div class="col-lg-6">
                            <a href="{{ route('login') }}" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
                                <span class="indicator-label">ورود</span>
                            </a>
                        </div>
                        <!--end::Col-->

                    </div>
                    <!--end::Row-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
    </div>
@endsection