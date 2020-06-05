<?php
error_reporting(0);

defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller 
{
	public function index()
	{
		$this->load->view('login');
	}
        
    public function inicio()
	{
        if ($this->session->userdata('logeado')) 
        {
            $this->load->view('header');
            $this->load->view('menu');
            $this->load->view('inicio');
            $this->load->view('footer');
        }
        else
        {
            redirect(base_url(), 'refresh');
        }
		
	}
        
    public function iniciar_sesion() 
    {

        $this->load->model('Catalogos_model', 'model');
        $usuario=$this->input->post('usuario');
        $pass=$this->input->post('pass');
       // Desencriptar password
        $this->load->library('encriptacion');
        $key = 'M@ngo0-S3cUr1ty';
        $contrasena = $pass;
        $user=$this->model->userLogin($usuario,$pass);


        $contrasenaDescifrada = $this->encriptacion->my_decrypt($user->password,$key);

        if(isset($user->id))
        {
            if($pass==$contrasenaDescifrada)
            {
                $permisos=$this->model->getPermisos($user->id);
                $alertasDocumentos = $this->model->getDocumentosPorVencerEmpleado();
                $proximosServicios = $this->model->getProximosServicios();
                $fisicoMecanica = $this->model->getFisicoMecanicaPorVencer();
                $verificacion = $this->model->getVerificacionPorVencer();
                $polizas = $this->model->getPolizaPorVencer();
                $data = array(
                        'logeado' => true,
                        'id_usuario' => $user->id,
                        'usuario' => $user->usuario,
                        'permiso_empleados'=>$permisos->permiso_empleados,
                        'permiso_clientes'=>$permisos->permiso_clientes,
                        'permiso_subclientes'=>$permisos->permiso_subclientes,
                        'permiso_proveedores'=>$permisos->permiso_proveedores,
                        'permiso_tarifas'=>$permisos->permiso_tarifas,
                        'permiso_unidades'=>$permisos->permiso_unidades,
                        'permiso_incidentes'=>$permisos->permiso_incidentes,
                        'permiso_almacen'=>$permisos->permiso_almacen,
                        'alertasDocumentos' => $alertasDocumentos,
                        'proximosServicios' => $proximosServicios,
                        'fisicoMecanica' => $fisicoMecanica,
                        'verificacion' => $verificacion,
                        'polizas' => $polizas
                    );
                $this->session->set_userdata($data);
                echo "ok";
            }
            else
            {
              echo "error";  
            }
        }
        else
        {
            echo "error";
        }

    }

    public function cerrar_sesion() 
    {
        $this->session->sess_destroy();
        redirect(base_url(), 'refresh');
    }
}
