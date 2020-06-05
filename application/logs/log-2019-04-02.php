<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-04-02 21:01:10 --> 404 Page Not Found: App-assets/img
ERROR - 2019-04-02 13:27:54 --> Query error: Expression #4 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'sicoinet_fratsa.cc.telefono1' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT
        c.id,
        c.razon_social,
        c.rfc,
        cc.telefono1,
        cli.razon_social as 'razon_social_cliente',
        c.condicion_pago, 
        c.estatus
        FROM clientes as c 
        LEFT JOIN contactos_clientes as cc ON cc.cliente_id=c.id
        LEFT JOIN clientes as cli ON c.cliente_id=cli.id
        WHERE c.tipo=2
        GROUP BY c.id
