<?php

namespace App\Controllers;

use App\Models\ArticleModel;
use App\Entities\Article;
use CodeIgniter\Exceptions\PageNotFoundException;

class Articles extends BaseController
{
    private ArticleModel $model;

    public function __construct()
    {
        $this->model = new ArticleModel;
    }

    public function index()
    {
        $data = $this->model->findAll();

        return view("Articles/index", [
            "articles" => $data
        ]);
    }

    public function show($id)
    {
        $article = $this->getArticleOr404($id);

        // Throwing an exception like this will stop the secript.
        // Codeigniter 遇到 404 異常時，會導到error_404.php
        if ($article === null) {
            throw new PageNotFoundException("Article with id $id not found");
        }

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
        $article = new Article($this->request->getPost());
        $id = $this->model->insert($article);

        if ($id === false) {
            return redirect()->back()
                ->with("errors", $this->model->errors())
                ->withInput();
        }

        return redirect()->to("articles/$id")
            ->with("message", "Article saved");
    }

    public function edit($id)
    {
        $article = $this->getArticleOr404($id);

        return view("Articles/edit", [
            "article" => $article
        ]);
    }

    public function update($id)
    {
        $article = $this->getArticleOr404($id);

        // 使用請求物件 (Request) 中的 POST 資料，來填充 $article 物件的屬性
        $article->fill($this->request->getPost());

        // 檢查 $article 物件是否有修改過。 (如果沒有做這個檢查，會噴錯)
        if (!$article->hasChanged()) {
            return redirect()->back()
                ->with("message", "Nothing to update.");
        }

        // 如果有修改過，儲存更新後的 $article 物件到資料庫
        if ($this->model->save($article)) {
            return redirect()->to("articles/$id")
                ->with("message", "Article updated.");
        }

        return redirect()->back()
            ->with("errors", $this->model->errors())
            ->withInput();
    }

    public function delete($id)
    {
        $article = $this->getArticleOr404($id);

        return view("Articles/delete", [
            "article" => $article
        ]);
    }

    private function getArticleOr404($id): Article
    {
        $article = $this->model->find($id);

        if ($article === null) {
            throw new PageNotFoundException("Article with id $id not found");
        }

        return $article;
    }
}
