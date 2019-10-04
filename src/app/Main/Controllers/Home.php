<?php

namespace Main\Controllers;

use Core\Resources\App;
use Core\Resources\Database;
use Main\Models\Article;

class Home
{

    public function start()
    {
        if (isset($_GET['id'])) {
            header("Location: /notFound");
        }
        $alert = null;
        if (isset($_GET['param'])) {
            if ($_GET['param'] == 'success') {
                $alert = "Connexion réussie!";
            } elseif ($_GET['param'] == 'psuccess') {
                $alert = "Votre article a bien été créé! :)";
            } elseif ($_GET['param'] == 'deconnexion') {
                $alert = "Déconnexion réussie!";
            } else {
                header("Location: /notFound");
            }
        }
        $db = new Database();
        $article = new Article();
        $articles = $article->readArticle($db);
        if ($alert != null) {
            App::show('home', ['articles' => $articles, 'alert' => $alert]);
        } else {
            App::show('home', ['articles' => $articles]);
        }
    }

}
