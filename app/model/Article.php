<?php
/**
 * Created by PhpStorm.
 * User: Pijana
 * Date: 15.10.2014
 * Time: 22:49
 */

namespace App\Model;


class Article
{

    private $id = NULL;

    private $title;

    private $content;

    private $dateCreated;

    private $author;

    function __construct($id, $title, $content, $dateCreated, $author)
    {
        $this->id = $id;
        $this->content = $content;
        $this->title = $title;
        $this->dateCreated = $dateCreated;
        $this->author = $author;
    }

    /**
     * @return array
     */
    public function convertToArray()
    {
        return ['id' => $this->id ? $this->id : NULL,
            'author_id' => $this->author,
            'title' => $this->title,
            'date_created' => $this->dateCreated,
            'content' => $this->content];
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @return mixed
     */
    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }
}