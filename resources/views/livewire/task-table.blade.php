<div>

    <ul class="list-group list-group-flush" wire:sortable="updateTaskOrder">
            @foreach($update_task as $task)
                <div class="row" wire:sortable.item="{{ $task->id }}" wire:key="task-{{ $task->id }}"  wire:sortable.handle class="list-group-item" >
                    <div class="col-8">
                        <li class="nav-link">{{ $task->task_name }}</li>
                    </div>
                    <div class="col-4">
                        <form action="{{ route('tasks.destroy',$task->id) }}" method="post">
                            @csrf
                            {{method_field('delete')}}
                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach

    </ul>
</div>
