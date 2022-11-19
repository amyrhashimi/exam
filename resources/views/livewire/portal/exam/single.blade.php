<div>

    <div class="container">

        @if( $exam->period * 60 + \Morilog\Jalali\Jalalian::forge( $exam->date . $exam->time )->getTimestamp() < \Morilog\Jalali\Jalalian::now()->getTimestamp() )
            <div class="d-flex justify-content-end">
                <button wire:click="comeBack()" type="button" class="btn btn-sm btn-light-primary btn-hover-scale btn-color-primary btn-active-primary btn-active-color-wihte ">بازگشت</button>
            </div>
        @endif

        @foreach( $exam->questions()->get() as $index => $question )
            <livewire:portal.exam.single-question :index="$index" :question="$question" />
        @endforeach

    </div>

</div>
