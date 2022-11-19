<?php

namespace App\Http\Livewire\Admin\Exam;

use App\Models\Question;
use App\Models\Result;
use Livewire\Component;

class AddResults extends Component
{

    public Question $question;
    public $resultsOld;

    protected $rules = [
        'resultsOld.*.answer' => 'required',
        'resultsOld.*.correct' => 'nullable|boolean',
        'resultsOld.*.question_id' => 'required'
    ];
    
    public function updated($name)
    {
        $this->validateOnly($name);
    }

    public function mount()
    {
        $this->resultsOld = Result::where('question_id', $this->question->id)->get();
    }

    public function render()
    {
        return view('livewire.admin.exam.add-results');
    }

    public function addResult()
    {
        $this->resultsOld->push( new Result(['question_id' => $this->question->id]) );
    }

    public function Results()
    {
        $this->validate();

        foreach ( $this->resultsOld as $item) {

            if($item->correct == null)
            {
                unset($item->correct);
            }

            $item->save();
        }

        return redirect()->route('exams.questions', $this->question->exam_id )->with('success', 'جواب ها با موفقیت ذخیره شد');
    }

    public function comeBack()
    {
        return redirect()->route('exams.questions', $this->question->exam_id);
    }

    public function destroy($index)
    {
        $result = $this->resultsOld[$index];
        $this->resultsOld->forget($index);

        $result->delete();

        return redirect()->route('exams.addResults', $this->question->id)->with('success', 'جواب با موفقیت حذف شد.');
    }
}
