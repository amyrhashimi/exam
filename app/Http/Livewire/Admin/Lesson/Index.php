<?php

namespace App\Http\Livewire\Admin\Lesson;

use App\Models\Lesson;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $paginate = 10;
    public $lesson;
    protected $paginationTheme = 'bootstrap';
    protected $queryString = ['paginate', 'lesson'];

    public function render()
    {

        $lessons = Lesson::latest();
        if (! is_null($this->lesson))
        {
            $lessons = $lessons->where('title', 'like', '%' . $this->lesson . '%');
        }

        $lessons = $lessons->paginate($this->paginate);
        return view('livewire.admin.lesson.index', compact('lessons'));
    }

    public function create()
    {
        return redirect()->route('lessons.create');
    }

    public function edit($id)
    {
        return redirect()->route('lessons.edit', $id);
    }
}
