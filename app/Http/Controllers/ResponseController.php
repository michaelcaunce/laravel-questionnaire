<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\questionnaires;
use App\options;
use App\questions;

class ResponseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
    {
        //
        $questionnaires = questionnaires::all();
        return view('response', ['questionnaires' => $questionnaires]);
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
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
    /**
     * Display the specified resource.
     * The value of questionnaire_id in the model is stored in the variable questionnaire
     * get used to attach the questionnaire_id in the question model and assign to question
     * variable. Both variables are then passed to the view with the retun.
    * The variables are calling a function on the existing models, one with and the other where. The where finds the id
     * and the where gets the id. Each are given names to then be added into the view (->with).
     */
     public function show($id)
     {
         // $questionnaire = questionnaires::findOrFail($id);
         // // $question = questions::findOrFail($id);
         // return view('questionnaire.show', ['questionnaire' => $questionnaire]);
         // get the article
          $questionnaire = questionnaires::where('id', $id)->first();
          $questions = questions::where('questionnaires_id', $questionnaire->id)->get();
          // $questionnaire['questions'] = $question;
          // if article does not exist return to list
          if(!$questionnaire)
          {
              return redirect('/response'); // you could add on here the flash messaging of article does not exist.
          }
          return view('questionnaire/show')->with('questionnaire', $questionnaire)->with('question', $questions);
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
