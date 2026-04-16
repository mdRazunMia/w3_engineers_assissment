<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreProjects;
use App\Models\projects;


class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = projects::all();
        return response()->json($projects);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjects $request)
    {
        $validatedData = $request->validated();

        $project = projects::create($validatedData);

        return response()->json($project, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $project = projects::with(['deployment_checks' => function ($query) {
            $query->orderBy('created_at', 'desc');
        }])->withCount([
            'deployment_checks',
            'deployment_checks as completed_checks' => function ($query) {
                $query->where('is_completed', true);
            }
        ])->findOrFail($id);

        return response()->json($project);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreProjects $request, string $id)
    {
            $validatedData = $request->validated();
    
            $project = projects::findOrFail($id);
            $project->update($validatedData);
    
            return response()->json($project);
    }

}
