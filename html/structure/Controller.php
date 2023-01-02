<?php

require_once 'Request.php';
require_once 'View.php';
require_once 'Configuration.php';

abstract class Controller
{
    private $action;
    protected $request;

    public function setRequest(Request $request)
    {
        $this->request = $request;
    }

    public function execAction($action)
    {
        if(method_exists($this, $action))
        {
            $this->action = $action;
            $this->{$this->action}();
        }
        else
        {
            $classController = get_class($this);
            throw new Exception('Action not found');
        }
    }

    public abstract function index();

    protected function generateView($data = array(), $withTemplate = true)
    {
        $classController = get_class($this);
        $controller = str_replace("Controller", "", $classController);
        
        $view = new View($this->action, $controller);
        if($withTemplate) $view->generate($data);
        else $view->generateNoTemplateFile($data);
    }

}

?>