<?php


namespace Main\Controllers;


use Core\Resources\App;
use Core\Resources\Database;
use Main\Models\Article;

class Administration
{
    public function start()
    {
        if (!isset($_SESSION['level'])) {
            header("Location: /notFound");
        }
        if (isset($_SESSION['level'])) {
            if ($_SESSION['level'] != 99) {
                header("Location: /notFound");
            }
        }
        if (isset($_GET['id']) || isset($_GET['param'])) {
            header("Location: /notFound");
        }
        $db = new Database();
        $admin = new Article();
        $alert = null;
        if (isset($_POST['create_article'])) {
            $admin->createArticle($db, $_POST['article_name'], $_POST['article_content'], $_SESSION['id'], 'administration');
            $alert = "Création d'article réussie!";
        }
        if (isset($_POST['delete_article'])) {
            $admin->deleteArticle($db, $_POST['article_identifier'], 'administration');
            $alert = "Suppression d'article réussie!";
        }
        if (isset($_POST['modify_article'])) {
            $admin->updateArticle($db, $_POST['article_identifier'], ['name' => $_POST['article_name'], 'content' => $_POST['article_content']], 'administration');
            $alert = "Modification d'article réussie!";
        }
        $articles = $admin->readArticle($db);
        if ($alert != null) {
            App::show('administration', ['articles' => $articles, 'alert' => $alert]);
        } else {
            App::show('administration', ['articles' => $articles]);
        }
    }
}