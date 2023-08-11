<?php 

namespace App\Repositories\Task;

use App\Models\Task;
use App\Repositories\BaseRepository;
use Illuminate\Http\Request;

class TaskRepository extends BaseRepository implements TaskRepositoryInterface {
    public function getModel() {
        return Task::class;
    }

    public function getTaskAll() {
        $data = $this->model->get()->groupBy(function ($date) {
            return $date->created_at->format('Y-m-d');
        });
        return response()->json($data);
    }

    public function getTaskByDate($request) {
        $date = $request->input('created_at');
        $data = $this->model->whereDate('created_at', $date)->get();
        return response()->json($data);
    }

    public function statusCompleted($id) {
        $status = $this->model->findOrFail($id);
        return $status->update(['status' => 1]);
    }

    public function statusInCompleted($id) {
        $status = $this->model->findOrFail($id);
        return $status->update(['status' => 0]);
    }
}

