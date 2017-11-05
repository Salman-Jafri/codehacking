@extends('admin.index')



@section('top-header')
Users
@endsection
@section('content')
<table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
          <th>Role</th>
          <th>Status</th>
          <th>Created at</th>
          <th>Updated at</th>
      </tr>
    </thead>
    <tbody>

    @foreach($users as $user)
      <tr>
        <td>{{$user->id}}</td>
          <td>{{$user->name}}</td>
          <td>{{$user->email}}</td>
          <td>{{$user->role->name}}</td>
          <td>{{$user->is_active}}</td>
          <td>{{$user->created_at->diffforhumans()}}</td>
          <td>{{$user->updated_at->diffforhumans()}}</td>
      </tr>
    @endforeach
    </tbody>
  </table>

@endsection
