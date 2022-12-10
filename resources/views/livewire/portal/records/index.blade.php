<div>
    <div>

        <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
            <div class="post d-flex flex-column-fluid" id="kt_post">
                <div id="kt_content_container" class="container-xxl">
                    <div class="card">
                        {{-- HEADER CARD --}}
                        <div class="card-header border-0 pt-6">
                            <div class="card-title">
                                @lang('records.records')
                            </div>
                            <div class="card-toolbar">
                                <div class="row">
                                    <div class="col-auto">
                                        <select class="form-control" wire:model="paginate">
                                            <option value="10">10</option>
                                            <option value="15">15</option>
                                            <option value="20">20</option>
                                        </select>
                                    </div>

                                    <div class="col-auto">
                                        <input type="text" class="form-control" placeholder="@lang('examAdmin.search')" wire:model="search">
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- BODY CARD --}}
                        <div class="card-body pt-0">
                            <div class="table-responsive">
                                <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">

                                    <thead>

                                    <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                        <th class="min-w-125px">@lang('records.name')</th>
                                        <th class="min-w-125px">@lang('records.count')</th>
                                        <th class="min-w-125px">@lang('records.countTrue')</th>
                                        <th class="min-w-125px">@lang('records.date')</th>
                                        {{-- <th class="min-w-125px">@lang('records.score')</th> --}}
                                        <th class="min-w-125px">@lang('records.status')</th>
                                        <th class="min-w-125px">@lang('records.option')</th>
                                    </tr>

                                    </thead>

                                    <tbody class="text-gray-600 fw-bold" >

                                    @foreach( $exams as $exam )

                                        @php
                                            $answers = \App\Models\Answer::where('user_id', auth()->user()->id )->where('exam_id', $exam->id )->get();
                                            $count = \App\Models\Answer::where('user_id', auth()->user()->id )->where('exam_id', $exam->id )->orderBy('id')->first();
                                            $count = explode('-', $count->questions);
                                            $number = 0;
                                            $question_true = 0;
                                            foreach ( $answers as $answer) {
                                                $result = \App\Models\Result::where('question_id', $answer->question_id)->whereId($answer->result_id)->first();

                                                if ($result->correct == 1) {
                                                    $question = \App\Models\Question::whereId($result->question_id)->firstOrFail();
                                                    // $number += $question->score;
                                                    $question_true =  $question_true+1 ;
                                                }
                                            }
                                        @endphp

                                        <tr>
                                            <td>
                                                <a wire:click="single({{ $exam->id }})" href="#" class="text-gray-800 text-hover-primary mb-1">
                                                    {{ \Illuminate\Support\Str::limit($exam->title, 15 , '...')  }}
                                                </a>
                                            </td>

                                            <td>
                                                {{ count($count) ?? 0 }}
                                            </td>

                                            <td>
                                                {{ $question_true }}
                                            </td>

                                            <td>
                                                {{ \Morilog\Jalali\Jalalian::forge($exam->date)->format('Y/m/d') }}
                                            </td>

                                            {{-- <td>
                                                {{ $number }}
                                            </td> --}}

                                            <td>
                                                @if( $question_true > count($count) / 2 )
                                                    @lang('records.true')
                                                @else
                                                    @lang('records.false')
                                                @endif
                                            </td>

                                            <td>
                                                <a href="" class="text-dark" wire:click.prevent="single({{ $exam->id }})">
                                                    <span class="svg-icon svg-icon-muted svg-icon-2hx">
                                                        <svg width="10" height="10" fill="none" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg"><path d="M12 9.005a4 4 0 1 1 0 8 4 4 0 0 1 0-8ZM12 5.5c4.613 0 8.596 3.15 9.701 7.564a.75.75 0 1 1-1.455.365 8.503 8.503 0 0 0-16.493.004.75.75 0 0 1-1.455-.363A10.003 10.003 0 0 1 12 5.5Z" fill="#a1a5b7"/></svg>
                                                    </span>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>

                                </table>
                            </div>


                            <ul class="pagination pagination-rounded justify-content-end my-2">
                                {{ $exams->appends( request()->query() )->links() }}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
