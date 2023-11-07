<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NNCResult;
use App\Models\NNCCategory;
use App\Models\NNCLiscenseQuestion;
use Carbon\Carbon;

class NNCResultController extends Controller
{
    private $question;  private $result;  private $category;

    public function __construct(NNCCategory $category ,NNCResult $result, NNCLiscenseQuestion $question){
        $this->category                         = $category;                
        $this->question                         = $question;
        $this->result                           = $result;
    }

    public function show_result(){
        if(auth()->user()){
            $results = $this->result->where('user_id',auth()->user()->id)->orderBy('created_at','desc')->paginate(5);

            $categories = $this->category->pluck('name');

            return view('frontend.nnc.results', compact('results','categories'));
        }
        else{
            return redirect(route('nnc-home'));
        }
    }

    public function show_answer(Request $request, $id){
        $question_ids = array();  // question ids in that quiz session
        $questions_answers = array();  // questions and respective correct answers
        $user_answer = array(); // user given answers
        $temp_array = array();

        $session_id = $this->result->where('id',$id)->pluck('session_id')->first();

        $qa = $this->result->where('session_id',$session_id)->pluck('question_answer');

        foreach ($qa[0] as $ques) {   // push all question ids of the session into array
            array_push($question_ids,$ques[0]);
        }
        
        $user_answers = $this->result->where('session_id',$session_id)->pluck('question_answer');

        // push every user given answer to user_answer array
        foreach ($user_answers[0] as $value) {
            array_push($user_answer,$value[1]);
        }
        
        foreach ($question_ids as $key => $question_id) {
            // get every questions and corresponding answers
            $question = $this->question->select('question','option_1','correct_answer','option_3','option_2')->where('id',$question_id)->get();


            array_push($temp_array, $question[0]->question,$question[0]->correct_answer,$question[0]->option_1,$question[0]->option_2,$question[0]->option_3);


            array_push($questions_answers,$temp_array); // push questions and all options into array

            // make temp_array empty after pushing one question data to questions_answers array
            for($i=0;$i<5;$i++){
                array_pop($temp_array);
            }
        }
        
        return view('frontend.nnc.detailed_results',['questions' => $questions_answers, 'user_answer' => $user_answer]);
    } 
}
