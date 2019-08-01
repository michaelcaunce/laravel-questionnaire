@extends('layouts.app')
@section('content')
  <div class="modal-content" style="margin-top:-25px;background-color:#2a363b; padding-bottom:20px;">
    <h2 style="margin-left:380px; color:white;">Add Question - {{ $questionnaire->title }}</h2>
    <h3 class="title">{{ $questionnaire->description }}</h3>
  </div>
    <!-- @if (isset($addedquestion))
    <p class="title green">Question Added!</p>
    @endif -->
    <div class="modal-content" style="margin-top:-45px;">
      <div class="container">
        <div class="row">
          @if ($errors->any())
            <div>
              <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif
      <!-- form goes here -->
      {!! Form::open(array('action' => 'QuestionController@store', 'id' => 'createquestion')) !!}
          <div class="modal-content" style="margin-bottom: 10px; margin-top:20px;">
          {!! Form::hidden('questionnaireID', $questionnaire->id) !!}
          {!! Form::label('question', 'Add Question:') !!}
          {!! Form::text('question', null, ['class' => 'form-control', 'required' => 'Question']) !!}
        </div>
        <div style="padding-bottom:20px;">
          <tbody class="modal-content">
            <td><a href="{{ url('home') }}" class="btn btn-danger">Save and Finish</a></td>
            <td>
              {!! Form::submit('Add Answer Options', ['class' => 'btn btn-success']) !!}
              {!! Form::close() !!}
            </td>
          </tbody>
        </div>
      </div>
    </div><!-- close container -->
  </div>
  <footer class="footer">
    @include('includes.footer')
  </footer>
@endsection
