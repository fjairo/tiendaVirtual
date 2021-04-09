<?php
//complemento donde se requiere archivo se instancia
class Controllers
{
    public function __construct()
    {
        $this->views = new Views(); // cargada por el metodo spl_autoload_register de index ejemplo
        $this->loadModel();
    }

    public function loadModel()
    {
        //optiene la instancia de por ejemplo:HomeModel despues de cargar controller de la carpeta libraries/core
        $model = get_class($this) . "Model";
        $routClass = "Models/" . $model . ".php";
        if (file_exists($routClass)) {
            require_once($routClass);
            $this->model = new $model;
        }
    }
}
