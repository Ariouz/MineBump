<?php

class Request
{
    private $parameters;

    public function __construct($parameters)
    {
        $this->parameters = $parameters;
    }

    public function existParams($name)
    {
        return (isset($this->parameters[$name]) && $this->parameters[$name] != ""); 
    }    

    public function getParameter($name)
    {
        if($this->existParams($name)) return $this->parameters[$name];
        else throw new Exception("Parametre inexistant !");
    }

    public function __toString()
    {
        return "values : " . json_encode($this->parameters);
    }
}

?>