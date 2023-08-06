<?php

namespace App\Controllers;

class Articles extends BaseController
{
    public function index()
    {
        // 目前先從 controller 產生資料，送到 view
        $data = [
            ["title" => "One", "content" => "The first"],
            ["title" => "Two", "content" => "Some content"],
        ];

        return view("Articles/index", [
            "articles" => $data
        ]);
    }
}
