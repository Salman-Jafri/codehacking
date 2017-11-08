@extends('admin.index')


@section('top-header')

    Posts

@endsection

@section('content')

<table class="table">
    <thead>
      <tr>
          <th>ID</th>
          <th>Title</th>
          <th>Photo</th>
          <th>Owner</th>
          <th>Category</th>
          <th>Body</th>
          <th>Created at</th>
          <th>Updated at</th>
      </tr>
    </thead>
    <tbody>
    @foreach($posts as $post)
      <tr>
          <td>{{$post->id}}</td>
          <td>{{$post->title}}</td>
          <td >
              <img height="50"width="50" src="{{$post->photo ? $post->photo->file : 'http://placehold.it/400x400'}}">
          </td>
          <td>{{$post->user->name}}</td>
          <td>{{$post->category_id}}</td>
          <td>{{$post->body}}</td>
          <td>{{$post->created_at->diffforhumans()}}</td>
          <td>{{$post->updated_at->diffforhumans()}}</td>
      </tr>
        @endforeach
    </tbody>
  </table>



@endsection