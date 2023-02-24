@extends('layouts.app')
@section('content')
    <div class="container">

        <div class="row mt-5">
            <div class="col-12">
                <div class="card" style="width: 100%;">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li style="list-style: none">- {{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card-header">
                        New Task
                    </div>
                    <div class="container">
                        <form class="form-group" action="{{ route('tasks.store') }}" method="post">
                            @csrf
                            <label class="fs-5">Task</label>
                            <input class="form-control" type="text" name="task_name">
                            <button class="mt-2 btn btn-default" type="submit"><i class="fa-solid fa-plus"></i>Add Task</button>
                        </form>
                    </div>
                </div>


            </div>
            <div class="col-12 mt-5">
                <div class="card" style="width: 100%;">
                    <div class="card-header">
                        Current Task
                    </div>
                    <div class="container">
                        <h5 class="mt-2">Task <span style="font-size: 13px!important;">hint : (should make 2 swap to get right position)</span></h5>
                        @if(isset($tasks) && count($tasks) > 0)
                             @livewire('task-table',['tasks'=>$tasks])
                        @else
                            <li  class="border-0 list-group-item text-center">No Task Yet</li>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
