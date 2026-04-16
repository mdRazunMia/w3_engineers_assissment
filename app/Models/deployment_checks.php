<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class deployment_checks extends Model
{

    protected $table = 'deployment_checks';

    /** @use HasFactory<\Database\Factories\DeploymentChecksFactory> */
    use HasFactory;
    protected $fillable = [
        'project_id',
        'title',
        'is_completed',
        'completed_at',
    ];

    public function project()
    {
        return $this->belongsTo(projects::class);
    }
