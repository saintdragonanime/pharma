<?php

class Clientes_model extends CI_Model {

    public function __construct() {
        // Call the CI_Model constructor
        parent::__construct();
    }

    public function getCliente( $id) {
        $sql = "SELECT * FROM clientes WHERE id=".$id;
        $query = $this->db->query($sql);
        return $query->row();
    }

    public function insertCliente($data) {
        $this->db->insert('clientes', $data);
        return $this->db->insert_id();
    }

    public function updatePermisos($data, $id) {
        $this->db->set($data);
        $this->db->where('empleados_id', $id);
        return $this->db->update('permisos');
    }
    
    public function insertContactoCliente($data) {
        $this->db->insert('contactos_clientes', $data);
        return $this->db->insert_id();
    }

    // Obtiene las unidades dedicadas de un cliente

    function getUnidadesDedicadas($idCliente)
    {
        $strq = "SELECT
                ud.id,
                CONCAT(u.economico,' ',v.nombre ) as 'unidad',
                ud.costo_dia1,
                ud.costo_dia2,
                ud.cliente_id
                FROM unidades_dedicadas as ud
                left JOIN unidades as u 
                ON ud.unidad=u.id
                left join vehiculos as v on v.id = u.tipo_vehiculo
                WHERE cliente_id=".$idCliente;
        $query = $this->db->query($strq);
        return $query->result();
    }

    /// Sin usu
    function getUnidadesDedicada($idCliente)
    {
        $strq = "SELECT
                ud.id,
                u.economico as 'unidad',
                ud.costo_dia1,
                ud.costo_dia2,
                ud.cliente_id
                FROM unidades_dedicadas as ud
                INNER JOIN unidades as u 
                ON ud.unidad=u.id
                WHERE cliente_id=".$idCliente;
        $query = $this->db->query($strq);
        return $query->result();
    }

    function getUnidadesDedicadas_viaje($idCliente)
    {
        $strq = "SELECT
                ud.id,
                u.economico as 'unidad',
                ud.costo_dia1,
                ud.costo_dia2,
                ud.cliente_id
                FROM unidades_dedicadas as ud
                INNER JOIN unidades as u 
                ON ud.unidad=u.id
                WHERE cliente_id=".$idCliente;
        $query = $this->db->query($strq);
        return $query;
    }

    /*
    function getUnidadesDedicadas($idCliente)
    {
        $strq = "SELECT
                ud.id,
                ud.costo_dia1,
                ud.costo_dia2,
                ud.cliente_id,
                u.tipo_vehiculo as unidad

                FROM unidades_dedicadas as ud
                LEFT JOIN unidades as u 
                ON ud.unidad=u.id
                WHERE cliente_id=".$idCliente;
        $query = $this->db->query($strq);
        return $query->result();
    }
    */
    // Obtiene las unidades dedicadas de un cliente
    function getComplementosPago($idCliente)
    {
        $strq = "SELECT * FROM complementos_pago WHERE cliente_id=".$idCliente;
        $query = $this->db->query($strq);
        return $query->result();
    }

    public function insertUnidad($data) {
        $this->db->insert('unidades_dedicadas', $data);
        return $this->db->insert_id();
    }

    public function insertComplementoPago($data) {
        $this->db->insert('complementos_pago', $data);
        return $this->db->insert_id();
    }

    public function getListadoClientes()
    {
        $sql = "SELECT
        c.id,
        c.razon_social,
        c.rfc,
                (select cc.telefono1 from contactos_clientes as cc where cc.cliente_id=c.id  order by cc.id DESC limit 1 ) as telefono1,
        c.condicion_pago, 
        c.estatus
        FROM clientes as c 
        WHERE c.tipo=1";
        $query = $this->db->query($sql);      
        return $query->result();
    }

    public function getContactosCliente($id)
    {
        $sql = "SELECT * FROM contactos_clientes WHERE cliente_id=".$id;
        $query = $this->db->query($sql);
        return $query->result();
    } 
    
    // Actualiza el registro de un cliente
    public function actualizaCliente($data, $id) 
    {
        $this->db->set($data);
        $this->db->where('id', $id);
        return $this->db->update('clientes');
    }

    public function getUnidades()
    {
        $sql = "SELECT * FROM unidades";
        $query = $this->db->query($sql);
        return $query->result();
    } 

    public function getUnidadeselect()
    {
        $sql = "SELECT uni.economico, v.nombre FROM unidades as uni 
                left join vehiculos as v on v.id = uni.tipo_vehiculo";
        $query = $this->db->query($sql);
        return $query->result();
    }

    // Actualiza el registro de un cliente
    public function actualizaContactoCliente($data, $id) 
    {
        $llave = key($data);
        $sql = "UPDATE contactos_clientes SET ".$llave." = '".$data[$llave]."' WHERE id=".$id;
        $query = $this->db->query($sql);
        return $query;
    }
/*
    public function deleteContactos($id) 
    {
        $this->db->where('id', $id);
        return $this->db->delete('contactos_clientes');
    }
*/
    public function getUnidades_Dedicadas()
    {
        $sql = "SELECT * FROM unidades_dedicadas";
        $query = $this->db->query($sql);
        return $query->result();
    } 

    public function edicion_contacto_cliente($id) {
    $sql = "SELECT * FROM contactos_clientes WHERE id=$id";
    $query = $this->db->query($sql);
    return $query->row(); 
    }

    public function update_contacto_cliente($data, $id) {
    $this->db->set($data);
    $this->db->where('id', $id);
    return $this->db->update('contactos_clientes');
    }

     function eliminarContactoCliente($id) {
        $result="DELETE FROM contactos_clientes WHERE id=$id";
        $datos = $this->db->query($result);
        return $datos;
    }

    function eliminarComplementoPago($id) {
        $result="DELETE FROM complementos_pago WHERE id=$id";
        $datos = $this->db->query($result);
        return $datos;
    }

    function eliminarUnidades_dedicadas($id) {
        $result="DELETE FROM unidades_dedicadas WHERE id=$id";
        $datos = $this->db->query($result);
        return $datos;
    }

    public function getClientePorRazon($razon_social)
    {
        $sql = "SELECT * FROM clientes WHERE razon_social='".$razon_social."'";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getClientePorRFC($rfc)
    {
        $sql = "SELECT * FROM clientes WHERE rfc='".$rfc."'";
        $query = $this->db->query($sql);
        return $query->result();
    }
}
