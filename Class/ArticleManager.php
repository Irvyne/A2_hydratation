<?php
/**
 * Created by Thibaud BARDIN (Irvyne)
 * This code is under the MIT License (https://github.com/Irvyne/license/blob/master/MIT.md)
 */

class ArticleManager
{
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function add(Article $article) {
        $sql = "INSERT INTO article (id, title, content) VALUES (NULL, ".$this->pdo->quote($article->getTitle()).", ".$this->pdo->quote($article->getContent()).")";
        if ($this->pdo->query($sql)) {
            $id = $this->pdo->lastInsertId();
            $article->setId($id);
            return $article;
        } else {
            return false;
        }
    }

    public function findAll() {
        $sql = "SELECT * FROM article";
        $query = $this->pdo->query($sql);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        $articles = array();
        foreach ($results as $attributes) {
            $articles[] = new Article($attributes);
        }
        return $articles;
    }

    public function find($id) {
        $sql = "SELECT * FROM article WHERE id = ".$this->pdo->quote($id, PDO::PARAM_INT);
        $query = $this->pdo->query($sql);
        $attributes = $query->fetch(PDO::FETCH_ASSOC);
        if ($attributes)
            return new Article($attributes);
        else
            return false;
    }

    public function update(Article $article) {
        $sql = "UPDATE article SET title = ".$this->pdo->quote($article->getTitle()).", content = ".$this->pdo->quote($article->getContent())." WHERE id = ".$this->pdo->quote($article->getId(), PDO::PARAM_INT);
        return $this->pdo->query($sql);
    }

    public function delete($parameter) {
        if ($parameter instanceof Article) {
            $id = $parameter->getId();
        } else {
            $id = (int) $parameter;
        }
        $sql = "DELETE FROM article WHERE id = ".$this->pdo->quote($id);
        return $this->pdo->query($sql);
    }
}