@extends('layouts.app')
@section('content')
<div class="modal-content" style="margin-top:-25px;background-color:#2a363b; padding-bottom:20px;">
  <h2 style="margin-left:380px; color:white;">Create New Questionnaire</h2>
</div>
<div class="form4">
    <h1 class="title"></h1>
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
      {!! Form::open(['action' => 'QuestionnaireController@store', 'id' => 'createquestionnaire']) !!}
      <!-- {{ csrf_field() }} -->
        <div class="modal-content" style="margin-bottom: 10px; margin-top:20px;">
          {!! Form::label('title', 'Title:') !!}
          {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Title']) !!}
        </div>
        <div class="modal-content" style="margin-bottom: 10px; margin-top:20px;">
          {!! Form::label('description', 'Detail:') !!}
          {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
        </div>
        <div style="margin-bottom: 10px; margin-top:20px;">
          <tbody>
            <td><a href="{{ url('home') }}" class="btn btn-danger">Cancel</a></td>
            <td>
              {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}
              {!! Form::close() !!}
            </td>
          </tbody>
        </div>
        </div>
      </div>
    </div>
    <footer class="footer">
      @include('includes.footer')
    </footer>
  </div>

@endsection
