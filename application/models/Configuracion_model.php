<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Configuracion_model extends CI_Model {



		function getDataPuesto(){
			$puesto = $this->db->get('puestos');
			return $puesto->result();
		} 

		function getDataUnidades_medida(){
			$unidad = $this->db->get('unidades_medida');
			return $unidad->result();
		} 

		function getDataTipos_pago(){
			$pago = $this->db->get('tipos_pago');
			return $pago->result();
		} 

		function getDataVehiculos(){
			$vehiculo = $this->db->get('vehiculos');
			return $vehiculo->result();
		} 

		function getDataTipo_contacto(){
			$contacto = $this->db->get('tipo_contacto');
			return $contacto->result();
		} 

		function getDataCuentas(){
			$cuenta = $this->db->get('cuentas');
			return $cuenta->result();
		} 

        function getDataUbicacion(){
            $cuenta = $this->db->get('ubicacion');
            return $cuenta->result();
        } 

        function getDataPropietario(){
            $cuenta = $this->db->get('propietario');
            return $cuenta->result();
        } 

	    function guardarPuesto($dato){
		$this->db->insert('puestos', $dato);
        }

         function guardarTipo_pago($dato){
		$this->db->insert('tipos_pago', $dato);
        }

         function guardarVehiculos($dato){
		$this->db->insert('vehiculos', $dato);
        }

         function guardarTipo_contacto($dato){
		$this->db->insert('tipo_contacto', $dato);
        }

         function guardarCuentas($dato){
		$this->db->insert('cuentas', $dato);
        }
         
        function guardarUnidad_medida($dato){
		$this->db->insert('unidades_medida', $dato);
        } 
        
        function insertarPropietario($dato){
        $this->db->insert('propietario',$dato);    
        }

        function guardarUbicacion($dato){
        $this->db->insert('ubicacion', $dato);
        } 



        public function existe_puesto($nombre) {
        $sql = "SELECT nombre FROM puestos WHERE nombre='$nombre'";
        $query = $this->db->query($sql);
        return $query->row();
        }
 
        public function existe_unidad_medida($nombre) {
        $sql = "SELECT nombre FROM unidades_medida WHERE nombre='$nombre'";
        $query = $this->db->query($sql);
        return $query->row();
        }
 
        public function existe_tipo_pago($nombre) {
        $sql = "SELECT nombre FROM tipos_pago WHERE nombre='$nombre'";
        $query = $this->db->query($sql);
        return $query->row();
        }
 
        public function existe_vehiculos($nombre) {
        $sql = "SELECT nombre FROM vehiculos WHERE nombre='$nombre'";
        $query = $this->db->query($sql);
        return $query->row();
        }
 
        public function existe_tipo_contacto($nombre) {
        $sql = "SELECT nombre FROM tipo_contacto WHERE nombre='$nombre'";
        $query = $this->db->query($sql);
        return $query->row();
        }
 
        public function existe_cuentas($nombre) {
        $sql = "SELECT nombre FROM cuentas WHERE nombre='$nombre'";
        $query = $this->db->query($sql);
        return $query->row();
        }

        public function existe_ubicacion($nombre) {
        $sql = "SELECT nombre FROM ubicacion WHERE nombre='$nombre'";
        $query = $this->db->query($sql);
        return $query->row();
        }

        public function existe_propietario($nombre) {
        $sql = "SELECT nombre FROM propietario WHERE nombre='$nombre'";
        $query = $this->db->query($sql);
        return $query->row();
        }

        	  
}