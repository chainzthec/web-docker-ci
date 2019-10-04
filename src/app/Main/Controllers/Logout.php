<?php

namespace Main\Controllers;

class Logout
{

    public function start()
    {
        if (isset($_GET['id']) || isset($_GET['param'])) {
            header("Location: /notFound");
        }
        if (isset($_SESSION) && isset($_SESSION['level'])) {
            session_destroy();
            header("Location: /home/deconnexion");
        } else {
            header("Location: /home");
        }

    }

}
