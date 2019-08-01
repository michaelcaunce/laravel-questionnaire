@extends('layouts.app')
@section('content')
  <div class="well show">
    <h2 style="margin-left:470px;">Edit - {{ $user->name }}</h2>
  </div>
  <div class="form4" style="margin-top: 20px;">
    <article class="row">
        @if ($errors->any())
          <div>
            <ul class="alert alert-danger">
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
      @endif
      {!! Form::model($user, ['method' => 'PATCH', 'url' => '/admin/users/' . $user->id]) !!}
        <div class="form-group" style="color:white; font-weight:bold; font-size:14px;">
          {!! Form::label('name', 'Username:') !!}
          {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group" style="color:white; font-weight:bold; font-size:14px;">
          {!! Form::label('email', 'Email Address:') !!}
          {!! Form::textarea('email', null, ['class' => 'form-control']) !!}
        </div>
        <div class="select">
          {!! Form::label('roles', 'Roles           :') !!}
          @foreach($roles as $role)
              {{ Form::label($role->name) }}
              {{ Form::checkbox('role[]', $role->id, $user->roles->contains($role->id), ['id' => $role->id], ['class' => 'form-control']) }}
          @endforeach
      </div>
      <div class="form-group">
        {!! Form::submit('Update User and Roles', ['class' => 'btn btn-success form-control']) !!}
      </div>
      {!! Form::close() !!}
    </article>
  </div>
  <footer class="footer">
    @include('includes.footer')
  </footer>
@endsection
