@extends('admin.index')

@section('top-header')
Create Users

@endsection

@section('content')

    <div class="form-group">

        {!! Form::open(['method'=>'POST','action'=>'AdminUserController@store','file'=>true]) !!}

        {!! Form::label('name_label','Name',['class'=>'form-control']) !!}

        {!! Form::text('name',null,['class'=>'form-control']) !!}

        <br>

        {!! Form::label('email_label','Email',['class'=>'form-control']) !!}

        {!! Form::email('email',null,['class'=>'form-control']) !!}

        <br>

        {!! Form::label('role_label','Role',['class'=>'form-control']) !!}

        {!! Form::select('role_id',[''=>'Select a Role']+($user),null,['class'=>'form-control']) !!}

        <br>

        {!! Form::label('is_active_label','Status',['class'=>'form-control']) !!}

        {!! Form::select('is_active',array(0=>'Not Active',1=>'Active'),0,['class'=>'form-control']) !!}

        <br>

        {!! Form::label('password_label','Password',['class'=>'form-control']) !!}

        {!! Form::password('password',['class'=>'form-control']) !!}

        <br>

        {!! Form::label('file_label','Photo',['class'=>'form-control']) !!}

        {!! Form::file('file',null,['class'=>'form-control']) !!}

        <br>

        {!! Form::submit('Create',['class'=>'btn btn-primary']) !!}

        {!! Form::close() !!}

    </div>

    @include('includes.error')

@endsection