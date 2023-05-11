<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubTask extends Model
{
    use HasFactory;

    public $table = 'sub_tasks';

    protected $fillable = [
        'name',
        'description',
        'date',
        'members',
        'task_id',
    ];
}
