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
        return $this->pdo->query($sql);
    }

    public function findAll() {
        $sql = "SELECT * FROM article";
        $query = $this->pdo->query($sql);
        $articles = $query->fetchAll(PDO::FETCH_ASSOC);
        return $articles;
    }

    public function find($id) {
        $sql = "SELECT * FROM article WHERE id = ".$this->pdo->quote($id, PDO::PARAM_INT);
        $query = $this->pdo->query($sql);
        $article = $query->fetch(PDO::FETCH_ASSOC);
        return $article;
    }

    public function update(Article $article) {

    }

    public function delete($argument) {

    }
}