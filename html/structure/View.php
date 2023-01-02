<?php

require_once "Configuration.php";

class View 
{
    private $file;
    private $title;
    private $additional_header;

    public function __construct($action, $controller = "")
    {
        $file = "Views/";
        if($controller != ""){
            $file = $file . $controller . "/";
        }
        $this->file = $file . $action . ".php";
    }

    public function getMessage($name){
        return Configuration::get("messages", $name);
    }

    public function generate($data)
    {
        $content = $this->generateFile($this->file, $data);
        $navBar = $this->generateNavBar($data);
        $webRoot = Configuration::get("config" ,"webRoot", "/");

        $view = $this->generateFile("Views/template.php", array('pTitle' => $this->title, 'content' => $content, 'webRoot' => $webRoot, 'additional_header' => $this->additional_header/*, 'navBar' => $navBar*/));

        echo $view;
    }

    private function generateNavBar($data){ 

        extract($data);

        ob_start();
        if(isset($user) && isset($_SESSION['access_token'])){
            ?>
            
            <?php
        }else{
            ?>
            
            <?php
        }

        $button = ob_get_clean();

        ob_start();
        ?>
        <ul class="navbar-nav me-3 d-flex justify-content-around">
            <li class="nav-item">
                <a class="nav-link <?= $this->isPage($this->title, "Accueil")?>" aria-current="page" href="accueil" >Accueil</a>
            </li>
            <li class="nav-item position-relative">
                <a class="nav-link <?= $this->isPage($this->title, "Commander")?>" aria-current="page" href="command">Commander</a>
            </li>
            <li class="nav-item position-relative">
                <a class="nav-link <?= $this->isPage($this->title, "Partenaires")?>" aria-current="page" href="partners">Partenaires</a>
            </li>
        </ul>
        <ul class="navbar-nav me-5 d-flex">
            <?= $button ?>
        </ul>
        <?php
        return ob_get_clean();

    }

    private function isPage($page, $wanted){
        if($page == $wanted) return "active";
    }

    private function generateFile($file, $data)
    {
        if(file_exists($file))
        {
            extract($data);
            ob_start();
            require $file;
            return ob_get_clean();
        }
        else{
            throw new Exception("File not found");
        }
    }

    public function generateNoTemplateFile($data)
    {
        $webRoot = Configuration::get("config", "webRoot", "/");
        $view = $this->generateFile($this->file, array($data, 'webRoot' => $webRoot));
    
        echo $view;
    }

}