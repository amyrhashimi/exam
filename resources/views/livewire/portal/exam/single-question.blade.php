<div>
    <div class="card shadow-sm mt-5">
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

                @if(session()->has('success_' . $question->exam_id . '_' . $question->id ))
                    <div class="alert alert-success d-flex align-items-center p-5 mb-10">

                        <span class="svg-icon svg-icon-2hx svg-icon-success me-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path opacity="0.3" d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z" fill="black"></path>
                                <path d="M10.5606 11.3042L9.57283 10.3018C9.28174 10.0065 8.80522 10.0065 8.51412 10.3018C8.22897 10.5912 8.22897 11.0559 8.51412 11.3452L10.4182 13.2773C10.8099 13.6747 11.451 13.6747 11.8427 13.2773L15.4859 9.58051C15.771 9.29117 15.771 8.82648 15.4859 8.53714C15.1948 8.24176 14.7183 8.24176 14.4272 8.53714L11.7002 11.3042C11.3869 11.6221 10.874 11.6221 10.5606 11.3042Z" fill="black"></path>
                            </svg>
                        </span>

                        <div class="d-flex flex-column">
                            <h5 class="mb-1 text-success">{{ session()->get('success_' . $question->exam_id . '_' . $question->id) }}</h5>
                        </div>

                        <button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
                            <span class="svg-icon svg-icon-2x svg-icon-light">
                                <i class="bi bi-x fs-1 text-success"></i>
                            </span>
                        </button>

                    </div>
                @endif

                <div class="row">
                    @foreach($question->results()->get() as $index => $result)
                        <div class="col-lg-6 col-md-6 col-sm-12 mt-4">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault_{{ $result->question_id }}" id="flexRadio_{{ $result->question_id . '_' . $index }}" value="{{ $result->id }}" wire:model="result" wire:click="answerClick({{ $question->exam_id }}, {{ $question->id }}, {{ $result->id }})">
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
