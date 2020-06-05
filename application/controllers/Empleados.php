<?php
error_reporting(0);

defined('BASEPATH') OR exit('No direct script access allowed');

class Empleados extends CI_Controller 
{
    public function __construct() 
    {
        parent::__construct();
        $this->load->model('Empleados_model', 'model');
    }

    // Listado de Empleados
    public function index() 
    {
        $this->load->view('header');
        $this->load->view('menu');
        $this->load->view('catalogos/empleados/listado');
        $this->load->view('footer');
    }
    
    // Vista de formulario para Alta de Empleado
    public function alta() 
    {
        $data['visualizar'] = 0;
        $data['unidades'] = $this->model->getUnidades();
        $data['tipoVehiculo'] = $this->model->getTipoVehiculoFull();
        $this->load->view('header');
        $this->load->view('menu');
        $this->load->view('catalogos/empleados/form_empleado',$data);
        $this->load->view('footer');
    }
    
    // Vista de formulario para Edición de Empleado
    public function edicion_empleado($id) 
    {
        $data['visualizar'] = 0;
        $data['unidades'] = $this->model->getUnidades();
        //$data['empleado'] = $this->model->getItemCatalogo("empleados", $id);
        $data['empleado'] = $this->model->getEmpleadoyUnidad($id);
        
        $data["proveedores"]=$this->model->getCatalogo("proveedores");
        //$data["departamentos"]=$this->model->getCatalogo("departamentos");
        $data['tipoVehiculo'] = $this->model->getTipoVehiculoFull();
        // Desencriptar password
        $this->load->library('encriptacion');
        $key = 'M@ngo0-S3cUr1ty';
        $contrasena = $data['empleado']->password;
        $contrasenaDescifrada = $this->encriptacion->my_decrypt($contrasena,$key);
        $data['empleado']->password = $contrasenaDescifrada;

        //$data['empleado']->password = $this->encrypt->decode($data['empleado']->password, $key);
        $data['permisos'] = $this->model->getCatalogoWhere("permisos", "empleados_id='$id'");

        $this->load->view('header');
        $this->load->view('menu');
        $this->load->view('catalogos/empleados/form_empleado', $data);
        $this->load->view('footer');
    }

    // Vista de formulario para Edición de Empleado
    public function visualiza_empleado($id) 
    {
        $data['visualizar'] = 1;
        //$data['empleado'] = $this->model->getItemCatalogo("empleados", $id);
        $data['empleado'] = $this->model->getEmpleadoyUnidad($id);
        $data["proveedores"]=$this->model->getCatalogo("proveedores");
        //$data["departamentos"]=$this->model->getCatalogo("departamentos");
        $data['tipoVehiculo'] = $this->model->getTipoVehiculoFull();
        // Desencriptar password
        $this->load->library('encriptacion');
        $key = 'M@ngo0-S3cUr1ty';
        $contrasena = $data['empleado']->password;
        $contrasenaDescifrada = $this->encriptacion->my_decrypt($contrasena,$key);
        $data['empleado']->password = $contrasenaDescifrada;

        //$data['empleado']->password = $this->encrypt->decode($data['empleado']->password, $key);
        $data['permisos'] = $this->model->getCatalogoWhere("permisos", "empleados_id='$id'");

        $this->load->view('header');
        $this->load->view('menu');
        $this->load->view('catalogos/empleados/form_empleado', $data);
        $this->load->view('footer');
    }

