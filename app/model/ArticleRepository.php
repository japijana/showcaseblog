<?php
/**
 * Created by PhpStorm.
 * User: Pijana
 * Date: 15.10.2014
 * Time: 22:48
 */

namespace App\Model;

use Nette\Utils\DateTime;
use Tracy\Debugger;

class ArticleRepository
{
    /** @var ArticleStorageInterface */
    private $articleStorage;

    function __construct(ArticleStorageInterface $articleStorage)
    {
        $this->articleStorage = $articleStorage;
    }

    /**
     * @param null $limit
     * @param null $offset
     * @return array
     */
    public function findAll($limit = NULL, $offset = NULL)
    {
        return $this->articleStorage->findAll($limit,$offset);
    }

    public function find($id)
    {
        return $this->articleStorage->find($id);
    }

    /**
     * @param $article
     * @param $author
     * @throws \Exception
     * @return bool|int|Nette\Database\Table\IRow
     */
    public function save($article, $author)
    {
        $datum = new DateTime();
        dump($datum);
        $article = new Article(NULL, $article['title'], $article['content'], $datum, $author);
        try {
            return $this->articleStorage->save($article);
        } catch (\Exception $e) {
            Debugger::log($e->getMessage(),"ArticleStorageError");
            throw $e;
        }
    }
}