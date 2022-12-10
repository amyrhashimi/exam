<div>
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <div id="kt_content_container" class="container-xxl">
                <div class="card">
                    {{-- HEADER CARD --}}
                    <div class="card-header border-0 pt-3 pb-3 d-flex justify-content-between">
                        <div class="card-title">
                            @lang('examAdmin.questions')
                        </div>

                        <div>
                            <button type="button" class="btn btn-sm btn-primary btn-hover-scale" wire:click="add_questions()">@lang('examAdmin.addQuestion')</button>
                        </div>
                    </div>

                    {{-- BODY CARD --}}
                    <div class="card-body pt-0">
                        {{-- ALL QUESTIONS --}}
                        @foreach( $questions as $index => $question )
                            <div class="row">
                                <div class="col-md-8">
                                    <h5 class="fw-normal">{{ $index+1 . '-' }} {{ $question->title }}</h5>
                                </div>
                                <div class="col-md-4">

                                    <button type="button" wire:click="addResult({{ $question->id }})" class="btn btn-primary btn-sm btn-hover-scale">
                                        @if ($exam->date < date('Y-m-d') OR ( $exam->date == date('Y-m-d') AND $exam->time < date('H:i:s') ))
                                            @lang('examAdmin.showQuestion')
                                        @else
                                            @lang('examAdmin.addResult')
                                        @endif

                                    </button>

                                    @if ($exam->date > date('Y-m-d') OR ( $exam->date == date('Y-m-d') AND $exam->time > date('H:i:s') ))
                                        <button type="button" wire:click="destroy({{ $question->id }})" class="btn btn-danger btn-sm btn-hover-scale">@lang('examAdmin.deleteQuestion')</button>
                                    @endif

                                </div>

                                <hr class="mt-2">
                            </div>
                        @endforeach

                        <button type="button" class="btn btn-sm btn-light btn-active-light-primary btn-hover-scale ms-2" wire:click="comeBack()">@lang('examAdmin.back')</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
