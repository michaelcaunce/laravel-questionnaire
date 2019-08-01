@extends('layouts.app')
@section('content')
<div class="modal-content" style="margin-top:-25px;background-color:#2a363b; padding-bottom:20px;">
  <h1 style="margin-left:380px; color:white;">{{ $questionnaire->title }}</h1>
  <h3 style="margin-left:380px; color:white;">{{ $questionnaire->description}}</h3>
</div>
    @if ($errors->any())
      <div>
        <ul class="alert alert-danger">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif
      <div class="modal-content" style="padding-top:20px;">
          <div class="container">
            <div class="row">
            <!-- Open form calling the store function inside ArticleController. Inside the form is a table displaying
                questions and options. If statements call $question variable with the first foreach loop pulling in the questions
                content. The nested for loop pulls all options attached to question and presents the user with a radio button for their answer. -->
            {!! Form::open(array('action' => 'AnswersController@store', 'id' => 'saveanswer')) !!}
              <table class="table table-striped table-bordered">
                @if (isset ($question))
                <thead>
                  <tr style="background-color:#2a363b; color:white;">
                    <td style="width: 500px;"><h3>Question</h3></td>
                    <td><h3>Options</h3></td>
                  </tr>
                </thead>
                <div>
                  @foreach ($question as $answer)
                    <tr style="font-size:18px; background-color:white">
                      <td>{{ $answer->content }}</td>
                      <td>
                        @foreach ($answer->options as $options)
                          <li> {!! Form::radio($answer->id, $options->id) !!} {{$options->content}} </li>
                        @endforeach
                      </td>
                  @endforeach
                    </tr>
                </table>
                <div  class="buttons2">
                  <td><a href="{{ url('/response') }}" class="btn btn-danger">Cancel</a></td>
                  <td>
                    {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}
                    <!-- {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!} -->
                    {!! Form::close() !!}
                  </td>
                @else
                  <p> No questions available </p>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer">
        @include('includes.footer')
      </footer>
@endsection
