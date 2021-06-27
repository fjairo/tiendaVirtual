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
    //Extraer  todos los reqistros la tabla roles
    public function selectRoles()
    {
        $sql = "SELECT * FROM rol WHERE status !=0";
        $request = $this->select_all($sql);
        return $request;
    }
    // Buscar rol
    public function selectRol(int $idrol)
    {
        $this->intIdRol = $idrol;
        $sql = "SELECT * FROM rol WHERE idrol= $this->intIdRol";
        $request = $this->select($sql);
        return $request;
    }
    //Insertar rol
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
    //Actualizar rol
    public function updateRol(int $idrol, string $rol, string $descripcion, int $status)
    {
        $this->intIdRol = $idrol;
        $this->strRol = $rol;
        $this->strDescripcion = $descripcion;
        $this->intStatus = $status;
        $sql = "SELECT * FROM rol WHERE nombrerol='$this->strRol' AND idrol != $this->intIdRol";
        $request= $this->select_all($sql);
        if (empty($request)) {
            $sql = "UPDATE rol SET nombrerol = ?, descripcion = ?, status = ? WHERE idrol= $this->intIdRol";
            $arrData = array($this->strRol, $this->strDescripcion, $this->intStatus);
            $request = $this->update($sql, $arrData);
        } else {
            $request = "exist";
        }
        return $request;
    }

    public function deleteRol(int $idrol)
    {
        $this->intIdRol=$idrol;
        $sql="SELECT * FROM persona WHERE rolid= $this->intIdRol";
        $request = $this->select_all($sql);
        if(empty($request))
        {
            $sql= "UPDATE rol SET status = ? WHERE idrol =$this->intIdRol";
            $arrData=array(0);
            $request=$this->update($sql,$arrData);
            if($request)
            {
                $request="ok";
            }else{
                $request="error";
            }
        }else{
            $request='exist';
        }
        return $request;
    }
}
