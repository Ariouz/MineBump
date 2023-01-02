<?php

require_once('structure/Router.php');

session_set_cookie_params(0, '/', 'minebump.com');
session_start();

$router = new Router();
$router->routeRequest();



// https://github.com/bpesquet/MonBlog/blob/master/Framework/Controleur.php

// https://fr.wix.com/website-template/view/html/1791?siteId=fbd8f00e-f6b3-44ea-9a7c-8a844ff88798&metaSiteId=7c473364-2717-44a6-b47c-10cceb5a5cb2&originUrl=https%3A%2F%2Ffr.wix.com%2Fwebsite%2Ftemplates

?>