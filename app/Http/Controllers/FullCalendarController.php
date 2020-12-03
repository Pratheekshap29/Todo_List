<?php
   
namespace App\Http\Controllers;
   
use App\Todo;
use Illuminate\Http\Request;
use Redirect,Response;
   
class FullCalendarController extends Controller
{
 
    public function index()
    {
        if(request()->ajax()) 
        {
 
         $start = (!empty($_GET["start"])) ? ($_GET["start"]) : ('');
         $end = (!empty($_GET["end"])) ? ($_GET["end"]) : ('');
 
         $data = Todo::whereDate('start', '>=', $start)->whereDate('end',   '<=', $end)->get(['id','title','startTime', 'endTime']);
         return Response::json($data);
        }
        return view('todo.fullcalendar');
    }
    
   
    public function create(Request $request)
    {  
        // $insertArr = [ 'title' => $request->title,
        //                 'completed'=>0,
        //                'startTime' => $request->startTime,
        //                'endTime' => $request->endTime,
        //                'user_id'=>auth()->user()->id
        //             ];
        // $todo = Todo::insert($insertArr);   
        // return Response::json($todo);
    }
     
 
    public function update(Request $request)
    {   
        // $where = array('id' => $request->id);
        // $updateArr = ['title' => $request->title,'startTime' => $request->startTime, 'endTime' => $request->endTime];
        // $todo  = Todo::where($where)->update($updateArr);
 
        // return Response::json($todo);
    } 
 
 
    public function destroy(Request $request)
    {
        // $todo = Todo::where('id',$request->id)->delete();
   
        // return Response::json($todo);
    }    
 
 
}