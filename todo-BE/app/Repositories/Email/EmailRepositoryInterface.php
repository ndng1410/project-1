<?php

namespace App\Repositories\Email;

use App\Repositories\RepositoryInterface;

interface EmailRepositoryInterface extends RepositoryInterface {
    public function getEmail();
}