    // Funcion para guardar los datos del EMPLEADO, sea Alta o Edición
    public function insertUpdateEmpleado() 
    {
        $result = 0;
        
        $data = $this->input->post();
        unset($data['confirma_password']);

        // Se obtienen los parametros de permisos y se guardan en un array
        $permisos = array(
            'permiso_empleados' => $this->input->post('permiso_empleados'),
            'permiso_clientes' => $this->input->post('permiso_clientes'),
            'permiso_subclientes' => $this->input->post('permiso_subclientes'),
            'permiso_proveedores' => $this->input->post('permiso_proveedores'),
            'permiso_tarifas' => $this->input->post('permiso_tarifas'),
            'permiso_unidades' => $this->input->post('permiso_unidades'),
            'permiso_incidentes' => $this->input->post('permiso_incidentes'),
            'permiso_almacen' => $this->input->post('permiso_almacen')
        );

        // Se borran los datos de los permisos para poder insetar el array completo 
        unset($data['permiso_empleados']);
        unset($data['permiso_clientes']);
        unset($data['permiso_subclientes']);
        unset($data['permiso_proveedores']);
        unset($data['permiso_tarifas']);
        unset($data['permiso_unidades']);
        unset($data['permiso_incidentes']);
        unset($data['permiso_almacen']);
        
        // Se borra el checkbox que corresponde a "Crédito" y al detalle de información laboral
        unset($data['credito']);
        unset($data['muestra_detalle_laboral']);


        // Encriptar password
        $this->load->library('encriptacion');
        $key = 'M@ngo0-S3cUr1ty';
        $contrasena = $data['password'];
        $contrasenaCifrada = $this->encriptacion->my_encrypt($contrasena,$key);
        $data['password'] = $contrasenaCifrada;

        // Nuevo registro
        if (!isset($data['id'])) 
        {
            if(empty($data["fecha_ingreso"])) { unset($data['fecha_ingreso']); }
            if(empty($data["fecha_salida"])) { unset($data['fecha_salida']); }
            if(empty($data["licencia_venc"])) { unset($data['licencia_venc']); }
            if(empty($data["medica_venc"])) { unset($data['medica_venc']); }
            if(empty($data["ine_venc"])) { unset($data['ine_venc']); }
            
            $empleado_id = $this->model->insertEmpleado($data);
            
            if ($empleado_id > 0) 
            { 
                //se inserto el empleado ahora se insertan los permisos
                $permisos['empleados_id'] = $empleado_id;
                $result = $this->model->insertToCatalogo($permisos, "permisos");

                // Llama a la función para subir los archivos
                $this->cargaArchivos($_FILES,$empleado_id);
            }
        }
        // Editar empleado existente
        else
        {
            // Obtenemos el Id del Empleado            
            $idEmpleado = $data['id'];
            // Lo quitamos del array con datos a actualizar
            unset($data['id']);

            // Verificamos fechas
            if(empty($data["fecha_ingreso"])) { unset($data['fecha_ingreso']); }
            if(empty($data["fecha_salida"])) { unset($data['fecha_salida']); }
            if(empty($data["licencia_venc"])) { unset($data['licencia_venc']); }
            if(empty($data["medica_venc"])) { unset($data['medica_venc']); }
            if(empty($data["ine_venc"])) { unset($data['ine_venc']); }

            // Actualizamos
            $result=$this->model->updateCatalogo($data, $idEmpleado, 'empleados');
            // Si lo actualizó bien, ahora se actualizarán los permisos y se suben los documentos
            if($result==1)
            {   
                // Se busca un registro de los permisos
                $registroPermisos = $this->model->getPermisos($idEmpleado);
                // Si hay registro, se actualiza
                if($registroPermisos!=null)
                {
                    $result = $this->model->updatePermisos($permisos,$idEmpleado);
                }
                // Si no, se crea uno y se guardan los permisos
                else
                {
                    $permisos['empleados_id'] = $idEmpleado;
                    $result = $this->catalogos->insertToCatalogo($permisos, "permisos");
                }

                // Llama a la función para subir los archivos
                $this->cargaArchivos($_FILES,$idEmpleado);
            }
        }

        echo $result;
    }

    public function getTipoVehiculo($idUnidad)
    {
        $unidad = $this->model->getUnidad($idUnidad);
        echo json_encode($unidad);
    }
    
    // Función para cambiar el estatus de un Empleado
    public function cambia_estatus_empleado()
    {
        $respuesta = 0;
        $idEmpleado = $this->input->post('idEmpleado');
        $tipo = $this->input->post('tipo');

        // Si es Suspensión obtenemos el comentario del motivo de suspensión
        if($tipo==2)
        {
            $motivo_suspension = $this->input->post('motivo_suspension');
            $data = array('motivo_suspension' => $motivo_suspension ,
                          'estatus' => $tipo);
        }  
        // Si es Eliminación obtenemos el comentario del motivo de suspensión
        else if($tipo==0)  
        {
            $motivo_eliminacion = $this->input->post('motivo_eliminacion');
            $data = array('motivo_eliminacion' => $motivo_eliminacion ,
                          'estatus' => $tipo);
        } 
        // Si es Activación solo se guarda el estatus
        else if($tipo==1)  
        {
            $data = array('estatus' => $tipo);
        }   

        
        // Se manda a actualizar al modelo        
        $result = $this->model->actualizaEmpleado($data,$idEmpleado);
        
        // Si salió bien, la respuesta a la vista será de "Exitoso"
        if($result == TRUE)
        {
            $respuesta = 1;
        }
        echo $respuesta;
    }    

    // Función de obtención de registros de empleados
    public function getEmpleados() 
    {   
        $empleados = $this->model->getEmpleados();
        $json_data = array("data" => $empleados);
        echo json_encode($json_data);
    }
   
