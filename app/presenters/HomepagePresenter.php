<?php

namespace App\Presenters;

use Nette,
    App\Model;


/**
 * Homepage presenter.
 */
class HomepagePresenter extends BasePresenter
{
    /** @var array */
    private $articles;

    /** @var Model\ArticleRepository */
    public $articleRepository;

    public function injectArticleRepository(Model\ArticleRepository $service)
    {
        $this->articleRepository = $service;
    }

    public function actionDefault()
    {
        $this->articles = $this->articleRepository->findAll();
    }

    public function renderDefault()
    {
        $this->template->articles = $this->articles;
    }

}
