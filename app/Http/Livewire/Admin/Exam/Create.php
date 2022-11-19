<?php

namespace App\Http\Livewire\Admin\Exam;

use App\Models\Exam;
use Livewire\Component;

class Create extends Component
{

    public $title;
    public $slug;
    public $lesson_id;
    public $date;
    public $time;
    public $period;

    public $exams;
    public $questions = [];

    public function mount()
    {
        $this->exams = collect([]);
    }

    protected $rules = [
        'title' => 'required|min:3',
        'slug' => 'required|min:3',
        'date' => 'required|date',
        'time' => 'required',
        'period' => 'required|int',
        'lesson_id' => 'required|exists:lessons,id',

        'questions.0.title' => 'required|min:3|string',
        'questions.0.score' => 'required|int',

        'questions.*.title' => 'nullable|min:3|string',
        'questions.*.score' => 'nullable|int',
    ];

    public function render()
    {
        return view('livewire.admin.exam.create');
    }

    public function updated($name)
    {
        $this->validateOnly($name);
    }

    public function addExam()
    {
        $this->exams->push(new Exam());
    }

    public function create()
    {
        $this->validate();

        $exam = Exam::create([
            'lesson_id' => $this->lesson_id,
            'title' => $this->title,
            'slug' => $this->slug,
            "date" => $this->date,
            "time" => $this->time,
            "period" => $this->period,
        ]);

        foreach ($this->questions as $value) {
            if (! isset($value['score']))
                $value += [ "score" => 1 ];


            $exam->questions()->create(['title' => $value['title'] , 'score' => $value['score'] ]);
        }

        return redirect()->route('exams')->with('success', 'امتحان با موفقیت ثبت شد و باید سوالات را تنظیم کنید.');
    }

    public function cansel()
    {
        return redirect()->route('exams');
    }
}