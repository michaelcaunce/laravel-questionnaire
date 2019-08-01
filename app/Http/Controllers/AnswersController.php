<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;

/**
 * Importing all the relevant models
 */

use App\questions;
use App\questionnaires;
use App\option;
use App\answer;
use Auth;

class AnswersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


     /**
      * Simply redirects the home page
      */
    public function index(Request $request)
    {
        //

        return redirect('/home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * The store function saves the answers when a respondent submits a questionnaire. Two variable are defined requesting all, with one variables
     * value saved as questions. For each loop increments each time the value of input_keys is less than 0. Inside the create array the value of question_id and option_id
     * are saved in seperate variables. Once complete the data quickly dumped into the model.
     *
     */
    public function store(Request $request)
    {
        //
        $input = $request->all();
        $input_keys = $request->all();

        $questions = array_keys($input_keys);

        for($index = 0; $index < count($input_keys); $index++) {
          if($questions[$index] != '_token') {
            $question_id = $questions[$index];
            $option_id = $input[$question_id];

            $create = array(
              "question_id" => $question_id,
              "option_id" => $option_id,

            );
          answer::create($create);
          }

        }
        return redirect ('/completed');
    }

    /**
     * Display the specified resource.
     *
     * The variables are calling a function on the existing models, one with and the other where. The where finds the id
     * and the where gets the id. Each are given names to then be added into the view (->with).
     */
    public function show($id)
    {
        //
        $questions = questions::where('questionnaires_id', $id)->get();
        $questionnaire = questionnaires::where('id', $id)->first();

        foreach($questions as $question) {
          $options = option::where('questions_id', $question->id)->get();
          foreach($options as $option) {
            $result = answer::where([
              ['question_id', '=', $question->id],
              ['option_id', '=', $option->id]
            ])->count();

            $option['result'] = $result;
          }
          $question['options'] = $options;
        }
        return view('/answers')->with('questionnaire', $questionnaire)->with('question', $questions);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
