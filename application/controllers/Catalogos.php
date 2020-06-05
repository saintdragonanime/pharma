<?php
error_reporting(0);

defined('BASEPATH') OR exit('No direct script access allowed');

class Catalogos extends CI_Controller {

    //CONTROLADOR CATALOGOS: listados,altas y edicion

    public function __construct() {
        parent::__construct();
        //error_reporting(0);
        
//        $logueo = $this->session->userdata('logeado_aries');
//        if($logueo!=1){
//            redirect(base_url(), 'refresh');
//        }
        
        $this->load->model('Almacen_model', 'model');
        $this->load->model('Catalogos_model', 'catalogos');
    }

    //VIEWS - LISTADOS -------------------------------------------------------

    public function familias() {
        $this->load->view('header');
        $this->load->view('menu');
        $this->load->view('catalogos/familias');
        $this->load->view('footer');
    }
    
    public function servicios() {
        $this->load->view('header');
        $this->load->view('menu');
        $this->load->view('catalogos/servicios');
        $this->load->view('footer');
    }

    public function empleados() {
        $this->load->view('header');
        $this->load->view('menu');
        $this->load->view('catalogos/empleados');
        $this->load->view('footer');
    }
    
    public function empresas() {
        $this->load->view('header');
        $this->load->view('menu');
        $this->load->view('catalogos/proveedores');
        $this->load->view('footer');
    }

    public function clientes() {
        $this->load->view('header');
        $this->load->view('menu');
        $this->load->view('catalogos/clientes');
        $this->load->view('footer');
    }
    public function unidades() {
        $this->load->view('header');
        $this->load->view('menu');
        $this->load->view('catalogos/unidades');
        $this->load->view('footer');
    }
    public function incidentes() {
        $this->load->view('header');
        $this->load->view('menu');
        $this->load->view('catalogos/incidentes');
        $this->load->view('footer');
    }
    public function almacen() {
        $this->load->view('header');
        $this->load->view('menu');
        $this->load->view('catalogos/almacen');
        $this->load->view('footer');
    }

 

   
    //VIEWS - ALTAS ----------------------------------------------------------
    public function alta_empleado() {
		$data["proveedores"]=$this->model->getCatalogo("proveedores");
         $data["departamentos"]=$this->model->getCatalogo("departamentos");
        $this->load->view('header');
        $this->load->view('menu');
        $this->load->view('catalogos/form_empleado',$data);
        $this->load->view('footer');
    }

    public function alta_cliente() {
        $data["estados"]=$this->model->getCatalogo("estados");
        $this->load->view('header');
        $this->load->view('menu');
        $this->load->view('catalogos/form_cliente',$data);
        $this->load->view('footer');
    }
    
    public function alta_servicio() {
        $data["proveedores"]=$this->model->getCatalogo("proveedores");
        $data["familias"]=$this->model->getCatalogo("familias");
        $this->load->view('header');
        $this->load->view('menu');
        $this->load->view('catalogos/form_servicio',$data);
        $this->load->view('footer');
    }
    
    public function alta_familia() {
        $data["documentos"]=$this->model->getCatalogo("documentos");
        $this->load->view('header');
        $this->load->view('menu');
        $this->load->view('catalogos/form_familia',$data);
        $this->load->view('footer');
    }
    
    public function alta_empresa() {
        $this->load->view('header');
        $this->load->view('menu');
        $this->load->view('catalogos/form_proveedor');
        $this->load->view('footer');
    }

    //VIEWS - EDICION ----------------------------------------------------------

    public function edicion_empleado($id) {
        $data['empleado'] = $this->model->getItemCatalogo("empleados", $id);
		$data["proveedores"]=$this->model->getCatalogo("proveedores");
        $data["departamentos"]=$this->model->getCatalogo("departamentos");
        //desencriptar password
        $this->load->library('encrypt');
        $key = 'mangoo-security';
        $data['empleado']->password = $this->encrypt->decode($data['empleado']->password, $key);
        $data['permisos'] = $this->model->getCatalogoWhere("permisos", "empleados_id='$id'")[0];
        $this->load->view('header');
        $this->load->view('menu');
        $this->load->view('catalogos/form_empleado', $data);
        $this->load->view('footer');
    }

    public function edicion_cliente($id) {
        $data['cliente'] = $this->model->getItemCatalogo("clientes", $id);
        $data['contactos'] = $this->model->getCatalogoWhere("personas_contacto", "cliente_id='$id'");
        $data["estados"]=$this->model->getCatalogo("estados");
        $this->load->view('header');
        $this->load->view('menu');
        $this->load->view('catalogos/form_cliente', $data);
        $this->load->view('footer');
    }
    
    public function edicion_servicio($id) {
        $data["proveedores"]=$this->model->getCatalogo("proveedores");
        $data["familias"]=$this->model->getCatalogo("familias");
        $data['servicio'] = $this->model->getItemCatalogo("servicios", $id);
        $data['precios']= $this->model->getPrecios($id);
        $this->load->view('header');
        $this->load->view('menu');
        $this->load->view('catalogos/form_servicio', $data);
        $this->load->view('footer');
    }
    
