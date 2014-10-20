<?php
/**
 * Created by PhpStorm.
 * User: Pijana
 * Date: 15.10.2014
 * Time: 22:48
 */

namespace App\Model;

use Nette;


class ArticleStorage implements ArticleStorageInterface
{
    /** @var Nette\Database\Context */
    private $database;

    public function __construct(Nette\Database\Context $database)
    {
        $this->database = $database;
    }

    /**
     * @param null|int $limit
     * @param null|int $offset
     * @return array
     */
    public function findAll($limit = NULL, $offset = NULL)
    {
        $arr = [];
        $dataFetchAll = $this->database->table("articles")->order("id DESC")->limit($limit, $offset)->fetchAll();

        foreach ($dataFetchAll as $article) {
            $arr[] = $this->mapObject($article);
        }
        return $arr;
    }

    /**
     * @param $id
     * @return Article
     */
    public function find($id)
    {
        $data = $this->database->table("articles")->get($id);
        return $data ? $this->mapObject($data) : FALSE;
    }

    /**
     * @param $article
     * @return bool|int|Nette\Database\Table\IRow
     */
    public function save($article)
    {
        if ($article instanceof Article) {
            $article = $article->convertToArray();
        }
        return $this->database->table("articles")->insert($article);
    }

    /**
     * @param $data
     * @return Article
     */
    private function mapObject($data)
    {
        return new Article($data['id'], $data['title'], $data['content'], $data['date_created'], $data['author_id']);
    }
}