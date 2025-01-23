<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function index()
    {
        $userId = Auth::id();
        $tasks = Task::where('created_by', $userId)
            ->with('CreatedBy:id,name')
            ->get();
    
        // Transform the data to match the desired format
        $formattedTasks = $tasks->map(function ($task) {
            return [
                'id' => $task->id,
                'title' => $task->title,
                'description' => $task->description,
                'priority' => $task->priority,
                'status' => $task->status,
                'created_by' => $task->CreatedBy->name ?? null,
                'created_at' => $task->created_at,
                'updated_at' => $task->updated_at,
            ];
        });
    
        // Return formatted JSON response
        return response()->json([
            'status' => true,
            'message' => 'Tasks retrieved successfully',
            'data' => $formattedTasks,
        ], 200);
    }    


    public function store(Request $request)
    {
        // Validate input data
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'priority' => 'nullable|in:Low,Medium,High',
            'status' => 'nullable|boolean',
        ]);

        // Return validation errors if any
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        // Create a new task with the validated data
        $task = Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'priority' => $request->priority ?? 'Medium',
            'status' => $request->status ?? false,
            'created_by' => Auth::id(),
        ]);

        // Return success response with the created task
        return response()->json([
            'status' => true,
            'message' => 'Task created successfully',
            'data' => $task
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $task = Task::find($id);
        // Check if the task exists
        if (!$task) {
            return response()->json([
                'status' => false,
                'message' => 'Task not found',
            ], 404);
        }
        // Validate input data
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'priority' => 'nullable|in:Low,Medium,High',
            'status' => 'nullable|boolean',
        ]);
    
        // Return validation errors if any
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 422);
        }
        // Set default values for missing fields
        $data = $request->only(['title', 'description', 'priority', 'status']);
        $data['priority'] = $data['priority'] ?? 'Medium';
        $data['status'] = $data['status'] ?? false;
        $task->update($data);
    
        return response()->json([
            'status' => true,
            'message' => 'Task updated successfully',
            'data' => $task
        ], 200);
    }

    
    public function destroy($id)
    {
        $task = Task::find($id);
        if (!$task) {
            return response()->json([
                'status' => false,
                'message' => 'Task not found',
            ], 404);
        }

        $task->delete();
        return response()->json([
            'status' => true,
            'message' => 'Task deleted successfully',
            'data' => $task
        ], 200);
    }
}
