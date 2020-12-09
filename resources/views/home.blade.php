@extends('layouts.app')

@section('content')

<div class="container">
    
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-dark text-white">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <div class="container mb-4">
                        <div clas="row">
                        <div class="col text-center">
                            <a class="btn btn-lg btn-dark mb-2" href="{{ route('todo.index') }}">Create your todo</a>
            
                            <a class="btn btn-lg btn-dark mb-2 " href="{{ url('fullcalendar') }}">Calender View</a> 
                        </div>
                        </div>
                    </div>
                    <hr>
                    <h3><i class="icon fas fa-bell mr-2 "></i>Notifications</h3>
                    <div class="container pt-4">
                @php
                use Carbon\Carbon;
                $current=new Carbon();
                $current->timezone('Asia/Kolkata');
                @endphp
                @foreach ($todos as $todo)
                    @if($current >= $todo->startTime)
                        <div class="alert alert-warning pb-4" role="alert">
                            It's time to - <strong>{{$todo->title}}</strong>
                            <small class="text-muted float-right">{{$todo->startTime}}</small>
                        </div>
                        
                    @endif
                @endforeach
                @if(count($todos)<1)
                    <p>No Notifications</p>
                @endif
                
                </div>    
                </div>
            </div>
        </div>
    </div>
    
</div>

@endsection

