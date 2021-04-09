<?php
class Home extends Controllers
{

    public function __construct()
    {
        parent::__construct(); //carga al constructor del padre
    }

    public function home()
    {
        $data['page_id'] = 1;
        $data['tag_page'] = "Home";
        $data['page_title'] = "página principal";
        $data['page_name'] = "Home";
        $data['page_content'] = "Tendencias tiene como objetivo la comercialización de prendas de vestir y accesorios pret-a-porter que resaltan la belleza de la mujer actual, regida por las últimas tendencias de la moda para cada temporada (primavera-verano y otoño-invierno) en ropa, calzado y accesorios.";
        $this->views->getView($this, "Home", $data);
    }
    public function insertar()
    {
        $data = $this->model->setUser("carlos", 18);
        print_r($data);
    }
    public function verUsuario($id)
    {
        $data = $this->model->getUser($id);
        print_r($data);
    }
    public function actualizar()
    {
        $data = $this->model->updateUser(1, "roberto", 20);
        print_r($data);
    }
    public function verUsuarios()
    {
        $data = $this->model->getUsers();
        print_r($data);
    }
    public function eliminarUsuario($id)
    {
        $data = $this->model->deleteUser($id);
        print_r($data);
    }
}
