<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\Question;
use App\Models\Option;
use App\StudentRegistration;
use Session;
use Auth; 

class QuestionsController extends Controller
{
    public function get_questions()
    {
        $studentId = Auth::user()->student_id;
        $student = StudentRegistration::find($studentId);
        if($student->is_exam == 1){
            return redirect()->route('front.home')->with('message', 'ইতিমধ্যে পরীক্ষায় একবার অংশগ্রহণ করেছ। ফলাফল পরে জানিয়ে দেওয়া হবে');
        } else {
            $question = Question::orderBy('id', 'desc')->first();
            $si = 1;
            Session::put('si', $si);
            return view('front.quiz', compact('question', 'si'));
        }
    }

    public function count_marks(Request $request)
    {
    	$question = Question::find($request->question_id);
        $tmpPositiveScore = 0;
        $tmpNegativeScore = 0;
                
        if($question->ans_id == $request->option_id){

            if(Session::has('positiveScore')){
                $tmpPositiveScore = Session::get('positiveScore');
            }
            Session::put('positiveScore', $tmpPositiveScore+1);

        } elseif($question->ans_id != $request->option_id){
            if(Session::has('negativeScore')){
                $tmpNegativeScore = Session::get('negativeScore');
            }
            Session::put('negativeScore', $tmpNegativeScore+1);

        } 

        return true;
    }

    public function result()
    {
        $positiveScore = Session::get('positiveScore');
        $negativeScore = Session::get('negativeScore');

        $totalScore = $positiveScore - $negativeScore/2;
        // $totalScore = Session::put('totalScore', $totalScore);
        $user = Auth::user();
        $student = StudentRegistration::find($user->student_id);
        $student->positive_score = $positiveScore;
        $student->negative_score = $negativeScore;
        $student->total_score = $totalScore;
        $student->is_exam = 1;
        $student->save();

        Session::forget('positiveScore');
        Session::forget('negativeScore');
        Session::forget('skipQuestion');
        
        return view('front.result');
    }

    public function submit_answer(Request $request)
    {
        if($request->question_id > 1){
            $id = $request->question_id -1;
            $question = Question::find($id);
            $si = Session::get('si')+1;
            Session::forget('si');
            Session::put('si', $si);
            return view('front.singleQuestion', compact('question', 'si'));
        } elseif(($request->question_id <= 1 || empty($request)) && Session::has('skipQuestion')) {
            $questions = Session::get('skipQuestion');
            $userQuestions = count(array_keys($questions['question_id']));
        
            $questionSi = $questions['si'][$userQuestions-1];
            $questionId = $questions['question_id'][$userQuestions-1];
            $questionName = $questions['question_name'][$userQuestions-1];

            unset($questions['si'][$userQuestions-1]);
            unset($questions['question_id'][$userQuestions-1]);
            unset($questions['question_name'][$userQuestions-1]);

            Session::put('skipQuestion', $questions);
            $update = Session::get('skipQuestion');
            Session::forget('skipQuestion');
            
            $tmp = count($update['question_id']);
            
            for($i=0; $i<=$tmp; $i++){
                if($i != $userQuestions-1){
                    $request->session()->push('skipQuestion.si', $update['si'][$i]);
                    $request->session()->push('skipQuestion.question_id', $update['question_id'][$i]);
                    $request->session()->push('skipQuestion.question_name', $update['question_name'][$i]);
                }                        
            }

            return view('front.ignoreQuestions', compact('questionId', 'questionName', 'questionSi'));

        } else {
            return view('front.finishExam');
        }
    }

    public function skip(Request $request)
    {
        $id = $request->question_id -1;
        $question = Question::find($id);
        $si = Session::get('si')+1;
        Session::forget('si');
        Session::put('si', $si);

        $request->session()->push('skipQuestion.si', $request->si);
        $request->session()->push('skipQuestion.question_id', $request->question_id);
        $request->session()->push('skipQuestion.question_name', $request->question_name);        
        return view('front.singleQuestion', compact('question', 'si'));
        
    }
}