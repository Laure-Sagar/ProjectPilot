<?php

namespace App\Models;

use App\Models\Team;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Board extends Model
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
