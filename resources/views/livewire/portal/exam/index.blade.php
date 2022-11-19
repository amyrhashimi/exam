<div>
    <div class="container">

        <div class="row">
            <div class="col-md-6 mt-5">
                <h4 class="fw-normal">تمام امتحان ها</h4>
            </div>

            <div class="col-md-6 mt-5">
                <div class="d-flex">
                    <select class="form-select" wire:model="paginate">
                        <option value="15">15</option>
                        <option value="30">30</option>
                        <option value="45">45</option>
                    </select>
                    <input wire:model="search" type="text" class="form-control  ms-5" placeholder="امتحان را جستجو کنید ">
                </div>
            </div>
        </div>

        @foreach ( $exams->chunk(3) as $exam)
            <div class="row mt-5">
                @foreach ( $exam as $item )
                    <div class="col-md-4">
                        <div class="card shadow-sm">
                            <div class="card-header">
                                <h3 class="card-title">{{ $item->title }}</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-auto">
                                        تاریخ شروع :
                                    </div>
                                    <div class="col-auto">
                                        {{ $item->date }}
                                    </div>
                                </div>

                                <div class="row mt-5">
                                    <div class="col-auto">
                                        ساعت شروع
                                    </div>
                                    <div class="col-auto">
                                        {{ $item->time }}
                                    </div>
                                </div>

                                <div class="row mt-5">
                                    <div class="col-auto">
                                        مدت امتحان
                                    </div>
                                    <div class="col-auto">
                                        {{ $item->period . ' ' . 'دقیقه' }}
                                    </div>
                                </div>
                            </div>

                             @if (\Morilog\Jalali\Jalalian::forge( $item->date . $item->time )->getTimestamp() < \Morilog\Jalali\Jalalian::now()->getTimestamp() )
                                <div class="card-footer">
                                @if($item->period * 60 + \Morilog\Jalali\Jalalian::forge( $item->date . $item->time )->getTimestamp()  < \Morilog\Jalali\Jalalian::now()->getTimestamp() )

                                    <span class="badge badge-light-danger fs-8 fw-bolder">امتحان تمام شده است.</span>
                                @else
                                    <div class="row align-items-center">
                                        <div class="col-md-6">
                                            <span class="badge badge-light-primary fs-8 fw-bolder">امتحان برگزار شده است.</span>
                                        </div>
                                        <div class="col-md-6">
                                            <button type="button" class="btn btn-sm btn-primary btn-hover-scale" wire:click="startExam({{ $item->id }})">شرکت در امتحان</button>
                                        </div>
                                    </div>
                                @endif

                                </div>
                             @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach


        <ul class="pagination pagination-rounded justify-content-end my-2">
            {{ $exams->appends( request()->query() )->links() }}
        </ul>
    </div>
</div>
