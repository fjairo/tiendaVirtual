<?php
class Roles extends Controllers
{

    public function __construct()
    {
        parent::__construct(); //carga al constructor del padre
    }

    public function Roles()
    {
        $data['page_id'] = 3;
        $data['page_tag'] = "Roles usuario";
        $data['page_title'] = "Roles Usuario <small>Tienda Virtual</small>";
        $data['page_name'] = "rol_usuario";
        $this->views->getView($this, "Roles", $data);
    }
    public function getRoles()
    {
        $arrData=$this->model->selectRoles();
        echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
        die();
    }
}
