@extends('layouts.app')
@section('content')
  <div class="modal-content" style="margin-top:-25px;background-color:#2a363b; padding-bottom:20px;">
    <h2 style="margin-left:380px; color:white;">Edit - {{ $questionnaire->title }}</h2>
  </div>
  <div class="form4">
      <h1 class="title"></h1>
      @if ($errors->any())
        <div>
          <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif
        <div class="modal-content" style="margin-top:-45px;">
          <div class="container">
            <div class="row">
              <!-- form goes here -->
              {!! Form::model($questionnaire, ['method' => 'PATCH', 'url' => 'questionnaires/' . $questionnaire->id]) !!}
                <div class="modal-content" style="margin-bottom: 10px; margin-top:20px;">
                  {!! Form::label('title', 'Title:') !!}
                  {!! Form::text('title', null, ['class' => 'form-control']) !!}
                </div>
                <div class="modal-content" style="margin-bottom: 10px;">
                  {!! Form::label('description', 'Detail:') !!}
                  {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                </div>
                <div class="modal-content" style="margin-bottom: 10px;">
                  {!! Form::submit('Submit', ['class' => 'btn btn-success form-control']) !!}
                </div>
              {!! Form::close() !!}
            </div>
          </div>
        </div>
      </div>
      <footer class="footer">
        @include('includes.footer')
      </footer>
@endsection
