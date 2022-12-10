<?php

namespace App\Http\Livewire\Portal\Exam;

use App\Models\Answer;
use App\Models\Exam;
use App\Models\Question;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Single extends Component
{
    public $exam;
    public $questions;
    public $date;

    public $m = 00;
    public $s = 01;

    public function mount()
    {
        $this->exam = Exam::whereSlug( last(request()->segments()) )->firstOrFail();
        $this->questions = collect([]);

        // M And S Timer
        $end = Answer::where('user_id', auth()->user()->id)->where('exam_id', $this->exam->id)->orderBy('id')->first()->created_at->timestamp + $this->exam->period * 60 ;
        $now = now()->timestamp;

        if ( $end > $now ) {
            $over = gmdate('H:i:s', $end - $now);
            $explode = explode(':', $over);

            $explode[0] > 0  ? $explode[1] += $explode[0] * 60 : '' ;

            $this->m = $explode[1];
            $this->s = $explode[2];
        }


        ! Session::has('questions') ? Session::put('questions', $this->exam->questions()->get()->random($this->exam->random )->pluck('id')->toArray() ) : '';


        foreach ( Session::get('questions') as $index => $value) {
            $question = Question::find( $value );
            $this->questions->put($index, $question);
        }



        $this->date = Answer::where('user_id', auth()->user()->id )->where('exam_id', $this->exam->id)->first()->created_at->format('Y/m/d H:i:s');

        if( Answer::where('user_id', auth()->user()->id )->where('exam_id', $this->exam->id)->where('question_id', null)->count() == 1 ) {
            Answer::where('user_id', auth()->user()->id )->where('exam_id', $this->exam->id)->update([
                'questions' => implode("-", Session::get('questions'))
            ]);
        }

    }
    public function render()
    {
        return view('livewire.portal.exam.single');
    }

    public function comeBack()
    {
        Session::has('questions') ? Session::forget('questions') : '';
        return redirect()->route('exams.all')->with('success', ' امیدوارم امتحان خوبی بوده باشد.');
    }
}
