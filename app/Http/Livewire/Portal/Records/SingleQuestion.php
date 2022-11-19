<?php

namespace App\Http\Livewire\Portal\Records;

use App\Models\Answer;
use App\Models\Exam;
use App\Models\Result;
use Livewire\Component;

class SingleQuestion extends Component
{
    public $index;
    public $question;
    public $result;
    public $status = 'danger';

    public function mount()
    {
        if ( Answer::where( 'exam_id', $this->question->exam_id )->where( 'question_id', $this->question->id )->count() )
        {
            $this->result = Answer::where( 'exam_id', $this->question->exam_id )->where( 'question_id', $this->question->id )->first()->result_id ;
        }

        foreach ($this->question->results()->get() as $result) {
            if ($result->id == $this->result AND $result->correct == 1) {
                $this->status = 'success';
            }
        }
    }

    public function render()
    {
        return view('livewire.portal.records.single-question');
    }

    public function refresh()
    {
        $exam = Exam::whereId($this->question->exam_id)->first()->slug;
        return redirect()->route('records.single', $exam)->with('error', 'شما نمیتوانید جواب را تغییر دهید.');
    }
}
