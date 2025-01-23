<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        // Validate the query parameters
        $validated = $request->validate([
            'priority' => 'nullable|in:Low,Medium,High',
            'status' => 'nullable|boolean',
        ]);
    
        // Fetch authenticated user's tasks
        $tasks = Task::where('created_by', Auth::user()->id)
            ->when($validated['priority'] ?? null, function ($query, $priority) {
                $query->where('priority', $priority);
            })
            ->when(isset($validated['status']), function ($query) use ($validated) {
                $query->where('status', $validated['status']);
            })
            ->paginate(10)
        ->appends($request->query());
    
        return view('tasks.index', ['tasks' => $tasks,'priority' => $validated['priority'] ?? null,'status' => $validated['status'] ?? null,
        ]);
    }    

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'priority' => 'required|in:Low,Medium,High',
            'status' => 'required|boolean',
        ]);
        $validatedData['created_by'] = Auth::id();
        Task::create($validatedData);
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
            'status' => 'required|boolean',
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
