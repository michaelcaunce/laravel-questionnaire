@extends('layouts.app')
@section('content')
  <div class="modal-content" style="margin-top:-25px;background-color:#2a363b; padding-bottom:20px; color:white;">
    <h1 style="margin-left:380px">{{ $questionnaire->title }}</h1>
    <br>
    <h3 style="margin-left:380px">{{ $questionnaire->description}}</h3>
  </div>
    <!-- foreach statement pulling in variable $question defined in the controller. Variable $response pulls $question data and displays
    the content field. Nested foreach statement declares 'options' of $response as a new variable $option. $option then displays the content and $option 'result' (answerS)-->
    <div class="modal-content" style="color:black;">
      <div class="container">
        <div class="row">
          @foreach($question as $response)
            <h3>{{ $response->content }}</h3>
          <hr>
          @foreach($response['options'] as $option)
            <h4>{{ $option->content }} ({{ $option['result'] }})</h4><br>
          @endforeach
        @endforeach
      </div>
    </div>
  </div>
  <footer class="footer">
    @include('includes.footer')
  </footer>
@endsection
