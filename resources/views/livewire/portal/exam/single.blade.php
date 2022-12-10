<div>

    <div class="container">


            <div class="d-flex justify-content-between">
                <div> <span id="timer" class="bg-primary rounded px-4 py-2 text-white "></span> </div>


                @if( $exam->period * 60 + \Morilog\Jalali\Jalalian::forge( $date )->getTimestamp() < \Morilog\Jalali\Jalalian::now()->getTimestamp() )
                    <button wire:click="comeBack()" type="button" class="btn btn-sm btn-light-primary btn-hover-scale btn-color-primary btn-active-primary btn-active-color-wihte ">بازگشت</button>
                @endif
            </div>

        @foreach( $questions as $index => $question )
            <livewire:portal.exam.single-question :index="$index" :question="$question" />
        @endforeach

    </div>

</div>

@section('script')
    <script>
        document.getElementById('timer').innerHTML =
        {{ $m }} + ":" + {{ $s }};
        startTimer();

        function startTimer() {
            var presentTime = document.getElementById('timer').innerHTML;
            var timeArray = presentTime.split(/[:]+/);
            var m = timeArray[0];
            var s = checkSecond((timeArray[1] - 1));
            if(s==59){m=m-1}
            document.getElementById('timer').innerHTML = m + ":" + s;
            
            if ( m > 0 ) {
                setTimeout(startTimer, 1000);
            }else{
                if(s >= 1){ setTimeout(startTimer, 1000); }
            }

        }

        function checkSecond(sec) {
            if (sec < 10 && sec >= 0) {sec = "0" + sec}; // add zero in front of numbers < 10
            if (sec < 0) {sec = "59"};
            return sec;
        }
    </script>
@endsection
