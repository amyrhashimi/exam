<?php

namespace App\Http\Livewire\Portal\Exam;

use App\Models\Answer;
use App\Models\Exam;
use Livewire\Component;

class SingleQuestion extends Component
{
    public $index;
    public $question;
    public $result;

    public function mount()
    {
        ! auth()->user()->exams()->where('exam_id', $this->question->exam_id )->count() ? auth()->user()->exams()->attach($this->question->exam_id) : '' ;

        if ( Answer::where( 'exam_id', $this->question->exam_id )->where( 'question_id', $this->question->id )->count() )
        {
            $this->result = Answer::where( 'exam_id', $this->question->exam_id )->where( 'question_id', $this->question->id )->first()->result_id ;
        }
    }

    public function render()
    {
        return view('livewire.portal.exam.single-question');
    }

    public function answerClick($exam_id, $question_id, $result_id)
    {
        $exam = Exam::whereId($this->question->exam_id)->firstOrFail();
        $first = Answer::where('user_id', auth()->user()->id )->where('exam_id', $exam->id )->first()->created_at->format('Y/m/d H:i:s');

        if ( $exam->period * 60 + \Morilog\Jalali\Jalalian::forge( $first )->getTimestamp() < \Morilog\Jalali\Jalalian::now()->getTimestamp() )
            return redirect()->route('exams.single', $exam->slug)->with('error', 'زمان امتحان تمام شده است.');


        if ( Answer::where('user_id', auth()->user()->id )->where('exam_id', $exam_id )->where('question_id', $question_id )->count() )
        {
            Answer::where('user_id', auth()->user()->id )->where('exam_id', $exam_id )->where('question_id', $question_id )->update([
                'result_id' => $result_id
            ]);

            $this->result = $result_id;
            $title_session = 'success_' . $exam_id . '_' . $question_id;
            session()->flash($title_session, 'جواب سوال تغییر کرد.');
        }
        else
        {

            if( Answer::where('user_id', auth()->user()->id )->where('exam_id', $exam->id)->where('question_id', null)->count() == 1 ) {
                Answer::where('user_id', auth()->user()->id )->where('exam_id', $exam->id)->update([
                    'question_id' => $question_id,
                    'result_id' => $result_id
                ]);
            }
            else{
                Answer::create([
                    'user_id' => auth()->user()->id,
                    'exam_id' => $exam_id,
                    'question_id' => $question_id,
                    'result_id' => $result_id,
                ]);
            }
            $this->result = $result_id;
            $title_session = 'success_' . $exam_id . '_' . $question_id;
            session()->flash($title_session, 'جواب شما ذخیره شد');
        }

    }
}
