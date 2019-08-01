@extends('layouts.app')
@section('content')
<div class="modal-content" style="margin-top:-25px;background-color:#2a363b; padding-bottom:20px;">
  <h2 style="margin-left:380px; color:white;">Available Questionnaires</h2>
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
            <!--If statements call $questionnaires variable defined in the controller. Thefirst foreach loop pulls in questionnaire
                  details: title, created at and description. -->
            @if (isset ($questionnaires))
              <table class="table table-striped table-bordered">
                <thead>
                  <tr style="background-color:#2a363b; color:white;">
                    <td style="width:400px;"><h3>Title</h3></td>
                    <td style="width: 1080px;"><h3>Description</h3>
                    <td></td>
                  </tr>
                </thead>
                  @foreach ($questionnaires as $questionnaire)
                    <tr style="font-size:18px; background-color:white">
                      <td style="width:300px;">{{ $questionnaire->title}}<br><br><small>Created on {{$questionnaire->created_at}}</small></td>
                      <td style="width:400px;">{{ $questionnaire->description}}</td>
                      <td><a href="response/{{$questionnaire->id}}" class="btn btn-success">Take Questionnaire</a>
                    </tr>
                  @endforeach
              </table>
              @else
                <p> No questionnaires available </p>
            @endif
          </div>
        </div>
      </div>
  </div>
  <footer class="footer" style="color:black;!important">
      @include('includes.footer')
  </footer>
@endsection
