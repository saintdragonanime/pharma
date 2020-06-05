<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-03-30 00:42:25 --> 404 Page Not Found: App-assets/img
ERROR - 2019-03-30 00:53:02 --> Query error: Unknown column 'f.estatus' in 'where clause' - Invalid query: SELECT f.*,c.razon_social FROM facturas as f
                left join clientes as c on c.id=f.id_cliente
                WHERE f.estatus =1;
ERROR - 2019-03-30 00:53:15 --> Query error: Unknown column 'f.estatus' in 'where clause' - Invalid query: SELECT f.*,c.razon_social FROM facturas as f
                left join clientes as c on c.id=f.id_cliente
                WHERE f.estatus =1;
ERROR - 2019-03-30 00:53:25 --> Query error: Unknown column 'f.estatus' in 'where clause' - Invalid query: SELECT f.*,c.razon_social FROM facturas as f
                left join clientes as c on c.id=f.id_cliente
                WHERE f.estatus =1;
ERROR - 2019-03-30 00:59:01 --> Query error: Expression #4 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'sicoinet_fratsa.cc.telefono1' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT
        c.id,
        c.razon_social,
        c.rfc,
        cc.telefono1,
        c.condicion_pago, 
        c.estatus
        FROM clientes as c 
        LEFT JOIN contactos_clientes as cc ON cc.cliente_id=c.id
        WHERE c.tipo=1
        GROUP BY c.id
ERROR - 2019-03-30 00:59:04 --> 404 Page Not Found: App-assets/vendors
ERROR - 2019-03-30 00:59:04 --> 404 Page Not Found: App-assets/css
ERROR - 2019-03-30 00:59:09 --> Query error: Expression #4 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'sicoinet_fratsa.cc.telefono1' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT
        c.id,
        c.razon_social,
        c.rfc,
        cc.telefono1,
        c.condicion_pago, 
        c.estatus
        FROM clientes as c 
        LEFT JOIN contactos_clientes as cc ON cc.cliente_id=c.id
        WHERE c.tipo=1
        GROUP BY c.id
