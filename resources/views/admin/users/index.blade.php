@extends('layouts.app')
@section('content')
<div class="well show">
  <h2 style="margin-left:460px;">Registered Users</h2>
</div>
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
           @if(session()->has('message.level'))
             <div class="alert alert-{{ session('message.level') }}">
               {!! session('message.content') !!}
             </div>
           @endif
           @if (isset ($users))
            <table class="table table-striped table-bordered">
              <thead>
                <tr style="background-color:#2a363b; color:white;">
                  <td><h4>Username</h4></td>
                  <td><h4>email</h4></td>
                  <td><h4>Permissions</h4></td>
                  <td style="width: 100px;"></td>
                </tr>
              </thead>
              <tbody>
                @foreach ($users as $user)
                  <tr style="font-size:18px; background-color:white">
                    <td>{{ $user->name }}</a></td>
                    <td> {{ $user->email }}</td>
                    <td> @foreach($user->roles as $role)
                      {{ $role->label }}
                @endforeach
              </td>
              <td><a href="/admin/users/{{ $user->id }}/edit/" name="{{ $user->name }}", class="btn btn-warning">Update</a></td>
            </tr>
            @endforeach
            </tbody>
          </table>
          @else
            <p>no users</p>
            @endif
          </section>
        </div>
      </div>
    </div>
  </div>
  <footer class="footer">
     @include('includes.footer')
 </footer>
@endsection
