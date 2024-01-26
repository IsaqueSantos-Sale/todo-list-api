<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index(): JsonResponse
    {
        $user = Auth::user();
        $task = TaskResource::collection($user->tasks);
        return response()->json($task);
    }

    public function store(StoreTaskRequest $request): JsonResponse
    {
        $task = Task::create([
            "user_id" => $request->user()->id,
            ...$request->validated()
        ]);
        return response()->json(new TaskResource($task), 201);
    }
}
