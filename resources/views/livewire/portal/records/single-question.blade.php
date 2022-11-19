<div>
    <div class="card shadow-sm mt-5 border border-{{$status }}">
        <div class="card-header collapsible cursor-pointer rotate" data-bs-toggle="collapse" data-bs-target="#kt_docs_card_collapsible_{{ $index }}">
            <h3 class="card-title">{{ $question->title }}</h3>
            <div class="card-toolbar rotate-180">
                <span class="svg-icon svg-icon-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <rect opacity="0.5" x="11" y="18" width="13" height="2" rx="1" transform="rotate(-90 11 18)" fill="black"></rect>
                        <path d="M11.4343 15.4343L7.25 11.25C6.83579 10.8358 6.16421 10.8358 5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75L11.2929 18.2929C11.6834 18.6834 12.3166 18.6834 12.7071 18.2929L18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25C17.8358 10.8358 17.1642 10.8358 16.75 11.25L12.5657 15.4343C12.2533 15.7467 11.7467 15.7467 11.4343 15.4343Z" fill="black"></path>
                    </svg>
                </span>
            </div>
        </div>
        <div id="kt_docs_card_collapsible_{{ $index }}" class="collapse show">
            <div class="card-body">
                <div class="row">
                    @foreach($question->results()->get() as $index => $result)
                        <div class="col-lg-6 col-md-6 col-sm-12 mt-4">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault_{{ $result->question_id }}" id="flexRadio_{{ $result->question_id . '_' . $index }}" value="{{ $result->id }}" wire:model="result" wire:click="refresh()">
                                <label class="form-check-label" for="flexRadio_{{ $result->question_id . '_' . $index }}">
                                    {{ $result->answer }}
                                </label>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
