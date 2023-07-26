<?php

namespace App\Repositories\Email;

use App\Models\Email;
use App\Repositories\BaseRepository;
use GuzzleHttp\Psr7\Request;

class EmailRepository extends BaseRepository implements EmailRepositoryInterface {
    public function getModel() {
        return Email::class;
    }

    public function getEmail() {
        return $this->model->getAll();
    }

    // public function addEmail(Request $request) {
    //     if(Email::where('email', $request->email)->exists()) {

    //     }
    // }
}