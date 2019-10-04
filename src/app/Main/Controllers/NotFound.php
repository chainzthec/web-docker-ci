<?php


namespace Main\Controllers;


use Core\Resources\App;

class NotFound
{
    public function start()
    {
        App::html('notFound');
    }
}