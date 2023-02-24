<?php

namespace App\Http\Livewire;

use App\Models\Task;
use Livewire\Component;

class TaskTable extends Component
{
    public $tasks;

    public function render()
    {
        $update_task = $this->tasks->sortBy('position')->all();
        return view('livewire.task-table',compact('update_task'));
    }
    public function updateTaskOrder($tasks)
    {
        foreach ($tasks as $task)
        {
            Task::find($task['value'])->update(['position'=>$task['order']]);
        }
    }

}
