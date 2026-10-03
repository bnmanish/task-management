<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Task;

class HomeController extends Controller
{
    public function home(){
        $projects = Project::all();
        return view('home')->with(['projects' => $projects]);
    }

    public function addTask(Request $request){
        
        $request->validate([
            'project'=>'required',
            'name'=>'required',
            'priority'=> 'required|integer',
        ]);

        $task = new Task;
        $task->project_id=$request->project;
        $task->name=$request->name;
        $task->priority=$request->priority;
        $task->save();

        return redirect()->route('home')->with(['message' => "Task Added successfully!"]);
        
    }

    public function getTaskList(Request $request){
        $tasks = Task::select('id','name','priority')->where(['project_id' => $request->project])->orderBy('priority','asc')->get();
        return view('task_list')->with(['tasks'=>$tasks]);
    }

    public function updateTaskOrder(Request $request){
        // var_dump($request->order);
        foreach($request->order as $row){

            Task::where('id',$row['id'])->update([
                'priority' => $row['priority'],
            ]);

        }
    }

    public function deleteTask(Request $request){
        Task::where('id',$request->id)->delete();
        return ['status' => true];
    }

    public function updateTask(Request $request){
        Task::where('id',$request->id)->update([
            'name' => $request->name,
            'priority' => $request->priority,
        ]);
        return ['status' => true];
    }


}
