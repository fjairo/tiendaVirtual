<?php
class Dashboard extends Controllers
{

    public function __construct()
    {
        parent::__construct(); //carga al constructor del padre
    }

    public function dashboard()
    {
        $data['page_id'] = 2;
        $data['page_tag'] = "Dashboard Tienda Virtual";
        $data['page_title'] = "Dashboard Tienda Virtual";
        $data['page_name'] = "Dashboard";
        $data['page_content'] = "Tendencias tiene como objetivo la comercialización de prendas de vestir y accesorios pret-a-porter que resaltan la belleza de la mujer actual, regida por las últimas tendencias de la moda para cada temporada (primavera-verano y otoño-invierno) en ropa, calzado y accesorios.";
        $this->views->getView($this, "Dashboard", $data);
    }
}
