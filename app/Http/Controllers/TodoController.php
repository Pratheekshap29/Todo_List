<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\User;

class TodoController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user_id=auth()->user()->id;
        $user= User::find($user_id);
        return view('todo.index')->with('todos',$user->todos);

        // $todos = Todo::latest()->get();
        // return view('todo.index')->with('todos',$todos);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function fetchTodo()
    {

        $user_id=auth()->user()->id;
        $user= User::find($user_id);
        return ($user->todos);

        // $todos = Todo::latest()->get();
        // return view('todo.index')->with('todos',$todos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'title' =>'required|max:255',
            'startTime'=>'date'
        ]);
        
        $dt = Carbon::create($request->startTime);

        $todo = Todo::create([
            'title'=>$request->title,
            'completed'=>0,
            'startTime'=>$request->startTime,
            'endTime'=>$dt->addHour(),
            'user_id'=>auth()->user()->id
            // 'endTime'=>date("Y-m-d H:i:s", strtotime( $request->startTime,'+3600'))
        ]);
        return redirect(route('todo.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo $todo)
    {
        if(auth()->user()->id != $todo->user_id)
        {
            return redirect(route('todo.index'));    
        }
        else{
            return view('todo.edit')->with('todo',$todo);
        }
         
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todo $todo)
    {
        $todo->update($request->all());
        $dt = Carbon::create($request->startTime)->addhour();
        $todo->endTime = $dt;
        $todo->save();
        return redirect(route('todo.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        $todo->delete();
        return redirect(route('todo.index'));
    }
}
