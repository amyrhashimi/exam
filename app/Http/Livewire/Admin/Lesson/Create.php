<?php

namespace App\Http\Livewire\Admin\Lesson;

use App\Models\Lesson;
use Livewire\Component;

class Create extends Component
{
    public $title;
    public $slug;
    public $description;

    protected function rules()
    {
        return [
            'title' => 'required|between:3,70',
            'slug' => 'required|between:3,50|unique:lessons,slug',
            'description' => 'nullable|between:15,400',
        ];
    }

    public function updated($name)
    {
        $this->validateOnly($name);
    }

    public function render()
    {
        return view('livewire.admin.lesson.create');
    }

    public function cansel()
    {
        return redirect()->route('lessons');
    }

    public function create()
    {
        $lesson = $this->validate();
        $slug = str_replace( ' ' , '-', $lesson['slug']);
        unset($lesson['slug']);
        $lesson['slug'] = $slug;

        Lesson::create($lesson);
        return redirect()->route('lessons')->with('success', 'درس جدید با موفقیت اضافه شد');
    }
}
