<?php

namespace App\Http\Livewire\Admin\Exam;

use App\Models\Exam;
use Livewire\Component;

class Index extends Component
{
    public $paginate = 10;
    public $paginationTheme = 'bootstrap';
    public $search;
    protected $queryString = ['paginate', 'search'];
    public function render()
    {
        $exams = Exam::latest();

        if(! is_null($this->search) AND ! empty($this->search))
        {
            $exams = $exams->where('title', 'like', '%' . $this->search . '%');
        }

        return view('livewire.admin.exam.index', [
            'exams' => $exams->paginate($this->paginate)
        ]);
    }

    public function create()
    {
        return redirect()->route('exams.create');
    }

    public function edit($index)
    {
        return redirect()->route('exams.edit', $index);
    }

    public function showQuestion($id)
    {
        return redirect()->route('exams.questions', $id);
    }

    public function destroy(Exam $exam)
    {
        if($exam->date < date('Y-m-d') OR ( $exam->date == date('Y-m-d') AND $exam->time < date('H:i:s') ))
        {
            return redirect()->route('exams')->with('error', 'امتحان شروع شده است .');
        }

        foreach ($exam->questions()->get() as $question) {
            foreach ($question->results()->get() as $result) {
                $result->delete();
            }
            $question->delete();
        }

        $exam->delete();

        return redirect()->route('exams')->with('success', 'امتحان با موفقیت حذف شد');
    }
}