    public function edicion_familia($id) {
        $data["documentos"]=$this->model->getCatalogo("documentos");
        $data["docs"]=$this->model->getCatalogoWhere("familias_has_documentos","familia_id=$id");
        $data["alcances"]=$this->model->getCatalogoWhere("alcances","familia_id=$id");
        $data['familia'] = $this->model->getItemCatalogo("familias", $id);
        $this->load->view('header');
        $this->load->view('menu');
        $this->load->view('catalogos/form_familia', $data);
        $this->load->view('footer');
    }

    public function edicion_empresa($id) {
        $data['proveedor'] = $this->model->getItemCatalogo("proveedores", $id);
        $this->load->view('header');
        $this->load->view('menu');
        $this->load->view('catalogos/form_proveedor', $data);
        $this->load->view('footer');
    }

    //Funciones Alta y Edicion de EMPLEADO ----------------------------

    public function insertUpdateEmpleado() 
    {
        $result = 0;
        $data = $this->input->post();
                     
        // Se obtienen los parametros de permisos y se guardan en un array
        $permisos = array(
            'permiso_personal' => $this->input->post('permiso_personal'),
            'permiso_clientes' => $this->input->post('permiso_clientes'),
            'permiso_productos' => $this->input->post('permiso_productos'),
            'permiso_proveedores' => $this->input->post('permiso_proveedores'),
            'permiso_configuraciones' => $this->input->post('permiso_configuraciones'),
            'permiso_cotizaciones' => $this->input->post('permiso_cotizaciones'),
            'permiso_notas' => $this->input->post('permiso_notas'),
            'permiso_ordenes' => $this->input->post('permiso_ordenes'),
            'permiso_agenda' => $this->input->post('permiso_agenda'),
            'permiso_expedientes' => $this->input->post('permiso_expedientes'),
        );

        // Se borran los datos de los permisos para poder insetar el array completo 
        unset($data['permiso_personal']);
        unset($data['permiso_clientes']);
        unset($data['permiso_productos']);
        unset($data['permiso_proveedores']);
        unset($data['permiso_configuraciones']);
        unset($data['permiso_cotizaciones']);
        unset($data['permiso_notas']);
        unset($data['permiso_ordenes']);
        unset($data['permiso_agenda']);
        unset($data['permiso_expedientes']);

        
        //encriptar password
        //$this->load->library('encrypt');
        //$key = 'mangoo-security';
        //$data['password'] = $this->encrypt->encode($data['password'], $key);

        // Nuevo registro
        if (!isset($data['id'])) 
        {
            
            $empleado_id = $this->catalogos->insertEmpleado($data);
            
            if ($empleado_id > 0) 
            { //se inserto el empleado ahora se insertan los permisos
                
                $permisos['empleados_id'] = $empleado_id;
                $result = $this->catalogos->insertToCatalogo($permisos, "permisos");
            }
        }
        // Editar empleado existente
        else
        {
            // Obtenemos el Id del Empleado            
            $idEmpleado = $data['id'];
            // Lo quitamos del array con datos a actualizar
            unset($data['id']);
            // Actualizamos
            $result=$this->catalogos->updateCatalogo($data, $idEmpleado, 'empleados');
            // Si lo actualizó bien, ahora se actualizarán los permisos
            if($result==1)
            {   

                $registroPermisos = $this->catalogos->getPermisos($idEmpleado);

                if($registroPermisos!=null)
                {
                    $result = $this->catalogos->updatePermisos($permisos,$idEmpleado);
                }
                else
                {
                    $permisos['empleados_id'] = $idEmpleado;
                    $result = $this->catalogos->insertToCatalogo($permisos, "permisos");
                }
            }
        }

        echo $result;
    }
    
    public function insertUpdateCliente() 
    {
        $data=$this->input->post();
        unset($data["mapa_dir"]);
        $nombre=$data["nombre"]; unset($data["nombre"]);
        $telefono=$data["telefono"]; unset($data["telefono"]);
        $correo=$data["correo"]; unset($data["correo"]);
        
        if(isset($data["cotizacion"])){
            $cotizacion=$data["cotizacion"]; unset($data["cotizacion"]);
        }
        else{
            $cotizacion=array();
        }
        if(isset($data["facturacion"])){
            $facturacion=$data["facturacion"]; unset($data["facturacion"]);
        }
        else{
            $facturacion=array();
        }
        if(isset($data["orden"])){
            $orden=$data["orden"]; unset($data["orden"]);
        }
        else{
            $orden=array();
        }
        
        $data=array_map('strtoupper', $data);
             
        if (!isset($data['id'])) {
            //insert
            $id = $this->model->insertCliente($data);
            $result=$id;
        }
        else{
            //update
            $id=$data['id'];
            unset($data['id']);
            $result = $this->model->updateCliente($data,$id);
            $this->model->deleteContactos($id);
            
        }

        for($i=0; $i< sizeof($nombre); $i++){
                $temp=array(
                    "nombre"=>$nombre[$i],
                    "telefono"=>$telefono[$i],
                    "email"=>$correo[$i],
                    "cotizacion"=>$cotizacion[$i],
                    "facturacion"=>$facturacion[$i],
                    "orden"=>$orden[$i],
                    "cliente_id"=>$id
                );
                $this->model->insertToCatalogo($temp,"personas_contacto");
        }
        
        echo $result;
        
    }
    
