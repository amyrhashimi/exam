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
    public $date_end;
    public $time;
    public $time_end;
    public $period;
    public $random;


    public $exams;
    public $newExams;
    public $questions = [];

    public $redirect = null;

    public function mount()
    {
        //->orderByDesc('id')
        $this->exams = Question::where('exam_id', $this->exam->id)->get();
        $this->newExams = collect([]);

        $this->title = $this->exam->title;
        $this->slug = $this->exam->slug;
        $this->lesson_id = $this->exam->lesson_id;
        $this->date = $this->exam->date;
        $this->date_end = $this->exam->date_end;
        $this->time = $this->exam->time;
        $this->time_end = $this->exam->time_end;
        $this->period = $this->exam->period;
        $this->random = $this->exam->random;

        if( isset(request()->redirect) && ! is_null(request()->redirect) && request()->redirect == 1 )
            $this->redirect = true;
        else
            $this->redirect = false;
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
        $this->redirect ? redirect()->route('exams.questions', $this->exam->id) : redirect()->route('exams');
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

        if ($this->exam->date < date('Y-m-d') OR ( $this->exam->date == date('Y-m-d') AND $this->exam->time < date('H:i:s') ))
            return redirect()->route('exams')->with('error', '???????????? ???????? ?????? ??????.');


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

        $this->redirect
            ? redirect()->route('exams.questions', $this->exam->id)->with('success', '???????????? ???? ???????????? ???????????? ????.')
            : redirect()->route('exams')->with('success', '???????????? ???? ???????????? ???????????? ????.');
    }
}
