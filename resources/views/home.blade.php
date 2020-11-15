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
                        <a class="btn btn-lg btn-primary" href="{{ route('todo.index') }}">Calender View</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection