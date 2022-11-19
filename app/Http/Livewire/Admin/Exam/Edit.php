<?php

namespace App\Http\Livewire\Admin\Exam;

use App\Models\Exam;
use App\Models\Question;
use Livewire\Component;

class Edit extends Component
{

    public Exam $exam;
    public $title;
    public $slug;
    public $lesson_id;
    public $date;
    public $time;
    public $period;


    public $exams;
    public $newExams;
    public $questions = [];

    public function mount()
    {
        $this->exams = Question::where('exam_id', $this->exam->id)->orderByDesc('id')->get();
        $this->newExams = collect([]);

        $this->title = $this->exam->title;
        $this->slug = $this->exam->slug;
        $this->lesson_id = $this->exam->lesson_id;
        $this->date = $this->exam->date;
        $this->time = $this->exam->time;
        $this->period = $this->exam->period;
    }

    protected $rules = [
        "title" => 'required|min:3|string',
        "slug" => 'required|min:3',
        "lesson_id" => 'required|exists:lessons,id',
        'date' => 'required|date',
        'time' => 'required',
        'period' => 'required|int',
        "questions.*" => 'nullable|min:3|string',
    ];

    public function render()
    {
        return view('livewire.admin.exam.edit');
    }

    public function cansel()
    {
        return redirect()->route('exams');
    }

    public function updated($name)
    {
        $this->validateOnly($name);
    }

    public function addExam()
    {
        $this->newExams->push(new Exam());
    }


    public function update()
    {

        if ($this->exam->date < date('Y-m-d') OR ( $this->exam->date == date('Y-m-d') AND $this->exam->time < date('H:i:s') )) {
            return redirect()->route('exams')->with('error', 'امتحان شروع شده است.');
        }

        $this->validate();
        $this->exam->update([
            'title' => $this->title,
            'slug' => $this->slug,
            'lesson_id' => $this->lesson_id,
            "date" => $this->date,
            "time" => $this->time,
            "period" => $this->period,
        ]);

        if( ! is_null($this->questions) )
        {
            foreach ($this->questions as $item) {
                $this->exam->questions()->create(['title' => $item]);
            }
        }

        return redirect()->route('exams')->with('success', 'امتحان با موفقیت ویرایش شد.');
    }
}
