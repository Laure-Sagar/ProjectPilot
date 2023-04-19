<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        return view('task.index')
    }
    public function subindex()
    {
        return view('subtasks.index');
    }
}
