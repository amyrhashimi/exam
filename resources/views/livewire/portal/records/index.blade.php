<div>
    <div>

        <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
            <div class="post d-flex flex-column-fluid" id="kt_post">
                <div id="kt_content_container" class="container-xxl">
                    <div class="card">
                        {{-- HEADER CARD --}}
                        <div class="card-header border-0 pt-6">
                            <div class="card-title">
                                کارنامه ها
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
                                        <input type="text" class="form-control" placeholder="امتحان را جستجو کنید ..." wire:model="search">
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- BODY CARD --}}
                        <div class="card-body pt-0">
                            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">

                                <thead>

                                <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                    <th class="min-w-125px">نام امتحان</th>
                                    <th class="min-w-125px">تعداد سوالات</th>
                                    <th class="min-w-125px">سوالات صحیح</th>
                                    <th class="min-w-125px">تاریخ امتحان</th>
                                    <th class="min-w-125px">نمره</th>
                                    <th class="min-w-125px">وضعیت</th>
                                </tr>

                                </thead>

                                <tbody class="text-gray-600 fw-bold" >

                                @foreach( $exams as $exam )

                                    @php
                                        $answers = \App\Models\Answer::where('user_id', auth()->user()->id )->where('exam_id', $exam->id )->get();
                                        $number = 0;
                                        $question_true = 0;
                                        foreach ( $answers as $answer) {
                                            $result = \App\Models\Result::where('question_id', $answer->question_id)->whereId($answer->result_id)->first();

                                            if ($result->correct == 1) {
                                                $question = \App\Models\Question::whereId($result->question_id)->firstOrFail();
                                                $number += $question->score;
                                                $question_true =  $question_true+1 ;
                                            }

                                        }
                                    @endphp

                                    <tr>
                                        <td class="d-flex align-items-center">
                                            <div class="d-flex flex-column">
                                                <a wire:click="single({{ $exam->id }})" href="#" class="text-gray-800 text-hover-primary mb-1">
                                                    {{ \Illuminate\Support\Str::limit($exam->title, 15 , '...')  }}
                                                </a>
                                            </div>
                                        </td>

                                        <td>
                                            {{ $exam->questions()->count() }}
                                        </td>

                                        <td>
                                            {{ $question_true }}
                                        </td>

                                        <td>
                                            {{ \Morilog\Jalali\Jalalian::forge($exam->date)->format('Y/m/d') }}
                                        </td>

                                        <td>
                                            {{ $number }}
                                        </td>

                                        <td>
                                            @if( $number >= 10 )
                                                قبول
                                            @else
                                                مردود
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>

                            </table>


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
