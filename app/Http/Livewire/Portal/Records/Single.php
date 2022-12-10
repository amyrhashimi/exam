<?php

namespace App\Http\Livewire\Portal\Records;

use App\Models\Answer;
use App\Models\Exam;
use App\Models\Question;
use Livewire\Component;
use Morilog\Jalali\Jalalian;

class Single extends Component
{
    public $exam;
    public $questions;

    public function mount()
    {
        $this->exam = Exam::whereSlug( last(request()->segments()) )->first();
        if( is_null( $this->exam ) ) return redirect()->route('records')->with('error', trans('records.redirect'));

        if( Jalalian::forge( $this->exam->date_end . $this->exam->time_end )->getTimestamp() > Jalalian::now()->getTimestamp() ) return redirect()->route('records')->with('warning', trans('records.whereHas'));

        $questions = Answer::where('user_id', auth()->user()->id)
                    ->where('exam_id', $this->exam->id)
                    ->orderBy('id')
                    ->first()->questions;

        $questions = explode('-',$questions);

        $this->questions = Question::whereIn('id', $questions)->get();
    }

    public function render()
    {
        return view('livewire.portal.records.single');
    }

    public function comeBack()
    {
        return redirect()->route('records');
    }
}
