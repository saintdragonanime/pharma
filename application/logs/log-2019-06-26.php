<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-06-26 19:40:35 --> Severity: Parsing Error --> syntax error, unexpected '}' C:\xampp\htdocs\fratsa\application\controllers\Revision_viajes_terminados.php 75
ERROR - 2019-06-26 19:52:03 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 15 - Invalid query: SELECT
                tr.*,
                ta.estado_origen,ta.origen,ta.estado_destino,
                ta.destino,ta.tipo_unidad,ta.tipo_tarifa,
                ta.diesel_sencillo,ta.tarifa_sencillo,ta.rango_consumo_a_sencillo,
                ta.rango_consumo_b_sencillo,ta.tarifa_cxt_sencillo,ta.tarifa_viaje_sencillo,
                ta.kms_sencillo,ta.diesel_full,ta.tarifa_full,
                ta.rango_consumo_a_full,ta.rango_consumo_b_full,ta.tarifa_cxt_full,
                ta.tarifa_viaje_full,ta.kms_full,ta.comentarios,
                ta.subcliente_id,ta.cliente_id
                FROM
                tramos AS tr
                INNER JOIN tarifas AS ta ON tr.tarifa_id = ta.id
                WHERE
                tr.viaje_id = 
ERROR - 2019-06-26 19:52:26 --> Severity: Parsing Error --> syntax error, unexpected '$tramos' (T_VARIABLE) C:\xampp\htdocs\fratsa\application\controllers\Revision_viajes_terminados.php 72
ERROR - 2019-06-26 19:53:47 --> 404 Page Not Found: App-assets/vendors
ERROR - 2019-06-26 19:53:47 --> 404 Page Not Found: App-assets/css
ERROR - 2019-06-26 19:54:46 --> 404 Page Not Found: App-assets/vendors
ERROR - 2019-06-26 19:54:46 --> 404 Page Not Found: App-assets/css
ERROR - 2019-06-26 19:54:49 --> 404 Page Not Found: App-assets/vendors
ERROR - 2019-06-26 19:54:49 --> 404 Page Not Found: App-assets/css
ERROR - 2019-06-26 20:13:25 --> 404 Page Not Found: App-assets/vendors
ERROR - 2019-06-26 20:13:25 --> 404 Page Not Found: App-assets/css
ERROR - 2019-06-26 20:14:29 --> 404 Page Not Found: App-assets/vendors
ERROR - 2019-06-26 20:14:29 --> 404 Page Not Found: App-assets/css
ERROR - 2019-06-26 20:26:19 --> 404 Page Not Found: App-assets/vendors
ERROR - 2019-06-26 20:26:19 --> 404 Page Not Found: App-assets/css
ERROR - 2019-06-26 20:28:59 --> 404 Page Not Found: App-assets/vendors
ERROR - 2019-06-26 20:28:59 --> 404 Page Not Found: App-assets/css
ERROR - 2019-06-26 23:27:48 --> 404 Page Not Found: App-assets/img
ERROR - 2019-06-26 20:12:52 --> Severity: Error --> Call to undefined method Viajes_model::gettarifacaseta() C:\xampp\htdocs\fratsa\application\controllers\Viajesfinalizados.php 28
ERROR - 2019-06-26 20:14:08 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'GROUP BY c.id' at line 6 - Invalid query: SELECT c.* 
                FROM viajes as v  
                LEFT JOIN tramos as ts ON ts.viaje_id = v.id 
                LEFT JOIN tarifas as t ON t.id =ts.tarifa_id 
                left JOIN casetas_tarifa AS c ON c.tarifa_id = t.id 
                WHERE v.id = 8 and  GROUP BY c.id
ERROR - 2019-06-26 20:15:19 --> Severity: Notice --> Undefined variable: viaje C:\xampp\htdocs\fratsa\application\controllers\Viajesfinalizados.php 31
ERROR - 2019-06-26 20:15:19 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\fratsa\application\controllers\Viajesfinalizados.php 31
ERROR - 2019-06-26 20:15:19 --> Severity: Notice --> Undefined property: stdClass::$tipo_tarifa C:\xampp\htdocs\fratsa\application\controllers\Viajesfinalizados.php 40
ERROR - 2019-06-26 20:15:19 --> Severity: Notice --> Undefined variable: casetas C:\xampp\htdocs\fratsa\application\views\operaciones\viajesFinalizados\registrarDesglose.php 184
ERROR - 2019-06-26 20:15:22 --> Severity: Notice --> Undefined variable: viaje C:\xampp\htdocs\fratsa\application\controllers\Viajesfinalizados.php 31
ERROR - 2019-06-26 20:15:22 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\fratsa\application\controllers\Viajesfinalizados.php 31
ERROR - 2019-06-26 20:15:22 --> Severity: Notice --> Undefined property: stdClass::$tipo_tarifa C:\xampp\htdocs\fratsa\application\controllers\Viajesfinalizados.php 40
ERROR - 2019-06-26 20:15:22 --> Severity: Notice --> Undefined variable: casetas C:\xampp\htdocs\fratsa\application\views\operaciones\viajesFinalizados\registrarDesglose.php 184
