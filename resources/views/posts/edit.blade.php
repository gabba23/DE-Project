@extends('layouts.app')

@section('content')
    <h1>Edit Medicine</h1>
    {!! Form::open(['action' => ['PostsController@update', $post->id], 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('title', 'Medicine')}}
            {{Form::text('title', $post->title, ['class' => 'form-control', 'placeholder' => 'Medicine name'])}}
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
            <div class="form-group">
                    {!! Form::label('daysleft', 'How long needed to take medicine', ['class' => 'col-lg-3 control-label'] )  !!}
                    <div class="col-lg-10">
                    {!!  Form::select('daysleft', ['∞' => 'Indefinitely', 1, 3, 7, 14, 21, 30, 60, 90, 180, 365, ],  'S', ['class' => 'form-control' ]) !!}
                </div>
            </div>
            {{Form::hidden('_method', 'PUT')}}
            
            
            
            {{Form::submit('submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection