<?php

namespace Core\Resources;


class Settings
{
    /**
     * Returns the settings of the application
     * @return mixed
     */
    public static function getSettings()
    {
        $settings = App::getJsonInformation("settings.json");
        return $settings;
    }

    /**
     * @return String
     */
    public static function getProjectName()
    {
        return Settings::getSettings()->{"main_project"}->{"name"};
    }


}