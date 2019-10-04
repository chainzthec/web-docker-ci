<?php

namespace Core\Resources;

class App
{
    /**
     * Display an PHP page depending on its name.
     * Model is used
     * @param $page
     */
    public static function display($page)
    {
        ob_start();
        require "app/" . Settings::getSettings()->{'main_project'}->{'name'} . "/Views/content/" . $page . ".php";
        $content = ob_get_contents();
        ob_end_clean();
        require "app/" . Settings::getSettings()->{'main_project'}->{'name'} . "/Views/layout/layout.php";
    }

    /**
     * Display an HTML page with default layout.
     * @param $page
     */
    public static function html($page){
        ob_start();
        require "app/" . Settings::getSettings()->{'main_project'}->{'name'} . "/Views/content/" . $page . ".html";
        $content = ob_get_contents();
        ob_end_clean();
        require "app/" . Settings::getSettings()->{'main_project'}->{'name'} . "/Views/layout/layout.php";
    }

    /**
     * Display a PHP page with default layout.
     * @param $page
     */
    public static function show($page,$models){
        ob_start();
        require "app/" . Settings::getSettings()->{'main_project'}->{'name'} . "/Views/content/" . $page . ".php";
        $content = ob_get_contents();
        ob_end_clean();
        require "app/" . Settings::getSettings()->{'main_project'}->{'name'} . "/Views/layout/layout.php";
    }

    /**
     * Parse JSON content;
     * @param $file
     * @return mixed
     */
    public static function getJsonInformation($file)
    {
        $json = file_get_contents('core/' . $file, true);
        $parsed_json = json_decode($json);
        return $parsed_json;
    }

    /**
     * Return a $_GET element.
     * @param $v
     * @return mixed
     */
    public function get($v)
    {
        return filter_input(INPUT_GET, $v);
    }
}
