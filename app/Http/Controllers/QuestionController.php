<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Importing all the relevant models
 */

use App\Http\Requests;
use App\questions;
use App\questionnaires;
use App\option;




class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


     /**
      * Index function returns the home view with the attached question data stored in the variable
      */
    public function index()
    {
        $questions = questions::all();
        return view('questions/create', ['questions' => $questions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('questions/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * Variable question contains the data input from the content field in the form and carries the questionnaire_id.
     * the variable saves and returns the view with both questionnaire and question variable
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
          'question' => 'required',
        ]);

        $input = $request->all();
        // return print($input['option1']);
        $question = questions::create([
          'content' => $input['question'],
          'questionnaires_id' => $input['questionnaireID'],
        ]);

        $question->save();
        // $question = questions::findOrFail($input['questionID']);
        $questionnaires = questionnaires::findOrFail($input['questionnaireID']);
        // $options = option::where('id', $request->get('optionID'))->first();
        // $questionnaires = questionnaires::where('id', $request->questionnaireID)->first();
        return view('options/create', ['questionnaire' => $questionnaires], ['question' => $question]);



        // $responses = option::create([
        //   foreach ($responses as $response) {
        //     'content' => $request->option;
        //     $response->save;
        //   }
        // ]);




        // return view('options/create', ['questionnaireID' => $request->questionnaireID, 'question' => $question]);
    }

    /**
     * Display the specified resource.
     *
     *Inside the function the question variable is storing the questionnaires and questionnaires_id into variables.
     * The variables are calling a function on the existing model, where. The where finds the id
     * and the where gets the id. Each are given names to then be added into the view (->with).
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

         // $question= questions::with('questionnaires')->where('id', $id)->first();
         $question = questions::where('questionnaire_id', $questionnaire->id)->get();

         if(!$question)
         {
             return redirect('/'); // you could add on here the flash messaging of article does not exist.
         }
         return view('questionnaire/show')->withquestion($question);
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
