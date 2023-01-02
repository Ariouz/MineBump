<?php

require_once 'Request.php';
require_once 'View.php';
require_once 'Controller.php';
require_once 'Configuration.php';

class Router
{
    public function routeRequest()
    {

        /*$ip = $this->get_ip_address();
        $allowed_ips = array("88.122.149.108", "88.166.203.74", "78.122.119.52", "78.122.109.222", "78.122.119.163");
        if(!in_array($ip, $allowed_ips)){
            header('Location: ' . Configuration::Get("config", "websiteURL") . 'maintenance');
            die();
        }*/

        try{
            $request = new Request(array_merge($_GET, $_POST));
            
            $controller = $this->createController($request);
            if($controller == null) return;
            $action = $this->createAction($request);

            $controller->execAction($action);
        }
        catch (Exception $e)
        {
            $this->execError($e);
        }
    }

    private function createController(Request $request)
    {
        // URL => index.php?controller=$1&action=$2&id=$3

        if($request->existParams('controller'))
        {
            $controller = $request->getParameter('controller');
            $controller = ucfirst(strtolower($controller));
        }else{
            header ("Location: https://minebump.com/home");
            return null;
        }

        $controllerClass = "Controller" . $controller;
        $ControllerFile = "Controllers/" . $controllerClass . ".php";

        if(file_exists($ControllerFile))
        {
            require($ControllerFile);
            $controller = new $controllerClass();
            $controller->setRequest($request);
            return $controller;    
        }
        else
        {
            throw new Exception("Fichier introuvable" .$ControllerFile);
        }
    
    }

    private function createAction($request)
    {
        $action = "index";
        if($request->existParams('action'))
            $action = $request->getParameter('action');

        return $action;    
    }

    private function execError(Exception $exception)
    {
        $view = new View('error');
        $view->generate(array('msgError' => $exception->getMessage()));
        error_log($exception->getTraceAsString());
    }

    private function get_ip_address() {
        if ( isset( $_SERVER['HTTP_X_REAL_IP'] ) ) {
            return $_SERVER['HTTP_X_REAL_IP'];
        } elseif ( isset( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ) {
            return (string) self::is_ip_address( trim( current( explode( ',', $_SERVER['HTTP_X_FORWARDED_FOR'] ) ) ) );
        } elseif ( isset( $_SERVER['REMOTE_ADDR'] ) ) {
            return $_SERVER['REMOTE_ADDR'];
        }
        return '';
    }
}

?>
