<?php

namespace App\Http\Livewire\Portal\Records;

use App\Models\Answer;
use App\Models\Exam;
use Livewire\Component;

class Index extends Component
{
    public $paginate = 10 ;
    public $paginationTheme = 'bootstrap';
    public $search;
    public $queryString = ['paginate', 'search'];

    public function render()
    {
        $exams = auth()->user()->exams()->latest();


        if (! is_null( $this->search ))
            $exams = $exams->where('title', 'like', '%' . $this->search . '%');

        $exams = $exams->paginate($this->paginate);

        return view('livewire.portal.records.index', compact('exams'));
    }

    public function single( Exam $exam )
    {
        return redirect()->route('records.single', $exam->slug);
    }
}
