<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Validator;
use App\Models\progress;
use Livewire\Attributes\Rule;
use App\Models\question;
use Illuminate\Support\Facades\Session;
use OpenAI\Laravel\Facades\OpenAI;
class Quiz extends Component
{
    public $question ;
    #[Rule('required')]
    public $u_answer = [];
    public $answers;
    public $lesson_id;
    public function mount($id){
        $this->lesson_id = $id;
        // dd(Session::get('user')->STUDENT_ID);
    }
    public function render()
    {        
        $questions = question::where('lessonid',$this->lesson_id)->get();
        $shufle_question = $questions->shuffle();
        $answer = $questions->pluck('answer')->toArray();
        $this->answers = $answer;
        $questions->map(function($question){
            if($question->type == "multiple"){
                return $question->answer = array([$question->answer,'fake_answ',"fake"]);
            }
        });
   

        // // $client = OpenAI::client("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");
        // $result= OpenAI::chat()->create([
        //     'model' => 'gpt-3.5-turbo',
        //     'messages' => [
        //         ['role' => 'user', 'content' => 'Hello!'],
        //     ],
        // ]);
        
        // dd($result->choices[0]->message->content); // Outputs: Hello! How can I assist you today?
        
        
        if($this->chkQuiz())
            return view('livewire.quiz',['message'=>"you have already taken the exam"])->extends('layouts.app');
        else
            return view('livewire.quiz',['questions'=>$shufle_question])->extends('layouts.app');
    }
    public function send_answer(){
        // $this->validate();
        $number = count($this->answers);
        $result = array_intersect($this->u_answer, $this->answers);
        $score = count($result);
        $percentage = $score / $number * 100;
        progress::create(
            [
                'student_id'=>Session::get('user')->STUDENT_ID,
                'lesson_id'=>$this->lesson_id,
                'score'=>$score,
                'percent'=>$percentage
            ]
            );        
        
    }
    public function chkQuiz():bool{
        $progress = progress::where('student_id',Session::get('user')->STUDENT_ID)
        ->where('lesson_id',$this->lesson_id)
        ->first();
        // dd($progress);
        if($progress)
            return true;
        else
            return false;
    }
}
