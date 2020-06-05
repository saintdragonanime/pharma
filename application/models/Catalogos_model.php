<?php

class Catalogos_model extends CI_Model {

    public function __construct() {
        // Call the CI_Model constructor
        parent::__construct();
    }

    //funcion generica de obtencion de istado de un catalogo
    public function getCatalogo($catalogo) {
        $sql = "SELECT * FROM $catalogo";
        $query = $this->db->query($sql);
        return $query->result();
    }

    //funcion generica de consulta con condicion
    public function getCatalogoWhere($catalogo, $condicion) {
        $sql = "SELECT * FROM $catalogo WHERE $condicion";
        $query = $this->db->query($sql);
        return $query->result();
    }

    //funcion generica que obtiene un registro por ID
    public function getItemCatalogo($catalogo, $id) {
        $sql = "SELECT * FROM $catalogo WHERE id=$id";
        $query = $this->db->query($sql);
        return $query->row();
    }

    //funcion generica de insercion en un catalogo
    public function insertToCatalogo($data, $catalogo) {
        return $this->db->insert('' . $catalogo, $data);
    }

    //funcion generica de edicion en un catalogo
    public function updateCatalogo($data, $id, $catalogo) {
        $this->db->set($data);
        $this->db->where('id', $id);
        return $this->db->update('' . $catalogo);
    }

    public function deleteCatalogo($id, $catalogo) {
        $this->db->where('id', $id);
        $this->db->delete(''.$catalogo);
    }

    public function insertEmpleado($data) {
        $this->db->insert('empleados', $data);
        return $this->db->insert_id();
    }

    public function updatePermisos($data, $id) {
        $this->db->set($data);
        $this->db->where('empleados_id', $id);
        return $this->db->update('permisos');
    }
	
	public function getServicios(){
		$sql = "SELECT servicios.*, familias.nombre as familia FROM servicios INNER JOIN familias ON familia=familias.id";
        $query = $this->db->query($sql);
        return $query->result();
	}

    public function getClientes() {
        $sql = "SELECT *, "
                . "GROUP_CONCAT(personas_contacto.nombre SEPARATOR '<br>') as contacto "
                . "FROM clientes "
                . "INNER JOIN personas_contacto ON cliente_id=clientes.id "
                . "GROUP BY clientes.id";
        $query = $this->db->query($sql);
        return $query->result();
    }
    
   
    public function getPrecios($id){
        $sql = "SELECT * FROM servicios_has_precios WHERE servicio_id=$id";
        $query = $this->db->query($sql);
        if($query->num_rows()>0){
             return $query->result();
        }
        else{
            return null;
        }
       
    }
   
    
    public function deleteContactos($id) {
        $this->db->where('cliente_id', $id);
        $this->db->delete('personas_contacto');
    }
    
    public function deleteCategorias($id) {
        $this->db->where('proveedor_id', $id);
        $this->db->delete('proveedores_has_categorias');
    }
    
    public function insertCliente($data) {
        $this->db->insert('clientes', $data);
        return $this->db->insert_id();
    }
    
    public function updateCliente($data, $id) {
        $this->db->set($data);
        $this->db->where('id', $id);
        return $this->db->update('clientes');
    }
    
    public function deleteDirecciones($id) {
        $this->db->where('cliente_id', $id);
        $this->db->delete('direcciones');
    }
    
    public function removeFamiliaElements($id){
        $this->db->where('familia_id', $id);
        $this->db->delete('familias_has_documentos');
        $this->db->where('familia_id', $id);
        $this->db->delete('alcances');
    }


    // Funciones de logueo
    public function userLogin($usuario,$pass) {
        $sql = "SELECT * FROM empleados WHERE usuario='$usuario'";
        $query = $this->db->query($sql); 
        return $query->row();
    }
    
    public function getPermisos($id) {
        $sql = "SELECT * FROM permisos WHERE empleados_id=".$id;
        $query = $this->db->query($sql);
        return $query->row();
    }
    
    public function deletePreciosServicio($id){
        $this->db->where('servicio_id', $id);
        $this->db->delete('servicios_has_precios');
    }

    public function getDocumentosPorVencerEmpleado()
    {
        $sql = "SELECT
                empleados.id,
                empleados.nombre,
                empleados.materno,
                empleados.paterno,
                empleados.licencia_venc,
                empleados.medica_venc,
                empleados.ine_venc
                FROM
                empleados
                WHERE licencia_venc BETWEEN DATE_ADD(CURDATE(),INTERVAL -11 MONTH) AND DATE_ADD(CURDATE(),INTERVAL 1 MONTH)
                OR (medica_venc BETWEEN DATE_ADD(CURDATE(),INTERVAL -11 MONTH) AND DATE_ADD(CURDATE(),INTERVAL 1 MONTH))
                OR (ine_venc BETWEEN DATE_ADD(CURDATE(),INTERVAL -11 MONTH) AND DATE_ADD(CURDATE(),INTERVAL 1 MONTH))";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getProximosServicios()
    {
        $sql = "SELECT
            unidades.id,
            unidades.economico,
            unidades.propietario,
            unidades.tipo_vehiculo,
            unidades.modelo,
            unidades.anio,
            unidades.servicio_proximo
            FROM
            unidades
            WHERE servicio_proximo BETWEEN DATE_ADD(CURDATE(),INTERVAL -11 MONTH) AND DATE_ADD(CURDATE(),INTERVAL 1 MONTH)";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getFisicoMecanicaPorVencer()
    {
        $sql = "SELECT
            unidades.id,
            unidades.economico,
            unidades.propietario,
            unidades.tipo_vehiculo,
            unidades.modelo,
            unidades.anio,
            unidades.fisicomecanica_venc
            FROM
            unidades
            WHERE fisicomecanica_venc BETWEEN DATE_ADD(CURDATE(),INTERVAL -11 MONTH) AND DATE_ADD(CURDATE(),INTERVAL 1 MONTH)";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getVerificacionPorVencer()
    {
        $sql = "SELECT
            unidades.id,
            unidades.economico,
            unidades.propietario,
            unidades.tipo_vehiculo,
            unidades.modelo,
            unidades.anio,
            unidades.verificacion_proxima
            FROM
            unidades
            WHERE verificacion_proxima BETWEEN DATE_ADD(CURDATE(),INTERVAL -11 MONTH) AND DATE_ADD(CURDATE(),INTERVAL 1 MONTH)";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getPolizaPorVencer()
    {
        $sql = "SELECT
            unidades.id,
            unidades.economico,
            unidades.propietario,
            unidades.tipo_vehiculo,
            unidades.modelo,
            unidades.anio,
            unidades.poliza_venc
            FROM
            unidades
            WHERE poliza_venc BETWEEN DATE_ADD(CURDATE(),INTERVAL -11 MONTH) AND DATE_ADD(CURDATE(),INTERVAL 1 MONTH)";
        $query = $this->db->query($sql);
        return $query->result();
    }

}
