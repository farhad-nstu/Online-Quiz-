<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Question;
use App\Models\Option;

class QuestionsController extends Controller
{
    public function __construct() {
        $this->middleware( 'auth' );
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::orderBy('id', 'desc')->paginate(10);
        return view('dashboard.questions.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.questions.add');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate( $request, array(
            'name' => 'string|required|max:255'
        ) );

        $question = new Question;
        $question->name = $request->name;
        $question->description = $request->description;
        $question->save();
        return redirect()->route( 'questions.index' )->with( 'message', 'New Question added successfully' );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question = Question::find($id);
        $options = Option::where('question_id', $id)->get();
        // dd($options);
        return view('dashboard.questions.show', compact('question', 'options'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = Question::find($id);
        return view('dashboard.questions.edit', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate( $request, array(
            'name' => 'string|required|max:255'
        ) );

        $question = Question::find($id);
        $question->name = $request->name;
        $question->description = $request->description;
        $question->update();
        return redirect()->route( 'questions.index' )->with( 'message', 'Question Updated Successfully' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $options = Option::where( 'question_id', $id )->get();
        foreach ( $options as $option ) {
            $option->delete();
        }
        $question = Question::find($id);
        $question->delete();
        return redirect()->back()->with( 'success', 'Question deleted successfully' );
    }
}