    public function insertUpdateFamila(){
        $data=$this->input->post();
        $docs= $this->input->post("documentos");
        unset($data["documentos"]);
        $alcances=$this->input->post("alcances");
        unset($data["alcances"]);
        //print_r($data);
        if (!isset($data['id'])) {
            //insert
            $result = $this->model->insertToCatalogo($data, "familias");
            $id=$result;
            
        }
        else{
            //update
            $id=$data['id'];
            unset($data['id']);
            $result = $this->model->updateCatalogo($data,$id, "familias");
        }
        if($result>0){
            $this->model->removeFamiliaElements($id);
            $this->addFamiliaElements($docs,$alcances,$id);
        }
        echo $id;
        
    }
    
    private function addFamiliaElements($docs,$alcances,$id){
        if($docs!=null){
            foreach($docs as $d){
                $temp=array("documento"=>$d,"familia_id"=>$id);
                $this->model->insertToCatalogo($temp,"familias_has_documentos");
            }
        }
        if($alcances!=null){
            foreach($alcances as $a){
                $temp=array("alcance"=>$a,"familia_id"=>$id);
                $this->model->insertToCatalogo($temp,"alcances");
            }  
        }
        
    }
    
    public function insertUpdateServicio(){
        $data=$this->input->post();
        
        if($data["por_puntos"]==1){
            $rango_inicio=$data["rango_inicio"]; 
            $rango_fin=$data["rango_fin"]; 
            $precio=$data["precio_rango"]; 
            $data["precio"]=0;
        }
        unset($data["rango_inicio"]); unset($data["rango_fin"]); unset($data["precio_rango"]); unset($data["0"]);
        
        if (!isset($data['id'])) {
            //insert
            $id = $this->model->insertToCatalogo($data,"servicios");
            $result=$id;
        }
        
        else{
            //update
            $id=$data['id'];
            unset($data['id']);
            $result = $this->model->updateCatalogo($data,$id,"servicios");
            $this->model->deletePreciosServicio($id);
            
        }
        if($data["por_puntos"]==1){
                for($i=0; $i< sizeof($rango_inicio); $i++){
                    $temp=array(
                        "rango_inicio"=>$rango_inicio[$i],
                        "rango_fin"=>$rango_fin[$i],
                        "precio"=>$precio[$i],
                        "servicio_id"=>$id
                    );
                    $this->model->insertToCatalogo($temp,"servicios_has_precios");
            }
        }
        
        
        echo $result;
    }
    
    public function insertUpdateToCatalogo($catalogo) {
        $data = $this->input->post();
        $data=array_map('strtoupper', $data);
        if (!isset($data['id'])) {
            //insert
            $result = $this->model->insertToCatalogo($data, $catalogo);
        }
        else{
            //update
            $id=$data['id'];
            unset($data['id']);
            $result = $this->model->updateCatalogo($data,$id, $catalogo);
        }
        
        echo $result;
    }
    
    public function insertUpdateProducto() {
        $result = 0;
        //arrays de insercion
        $data = $this->input->post();
        $data=array_map('strtoupper', $data);
        
        if (!isset($data['id'])) {
            //insertar
            $empleado_id = $this->model->insertar_producto($data);
            
        }
        else{
            //editar
            $result=$this->model->updateProducto($data, $data['id'], '  ');
        }

        echo $result;
    }
    //Funciones de Obtención de registros --------------------------------

   

    public function getProductos() {
        $productos = $this->model->getProductos();
        $json_data = array("data" => $productos);
        echo json_encode($json_data);
    }
    
    public function getEmpleados() {
        $empleados = $this->model->getCatalogo("empleados");
        $json_data = array("data" => $empleados);
        echo json_encode($json_data);
    }

    public function getClientes() {
        $clientes = $this->model->getClientes();
        $json_data = array("data" => $clientes);
        echo json_encode($json_data);
    }
    
    public function getServicios() {
        $servicios = $this->model->getServicios();
        $json_data = array("data" => $servicios);
        echo json_encode($json_data);
    }
    
    public function getFamilias() {
        $servicios = $this->model->getCatalogo("familias");
        $json_data = array("data" => $servicios);
        echo json_encode($json_data);
    }
    
    public function getEmpresas() {
        $servicios = $this->model->getCatalogo("proveedores");
        $json_data = array("data" => $servicios);
        echo json_encode($json_data);
    }

}
