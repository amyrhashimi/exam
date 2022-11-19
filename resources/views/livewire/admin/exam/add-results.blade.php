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
                                <button wire:click="addResult" type="button" class="btn btn-sm btn-primary btn-hover-scale"> افزودن جواب</button>
                            @endif

                            
                            <div class="d-flex">
                                <button wire:click="Results" type="button" class="btn btn-sm btn-primary btn-hover-scale">ذخیره</button>
                                <button wire:click="comeBack" type="button" class="btn btn-sm btn-light btn-active-light-primary btn-hover-scale ms-3">بازگشت</button>
                            </div>
                        </div>
                                
                            
                        
                        

                        {{-- NEW RESULT --}}
                        <form wire:submit.prevent="Results">
                        @foreach ( $resultsOld as $index => $item )
                            <div class="d-flex align-items-center my-4 w-75">

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" wire:model="resultsOld.{{ $index }}.correct">
                                </div>

                                <input type="text" class="form-control form-control-solid @error('resultsOld.'.$index.'.answer') border-danger @enderror" wire:model.debouce.lazy="resultsOld.{{ $index }}.answer">

                                <button wire:click="destroy({{ $index }})" type="button" class="btn btn-danger">حذف</button>
                            </div>
                        @endforeach

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
