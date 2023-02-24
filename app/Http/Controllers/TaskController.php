<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;

/**
 * Class TaskController
 * @package App\Http\Controllers
 */
class TaskController extends Controller
{


    public function index()
    {
        $tasks = Task::orderBy('position')->get();
        return view('task.index',compact('tasks'));
    }

    public function store(TaskRequest $request)
    {

        $taskName = $request->only('task_name')['task_name'];
        $position = Task::orderBy('position')->get();
        if(count($position) == 0)
            $new_position = 0;
        else {
            $last_position = count($position) - 1;
            $new_position = $position[$last_position]['position'];
        }
        $task = Task::create(
            [
                'task_name'=>$taskName,
                'position'=>$new_position + 1
            ]
        );
        return redirect()->route('tasks.index');
    }


    public function destroy(Task $task)
    {
        $task->where('position','>',$task->position)
            ->update(
                     ['position'=>\DB::raw('position-1')]
                   );
       $task->delete();
       return redirect()->route('tasks.index');
    }
}
