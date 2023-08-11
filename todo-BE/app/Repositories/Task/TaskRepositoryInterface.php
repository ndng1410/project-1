<?php

namespace App\Repositories\Task;

use App\Repositories\RepositoryInterface;
use Illuminate\Http\Request;

interface TaskRepositoryInterface extends RepositoryInterface {
    public function getTaskAll();

    public function getTaskByDate(Request $request);

    public function statusCompleted($id);

    public function statusInCompleted($id);

}