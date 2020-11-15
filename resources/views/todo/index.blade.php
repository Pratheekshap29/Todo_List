@extends('layouts.app')

@section('content')

<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4 ">Todo List</h1>
    <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>

    <form action="{{route('todo.store')}}" method="POST">
    @csrf
        <div class="container">
        <div class="form-group row text-center justify-content-center">
            <label class="col-sm-2 col-form-label">Todo title</label>
            <div class=col-sm-3">
                <input type="text" class="form-control" name="title" placeholder="Type here...">
            </div>
        </div>
        <div class="form-group row text-center justify-content-center">
            <label class="col-sm-2 col-form-label">Date and time</label>
            <div class="col-sm-3">
            <input class="form-control" type="datetime-local" name="startTime">
            </div>
        </div>
        </div>
            <div class="container">
            <div class="row">
                <div class="col text-center">
                <button class="btn btn-primary btn-lg">Add to the list</button>
                </div>
            </div>
        </div>
    </form>
  </div>
</div>

<h3 class="text-center pt-2 pb-3">My Todo List:</h3>
<div class="container bg-white mb-4">
    @forelse ($todos as $todo)
        <div class="d-flex align-items-center justify-content-between">
        <div class="p-4">
            @if($todo->completed==0)
                <i class="pr-2 fas fa-angle-right"></i>
            @else
                <i class="pr-2 fas fa-check"></i>
            @endif
            {{$todo->title}}
        </div>
        <div class="mr-4 d-flex align-items-center">
            @if($todo->completed==0)
                <form action={{route('todo.update',$todo->id)}} method='POST'>
                    @method('PUT')
                    @csrf
                    <input type="text" name="completed" value="1" hidden>
                    <button class="btn btn-success">Mark as completed</button>
                </form>
            @else
                <form action={{route('todo.update',$todo->id)}} method='POST'>
                    @method('PUT')
                    @csrf
                    <input type="text" name="completed" value="0" hidden>
                    <button class="btn btn-warning">Mark as not completed</button>
                </form>
            @endif
            <a class="inline-block" href={{route('todo.edit',$todo->id)}}>
                <i class="ml-4 fas fa-edit "></i>
            </a>
            
            <form action="{{route('todo.destroy',$todo->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn border-0 bg-trasparent ml-2">
                <i class="fas fa-trash"></i>
                </button>
            </form>
        </div>
        </div>
    @empty
    <div class="d-flex align-items-center justify-content-between">
        <div class="p-4 mx-auto">
           There are no items in your Todo List!!
        </div>
    </div>

    @endforelse
</div>

@endsection