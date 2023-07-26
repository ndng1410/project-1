<?php 

namespace App\Repositories\Task;

use App\Models\Task;
use App\Repositories\BaseRepository;

class TaskRepository extends BaseRepository implements TaskRepositoryInterface {
    public function getModel() {
        return Task::class;
    }

    public function getProduct() {
        return $this->model->getAll();
    }
}

