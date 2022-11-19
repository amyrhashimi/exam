<?php

namespace App\Http\Livewire\Admin\Lesson;

use App\Models\Lesson;
use Livewire\Component;

class Edit extends Component
{
    public Lesson $lesson;
    public $title;
    public $slug;
    public $description;

    public function mount()
    {
        $this->title = $this->lesson->title;
        $this->slug = $this->lesson->slug;
        $this->description = $this->lesson->description;
    }

    protected function rules()
    {
        return [
            'title' => 'required|between:3,70',
            'slug' => 'required|between:3,50|unique:lessons,slug,' . $this->lesson->id,
            'description' => 'nullable|between:15,400',
        ];
    }

    public function updated($name)
    {
        $this->validateOnly($name);
    }

    public function render()
    {
        return view('livewire.admin.lesson.edit');
    }

    public function edit()
    {
        $lesson = $this->validate();
        $slug = str_replace( ' ' , '-', $lesson['slug']);
        unset($lesson['slug']);
        $lesson['slug'] = $slug;

        $this->lesson->update($lesson);

        return redirect()->route('lessons')->with('success', 'در با موفقیت ویرایش شد');


    }

    public function cansel()
    {
        return redirect()->route('lessons');
    }
}
