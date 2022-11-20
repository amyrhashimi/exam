<?php

namespace App\Http\Livewire\Admin\Exam;

use App\Models\Exam;
use App\Models\Question;
use Livewire\Component;

class AllQuestions extends Component
{
    public Exam $exam;
    public $questions;

    public function mount()
    {
        $this->questions = Question::where('exam_id', $this->exam->id)->get();
    }

    public function render()
    {
        return view('livewire.admin.exam.all-questions');
    }

    public function addResult($id)
    {
        return redirect()->route('exams.addResults', $id);
    }
    public function comeBack()
    {
        return redirect()->route('exams');
    }

    public function add_questions()
    {
        return redirect()->route('exams.edit', ['exam' => $this->exam->id , 'redirect' => true]);
    }

    public function destroy(Question $question)
    {
        foreach ($question->results()->get() as $value) {
            $value->delete();
        }

        $question->delete();

        return redirect()->route('exams.questions', $this->exam->id)->with('success', 'سوالات و جواب ها با موفقیت حذف شد.');
    }
}
