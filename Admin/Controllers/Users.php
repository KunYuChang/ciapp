<?php

// php spark make:controller Users --namespace Admin

namespace Admin\Controllers;

use App\Controllers\BaseController;

class Users extends BaseController
{
    public function index()
    {
        echo 'Hello from the user admin index';
    }
}
