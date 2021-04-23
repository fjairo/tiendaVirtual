<?php
require_once("Config/Config.php");
require_once("Helpers/helpers.php");
//Validación de controlador y carga predeteminada
$url = !empty($_GET['url']) ? $_GET['url'] : 'Home/home';
$arrayUrl = explode("/", $url);
$controller = $arrayUrl[0];
$method = $arrayUrl[0];
$params = "";
print_r($arrayUrl); //:)

//validación de método
if (!empty($arrayUrl[1])) {
    if ($arrayUrl[1] != "") {
        $method = $arrayUrl[1];
    }
}
//validacion de parámetros
if (!empty($arrayUrl[2])) {
    if ($arrayUrl[2] != "") {
        for ($i = 2; $i < count($arrayUrl); $i++) {
            $params .= $arrayUrl[$i] . ",";
        }
        $params = trim($params, ',');
    }
}
//Autoload
require_once("Libraries/Core/Autoload.php");
//load
require_once("Libraries/Core/Load.php");
