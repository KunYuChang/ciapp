<?php

// php spark make:controller Users --namespace Admin

namespace Admin\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Users extends BaseController
{
    private UserModel $model;

    public function __construct()
    {
        $this->model = new UserModel;
    }

    public function index()
    {
        $users = $this->model->findAll();

        // 不是預設的MVC之外的MVC，view function 需要用 namespace 來找。
        return view("Admin\Views\Users\index", [
            "users" => $users
        ]);
    }
}
