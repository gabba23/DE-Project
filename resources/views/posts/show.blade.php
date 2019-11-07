@extends('layouts.app')

@section('content')
    <br>
    <br>
    <a href="/posts" class="btn btn-primary">Go back</a>
    <br>
    <br>


    <table class="table table-striped">
        <td>es</td>
        <td>es</td>
        <td>es</td>
        <td>es</td>
    </table>

    <h1>{{$post->title}}</h1>
    <div>
        {{$post->timesaday}}
    </div>
    <div>

    </div>
    <hr>
    <small>Written on {{$post->created_at}}</small>
    <hr>
<a href="/posts/{{$post->id}}/edit" class="btn btn-primary">Edit</a>
{!!Form::open(['action' => ['PostsController@destroy', $post->id],'method' => 'POST', 'class' => 'pull-right'])!!}
    {{Form::hidden('_method', 'DELETE')}}
    {{Form::submit('Delete', ['class' =>'btn btn-danger'])}}
{!!Form::close()!!}
@endsection