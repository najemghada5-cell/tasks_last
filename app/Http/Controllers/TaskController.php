<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('tasks', compact('tasks'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:10',
        ]);

        $task = new Task();
        $task->name = $request->name;
        $task->save();

        return redirect()->back();
    }

    public function destroy($id)
    {
        Task::destroy($id);

        return redirect()->back();
    }

    public function edit($id)
    {
        $task = Task::findOrFail($id);
        return view('task-edit', compact('task'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:3|max:10',
        ]);

        Task::findOrFail($id)->update(['name' => $request->name]);

        return redirect('/tasks');
    }
}
