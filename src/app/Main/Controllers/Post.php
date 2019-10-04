<?php


namespace Main\Controllers;


use Core\Resources\App;
use Core\Resources\Database;
use Main\Models\Article;

class Post
{
    public function start()
    {
        if (!isset($_SESSION['level'])) {
            header("Location: /notFound");
        }
        if (isset($_GET['id']) || isset($_GET['param'])) {
            header("Location: /notFound");
        }
        $db = new Database();
        $admin = new Article();
        if (isset($_POST['create_article'])) {
            $admin->createArticle($db, $_POST['article_name'], $_POST['article_content'], $_SESSION['id']);
            header("Location: /home/psuccess");
        }

        App::html('post');
    }
}