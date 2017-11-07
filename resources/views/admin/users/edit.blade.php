@extends('admin.index')

@section('top-header')
    Edit Users



@endsection

@section('content')


    <div class="row">

    <div class="col-sm-3">


        <img src="{{$users->photo ? $users->photo->file : "http://placehold.it/400x400"}}
                " class="img-responsive img-rounded">


    </div>


    <div class="col-sm-9">

    <div class="form-group">

        {!! Form::model($users,['method'=>'PATCH',
            'action'=>['AdminUserController@update',$users->id],'files'=>true]) !!}

        {!! Form::label('name_label','Name',['class'=>'form-control']) !!}

        {!! Form::text('name',null,['class'=>'form-control']) !!}

        <br>

        {!! Form::label('email_label','Email',['class'=>'form-control']) !!}

        {!! Form::email('email',null,['class'=>'form-control']) !!}

        <br>

        {!! Form::label('role_label','Role',['class'=>'form-control']) !!}

        {!! Form::select('role_id',[''=>'Select a Role']+($roles),null,['class'=>'form-control']) !!}

        <br>

        {!! Form::label('is_active_label','Status',['class'=>'form-control']) !!}

        {!! Form::select('is_active',array(0=>'Not Active',1=>'Active'),null,['class'=>'form-control']) !!}

        <br>

        {!! Form::label('password_label','Password',['class'=>'form-control']) !!}

        {!! Form::password('password',['class'=>'form-control']) !!}

        <br>

        {!! Form::label('photo_label','Photo',['class'=>'form-control']) !!}

        {!! Form::file('photo_id',null,['class'=>'form-control']) !!}

        <br>

        {!! Form::submit('Edit User',['class'=>'btn btn-primary col-sm-6']) !!}

        {!! Form::close() !!}

        {!! Form::open(['method'=>'DELETE','action'=>['AdminUserController@destroy',$users->id]]) !!}

        {!! Form::submit('Delete User',['class'=>'btn btn-danger col-sm-6']) !!}

    </div>

    </div>

    </div>

    <div class="row">

        @include('includes.error')

    </div>
@endsection