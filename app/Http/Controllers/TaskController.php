<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    private $task_m;

    public function __construct(Task $task)
    {
        $this->task_m = $task;
    }

    public function index()
    {
        return view('tasks.index');
    }
}
