<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Task\TaskRepositoryInterface;
use App\Models\Task;

class TaskController extends Controller
{
    protected $taskRepository;

    public function __construct(TaskRepositoryInterface $taskRepository) {
        // $taskRepository =  app()->make(TaskRepositoryInterface::class);
        $this->taskRepository = $taskRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return $this->taskRepository->getAll(); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->all();
        $task = $this->taskRepository->create($data);
        return $task;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    { 
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $data = $request->all();
        $task = $this->taskRepository->update($id, $data);
        return response()->json($task);
        // return [
        //     'status' => 200,
        //     'data' => $task
        // ];
        // $task = Task::findOrFail($id);
        // $task->update([ 
        //     'task_name' => $request['task_name'],
        // ]);
        // return response()->json($task);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $this->taskRepository->delete($id);
        return [
            'status' => 'success',
        ];
    }
}
