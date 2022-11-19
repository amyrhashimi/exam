<?php

namespace App\Http\Livewire\Admin\Lesson;

use App\Models\Lesson;
use Livewire\Component;

class Destroy extends Component
{
    public Lesson $lesson;
    public function mount()
    {
        $this->lesson->deleteOrFail();
        return redirect()->route('lessons')->with('success', 'درس با موفقیت حذف شد');
    }
}
