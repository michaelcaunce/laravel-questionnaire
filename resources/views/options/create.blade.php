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
      <!-- Created form differs from other forms as the options form declares an option array. Each option is saved in an array a looped through in the controller -->
      {!! Form::open(array('action' => 'OptionController@store', 'id' => 'createoption')) !!}

          {!! Form::hidden('questionID', $question->id) !!}
          {!! Form::hidden('questionnaireID', $questionnaire->id) !!}

          <div class="modal-content" style="margin-bottom: 10px; margin-top:20px; maring-bottom: 20px;">
            {!! Form::label('option', 'Add Option:') !!}
            {!! Form::text('option[]', null, ['class' => 'form-control', 'placeholder' => 'Option']) !!}
        </div>
        <div class="modal-content" style="margin-bottom: 10px; margin-top:20px; maring-bottom: 20px;">
            {!! Form::label('option', 'Add Option:') !!}
            {!! Form::text('option[]', null, ['class' => 'form-control', 'placeholder' => 'Option']) !!}
        </div>
        <div class="modal-content" style="margin-bottom: 10px; margin-top:20px; maring-bottom: 20px;">
            {!! Form::label('option', 'Add Option:') !!}
            {!! Form::text('option[]', null, ['class' => 'form-control', 'placeholder' => 'Option']) !!}
       </div>
       <div class="modal-content" style="margin-bottom: 10px; margin-top:20px; maring-bottom: 20px;">
           {!! Form::label('option', 'Add Option:') !!}
           {!! Form::text('option[]', null, ['class' => 'form-control', 'placeholder' => 'Option']) !!}
       </div>
       <div class="modal-content" style="margin-bottom: 10px; margin-top:20px; maring-bottom: 20px;">
           {!! Form::label('option', 'Add Option:') !!}
           {!! Form::text('option[]', null, ['class' => 'form-control', 'placeholder' => 'Option']) !!}
      </div>
      <div class="modal-content">
          {!! Form::submit('Save and add Question', ['class' => 'btn btn-success form-control']) !!}
          <!-- {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!} -->
      </div>
      {!! Form::close() !!}
      <footer class="footer">
        @include('includes.footer')
  </footer>
@endsection
