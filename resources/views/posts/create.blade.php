@extends('layouts.app')


@section('content')
    <h1>Create Medicine</h1>
    {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST']) !!}
        <div class="form-group">
                {{Form::label('title', 'Medicine')}}
                {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Medicine name'])}}
        </div>
        <div class="form-group">
                {!! Form::label('timesaday', 'How many to take per day', ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col-lg-10">
                    {!!  Form::select('timesaday', ['1 per day' => '1 time, Morning', '2 per day' => '2 times, Morning, Evening', '3 per day' => '3 times, Morning, Afternoon, Evening', ],  'S', ['class' => 'form-control' ]) !!}
                </div>
               <div class="form-group">
            {!! Form::label('beforeafter', 'Meal time', ['class' => 'col-lg-2 control-label'] )  !!}
            <div class="col-lg-10">
                {!!  Form::select('beforeafter', ['B' => 'Before meal', 'A' => 'After meal', 'D' => 'During meal', 'I' => 'Irrelevant' ],  'S', ['class' => 'form-control' ]) !!}
            </div>
        </div>
            
            {{Form::submit('submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}

    
@endsection