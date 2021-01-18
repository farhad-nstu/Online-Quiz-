<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Question;
use App\Models\Option;

class OptionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $question = Question::find($id);
        return view('dashboard.options.add', compact('question'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $this->validate( $request, array(
            'name' => 'string|required|max:255'
        ) );

        $option = new option;
        $option->option_name = $request->name;
        $option->question_id = $id;
        $option->save();
        return redirect()->route( 'questions.index' )->with( 'message', 'Option added successfully' );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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

        $option = Option::find($id);
        $option->option_name = $request->name;
        $option->update();
        return back()->with( 'message', 'Option updated successfully' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $option = Option::find($id);
        $option->delete();
        return redirect()->back()->with( 'success', 'Option deleted successfully' );
    }

    public function answer_select(Request $request)
    {
        
        $options = Option::where('question_id', $request->question_id)->get();
        foreach ($options as $option) {
            if($option->is_selected == 1){
                $option->is_selected = NULL;
                $option->save();
            }
            
        }

        $option = Option::find($request->option_id);
        $option->is_selected = 1;
        $option->save();
        $question = Question::find($request->question_id);
        $question->ans_id = $request->option_id;
        $question->update();
        // return $question;

        $options = Option::where('question_id', $request->question_id)->get();
        $question = Question::find($request->question_id); 
        return view('dashboard.questions.option-by-ajax', compact('question', 'options'));      
    }
}
