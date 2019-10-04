<?php

namespace Main\Controllers;

use Core\Resources\App;
use Core\Resources\Database;
use Main\Models\User;

class Login
{

    public function start()
    {
        if (isset($_SESSION) && isset($_SESSION['level'])) {
            header('Location: /home');
        }

        $alert = null;
        $error = null;
        if (isset($_GET['id'])) {
            header("Location: /notFound");
        }
        if (isset($_GET['param'])) {
            if ($_GET['param'] == 'error') {
                $error = "Mot de passe incorrect!";
            } elseif ($_GET['param'] == 'success') {
                $alert = "Inscription réussie, vous pouvez vous connecter!";
            } else {
                header("Location: /notFound");
            }
        }
        $db = new Database();
        $user = new User();
        $user->login($db);

        if ($alert != null) {
            App::show('login', ['alert' => $alert]);
        } elseif ($error != null) {
            App::show('login', ['error' => $error]);
        } else {
            App::display('login');
        }
    }

}
