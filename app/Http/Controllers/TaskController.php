<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $priority = $request->input('priority');
        $status = $request->input('status');
        $query = Task::query();

        if ($priority) {
            $query->where('priority', $priority);
        }

        if ($status !== null) {
            $query->where('status', $status);
        }
        $tasks = $query->paginate(10)->appends(request()->query());
        return view('tasks.index', compact('tasks', 'priority', 'status'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'priority' => 'in:Low,Medium,High',
        ]);

        Task::create($request->all());
        toastr()->success('Task created successfully.');
        return redirect()->route('tasks.index');
    }

    public function view($id)
    {
        $tasks = Task::findOrFail($id);
        return view('tasks.view', compact('tasks'));
    }

    public function edit($id)
    {
        $tasks = Task::findOrFail($id);
        return view('tasks.edit', compact('tasks'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'priority' => 'in:Low,Medium,High',
        ]);
        $tasks = Task::find($id);
        $tasks->update($request->all());
        toastr()->success('Task updated successfully.');
        return redirect()->route('tasks.index');
    }


    public function destroy($id)
    {
        $tasks = Task::findOrFail($id);
        $tasks->delete();
        return redirect()->back();
    }
}
