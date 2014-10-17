<?php
/**
 * Created by PhpStorm.
 * User: Pijana
 * Date: 16.10.2014
 * Time: 11:48
 */

namespace App;

class NewArticleForm extends \Nette\Application\UI\Form
{

    function __construct()
    {
        $this->addText("article_title", "Titulok článku:",40)
            ->setAttribute('placeholder', 'váš titulok')
            ->setRequired('Prosím zadajte titulok článku');
        $this->addTextArea("article_content", "Obsah", 41, 10)
            ->setAttribute('placeholder', 'priestor pre váš obsah')
            ->setRequired("Prosím zadajte obsah článku");
        $this->addProtection("Prosím");
        $this->addSubmit("article_submit", "Publikovať");

        return $this;
    }
}