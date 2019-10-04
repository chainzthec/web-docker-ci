<?php

namespace Core\Resources;

class Launcher
{

    /**
     * Retrieve and call the controller.
     */
    public static function start()
    {
        if (null == App::get('page') || App::get('page') == "" || empty(App::get('page'))) {
            self::controllerInit('home');
        } else {
            if (!file_exists("app/" . Settings::getProjectName() . "/Controllers/" . ucfirst(App::get('page')) . ".php")) {
                self::controllerInit('notFound');
            } else {
                self::controllerInit(App::get('page'));
            }
        }
    }

    /**
     * Initialize the controller with the page name.
     * @param $page
     */
    public static function controllerInit($page)
    {
        $name = Settings::getProjectName() . '\\' . 'Controllers' . '\\' . ucfirst($page);
        $c = new $name;
        $c->start();
    }
}