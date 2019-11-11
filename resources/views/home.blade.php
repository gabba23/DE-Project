@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Medicine list</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <a href="/posts/create" class="btn btn-primary">Add medicine</a>
                        <hr>
                        
                    <h3>The list of medicine</h3>
                    @if(count($posts) > 0)
                    <div style="overflow-x:auto;">
                    <table class="table table-striped ">
                        <tr>
                            <td>Name</td>
                            <td>Times a day</td>
                            <td>B/A Meals</td>
                            <td>Days left</td>
                            <td>Edit</td>
                            <td>Delete</td>
                        </tr>
                        @foreach($posts as $post)
                            <tr>
                                <td>{{$post->title}}</td>
                                <td>{{$post->timesaday}}</td>
                                <td>{{$post->beforeafter}}</td>
                                <td>{{$post->daysleft}}</td>
                                <td><a href="/posts/{{$post->id}}/edit" class="btn btn-primary">Edit</a></td>
                                <td>
                                    {!!Form::open(['action' => ['PostsController@destroy', $post->id],'method' => 'POST', 'class' => 'pull-right'])!!}
                                        {{Form::hidden('_method', 'DELETE')}}
                                        {{Form::submit('Delete', ['class' =>'btn btn-danger'])}}
                                    {!!Form::close()!!}
                                </td>
                                <td><button type="submit"  class="donate_now btn btn-secondary generalDonation" data-toggle="modal"  data-backdrop="static" data-keyboard="false" data-target="#myModalHorizontal"> Information </button></td>
                            </tr>
                            <div class="modal fade" id="myModalHorizontal" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header" style="background: blue">
                                                
                                                <h4 class="modal-title" id="myModalLabel" style="color: whitesmoke;">Information about the medication</h4>
                                            </div>            <!-- Modal Body -->
                                            <div class="modal-body">
                                                <h1>Sertraline</h1>
                                                <hr>
                                                <h2>Dosage</h2>
                                                <p>Once a day, morning. Usual dose - 50mg a day. Maximum 200mg a day.</p>
                                                <h2>Side effects</h2>
                                                <p>Feeling sick, headaches and trouble sleeping, diarrhoea, dry mouth, dizziness, feeling tired or weak</p>
                                                <h2>Description</h2>
                                                <p>Sertraline is a type of antidepressant known as a selective serotonin reuptake inhibitor (SSRI). It's often
                                                    used to treat depression, and also sometimes panic attacks, obsessive compulsive disorder (OCD) and
                                                    post-traumatic stress disorder (PTSD). Sertraline helps many people recover from depression, and has
                                                    fewer unwanted side effects than older antidepressants. Comes as tablets. It usually takes 4 to 6 weeks
                                                    for sertraline to work.</p>
                                                        
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="ion-android-close"></span>Close</button>
        
                                                
                                            </div>
                                        </div>
                                    </div>
                        @endforeach
                    </table>
                </div>
                    @else
                    <p>You have no medicine added</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
