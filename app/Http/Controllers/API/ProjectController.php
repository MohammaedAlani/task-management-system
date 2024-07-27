<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequest;
use App\Http\Resources\ProjectResource;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ProjectRequest $request)
    {
        $take = $request->input('take', 10);
        $skip = $request->input('skip', 0);
        $search = $request->input('search', '');

        $projects = Project::query();

        if ($search != '') {
            $projects->where('name', 'like', "%$search%");
        }

        $projects = $projects->skip($skip)->take($take)->get();


        return response()->json(ProjectResource::collection($projects));
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
            'owner_id' => 'required|exists:users,id',
            'creator_id' => 'required|exists:users,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);

        $project = Project::create($request->all());

        return response()->json(ProjectResource::make($project));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $project = Project::find($id);

        if ($project == null) {
            return response()->json(['message' => 'Not Found'], 404);
        }

        return response()->json(ProjectResource::make($project));
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
            'owner_id' => 'required|exists:users,id',
            'creator_id' => 'required|exists:users,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);

        $project = Project::find($id);

        if ($project == null) {
            return response()->json(['message' => 'Not Found'], 404);
        }

        $project->update($request->all());

        return response()->json(ProjectResource::make($project));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $project = Project::find($id);

        if ($project == null) {
            return response()->json(['message' => 'Not Found'], 404);
        }

        $project->delete();

        return response()->json(['message' => 'Successfully deleted']);
    }
}
