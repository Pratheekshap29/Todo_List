@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <a class="btn btn-lg btn-primary" href="{{ route('todo.index') }}">Create your todo</a>
                        <a class="btn btn-lg btn-primary" href="{{ url('fullcalendar') }}">Calender View</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container pt-4">
@php
use Carbon\Carbon;
$current=new Carbon();
$current->timezone('Asia/Kolkata');
@endphp
@foreach ($todos as $todo)
    @if($current >= $todo->startTime)
    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="false">
    <div class="toast-header">
        <img src="..." class="rounded mr-2" alt="...">
        <strong class="mr-auto">{{$todo->title}}</strong>
        <small class="text-muted">{{$todo->startTime}}</small>
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="toast-body">
        See? Just like this.
    </div>
    </div>
    @endif
@endforeach
</div>
@endsection