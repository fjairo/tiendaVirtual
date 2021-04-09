<?php
//carga de clases autómatica despues de crear el objeto de la capeta libraries por ejemplo:libreries/core/controllers
spl_autoload_register(function ($class) {
    if (file_exists("Libraries/" . 'Core/' . $class . ".php")) {
        require_once("Libraries/" . 'Core/' . $class . ".php");
    }
});
