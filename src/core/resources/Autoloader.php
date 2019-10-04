<?php
/**
 * Created by PhpStorm.
 * User: theoh
 * Date: 15/04/2018
 * Time: 17:37
 */

namespace Core\Resources;

class Autoloader
{
    public static function register(){
        self::autoload(self::autoloadToArray());
    }
    
    private static function autoload($folder){
        foreach($folder as $f){
            $files = scandir($f);
            foreach($files as $fi){
                if($fi != '.' && $fi != '..' && $fi != 'Autoloader.php'){
                    require_once SITE_ROOT.'/'.$f.'/'.$fi;
                }
            }
        }
    }

    private static function autoloadToArray(){
        $json = file_get_contents(SITE_ROOT.'/core/settings.json', true);
        $parsed_json = json_decode($json);
        return $parsed_json->{'autoload'};
    }
}