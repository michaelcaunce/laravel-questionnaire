<?php

namespace App\Http\Controllers;

/**
 * Importing all the relevant models
 */


use Illuminate\Http\Request;
use App\Http\Requests;
use App\option;
use App\questions;
use App\questionnaires;
use App\answer;

class OptionController extends Controller
{


  /**
   * Index function returns options/create view. 
   */

    public function index()
    {
        //
        $option = option::all();
        return view('options/create', ['options' => $option]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('options/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)
     {
         //
         $this->validate($request, [
           'option' => 'required',
         ]);

         // $input = $request->all();
         // option::create($input);
         //

         $input = $request->all();
         foreach ($request->option as $answer) {
           if(strlen($answer) > 0) {
             $option = option::create([
               'content' => $answer,
               'questionnaire_id' => $input['questionnaireID'],
               'questions_id' => $input['questionID'],
             ]);
             // $option->save();
           }
         }
         $question = questions::findOrFail($input['questionID']);
         $questionnaires = questionnaires::findOrFail($input['questionnaireID']);
         // $options = option::where('id', $request->get('optionID'))->first();
         $request->session()->flash('message.level', 'success');
         $request->session()->flash('message.content', 'Question was successfully added!');
         return view('questions/create', ['questionnaire' => $questionnaires, 'question' => $question]);
        // return redirect('/');
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
