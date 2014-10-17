<?php
/**
 * Created by PhpStorm.
 * User: Pijana
 * Date: 16.10.2014
 * Time: 9:37
 */
namespace App\Model;

interface ArticleStorageInterface
{
    /**
     * @param $id
     * @return Article
     */
    public function find($id);

    /**
     * @param null|int $limit
     * @param null|int $offset
     * @return array
     */
    public function findAll($limit = NULL, $offset = NULL);

    /**
     * @param $article
     * @return bool|int|Nette\Database\Table\IRow
     */
    public function save($article);
}