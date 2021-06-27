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
        $arrData = $this->model->selectRoles();
        for ($i = 0; $i < count($arrData); $i++) {
            if ($arrData[$i]['status'] == 1) {
                $arrData[$i]['status'] = '<span class="badge badge-success">Activo</span>';
            } else {
                $arrData[$i]['status'] = '<span class="badge badge-success">Inactivo</span>';
            }
            $arrData[$i]['options'] = '<div class="text-center">
            <button class="btn-secondary btn-sm btnPermisosRol" rl="' . $arrData[$i]['idrol'] . '"title="Permisos"><i class="fas fa-key"></i></button>
            <button class="btn-primary btn-sm btnEditRol" rl="' . $arrData[$i]['idrol'] . '"title="Editar"><i class="fas fa-pencil-alt"></i></button>
            <button class="btn-danger btn-sm btnDelRol" rl="' . $arrData[$i]['idrol'] . '"title="Eliminar"><i class="fas fa-trash-alt"></i></button>
            </div>';
        }
        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        die();
    }
    //Optener un rol
    public function getRol(int $idRol)
    {
        $intIdRol = intval(strClean($idRol));
        if ($intIdRol > 0) {
            $arrData = $this->model->selectRol($intIdRol);
            if (empty($arrData)) {
                $arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
            } else {
                $arrResponse = array('status' => true, 'data' => $arrData);
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }
    //Insertar y actualizar datos
    public function setRol()
    {
        $intIdRol = intval($_POST['idRol']);
        $strRol = strClean($_POST['txtNombre']);
        $strDescripcion = strClean($_POST['txtDescripcion']);
        $intStatus = intval($_POST['listStatus']);

        if ($intIdRol == 0) {
            //crear
            $request_rol = $this->model->insertRol($strRol, $strDescripcion, $intStatus);
            $option = 1;
        } else {
            //actualizar
            $request_rol = $this->model->updateRol($intIdRol, $strRol, $strDescripcion, $intStatus);
            $option = 2;
        }

        if ($request_rol > 0) {
            if ($option == 1) {
                $arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente');
            } else {
                $arrResponse = array('status' => true, 'msg' => 'datos actualizados correctamente');
            }
        } else if ($request_rol == 'exist') {
            $arrResponse = array('status' => false, 'msg' => '¡Atención! El rol ya existe.');
        } else {
            $arrResponse = array('status' => false, 'msg' => 'No es posible almacenar los datos.');
        }
        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function delRol(){
        if($_POST){
            $intIdRol=intval($_POST['idrol']);
            $requestDelete=$this->model->deleteRol($intIdRol);
            if($requestDelete=='ok')
            {
                $arrResponse=array('status'=>true, 'msg'=>'Se a eliminado el rol');
            }else if($requestDelete=='exist'){
                $arrResponse=array('status'=> false, 'msg'=>'no es posible eliminar un rol asociado a usuarios.');
            }else{
                $arrResponse= array('status'=>false, 'msg'=> 'Error al eliminar el rol.');
            }
            echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
        }
        die();
    }
}
