<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use Illuminate\Http\Request;

class TaskController extends Controller
{


    public function index()
    {
        return Task::orderByDesc('id')->get();
    }


    public function store(StoreTaskRequest $request)
    {
        $task = Task::create($request->all());
        return  $task ? response()->json($task, 201) : response()->json([], 500);
    }

    public function show(Task $task)
    {
        return  $task;
    }


    public function update(Request $request, Task $task)
    {
        $task->title = $request->title;
        return  $task->update() ? response()->json($task) : response()->json([], 500);
    }

    public function destroy(Task $task)
    {
        return  $task->delete() ? response()->json($task) : response()->json([], 500);
    }
}
