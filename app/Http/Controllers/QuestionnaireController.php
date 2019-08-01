<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Importing all the relevant models
 */

use App\Http\Requests;
use App\questionnaires;
use App\questions;
use App\option;
use Auth;
use Gate;

class QuestionnaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Index function returns the home view with the attached questionnaire data stored in the variable
     */
     public function index()
    {

        $questionnaires = questionnaires::orderBy('created_at', 'asc');
        return view('home', ['questionnaires' => $questionnaires]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * New function created as an alternative to the create method. This was done to attempt a different approach with in the routes file.
     * Inside the function if authorisation allows, return the view, else display an error message redired the home page.
     *
     */

     public function new_questionnaire(Request $request)
      {

        if (Gate::allows('create_questionnaire')){

            return view('questionnaire/create');
        }

        $request->session()->flash('message.level', 'danger');
        $request->session()->flash('message.content', 'Access Denied!');
        return redirect('home');

      }

      /**
       *
       * This was done to attempt a different approach with in the routes file.
       * Inside the function the questionnaire variable is storing the questionnaires and questionnaires_id into variables.
       *
       */

      public function questionnaire_details ($id)
      {
        $questionnaire = questionnaires::findOrFail($id);
        $questions = questions::where('questionnaires_id', $id)->get();
        return view('questionnaire/show')->with('questionnaire', $questionnaire)->with('question', $questions);;
      }

         public function create(Request $request)
     {
         //
     }

     /**
      * Store a newly created resource in storage.
      * Validation is set ensuring that the title field must be filled.
      * Inside the function the questionnaire variable is obtaining the title input, description input and author_id. This data is saved in
      * the variable and passed to the view.
      *
      */
     public function store(Request $request)
     {
         //
         $this->validate($request, [
           'title' => 'bail|required|unique:questionnaires|min:3|max:255',
           // 'description' => 'required',
         ]);

         $questionnaire = new questionnaires;
         $questionnaire->title = $request->input('title');
         $questionnaire->description = $request->input('description');
         $questionnaire->author_id = auth()->user()->id;
         $questionnaire->save();

         // $questionnaire['author_id'] = Auth::user()->id;
         // // $questionnaire->questions()->attach($request->input('question'));
         // $questionnaire = questionnaires::create($request->all());
         // $questionnaire->save();
         // // $question = questions::where('questionnaire_id', $questionnaire->id)->get();
         return view ('questions/create', ['questionnaire'=>$questionnaire]);
     }



     /**
      *
      *
      * Inside the function the questionnaire variable is obtaining the id, and the question variable is saving the
      * data attached the questionnaire_id. Each variable data is saved and passed to the view.
      *
      * The variables are calling a function on the existing models, one with and the other where. The where finds the id
      * and the where gets the id. Each are given names to then be added into the view (->with).
      */
     public function show($id)
     {
         //
         // $questionnaire = questionnaires::findOrFail($id);
         // // $question = questions::findOrFail($id);
         // return view('questionnaire.show', ['questionnaire' => $questionnaire]);
          $questionnaire = questionnaires::with('question')->where('id', $id)->first();
          $questions = questions::where('questionnaire_id', $questionnaire->id)->get();
          // $questionnaire['questions'] = $question;
          if(!$questionnaire)
          {
              return redirect('/'); // you could add on here the flash messaging of article does not exist.
          }
          return view('questionnaire/show')->with('questionnaire', $questionnaire)->with('questions', $questions);
     }

     /**
      * Show the form for editing the specified resource.
      *
      * If authorisation allows, the questionnaire variable finds the questionnaire by the id variable and returns the edit view.
      * else a error message is presented with a redirection to home
      */
     public function edit(Request $request, $id)
     {
         //

         if (Gate::allows('edit_questionnaire')){
            $questionnaire = questionnaires::findOrFail($id);
              // $questions = questions::where('questionnaire_id', $questionnaire->id)->get();
             return view('questionnaire/edit', compact('questionnaire'));
         }
          $request->session()->flash('message.level', 'danger');
          $request->session()->flash('message.content', 'Access Denied!');
          return redirect('home');

         // $questionnaire = questionnaires::findOrFail($id);
         // return view('questionnaire.edit', compact('questionnaire'));
     }


     /**
      * Update the specified resource in storage.
      *
      * If the questionnaire has been edited, the update function handles the storing of the changed data. The questionnaire is found by it's id and stored in
      * in the variable. Once found, the variable updates and redirects home with a success message.
      *
      */

     public function update(Request $request, $id)
     {
         //
        $questionnaire = questionnaires::findOrFail($id);
        $questionnaire->update($request->all());
        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'Questionnaire was successfully updated!');
        return redirect('home');
     }

     /**
      * Remove the specified resource from storage.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function destroy(Request $request, $id)
     {
         //
         if (Gate::allows('delete_questionnaire')){

           $questionnaire = questionnaires::find($id);
           $questionnaire->delete();
           $request->session()->flash('message.level', 'danger');
           $request->session()->flash('message.content', 'Questionnaire was successfully deleted!');
           return redirect('home');
         }
         $request->session()->flash('message.level', 'danger');
         $request->session()->flash('message.content', 'Access Denied!');
         return redirect('home');

     }
}
