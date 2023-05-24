<?php

    session_start();
    
    require_once('./Core/Database.php');
    
    require_once('./Models/BaseModel.php');
    
    require_once('./Controllers/BaseController.php');
    
    $controllerName = (isset($_REQUEST['controller']) ? ucfirst(strtolower($_REQUEST['controller'])) : 'Home').'Controller';
    
    $actionName = isset($_REQUEST['action']) ? $_REQUEST['action'] : 'index';
    
    require_once("./Controllers/$controllerName.php");

    $controllerObject = new $controllerName;
    
    $controllerObject->$actionName();

?>