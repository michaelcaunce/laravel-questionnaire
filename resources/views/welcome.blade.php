@extends('layouts.app')
@section('content')
  <div class="well show">
    <h1 style="margin-left:140px;">Welcome To Survey Bank</h1>
  </div>
  <div style="background-color: #e6e6e6; margin-top:-20px; padding-bottom:20px;">
  <h3 style="margin-left:150px; line-height:50px; padding-top:20px;">A questionnaire is the medium of communication between the researcher and the subject. In the
  questionnaire, the researcher articulates the questions to which he or she wants to know the answers and, through the questionnaire,
  the subjects’ answers are conveyed back to the researcher. The questionnaire can thus be described as the medium of conversation between
  two people, albeit that they are remote from each other and never communicate directly.</h3>
  <h3 style="margin-left:150px; padding-bottom:20px;">(Brace, 2010).</h3>
  <td><a href="{{ url('/response') }}" class="btn btn-success" style="margin-left:150px;">View Available Questionnaires</a></td>
</div>


</div>
</div>
</div>
    </div>
</div>
<footer class="footer">
    @include('includes.footer')
</footer>
@endsection
