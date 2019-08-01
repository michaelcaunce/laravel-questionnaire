@extends('layouts.app')
@section('content')
<div class="modal-content" style="margin-top:-25px;background-color:#2a363b; padding-bottom:20px;">
  <h2 style="margin-left:380px; color:white;">Created Questionnaires</h2>
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
              <!-- <div class="panel-heading">Dashboard</div> -->
              <div class="homeform">
                <div class="panel-heading"><h2>{{ link_to_route('new.questionnaire', 'Create New') }}</h2></div>
              </div>
              @if(session()->has('message.level'))
                <div class="alert alert-{{ session('message.level') }}">
                {!! session('message.content') !!}
                </div>
              @endif
              <!--If statements call $questionnaires variable defined in the controller. The first foreach loop pulls in questionnaire
                    details: title, created at and description. -->
              @if(isset ($questionnaires))

                <table class="table table-striped table-bordered">
                  @foreach ($questionnaires as $questionnaire)
                  <thead>
                    <tr style="background-color:#2a363b; color:white;">
                      <td style="width:400px;"><h3>Title</h3></td>
                      <td style="width: 1080px;"><h3>Description</h3>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                  </thead>
                  <tbody>

                      <tr style="font-size:18px; background-color:white">
                        <td style="width:300px;">{{ $questionnaire->title}} <br> <small>Created on {{$questionnaire->created_at}}</small></td>
                        <td style="width:400px;">{{ $questionnaire->description}}</td>
                        <td><a href="answers/{{ $questionnaire->id }}" class="btn btn-success">View Answers</a></td>
                        <td> <a href="questionnaires/{{ $questionnaire->id }}/edit" class="btn btn-warning">Update</a></td>
                        <td>
                          {!! Form::open(['method' => 'DELETE', 'route' => ['questionnaires.destroy', $questionnaire->id]]) !!}
                          {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                          {!! Form::close() !!}
                        </td>
                      </tr>
                    <!-- <a href="/questionnaires/show">Take the questionnaire</a> -->
                    @endforeach
                  </tbody>
                </table>
                @else
                  <p> No questionnaires available </p>
                @endif
            </div>
          </div>
      </div>
  <footer class="footer">
    @include('includes.footer')
  </footer>
@endsection
