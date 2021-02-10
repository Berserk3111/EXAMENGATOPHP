<?php

require_once 'config/global.php';

require_once 'libs/ControllerBase.php';

require_once 'libs/ControllerFunctions.php';


if(isset($_GET["controller"])){
    $controllerObj=loadController($_GET["controller"]);
    launchAction($controllerObj);
}else{
    $controllerObj=loadController(DEFAULT_CONTROLLER);
    launchAction($controllerObj);
}
?>