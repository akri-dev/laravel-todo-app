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

    // Save a task to the tasks table
    // Request is the data from the form
    public function store(Request $request)
    {
        // Validate request with rules
        $request->validate([
            'task_name' => 'required|max:50'
        ]);

        // model/database task name = form task name 
        $this->task_m->name = $request->task_name;
        $this->task_m->save();

        // redirect back to go back to index page
        return redirect()->back();
    }
}
