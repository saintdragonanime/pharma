<?php
error_reporting(0);

defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends CI_Controller 
{
    public function __construct() 
    {
        parent::__construct();
        $this->load->model('Clientes_model', 'model');
    }

    // VIEWS 
    public function index() 
    {
        $this->load->view('header');
        $this->load->view('menu');
        $this->load->view('catalogos/clientes/listado');
        $this->load->view('footer');
    }
    
    // VIEW - ALTA
    public function alta() 
    {
        $data['visualizar'] = 0;
        $data['unidades'] = $this->model->getUnidadeselect();
        $this->load->view('header');
        $this->load->view('menu');
        $this->load->view('catalogos/clientes/form_cliente',$data);
        $this->load->view('footer');
    }

    public function visualiza_cliente($id)
    {
        $data['unidades'] = $this->model->getUnidadeselect();
        $data['visualizar'] = 1;
        $data['cliente'] = $this->model->getCliente($id);
        $data["contactosCliente"]=$this->model->getContactosCliente($id);
        //$data["numero_contactos"] = count($data["personas_contacto"]);
        
        $this->load->view('header');
        $this->load->view('menu');
        $this->load->view('catalogos/clientes/form_cliente', $data);
        $this->load->view('footer');
    }

    // VIEW - EDICION
    public function edicion_cliente($id) 
    {
        $data['visualizar'] = 0;
        $data['unidades'] = $this->model->getUnidadeselect();
        $data['cliente'] = $this->model->getCliente($id);
		$data["contactosCliente"] = $this->model->getContactosCliente($id);
        
        $this->load->view('header');
        $this->load->view('menu');
        $this->load->view('catalogos/clientes/form_cliente', $data);
        $this->load->view('footer');
    }
    
    // Funciones Alta y Edicion de Cliente
    public function insertUpdateCliente() 
    {
        $result = 0;

        // Obtenemos los datos de POST
        $data = $this->input->post();
        
        // Ordenamos los datos principales del cliente
        $datosCliente = array(
                            'razon_social' => $data["razon_social"],
                            'rfc' => $data["rfc"],
                            'calle' => $data["calle"],
                            'no_ext' => $data["no_ext"],
                            'no_int' => $data["no_int"],
                            'colonia' => $data["colonia"],
                            'cp' => $data["cp"],
                            'municipio' => $data["municipio"],
                            'estado' => $data["estado"],
                            'planta_sucursal' => $data["planta_sucursal"],
                            'condicion_pago' => $data["condicion_pago"],
                            'correo_certificacion' => $data["correo_certificacion"],
                            'metodo_pago' => $data["metodo_pago"],
                            'forma_pago' => $data["forma_pago"],
                            'observaciones' => $data["observaciones"],
                            'no_cuenta' => $data["no_cuenta"],
                            'banco' => $data["banco"],
                            'tipo' => 1
                            );

        // Si no trae ID, será nuevo cliente      
        if (!isset($data['id'])) 
        {
            $cliente_id = $this->model->insertCliente($datosCliente);
                    
            if ($cliente_id > 0) 
            { 
                // Si se insertó el cliente ahora se insertan los datos complementarios
                // Primero, se organizan los contactos que vengan de la vista para poder hacer su inserción

                // Mediante el contador, sabremos cuantos contactos vienen del POST
                // Con esto creamos un ciclo FOR, para obtener los datos y organizarlos
                $total_contactos = $data['contador_div_contactos']+0;
                $array_contactos = array();
                

                for($i=0; $i<$total_contactos; $i++)
                {
                   $array_contactos[$i]["persona_contacto"] = $data["persona_contacto"][$i];
                    $array_contactos[$i]["tipo_contacto"] = $data["tipo_contacto"][$i];
                    $array_contactos[$i]["telefono1"] = $data["telefono1"][$i];
                    $array_contactos[$i]["telefono2"] = $data["telefono2"][$i];
                    $array_contactos[$i]["correo1"] = $data["correo1"][$i];
                    $array_contactos[$i]["correo2"] = $data["correo2"][$i];
                    $array_contactos[$i]["cliente_id"] = $cliente_id;
                    // Se inserta cada contacto
                    $this->model->insertContactoCliente($array_contactos[$i]);
                }

                // Verificamos si ha insertado al menos una unidad dedicada
                if($data["contador_div_unidades"]+0>=1 && $data["unidad"][0]!='')
                {
                    $total_unidades = $data['contador_div_unidades']+0;
                    $array_unidades = array();

                    // Mediante el contador, sabremos cuantos contactos vienen del POST
                    // Con esto creamos un ciclo FOR, para obtener los datos y organizarlos
                    for($j=0; $j<$total_unidades; $j++)
                    {
                        $array_unidades[$j]["unidad"] = $data["unidad"][$j];
                        $array_unidades[$j]["costo_dia1"] = $data["costo_dia1"][$j];
                        $array_unidades[$j]["costo_dia2"] = $data["costo_dia2"][$j];
                        $array_unidades[$j]["cliente_id"] = $cliente_id;
                        // Se inserta cada unidad
                        $this->model->insertUnidad($array_unidades[$j]);
                    }
                } 

                // Verificamos si ha insertado al menos una unidad dedicada
                if($data["contador_div_complementos"]>=1 && $data["porcentaje_gravado"][0]!='')
                {
                    $total_complementos = $data['contador_div_complementos']+0;
                    $array_complementos = array();

                    for($k=0; $k<$total_complementos; $k++)
                    {
                        $array_complementos[$k]["porcentaje_gravado"] = $data["porcentaje_gravado"][$k];
                        $array_complementos[$k]["inicio_porcentaje"] = $data["inicio_porcentaje"][$k];
                        $array_complementos[$k]["fin_porcentaje"] = $data["fin_porcentaje"][$k];
                        $array_complementos[$k]["cliente_id"] = $cliente_id;
                        // Se inserta cada complemento de pago
                        $this->model->insertComplementoPago($array_complementos[$k]);
                    }
                }
                $result = 1;
            }
        }
        // Si trae ID, es edición
        else
        {
            // Editar
            $result = $this->model->actualizaCliente($datosCliente,$data['id']);
            if($result == 1)
            {
                // Mediante el contador, sabremos cuantos contactos vienen del POST
                // Con esto creamos un ciclo FOR, para obtener los datos y organizarlos
                $total_contactos = $data['contador_div_contactos']+0;
                $array_contactos = array();
                
                
                for($i=0; $i<$total_contactos; $i++)
                {
                    if(!empty($data["persona_contacto"][$i]))
                    {
                        $array_contactos[$i]["persona_contacto"] = $data["persona_contacto"][$i];
                        $array_contactos[$i]["tipo_contacto"] = $data["tipo_contacto"][$i];
                        $array_contactos[$i]["telefono1"] = $data["telefono1"][$i];
                        $array_contactos[$i]["telefono2"] = $data["telefono2"][$i];
                        $array_contactos[$i]["correo1"] = $data["correo1"][$i];
                        $array_contactos[$i]["correo2"] = $data["correo2"][$i];
                        $array_contactos[$i]["cliente_id"] = $data['id'];
                        // Se inserta cada contacto
                        $this->model->insertContactoCliente($array_contactos[$i]);
                    }    
                }
                
                // Verificamos si ha insertado al menos una unidad dedicada
                if($data["contador_div_unidades"]+0>=1 && $data["unidad"][0]!='')
                {
                    $total_unidades = $data['contador_div_unidades']+0;
                    $array_unidades = array();

                    // Mediante el contador, sabremos cuantos contactos vienen del POST
                    // Con esto creamos un ciclo FOR, para obtener los datos y organizarlos
                    for($j=0; $j<$total_unidades; $j++)
                    {
                        $array_unidades[$j]["unidad"] = $data["unidad"][$j];
                        $array_unidades[$j]["costo_dia1"] = $data["costo_dia1"][$j];
                        $array_unidades[$j]["costo_dia2"] = $data["costo_dia2"][$j];
                        $array_unidades[$j]["cliente_id"] = $data['id'];
                        // Se inserta cada unidad
                        $this->model->insertUnidad($array_unidades[$j]);
                    }
                } 

                // Verificamos si ha insertado al menos una unidad dedicada
                if($data["contador_div_complementos"]>=1 && $data["porcentaje_gravado"][0]!='')
                {
                    $total_complementos = $data['contador_div_complementos']+0;
                    $array_complementos = array();

                    for($k=0; $k<$total_complementos; $k++)
                    {
                        $array_complementos[$k]["porcentaje_gravado"] = $data["porcentaje_gravado"][$k];
                        $array_complementos[$k]["inicio_porcentaje"] = $data["inicio_porcentaje"][$k];
                        $array_complementos[$k]["fin_porcentaje"] = $data["fin_porcentaje"][$k];
                        $array_complementos[$k]["cliente_id"] = $data['id'];
                        // Se inserta cada complemento de pago
                        $this->model->insertComplementoPago($array_complementos[$k]);
                    }
                }
            }    
        }
        echo $result;
    }
   
    // Función para obtener json de unidades dedicadas
    public function getUnidadesDedicadas($idCliente)
    {
        // Si el idCliente viene diferente de '0' se cargan datos, si no se manda en NUlo
        // Esto ayuda a la vista de alta, para no cagar datos en la tabla inicial
        if($idCliente!='0')
        {
            $unidadesDedicadas = $this->model->getUnidadesDedicadas($idCliente);
            $json_data = array("data" => $unidadesDedicadas);
            echo json_encode($json_data);
        } 
        else
        {
            $json_data = null;
            echo json_encode($json_data);
        }

    }

    // Función para obtener los complementos de Pago
    public function getComplementosPago($idCliente)
    {
        // Si el idCliente viene diferente de '0' se cargan datos, si no se manda en NUlo
        // Esto ayuda a la vista de alta, para no cagar datos en la tabla inicial
        if($idCliente!='0')
        {
            $complementosPago = $this->model->getComplementosPago($idCliente);
            $json_data = array("data" => $complementosPago);
            echo json_encode($json_data);
        } 
        else
        {
            $json_data = null;
            echo json_encode($json_data);
        }
    }

    // Obtener el listado de Clientes
    public function getListadoClientes()
    {
        $clientes= $this->model->getListadoClientes();
        $json_data = array("data" => $clientes);
        echo json_encode($json_data);
    }

    // Obtener el listado de los contactos del Cliente
    public function getListadoContactosCliente($idCliente)
    {
        $contactosCliente= $this->model->getContactosCliente($idCliente);
        $json_data = array("data" => $contactosCliente);
        echo json_encode($json_data);
    }

    // Función para cambiar el estatus de un Cliente
    public function cambia_estatus_cliente()
    {
        $respuesta = 0;
        $idCliente = $this->input->post('idCliente');
        $tipo = $this->input->post('tipo');

        // Se forma el array para actualizar
        $data = array('estatus' =>$tipo);

        // Se manda a actualizar al modelo        
        $result = $this->model->actualizaCliente($data,$idCliente);
        
        // Si salió bien, la respuesta a la vista será de "Exitoso"
        if($result == TRUE)
        {
            $respuesta = 1;
        }
        echo $respuesta;
    }   

    public function editaRegistroContactoCliente()
    {
        // Obtenemos los datos de POST
        $data = $this->input->post();
        $accion = trim($data["action"]);
        $idContacto = trim($data["id"]);
        
        // Verificamos que la acción sea editar y venga el ID
        if($data["action"]=='edit' && isset($data["id"]))
        {
            unset($data['id']);
            unset($data['action']);
            $data['persona_contacto'] = trim($data['persona_contacto']);
            $data['telefono1'] = trim($data['telefono1'])+0;
            $data['telefono2'] = trim($data['telefono2'])+0;
            $data['correo1'] = trim($data['correo1']);
            $data['correo2'] = trim($data['correo2']);
            $data['tipo_contacto'] = trim($data['tipo_contacto']);
            

            $act = $this->model->actualizaContactoCliente($data, $idContacto);
        }  

        if ($act == true) echo 'true'; else echo 'false'; 
    }

    public function edicion_contacto_cliente() {
    $id = $this->input->get('id');

    $data = $this->model->edicion_contacto_cliente($id);
    // $data = $this->model->getvisualpermisos();
    echo json_encode($data);
    }

    public function update_contacto_cliente() {
    $result = 0;
    $data = $this->input->post();
    //update
    $id=$data['id'];
    unset($data['id']);
    $result = $this->model->update_contacto_cliente($data,$id);
    echo json_encode($result);
    }

    public function eliminarContactoCliente()
    {
        $id= $this->input->post('id');

        $result = $this->model->eliminarContactoCliente($id);
        $msg['success'] = false;
        if($result){
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }

    public function eliminarComplementoPago()
    {
        $id= $this->input->post('id');
        $result = $this->model->eliminarComplementoPago($id);
        $msg['success'] = false;
        if($result){
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }


    public function eliminarUnidades_dedicadas(){
        $id= $this->input->post('id');
        $result = $this->model->eliminarUnidades_dedicadas($id);
        $msg['success'] = false;
        if($result){
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }

    public function verificaClienteExistente($rfc)
    {
        $cliente = $this->model->getClientePorRFC($rfc);
        echo json_encode($cliente);
    }

}
