<?php
/**
 * Created by PhpStorm.
 * User: Pijana
 * Date: 16.10.2014
 * Time: 7:30
 */

namespace App\Presenters;

use Nette,
    App\Model;

class ArticlePresenter extends BasePresenter
{

    /** @var array */
    private $article;

    /** @var Model\ArticleRepository */
    public $articleRepository;

    public function injectArticleRepository(Model\ArticleRepository $service)
    {
        $this->articleRepository = $service;
    }

    public function actionShow($id)
    {
        $this->article = $this->articleRepository->find($id);
    }

    public function renderShow()
    {
        $this->template->article = $this->article;
    }
} 