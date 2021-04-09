<?php

//validación de existencia del controlador
$controllerFile = "Controllers/" . $controller . ".php";
echo $controllerFile . "<br>"; //:)

if (file_exists($controllerFile)) {
    require_once($controllerFile);
    $controller = new $controller(); //carga de el controlador ejemplo: home

    if (method_exists($controller, $method)) {
        $controller->{$method}($params); // carga el metodo y parametros ejemplo: carrito/1
    } else {
        require_once("Controllers/Error.php");
    }
} else {
    require_once("Controllers/Error.php");
}
