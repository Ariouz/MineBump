<?php

require_once ("/var/www/html/structure/Configuration.php");

abstract class Model
{
    private static $DB;

    protected function executeRequest($sql, $params = null)
    {
        if($params == null)
            $resultat = self::getDB()->query($sql);
        else
        {
            $resultat = self::getDB()->prepare($sql);
            $resultat->execute($params);
        }    
        return $resultat;
    }

    private static function getDB()
    {
        if(self::$DB == null)
        {
            $dsn = Configuration::get("config", "dsn");
            $login = Configuration::get("config", "login");
            $pwd = Configuration::get("config", "pwd");
            
            self::$DB = new PDO($dsn, $login, $pwd);
            self::$DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$DB;
    }

    public function apiRequest($url, $post=FALSE, $headers=array()) {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
      
        $response = curl_exec($ch);
      
        if($post)
          curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
      
        $headers[] = 'Accept: application/json';
      
        if(isset($_SESSION['access_token']))
          $headers[] = 'Authorization: Bearer ' . $_SESSION['access_token'];
      
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      
        $response = curl_exec($ch);
        
        return json_decode($response);
    }


}