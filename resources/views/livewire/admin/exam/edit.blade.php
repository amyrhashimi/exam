<div>
    <div class="d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <div id="kt_content_container" class="container-xxl">
                <div class="card mt-10">
                    {{-- HEADER CARD --}}
                    <div class="card-header border-0 pt-6">
                        <div class="card-title">
                            @lang('examAdmin.editExam')
                        </div>
                    </div>

                    {{-- BODY CARD --}}
                    <div class="card-body pt-0">

                        @if ( $exam->date_end < date('Y-m-d') OR ( $exam->date_end == date('Y-m-d') AND $exam->time_end < date('H:i:s') ) )
                            <div class="alert alert-danger d-flex align-items-center p-5 mb-10">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen048.svg-->
                                <span class="svg-icon svg-icon-2hx svg-icon-danger me-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path opacity="0.3" d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z" fill="black"></path>
                                        <path d="M10.5606 11.3042L9.57283 10.3018C9.28174 10.0065 8.80522 10.0065 8.51412 10.3018C8.22897 10.5912 8.22897 11.0559 8.51412 11.3452L10.4182 13.2773C10.8099 13.6747 11.451 13.6747 11.8427 13.2773L15.4859 9.58051C15.771 9.29117 15.771 8.82648 15.4859 8.53714C15.1948 8.24176 14.7183 8.24176 14.4272 8.53714L11.7002 11.3042C11.3869 11.6221 10.874 11.6221 10.5606 11.3042Z" fill="black"></path>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                                <div class="d-flex flex-column">
                                    <h4 class="mb-1 text-danger"> @lang('examAdmin.textEnd') </h4>
                                    <span> @lang('examAdmin.descEnd') </span>
                                </div>
                            </div>
                        @elseif ( $exam->date < date('Y-m-d') OR ( $exam->date == date('Y-m-d') AND $exam->time < date('H:i:s') ) )
                            <div class="alert alert-warning d-flex align-items-center p-5 mb-10">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen048.svg-->
                                <span class="svg-icon svg-icon-2hx svg-icon-warning me-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path opacity="0.3" d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z" fill="black"></path>
                                        <path d="M10.5606 11.3042L9.57283 10.3018C9.28174 10.0065 8.80522 10.0065 8.51412 10.3018C8.22897 10.5912 8.22897 11.0559 8.51412 11.3452L10.4182 13.2773C10.8099 13.6747 11.451 13.6747 11.8427 13.2773L15.4859 9.58051C15.771 9.29117 15.771 8.82648 15.4859 8.53714C15.1948 8.24176 14.7183 8.24176 14.4272 8.53714L11.7002 11.3042C11.3869 11.6221 10.874 11.6221 10.5606 11.3042Z" fill="black"></path>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                                <div class="d-flex flex-column">
                                    <h4 class="mb-1 text-warning"> @lang('examAdmin.textStart') </h4>
                                    <span> @lang('examAdmin.descStart') </span>
                                </div>
                            </div>
                        @endif


                        <form wire:submit.prevent="update">

                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-bold fs-6">
                                    <span class="required">@lang('examAdmin.titleSlug')</span>
                                </label>
                                <div class="col-lg-8 fv-row fv-plugins-icon-container">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="text" class="form-control form-control-solid mb-3 mb-lg-0 @error('title') border-danger @enderror" @if($exam->date < date('Y-m-d')) disabled @elseif ($exam->date == date('Y-m-d') AND $exam->time < date('H:i:s')) disabled @endif placeholder="@lang('examAdmin.title')" wire:model="title" />
                                            <div class="fv-plugins-message-container invalid-feedback"></div>

                                            @error('title')
                                            <div class="fv-plugins-message-container invalid-feedback"><div data-field="first-name" data-validator="notEmpty">{{ $message }}</div></div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <input type="text" class="form-control form-control-solid mb-3 mb-lg-0 @error('slug') border-danger @enderror" @if($exam->date < date('Y-m-d')) disabled @elseif ($exam->date == date('Y-m-d') AND $exam->time < date('H:i:s')) disabled @endif placeholder="@lang('examAdmin.slug')" wire:model="slug" />
                                            <div class="fv-plugins-message-container invalid-feedback"></div>

                                            @error('slug')
                                            <div class="fv-plugins-message-container invalid-feedback"><div data-field="first-name" data-validator="notEmpty">{{ $message }}</div></div>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-bold fs-6">
                                    <span class="required">@lang('examAdmin.lesson')</span>
                                </label>
                                <div class="col-lg-8 fv-row fv-plugins-icon-container">

                                    <select wire:model="lesson_id" class="form-select form-select-solid @error('lesson_id') border-danger @enderror" @if($exam->date < date('Y-m-d')) disabled @elseif ($exam->date == date('Y-m-d') AND $exam->time < date('H:i:s')) disabled @endif data-placeholder="@lang('examAdmin.lessonSelect')">
                                        @foreach( \App\Models\Lesson::latest()->get() as $lesson)
                                            <option value="{{ $lesson->id }}" {{ $lesson_id == $lesson->id ? 'selected' : '' }}> {{ $lesson->title }} </option>
                                        @endforeach
                                    </select>
                                    <div class="fv-plugins-message-container invalid-feedback"></div>

                                    @error('lesson_id')
                                        <div class="fv-plugins-message-container invalid-feedback"><div data-field="first-name" data-validator="notEmpty">{{ $message }}</div></div>
                                    @enderror

                                </div>
                            </div>

                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">
                                    <span class="required">@lang('examAdmin.dateTime')</span>
                                </label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row fv-plugins-icon-container">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="date" class="form-control form-control-solid mb-3 mb-lg-0 @error('date') border-danger @enderror" @if($exam->date < date('Y-m-d')) disabled @elseif ($exam->date == date('Y-m-d') AND $exam->time < date('H:i:s')) disabled @endif  wire:model.debounce.lazy="date" />
                                            <div class="fv-plugins-message-container invalid-feedback"></div>

                                            @error('date')
                                            <div class="fv-plugins-message-container invalid-feedback"><div data-field="first-name" data-validator="notEmpty">{{ $message }}</div></div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <input type="time" class="form-control form-control-solid mb-3 mb-lg-0 @error('time') border-danger @enderror" @if($exam->date < date('Y-m-d')) disabled @elseif ($exam->date == date('Y-m-d') AND $exam->time < date('H:i:s')) disabled @endif wire:model.debounce.lazy="time" />
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

                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">
                                    <span class="required">@lang('examAdmin.dateTimeEnd')</span>
                                </label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row fv-plugins-icon-container">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="date" class="form-control form-control-solid mb-3 mb-lg-0 @error('date_end') border-danger @enderror" @if($exam->date_end < date('Y-m-d')) disabled @elseif ($exam->date_end == date('Y-m-d') AND $exam->time_end < date('H:i:s')) disabled @endif wire:model.debounce.lazy="date_end" />
                                            <div class="fv-plugins-message-container invalid-feedback"></div>

                                            @error('date_end')
                                            <div class="fv-plugins-message-container invalid-feedback"><div data-field="first-name" data-validator="notEmpty">{{ $message }}</div></div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <input type="time" class="form-control form-control-solid mb-3 mb-lg-0 @error('time_end') border-danger @enderror" @if($exam->date_end < date('Y-m-d')) disabled @elseif ($exam->date_end == date('Y-m-d') AND $exam->time_end < date('H:i:s')) disabled @endif wire:model.debounce.lazy="time_end" />
                                            <div class="fv-plugins-message-container invalid-feedback"></div>

                                            @error('time_end')
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
                                    <span class="required">@lang('examAdmin.time')</span>
                                </label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row fv-plugins-icon-container">

                                    <input type="text" class="form-control form-control-solid mb-3 mb-lg-0 @error('period') border-danger @enderror" @if($exam->date < date('Y-m-d')) disabled @elseif ($exam->date == date('Y-m-d') AND $exam->time < date('H:i:s')) disabled @endif wire:model.debounce.lazy="period">
                                    <div class="fv-plugins-message-container invalid-feedback"></div>

                                    @error('period')
                                        <div class="fv-plugins-message-container invalid-feedback"><div data-field="first-name" data-validator="notEmpty">{{ $message }}</div></div>
                                    @enderror

                                </div>
                                <!--end::Col-->
                            </div>

                            <hr>

                            <div class="d-flex justify-content-between">
                                <h3>@lang('examAdmin.questions')</h3>
                                @if ( $exam->date > date('Y-m-d') OR ( $exam->date == date('Y-m-d') AND $exam->time > date('H:i:s') ) )
                                    <button wire:click="addExam()" type="button" class="btn btn-sm btn-primary btn-hover-scale">@lang('examAdmin.add')</button>
                                @endif
                            </div>

                            {{-- OLD QUESTIONS --}}
                            @foreach( $exams as $exam )
                                <div class="mt-5 mb-5 w-75">
                                    <input type="text" @if($exam->date < date('Y-m-d')) disabled @elseif ($exam->date == date('Y-m-d') AND $exam->time < date('H:i:s')) disabled @endif value="{{ $exam->title }}" class="form-control form-control-solid">
                                </div>
                            @endforeach

                            {{-- NEW QUESTIONS --}}
                            @foreach( $newExams as $index => $newExam )
                                <div class="mt-5 mb-5 w-75">
                                    <input type="text" class="form-control form-control-solid @error('questions.' . $index ) border-danger @enderror" wire:model="questions.{{ $index }}">
                                </div>

                                @error('questions.' . $index )
                                    <div class="fv-plugins-message-container invalid-feedback"><div data-field="first-name" data-validator="notEmpty">{{ $message }}</div></div>
                                @enderror
                            @endforeach

                            <button type="submit" class="btn btn-primary btn-sm btn-hover-scale">@lang('examAdmin.save')</button>

                            <button type="button" class="btn btn-sm btn-light btn-active-light-primary btn-hover-scale ms-2" wire:click="cansel">@lang('examAdmin.cancel')</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
