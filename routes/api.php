<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('projects', App\Http\Controllers\ProjectsController::class);
Route::apiResource('deployment-checks', App\Http\Controllers\DeploymentChecksController::class);

Route::post('api/projects', [App\Http\Controllers\ProjectsController::class, 'store']);
Route::get('api/projects', [App\Http\Controllers\ProjectsController::class, 'show']);   
Route::post('api/projects/{project}/checks', [App\Http\Controllers\DeploymentChecksController::class, 'store']);
Route::patch('/api/checks/{check}/complete', [App\Http\Controllers\DeploymentChecksController::class, 'update']);
