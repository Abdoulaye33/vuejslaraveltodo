<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('welcome', compact('tasks'));
    }

    public function jsonIndex()
    {
        $tasks = Task::all();
        return response()->json(['tasks' => $tasks]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $task = Task::create($request->all());
        return response()->json(['task' => $task], 201);
    }

    public function update(Request $request, Task $task)
    {
        $task->update(['completed' => $request->completed]);
        return response()->json(['task' => $task]);
    }
}
