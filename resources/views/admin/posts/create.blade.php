@extends('admin.index')


@section('top-header')

    Posts

@endsection

@section('content')


    <div class="row">

        {!! Form::open(['method'=>'POST','action'=>'AdminPostController@store','files'=>true]) !!}

        {!! Form::label('title_label','Title',['class'=>'form-control']) !!}
        {!! Form::text('title',null,['class'=>'form-control']) !!}

        <br>

        {!! Form::label('category_label','Category',['class'=>'form-control']) !!}
        {!! Form::select('category_id',array(""=>"Select a category",1=>'PHP',3=>'Javascript'),null,['class'=>'form-control']) !!}

        <br>





        {!! Form::label('body_label','Body',['class'=>'form-control']) !!}
        {!! Form::textarea('body',null,['class'=>'form-control']) !!}

<br>

        {!! Form::label('photo_label','Photo',['class'=>'form-control']) !!}
        {!! Form::file('photo_id',null,['class'=>'form-control']) !!}

        <br>

        {!! Form::submit('Create',['class'=>'btn btn-primary']) !!}

        {!! Form::close() !!}

</div>

        <div class="row">

        @include('includes.error')

        </div>
@endsection