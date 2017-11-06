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
          <th>Image</th>
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
          <td><a href="{{route('admin.users.edit',$user->id)}}">{{$user->name}}</a></td>
          <td width="100" height="100">
              <img height="100" width="100"
                   src="{{$user->photo ? $user->photo->file : "http://placehold.it/400x400"}}" alt="">
          </td>
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
