<?php
class RolesModel extends Mysql
{
    public $intIdRol;
    public $strRol;
    public $strDescripcion;
    public $intStatus;

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

    public function insertRol(string $rol, string $descripcion, int $status)
    {
        $return = "";
        $this->strRol = $rol;
        $this->strDescripcion = $descripcion;
        $this->intStatus = $status;
        //validación de registro
        $sql = "SELECT * FROM rol WHERE nombrerol= '{$this->strRol}'";
        $request = $this->select_all($sql);

        if (empty($request)) {
            $query_insert = "INSERT INTO rol(nombrerol,descripcion,status) VALUES(?,?,?)";
            $arrData = array($this->strRol, $this->strDescripcion, $this->intStatus);
            $request_insert = $this->insert($query_insert, $arrData);
            $return = $request_insert;
        } else {
            $return = "exist";
        }
        return $return;
    }
}
