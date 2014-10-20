<?php
/**
 * Created by PhpStorm.
 * User: Pijana
 * Date: 16.10.2014
 * Time: 12:00
 */

namespace App\Presenters;

use App\NewArticleForm,
    App\Model,
    Nette;

class AdminPresenter extends Nette\Application\UI\Presenter
{

    /** @var Model\ArticleRepository */
    public $articleRepository;

    public function injectArticleRepository(Model\ArticleRepository $service)
    {
        $this->articleRepository = $service;
    }

    protected function createComponentNewArticleForm()
    {
        $form = new NewArticleForm();

        $form->onSuccess[] = $this->newArticleFormSucceeded;
        return $form;
    }

    public function newArticleFormSucceeded($form, $values)
    {
        try {
            $this->articleRepository->save(array("title" => $values->article_title, "content" => $values->article_content), $this->user->id);
            $message = "Článok bol úspešne pridaný";
            $type = "INFO";
        } catch (\Exception $e) {
            $form->addError($e->getMessage());
            $message = "Článok sa nepodarilo pridať";
            $type = "ERROR";
        }
        $this->flashMessage($message, $type);
    }
}