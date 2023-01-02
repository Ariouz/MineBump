<?php

class Configuration 
{
    private static $params;

    public static function get($fileName, $name, $defaultValue = null)
    {
        if(isset(self::getParameters($fileName)[$name]))
            $value = self::getParameters($fileName)[$name];
        else $value = $defaultValue;
        
        return $value;
    }

    public static function getParameters($fileName)
    {

        $filePath = "Config/".$fileName.".ini";
        if(!file_exists($filePath)) $filePath = "/var/www/html/Config/".$fileName.".ini";
        if(!file_exists($filePath)) throw new Exception("Config file not found");
        else self::$params = parse_ini_file($filePath);

        return self::$params;
    }

}

?>