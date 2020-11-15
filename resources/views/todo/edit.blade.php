@extends('layouts.app')

@section('content')

<div class="jumbotron jumbotron-fluid">
  <div class="container">

    <h2 class="display-4 ">Edit your Todo:</h2>
    <form action="{{route('todo.update',$todo->id)}}" method="POST">
    @csrf
    @method('PUT')
        <div class="container">
        <div class="form-group row text-center justify-content-center">
            <label class="col-sm-2 col-form-label">Todo title</label>
            <div class=col-sm-3">
                <input type="text" class="form-control" name="title" value="{{$todo->title}}">
            </div>
        </div>
        <div class="form-group row text-center justify-content-center">
            <label class="col-sm-2 col-form-label">Date and time</label>
            <div class="col-sm-3">
            <input class="form-control" type="datetime-local" name="startTime" value="{{ date('Y-m-d\TH:i', strtotime($todo->startTime))}}">
            </div>
        </div>
        </div>
            <div class="container">
            <div class="row">
                <div class="col text-center">
                <button class="btn btn-primary btn-lg">Save changes</button>
                </div>
            </div>
        </div>
    </form>
  </div>
</div>

@endsection