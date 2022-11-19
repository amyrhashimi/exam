<?php

namespace App\Http\Livewire\Portal\Records;

use App\Models\Exam;
use Livewire\Component;

class Single extends Component
{
    public $exam;

    public function mount()
    {
        $this->exam = Exam::whereSlug(request()->segment(3))->first();
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
