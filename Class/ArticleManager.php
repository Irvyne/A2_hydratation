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

    }

    public function findAll() {
        $sql = "SELECT * FROM article";
        $query = $this->pdo->query($sql);
        $articles = $query->fetchAll(PDO::FETCH_ASSOC);
        return $articles;
    }

    public function find($id) {

    }

    public function update(Article $article) {

    }

    public function delete($argument) {

    }
}