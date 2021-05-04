<?php
class RolesModel extends Mysql
{

    public function __construct()
    {
        parent::__construct(); //carga al constructor del padre
    }

    public function selectRoles()
    {
        //Extraer  todos los reqistros la tabla roles
        $sql = "SELECT * FROM rol WHERE status !=0";
        $request = $this->select_all($sql);
        return $request; 
    }
}
