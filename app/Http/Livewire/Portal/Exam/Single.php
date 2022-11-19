<?php

namespace App\Http\Livewire\Portal\Exam;

use App\Models\Exam;
use Livewire\Component;

class Single extends Component
{
    public $exam;

    public function mount()
    {
        $this->exam = Exam::whereSlug(request()->segment(3))->firstOrFail();
    }
    public function render()
    {
        return view('livewire.portal.exam.single');
    }

    public function comeBack()
    {
        return redirect()->route('exams.all')->with('success', ' امیدوارم امتحان خوبی بوده باشد.');
    }
}
