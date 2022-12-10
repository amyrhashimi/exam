<div>
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl">
                <!--begin::Card-->
                <div class="card">
                    <!--begin::Card header-->
                    <div class="card-header border-0 pt-6">
                        <!--begin::Card title-->
                        <div class="card-title">
                            @lang('lessons.editLesson')
                        </div>
                        <!--begin::Card title-->
                    </div>
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <form wire:submit.prevent="edit">
                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">
                                    <span class="required">@lang('lessons.titleSlug')</span>
                                </label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row fv-plugins-icon-container">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="text" class="form-control form-control-solid mb-3 mb-lg-0 @error('title') border-danger @enderror" placeholder="@lang('lessons.title')" wire:model.debounce.lazy="title" />
                                            <div class="fv-plugins-message-container invalid-feedback"></div>

                                            @error('title')
                                            <div class="fv-plugins-message-container invalid-feedback"><div data-field="first-name" data-validator="notEmpty">{{ $message }}</div></div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <input type="text" class="form-control form-control-solid mb-3 mb-lg-0 @error('slug') border-danger @enderror" placeholder="@lang('lessons.slug')" wire:model.debounce.lazy="slug" />
                                            <div class="fv-plugins-message-container invalid-feedback"></div>

                                            @error('slug')
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
                                    <span>@lang('lessons.desc')</span>
                                </label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                    <textarea class="form-control form-control-solid @error('description') border-danger @enderror" wire:model.debounce.lazy="description"></textarea>
                                    <div class="fv-plugins-message-container invalid-feedback"></div>

                                    @error('description')
                                    <div class="fv-plugins-message-container invalid-feedback"><div data-field="first-name" data-validator="notEmpty">{{ $message }}</div></div>
                                    @enderror
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->

                            <button type="submit" class="btn btn-success btn-sm btn-hover-scale">@lang('lessons.edit')</button>

                            <button type="button" class="btn btn-sm btn-danger btn-hover-scale ms-2" wire:click="cansel">@lang('lessons.cancel')</button>
                        </form>
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>
    <!--end::Content-->
</div>
