<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Todo;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_id=auth()->user()->id;
        $user= User::find($user_id);
        $todos=$user->todos;
        $todos= $todos->sortByDesc('startTime');
        // $todos->all();
        return view('home')->with('todos',$todos);
    }
    
    // public function update(Request $request, Todo $todo)
    // {
    //     $todo->update($request->all());
    //     // $todo->save();
    //     return redirect(route('home'));
    // }

}
