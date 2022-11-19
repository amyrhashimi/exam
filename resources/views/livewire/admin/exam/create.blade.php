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
                            ساخت امتحان جدید
                        </div>
                        <!--begin::Card title-->
                    </div>
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <form wire:submit.prevent="create">
                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">
                                    <span class="required">عنوان و عنوان لاتین</span>
                                </label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row fv-plugins-icon-container">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="text" class="form-control form-control-solid mb-3 mb-lg-0 @error('title') border-danger @enderror" placeholder="عنوان" wire:model.debounce.lazy="title" />
                                            <div class="fv-plugins-message-container invalid-feedback"></div>

                                            @error('title')
                                            <div class="fv-plugins-message-container invalid-feedback"><div data-field="first-name" data-validator="notEmpty">{{ $message }}</div></div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <input type="text" class="form-control form-control-solid mb-3 mb-lg-0 @error('slug') border-danger @enderror" placeholder="عنوان لاتین" wire:model.debounce.lazy="slug" />
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

                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">
                                    <span class="required">درس را مشخص کنید</span>
                                </label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row fv-plugins-icon-container">

                                    <select wire:model="lesson_id" class="form-select form-select-solid @error('lesson_id') border-danger @enderror" data-placeholder="درس خود را انتخاب کنید ...">
                                        <option value="">درس مورد نظر را انتخاب کنید ...</option>
                                        @foreach( \App\Models\Lesson::latest()->get() as $lesson)
                                            <option value="{{ $lesson->id }}"> {{ $lesson->title }} </option>
                                        @endforeach
                                    </select>
                                    <div class="fv-plugins-message-container invalid-feedback"></div>

                                    @error('lesson_id')
                                        <div class="fv-plugins-message-container invalid-feedback"><div data-field="first-name" data-validator="notEmpty">{{ $message }}</div></div>
                                    @enderror

                                </div>
                                <!--end::Col-->
                            </div>

                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">
                                    <span class="required">تاریخ و ساعت شروع</span>
                                </label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row fv-plugins-icon-container">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="date" class="form-control form-control-solid mb-3 mb-lg-0 @error('date') border-danger @enderror" placeholder="تاریخ شروع" wire:model.debounce.lazy="date" />
                                            <div class="fv-plugins-message-container invalid-feedback"></div>

                                            @error('date')
                                            <div class="fv-plugins-message-container invalid-feedback"><div data-field="first-name" data-validator="notEmpty">{{ $message }}</div></div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <input type="time" class="form-control form-control-solid mb-3 mb-lg-0 @error('time') border-danger @enderror" placeholder="مدت امتحان" wire:model.debounce.lazy="time" />
                                            <div class="fv-plugins-message-container invalid-feedback"></div>

                                            @error('time')
                                            <div class="fv-plugins-message-container invalid-feedback"><div data-field="first-name" data-validator="notEmpty">{{ $message }}</div></div>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->

                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">
                                    <span class="required">مدت امتحان ( دقیقه )</span>
                                </label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row fv-plugins-icon-container">

                                    <input type="text" class="form-control form-control-solid mb-3 mb-lg-0 @error('period') border-danger @enderror" wire:model.debounce.lazy="period">
                                    <div class="fv-plugins-message-container invalid-feedback"></div>

                                    @error('period')
                                        <div class="fv-plugins-message-container invalid-feedback"><div data-field="first-name" data-validator="notEmpty">{{ $message }}</div></div>
                                    @enderror

                                </div>
                                <!--end::Col-->
                            </div>

                            <hr>

                            <div class="d-flex justify-content-between">
                                <h3>سوالات</h3>
                                <button wire:click="addExam()" type="button" class="btn btn-sm btn-primary btn-hover-scale">افزودن</button>
                            </div>

                            <div class="mt-5 mb-5">

                                <p class="d-flex align-items-center">
                                    <span class="text-danger fs-1 me-3">*</span>
                                    <span class="fs-5">در صورتی که نمره های سوال را وارد نکنید نمره 1 در نظر گرفته میشود.</span>
                                </p>

                                <div class="row">
                                    <div class="col-md-10">
                                        <input type="text" class="form-control form-control-solid @error('questions.0.title') border-danger @enderror" placeholder="سوال را وارد کنید..." wire:model="questions.0.title">
                                        @error('questions.0.title' ) <div class="fv-plugins-message-container invalid-feedback"><div data-field="first-name" data-validator="notEmpty">{{ $message }}</div></div> @enderror
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control form-control-solid @error('questions.0.score') border-danger @enderror" placeholder="نمره را وارد کنید..." wire:model="questions.0.score">
                                        @error('questions.0.score') <div class="fv-plugins-message-container invalid-feedback"><div data-field="first-name" data-validator="notEmpty">{{ $message }}</div></div> @enderror
                                    </div>

                                </div>
                                @error('questions.0') <div class="fv-plugins-message-container invalid-feedback"><div data-field="first-name" data-validator="notEmpty">{{ $message }}</div></div> @enderror
                            </div>

                            @foreach( $exams as $index => $exam )

                                <div class="row mb-5">
                                    <div class="col-md-10">
                                        <input type="text" class="form-control form-control-solid @error('questions.*' . $index+1 . '.title') border-danger @enderror" placeholder="سوال را وارد کنید..." wire:model="questions.{{ $index+1 }}.title" >
                                        @error('questions.*' . $index+1 . '.title' ) <div class="fv-plugins-message-container invalid-feedback"><div data-field="first-name" data-validator="notEmpty">{{ $message }}</div></div> @enderror
                                    </div>

                                    <div class="col-md-2">
                                        <input type="text" class="form-control form-control-solid @error('questions.*' . $index+1 . '.score') border-danger @enderror" placeholder="نمره را وارد کنید..." wire:model="questions.{{ $index+1 }}.score" >
                                        @error('questions.*' . $index+1 . '.score') <div class="fv-plugins-message-container invalid-feedback"><div data-field="first-name" data-validator="notEmpty">{{ $message }}</div></div> @enderror
                                    </div>
                                </div>
                            @endforeach


                            {{--<div>
                                        <button type="button" class="btn btn-sm btn-danger btn-hover-scale">حذف سوال</button>
                                        <button type="button" class="btn btn-sm btn-success btn-hover-scale"> افزودن جواب </button>
                                    </div>--}}
                            <button type="submit" class="btn btn-primary btn-sm btn-hover-scale">ذخیره</button>

                            <button type="button" class="btn btn-sm btn-light btn-active-light-primary btn-hover-scale ms-2" wire:click="cansel">انصراف</button>
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
