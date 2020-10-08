@extends('layout.app')
@section('content')
    <a class="btn btn-default" href="/">Back</a>
    <h1><a href="todo/{{$todo->id}}"></a> {{$todo->text}} </h1>
    <div class="badge badge-warning">{{$todo->due}}</div>
    <hr>
    <P>{{$todo->body}}</P>
    <br> <br>
    <div class="btn-group">
    <a href="/todo/{{$todo->id}}/edit" class="btn btn-secondary">Edit</a>

    <form action="{{url('todo/'.$todo->id)}}" method="post">
        @csrf
        @method('DELETE ')
        <button type="button" class="btn btn-danger">Delete</button>
    </form>
    </div>
@endsection