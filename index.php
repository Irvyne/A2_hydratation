<?php
/**
 * Created by Thibaud BARDIN (Irvyne)
 * This code is under the MIT License (https://github.com/Irvyne/license/blob/master/MIT.md)
 */

require __DIR__.'/autoload.php';
require __DIR__.'/config/config.php';

$dsn = 'mysql:dbname='.$config['database'].';host='.$config['host'].';port='.$config['port'];

try {
    $pdo = new PDO($dsn, $config['username'], $config['password']);
} catch (PDOException $exception) {
    // mail('thibaud.bardin@gmail.com', 'PDOException', $exception->getMessage());
    exit('Erreur de connexion BDD');
}

$articleManager = new ArticleManager($pdo);

var_dump($articleManager->find(1));

//var_dump($articleManager->findAll());

$article = new Article(array(
    'id'        => 1,
    'title'     => 'Mon titre',
    'content'   => 'Mon contenu',
));



var_dump($article);