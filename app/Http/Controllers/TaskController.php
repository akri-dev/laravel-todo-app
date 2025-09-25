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
        $all_tasks = $this->task_m->latest()->get();
        return view('tasks.index')->with('all_tasks', $all_tasks);
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

    public function edit($id)
    {
        $task = $this->task_m->findOrFail($id);
        return view('tasks.edit')->with('task', $task);
    }

    // Modify task in task table
    public function update(Request $request, $id)
    {
        // Validate request with rules
        $request->validate([
            'task_name' => 'required|max:50'
        ]);

        $task_m = $this->task_m->findOrFail($id);
        $task_m->name = $request->task_name;
        $task_m->save();

        // redirect back to go back to index page
        return redirect()->route('index');
    }

    public function destroy($id)
    {
        $this->task_m->destroy($id);
        return redirect()->back();
    }

}
