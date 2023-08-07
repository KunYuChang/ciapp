<?php

namespace App\Controllers;

use App\Models\ArticleModel;
use App\Entities\Article;

class Articles extends BaseController
{
    public function index()
    {
        $model = new ArticleModel;
        $data = $model->findAll();

        return view("Articles/index", [
            "articles" => $data
        ]);
    }

    public function show($id)
    {
        $model = new ArticleModel;
        $article = $model->find($id);

        return view("Articles/show", [
            "article" => $article
        ]);
    }

    public function new()
    {
        return view("Articles/new", [
            "article" => new Article
        ]);
    }

    public function create()
    {
        $model = new ArticleModel;
        $article = new Article($this->request->getPost());
        $id = $model->insert($article);

        if ($id === false) {
            return redirect()->back()
                ->with("errors", $model->errors())
                ->withInput();
        }

        return redirect()->to("articles/$id")
            ->with("message", "Article saved");
    }

    public function edit($id)
    {
        $model = new ArticleModel;
        $article = $model->find($id);

        return view("Articles/edit", [
            "article" => $article
        ]);
    }

    public function update($id)
    {
        $model = new ArticleModel;
        $article = $model->find($id);

        // 使用請求物件 (Request) 中的 POST 資料，來填充 $article 物件的屬性
        $article->fill($this->request->getPost());

        // 檢查 $article 物件是否有修改過。 (如果沒有做這個檢查，會噴錯)
        if (!$article->hasChanged()) {
            return redirect()->back()
                ->with("message", "Nothing to update.");
        }

        // 如果有修改過，儲存更新後的 $article 物件到資料庫
        if ($model->save($article)) {
            return redirect()->to("articles/$id")
                ->with("message", "Article updated.");
        }

        return redirect()->back()
            ->with("errors", $model->errors())
            ->withInput();
    }
}
