<?php

namespace App\Http\Livewire\Admin\Exam;

use App\Models\Question;
use App\Models\Result;
use Livewire\Component;

class AddResults extends Component
{

    public Question $question;
    public $results;
    public $correct;

    protected $rules = [
        'results.*.answer' => 'required',
        'results.*.correct' => 'nullable|boolean',
        'results.*.question_id' => 'required',

        'correct' => 'required',
    ];

    public function updated($name)
    {
        $this->validateOnly($name);
    }

    public function mount()
    {
        $this->results = Result::where('question_id', $this->question->id)->get();

        foreach ($this->results as $key => $value) {
            if($value->correct == 1){
                $this->correct = $key+1;
            }
        }
    }

    public function render()
    {
        return view('livewire.admin.exam.add-results');
    }

    public function addResult()
    {
        $this->results->push( new Result(['question_id' => $this->question->id]) );
    }

    public function Results()
    {
        $this->validate();

        foreach ( $this->results as $index => $item) {

            if( $item->correct == 1 && $index+1 !== $this->correct ){
                 //  در صورتی که قبلا جواب صحیح بوده و تغییر کرده است
                if ( $item->id !== null ) {
                    $item->update([
                        'correct' => 0
                    ]);
                }
            }
            elseif( $item->correct !== null && $index+1 == $this->correct ){
                // در صورتی که قبلا جواب صحیح نبوده و الان جواب صحیح است
                if ( $item->id !== null ) {
                    $item->update([
                        'correct' => 1
                    ]);
                }
            }elseif (  is_null($item->correct) && !isset($item->id) ) {
                if ($index+1 == $this->correct) $item->correct = 1;
                else $item->correct = 0;

                $item->save();
            }
        }

        return redirect()->route('exams.addResults', $this->question->id )->with('success', 'جواب ها با موفقیت ذخیره شد');
    }

    public function comeBack()
    {
        return redirect()->route('exams.questions', $this->question->exam_id);
    }

    public function destroy($index)
    {
        $result = $this->results[$index];
        $this->results->forget($index);

        $result->delete();
    }
}
