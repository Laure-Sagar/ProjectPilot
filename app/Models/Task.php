<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'earliest_start_date',
        'earliest_finish_date',
        'latest_start_date',
        'latest_finish_date',
        'task_duration',
        'dependencies_board',
        'status',
        'project_id'
    ];

    public function project()
    {
        return $this->belongsTo(Team::class, 'project_id');
    }
}
