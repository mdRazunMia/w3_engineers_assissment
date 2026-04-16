<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDeploymentCheck;
use App\Models\deployment_checks;


class DeploymentChecksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $deploymentChecks = deployment_checks::all();
        return response()->json($deploymentChecks);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDeploymentCheck $request, string $projectId)
    {
        $validatedData = $request->validated();
        $validatedData['project_id'] = $projectId;
        $deploymentCheck = deployment_checks::create($validatedData);

        return response()->json($deploymentCheck, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $deploymentCheck = deployment_checks::findOrFail($id);
        return response()->json($deploymentCheck);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreDeploymentCheck $request, string $id)
    {
        $deploymentCheck = deployment_checks::findOrFail($id);
        $deploymentCheck->is_completed = true;
        $deploymentCheck->completed_at = now();
        $deploymentCheck->update($request->validated());
        return response()->json($deploymentCheck);
    }
}
