<?php

// php spark make:controller Password

namespace App\Controllers;

use App\Controllers\BaseController;

class Password extends BaseController
{
    public function set()
    {
        return view("Password/set");
    }
}