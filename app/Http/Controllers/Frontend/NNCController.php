<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\NNCCategory;
use App\Models\NNCLiscenseQuestion;
use App\Models\NNCResult;
use Illuminate\Support\Str;

class NNCController extends Controller
{
    private $objectiveQuestion;
    private $nncCategory;

    public function __construct(NNCCategory $nncCategory,NNCLiscenseQuestion $question){
        $this->category                 = $nncCategory;
        $this->objectiveQuestion        = $question;
    }

    public function index(Request $request){
        return view('frontend.nnc.index');
    }

    public function showGuidelines(){  // show guidelines
        if(auth()->user()){
            return view('frontend.nnc.nnc_guidelines');
        }

        else{
            return redirect(route('nnc-home'));
        }
    }

    public function startQuiz(Request $request){
        // array of possible no of questions for each category
        $possible_questions = $this->category->pluck('possible_items'); 

        // total no of questions for the exam
        $total_questions = array_sum($possible_questions->toArray());
        // $possible_questions = [2,2,2,2,2,2,2];
        // $total_questions = 14;

        // push number of questions and array of category wise possible questions in quiz session array
        $request->session()->put('quiz',[]); 
        $request->session()->push('quiz',[$total_questions]);
        $request->session()->push('quiz',[$possible_questions]); // array

        // getting questions for each category(cat1,cat2,cat3 ...)
        foreach($possible_questions as $key=>$qn){
            ${"cat" . $key} = $this->objectiveQuestion->where('category_id','=',$key+1)->inRandomOrder()->limit($qn)->get();
        }

        // Merging questions from every category to $questions
        $questions = collect(); // new empty collection
        $count = 0;
        while($count<count($possible_questions)){
            $next_count = $count + 1;   // because we cannot use + after . operator below
            if($next_count == count($possible_questions)){
                $questions = $questions->merge(${"cat".$count});
                break;
            } 
            
            else{
                $temp_questions = ${"cat".$count}->merge(${"cat".$next_count});
                $questions = $questions->merge($temp_questions);
                $count = $count + 2;
            }
        }

        // Shuffle all merged questions
        $questions = $questions->shuffle();

        $options_array = array(); // 2d array for options of all questions shuffled        
                 
        // shuffling options for every question
        foreach($questions as $key=>$objectiveQuestion){
            ${"option" . $key} = array($objectiveQuestion->option_1,$objectiveQuestion->correct_answer,$objectiveQuestion->option_2,$objectiveQuestion->option_3);
        
            shuffle(${"option" . $key});  // options shuffled
        }

        for($i=0;$i<$total_questions;$i++){   
            array_push($options_array,${"option" . $i});  // push shuffled options for each question to 2d array
        }

        return view('frontend.nnc.quiz_start',compact('questions','options_array','total_questions'))->with('title','NNC Liscense Exam');
    }

    public function finishQuiz(Request $request){  // store quiz results
        if(auth()->user()){
            if($request->session()->has('quiz')){
                $session_key = 'NNC'.Str::random(8);
                $total_questions = $request->session()->get('quiz')[0][0];  // retrieving from session
                $no_of_categories = $request->session()->get('quiz')[1][0]; 
                $questions = array_values($request->input('question')); // questions for user


                $answers = array_values($request->input('answer')); // user given answers
                $points = array();  // points for each question(0 or 1)
                $question_answers = array(); // 2d array for questions and correct answers
                $question_categories = array(); // array of category ids for each question
                $category_wise_percentage = array(); // 2D array with category_id and respective percentage obtained

                foreach ($questions as $key=>$question_id) {
                    $correct_answer = $this->objectiveQuestion->where('id',$question_id)->pluck('correct_answer');
                    if(isset($answers[$key])){
                        $answer = strval($answers[$key]); // convert to string
                    }
                    else{
                        $answer = '';   // user failed to submit answer in time
                    }   

                    if(strcmp($answer,$correct_answer[0])==0 && $answer!=''){  // if correct and if user submitted that answer
                        $points_obtained = 1;
                    }
                    else{
                        $points_obtained = 0;
                    }

                    // get category_ids of every question to calculate category wise percentage
                    $category_id = $this->objectiveQuestion->where('id',$question_id)->pluck('category_id');

                    // category_id for each question
                    array_push($question_categories,$category_id[0]);

                    // points obtained for each question (0 or 1)
                    array_push($points, $points_obtained);

                    // 2D array[question_id,user_given_answer] to allow users check each question answer after exam
                    array_push($question_answers,array($question_id,$answer)); 

                }

                // Define separate arrays for correct count of every category
                for($index=0; $index<count($no_of_categories); $index++){
                    ${"correct_count_cat".$index} = 0;
                }

                // check correct count for every category
                foreach($points as $key=>$point){
                    if($point == 1){  // if answer correct
                        for($categoryId=0; $categoryId<count($no_of_categories); $categoryId++){
                            if($question_categories[$key]==$categoryId+1){  // if question belongs to that category
                                ${"correct_count_cat".$categoryId}++;
                            }
                        }
                    }
                }

                // calculate percentage for every category and push it to 2D array
                for($index=0; $index<count($no_of_categories); $index++){
                    $percent = ${"correct_count_cat".$index}*100/$no_of_categories[$index];
                    $percent = number_format((float)$percent, 2, '.', '');

                    array_push($category_wise_percentage, $percent);
                }


                NNCResult::create([
                        'user_id' => auth()->user()->id,
                        'session_id' => $session_key,
                        'question_answer' => $question_answers,
                        'points' => $points,
                        'percentage' => array_sum($points)*100/$total_questions,
                        'category_wise_percentage' => $category_wise_percentage
                    ]);
            }
                
            $request->session()->forget('quiz');        
            return view('frontend.nnc.quiz_finish')->with('total_questions',$total_questions);
        }

        else return redirect(route('login'));
    }
}
