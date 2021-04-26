<?php
class Producto extends Controllers
{

    public function __construct()
    {
        parent::__construct(); //carga al constructor del padre
    }

    public function producto()
    {
        $data['page_id'] = 2;
        $data['page_tag'] = "Producto";
        $data['page_title'] = "Producto en venta";
        $data['page_name'] = "Producto";
        $this->views->getView($this, "Producto", $data);
    }
}