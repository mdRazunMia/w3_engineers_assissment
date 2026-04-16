<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class projects extends Model
{

    protected $table = 'projects';

    /** @use HasFactory<\Database\Factories\ProjectsFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'owner_email',
        'release_date',
    ];

    public function deployment_checks()
    {
        return $this->hasMany(deployment_checks::class);
    }
