<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $take = $request->input('take', 10);
        $skip = $request->input('skip', 0);
        $search = $request->input('search', '');

        $tasks = Task::query();

        if ($search != '') {
            $tasks->where('name', 'like', "%$search%");
        }

        $tasks = $tasks->skip($skip)->take($take)->get();

        return response()->json(TaskResource::collection($tasks));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'description' => 'required|string',
            'is_active' => 'required|boolean',
            'project_id' => 'required|exists:projects,id',
            'owner_id' => 'required|exists:users,id',
            'creator_id' => 'required|exists:users,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);

        $task = Task::create($request->all());

        return response()->json(TaskResource::make($task));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $task = Task::find($id);

        return response()->json(TaskResource::make($task));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'description' => 'required|string',
            'is_active' => 'required|boolean',
            'project_id' => 'required|exists:projects,id',
            'owner_id' => 'required|exists:users,id',
            'creator_id' => 'required|exists:users,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);

        $task = Task::find($id);
        $task->update($request->all());

        return response()->json(TaskResource::make($task));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = Task::find($id);
        $task->delete();

        return response()->json(TaskResource::make($task));
    }
}