    public function cargaArchivos($FILES,$idEmpleado)
    {
        // Ubica el nombre del directorio, nos basaremos en el ID del empleado registrado en la BD
        $nuevo_directorio = './uploads/empleados/'.$idEmpleado;
        
        // Cambiamos los caracteres especiales de los nombres para evitar errores
        $FILES['licencia']["name"] = $this->eliminar_simbolos($FILES['licencia']["name"]);
        $FILES['medica']["name"] = $this->eliminar_simbolos($FILES['medica']["name"]);
        $FILES['ine']["name"] = $this->eliminar_simbolos($FILES['ine']["name"]);

        // Verifica si existe el directorio
        if(!is_dir($nuevo_directorio))
        {
            // En caso de que no exista, lo creamos y le damos permisos
            mkdir($nuevo_directorio, 0777);
        }    
        
        // Licencia 
        if(!empty($FILES['licencia']["name"]))
        {
            // Inicializamos la libraría Upload 
            $this->load->library('upload');
            
            /* Pasamos una serie de datos de configuración que servirán a la librería "Upload" a cargar el archivo,
                como los límites de medidas de la imagen, y los formatos de archivos permitidos.
                NOTA= Si se pone $config['allowed_types'] ='*' permitirá todos los archivos */
            $mi_archivo = 'licencia';

            $config['upload_path'] = $nuevo_directorio;
            $config['allowed_types'] = 'gif|jpg|jpeg|png|pdf|bmp';
            $config['file_name'] = $FILES['licencia']["name"];
            $config['overwrite'] = true;

            // Cargamos la configuración del Archivo 
            $this->upload->initialize($config);
            // Subimos el archivo
            if ($this->upload->do_upload($mi_archivo))
            {
                $this->upload->data();
                $data = array('licencia' => $FILES['licencia']["name"]);
                $this->model->actualizaEmpleado($data,$idEmpleado);
            }
        }
        
        // Documento médico
        if(!empty($FILES['medica']["name"]))
        {
            // Inicializamos la libraría Upload 
            $this->load->library('upload');
            $mi_archivo = 'medica';
            $config['upload_path'] = $nuevo_directorio;
            $config['allowed_types'] = 'gif|jpg|jpeg|png|pdf|bmp';
            $config['file_name'] = $FILES['medica']["name"];
            $config['overwrite'] = true;

            // Cargamos la configuración del Archivo 
            $this->upload->initialize($config);
            // Subimos el archivo
            if ($this->upload->do_upload($mi_archivo))
            {
                $this->upload->data();
                $data = array('medica' => $FILES['medica']["name"]);
                $this->model->actualizaEmpleado($data,$idEmpleado);
            }
        }
        
        // INE
        if(!empty($FILES['ine']["name"]))
        {
            // Inicializamos la libraría Upload 
            $this->load->library('upload');
            
            $mi_archivo = 'ine';
            $config['upload_path'] = $nuevo_directorio;
            $config['allowed_types'] = 'gif|jpg|jpeg|png|pdf|bmp';
            $config['file_name'] = $FILES['ine']["name"];
            $config['overwrite'] = true;

            // Cargamos la configuración del Archivo 
            $this->upload->initialize($config);
            // Subimos el archivo
            if ($this->upload->do_upload($mi_archivo))
            {
                $this->upload->data();
                $data = array('ine' => $FILES['ine']["name"]);
                $this->model->actualizaEmpleado($data,$idEmpleado);
            }
        }
    }

    // Función para obtener los documnetos de un empleado y mostrar en el Listado de Empleados
    public function getDocumentosEmpleado($idEmpleado)
    {
        $documentosEmpleado = $this->model->getDocumentosEmpleado($idEmpleado);
        echo json_encode($documentosEmpleado);
    }

    public function eliminar_simbolos($string)
    {
 
        $string = trim($string);
     
        $string = str_replace(
            array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
            array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
            $string
        );
     
        $string = str_replace(
            array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
            array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
            $string
        );
     
        $string = str_replace(
            array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
            array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
            $string
        );
     
        $string = str_replace(
            array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
            array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
            $string
        );
     
        $string = str_replace(
            array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
            array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
            $string
        );
     
        $string = str_replace(
            array('ñ', 'Ñ', 'ç', 'Ç'),
            array('n', 'N', 'c', 'C',),
            $string
        );
     
        $string = str_replace(
            array("\\", "¨", "º","~",
                 "#", "@", "|", "!", "\"",
                 "$", "%", "&", "/",
                 "(", ")", "?", "'", "¡",
                 "¿", "[", "^", "<code>", "]",
                 "+", "}", "{", "¨", "´",
                 ">", "< ", ";", ",", ":"),
            '',
            $string
        );

        $string = str_replace(
            array(" ","  ","   "),
            '_',
            $string
        );
        return $string;
    } 

    public function verificaEmpleadoExistente()
    {
        $data = $this->input->post();
        
        $no = $data['no'];
        $curp = $data['curp'];
        $empleado = $this->model->getEmpleadoPorNoYRFC($no,$curp);
        echo json_encode($empleado);
    }

    public function getUnidadesPorTipo($tipoVehiculo)
    {
        $unidades = $this->model->getUnidadesPorTipo($tipoVehiculo);
        echo json_encode($unidades);
    }
}
?>