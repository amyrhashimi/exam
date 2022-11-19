<div id="kt_content_container" class="container-xxl">

    <!--begin::Basic info-->
    <div class="card mb-5 mb-xl-10">
        <!--begin::Card header-->
        <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
            <!--begin::Card title-->
            <div class="card-title m-0">
                <h3 class="fw-bolder m-0">ویرایش کاربر</h3>
            </div>
            <!--end::Card title-->
        </div>
        <!--begin::Card header-->
        <!--begin::Content-->
        <div id="kt_account_settings_profile_details" class="collapse show">
            <!--begin::Form-->
            <form id="kt_account_profile_details_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" wire:submit.prevent="update">
                <!--begin::Card body-->
                <div class="card-body border-top p-9">

                    <!--begin::Input group-->
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label fw-bold fs-6">
                            <span>نام و نام خانوادگی </span>
                        </label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row fv-plugins-icon-container">

                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" class="form-control form-control-solid mb-3 mb-lg-0 @error('name') border-danger @enderror"  wire:model.debounce.lazy="name" />
                                    <div class="fv-plugins-message-container invalid-feedback"></div>

                                    @error('name')
                                    <div class="fv-plugins-message-container invalid-feedback"><div data-field="first-name" data-validator="notEmpty">{{ $message }}</div></div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <input type="text" class="form-control form-control-solid mb-3 mb-lg-0 @error('family') border-danger @enderror" wire:model.debounce.lazy="family" />
                                    <div class="fv-plugins-message-container invalid-feedback"></div>

                                    @error('family')
                                    <div class="fv-plugins-message-container invalid-feedback"><div data-field="first-name" data-validator="notEmpty">{{ $message }}</div></div>
                                    @enderror
                                </div>
                            </div>


                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->

                    <!--begin::Input group-->
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label fw-bold fs-6">
                            <span>نام کاربری</span>
                        </label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row fv-plugins-icon-container">
                            <input type="text" class="form-control form-control-solid mb-3 mb-lg-0 @error('username') border-danger @enderror" wire:model.debounce.lazy="username" />
                            <div class="fv-plugins-message-container invalid-feedback"></div>

                            @error('username')
                            <div class="fv-plugins-message-container invalid-feedback"><div data-field="first-name" data-validator="notEmpty">{{ $message }}</div></div>
                            @enderror
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->

                    <!--begin::Input group-->
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label fw-bold fs-6">
                            <span>ایمیل</span>
                        </label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row fv-plugins-icon-container">
                            <input type="text" class="form-control form-control-solid mb-3 mb-lg-0 @error('email') border-danger @enderror" wire:model.debounce.lazy="email" />
                            <div class="fv-plugins-message-container invalid-feedback"></div>

                            @error('email')
                            <div class="fv-plugins-message-container invalid-feedback"><div data-field="first-name" data-validator="notEmpty">{{ $message }}</div></div>
                            @enderror
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->

                    <!--begin::Input group-->
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label fw-bold fs-6">
                            <span>تلفن همراه</span>
                        </label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row fv-plugins-icon-container">
                            <input type="text" class="form-control form-control-solid mb-3 mb-lg-0 @error('phone') border-danger @enderror" wire:model.debounce.lazy="phone" />
                            <div class="fv-plugins-message-container invalid-feedback"></div>

                            @error('phone')
                            <div class="fv-plugins-message-container invalid-feedback"><div data-field="first-name" data-validator="notEmpty">{{ $message }}</div></div>
                            @enderror
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->

                </div>
                <!--end::Card body-->
                <!--begin::Actions-->
                <div class="card-footer d-flex justify-content-end py-6 px-9">
                    <button wire:click="cansel" type="button" class="btn btn-light btn-active-light-primary btn-hover-scale btn-sm me-2">انصراف</button>
                    <button type="submit" class="btn btn-primary btn-hover-scale btn-sm" id="kt_account_profile_details_submit">ویرایش</button>
                </div>
                <!--end::Actions-->
                <input type="hidden"><div></div></form>
            <!--end::Form-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Basic info-->
</div>
