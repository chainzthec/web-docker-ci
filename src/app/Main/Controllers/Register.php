<?php

namespace Main\Controllers;

use Core\Resources\App;
use Core\Resources\Database;
use Main\Models\User;

class Register
{

    public function start()
    {
        if (isset($_SESSION) && isset($_SESSION['level'])) {
            header('Location: /home');
        }
        $error = null;
        if (isset($_GET['id'])) {
            header("Location: /notFound");
        }
        if (isset($_GET['param'])) {
            if ($_GET['param'] == 'error') {
                $error = "Les mots de passe ne sont identiques!";
            } else {
                header("Location: /notFound");
            }
        }
        $db = new Database();
        $user = new User();
        $user->register($db);

        if ($error != null) {
            App::show('register', ['error' => $error]);
        } else {
            App::display('register');
        }
    }

}
