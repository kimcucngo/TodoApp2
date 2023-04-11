<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Http\Requests\TaskRequest;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Task 一覧
     */
    public function index()
    {
        return Task::orderByDesc('id')->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Task::all();
    }

    /**
     * Post.
     */
    public function store(TaskRequest $request)
    {
        $task = Task::create($request->all());
        return $task
            ?response()->json($task,201)
            :reponse()->json([],500);
    }
    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return Task::all();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        return Task::all();
    }

    /**
     * Update.
     */
    public function update(TaskRequest $request, Task $task)
    {
        $task->title = $request->title;
        return $task->update()
            ?response()->json($task)
            :reponse()->json([],500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Task::where('id',$id)->delete();
    }
}