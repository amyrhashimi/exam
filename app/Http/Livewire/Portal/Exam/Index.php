<?php

namespace App\Http\Livewire\Portal\Exam;

use App\Models\Answer;
use App\Models\Exam;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $paginate = 10;
    public $paginationTheme = 'bootstrap';
    public $search;
    public $queryString = ['paginate', 'search'];

    public function render()
    {

        $exams = Exam::latest();

        if(! is_null($this->search) AND ! empty($this->search))
        {
            $exams = $exams->where('title', 'like', '%' . $this->search . '%');
        }

        return view('livewire.portal.exam.index', [
            'exams' => $exams->paginate($this->paginate)
        ]);
    }

    public function startExam($id)
    {
        $exam = Exam::findOrFail($id);

        foreach (auth()->user()->exams()->get() as $item) {
            if ($item->id == $exam->id)
                return redirect()->route('exams.all')->with('error', 'شما در این امتحان شرکت کرده اید');
        }

        auth()->user()->exams()->attach($exam->id);

        Answer::create([
            'user_id' => auth()->user()->id,
            'exam_id' => $exam->id
        ]);

        Session::has('questions') ? Session::forget('questions') : '';

        return redirect()->route('exams.single', $exam->slug)->with('success', 'امتحان را شروع کنید و دقت کنید که صفحه را نبندید.');
    }
}
