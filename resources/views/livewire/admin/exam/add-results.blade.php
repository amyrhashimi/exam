<div>
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <div id="kt_content_container" class="container-xxl">
                <div class="card">
                    {{-- HEADER CARD --}}

                    {{-- BODY CARD --}}
                    <div class="card-body pt-3">
                        <h5 class="fw-normal" style="line-height: 2">{{ $question->title }}</h5>
                        <hr>
                        @php
                            $exam = App\Models\Exam::whereId($question->exam_id)->first();
                        @endphp

                        <div class="d-flex @if($exam->date < date('Y-m-d') OR ( $exam->date == date('Y-m-d') AND $exam->time < date('H:i:s') )) justify-content-end @else justify-content-between @endif">

                            @if ($exam->date > date('Y-m-d') OR ( $exam->date == date('Y-m-d') AND $exam->time > date('H:i:s') ))
                                <button wire:click="addResult" type="button" class="btn btn-sm btn-primary btn-hover-scale"> @lang('examAdmin.addResult') </button>
                            @endif

                            <div class="d-flex">
                                <button wire:click="Results" type="button" class="btn btn-sm btn-primary btn-hover-scale">@lang('examAdmin.save')</button>
                                <button wire:click="comeBack" type="button" class="btn btn-sm btn-light btn-active-light-primary btn-hover-scale ms-3"> @lang('examAdmin.back') </button>
                            </div>
                        </div>




                        {{-- NEW RESULT --}}
                        <form wire:submit.prevent="Results">
                            @foreach ( $results as $index => $item )
                                <div class="input-group my-3">
                                    <span class="input-group-text">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" @if ($correct == $index+1) checked @endif value="{{ $index+1 }}" wire:model="correct">
                                        </div>
                                    </span>
                                    <input type="text" class="form-control @error('results.'.$index.'.answer') border-danger @enderror" wire:model.debouce.lazy="results.{{ $index }}.answer" >
                                    <button wire:click="destroy({{ $index }})" type="button" class="btn btn-danger input-group-text">@lang('examAdmin.delete')</button>
                                </div>
                            @endforeach

                            @error('correct')
                                <div class="fv-plugins-message-container invalid-feedback"><div data-field="first-name" data-validator="notEmpty"> @lang('examAdmin.required') </div></div>
                            @enderror
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
