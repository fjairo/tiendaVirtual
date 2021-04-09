<?php
class Errors extends Controllers
{

    public function __construct()
    {
        parent::__construct(); //carga al constructor del padre, ejemplo: controlador
    }

    public function notFound()
    {
        $this->views->getView($this, "Error");
    }
}

$notFound = new Errors;
$notFound->notFound();
