<?php
defined('BASEPATH') OR exit('No direct script access allowed');

date_default_timezone_set('america/mexico_city');

class Compras extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('ModeloProveedor');
        $this->load->model('ModeloProductos');
        $this->load->model('ModeloVentas');
    }
	public function index(){
		$this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('compras/compras');
        $this->load->view('templates/footer');
        $this->load->view('compras/jscompras');
	}
    public function searchpro(){
        $usu = $this->input->get('search');
        $results=$this->ModeloProveedor->proveedorallsearch($usu);
        echo json_encode($results->result());
    }
    
    
    public function addproducto(){
        $prov = $this->input->post('prov');
        $prod = $this->input->post('prod');
        $prec = $this->input->post('prec');
        //echo $prov.'--'.$prod.'--'.$prec;
        $dproveedor = $this->ModeloProveedor->getproveedor($prov);
        foreach ($dproveedor->result() as $item){
            $pesoi = $item->pesoi;
            $pesof = $item->pesof;
            $codigoi = $item->codigoi;
            $codigof = $item->codigof;
        }
        
        $pesoi =$pesoi-1;
        $pesof =$pesof;
        $codigoi =$codigoi-1;
        $codigof =$codigof;

        $peso = substr($prod, $pesoi, $pesof);
       
        $codigo = substr($prod, $codigoi, $codigof);

        //echo 'Peso:('.$pesoi.')('.$pesof.') '.$peso.'  Codigo:('.$codigoi.')('.$codigof.')'.$codigo.'    ----'.$prod ;

        if (is_float($peso)) {
            $peso=$peso;
        }else{
            $peso=$peso/100;
        }
        $personalv=$this->ModeloProductos->getproductocod($codigo);
        $existepro=0;
        foreach ($personalv->result() as $item){
              $id = $item->productoid;
              //$codigo = $item->codigo;
              $nombre = $item->nombre;
              $precio = $item->preciocompra;
              $existepro=1;
        }

        if ($existepro==1) {
            $array = array("id"=>$id,
                        "codigo"=>$codigo,
                        "cant"=>$peso,
                        "producto"=>$nombre,
                        "precio"=>$prec,
                        "existe"=>$existepro
                    );
        }else{
            $array = array("existe"=>$existepro);
        }

        
        
            echo json_encode($array);
        
    }

    function ingresarcomprapro()
    {
        $DATA = json_decode($datos);
        for ($i=0;$i<count($DATA);$i++) 
        { 
            $idEntrada = $DATA[$i]->idcompra;
            $producto = $DATA[$i]->producto;
            $cantidad = $DATA[$i]->cantidad;
            $precio = $DATA[$i]->precio;
            $this->ModeloVentas->ingresarcomprad($idcompra,$producto,$cantidad,$precio);
        }
    }

    // Obtener el listado de las entradas
    function getEntradas()
    {
        // Obtiene las entradas de la BD
        $entradas = $this->ModeloVentas->getEntradasDelDiaSinSumar();
        $json_data = array("data" => $entradas);
        echo json_encode($json_data);
    }

    // function ingresarcompra()
    // Función para ingresar una nueva entrada mediante codigo de Barras
    function ingresarEntrada()
    {
        // Obtener BARCODE del POST
        $barcode_entrada = $this->input->post('barcode_entrada');

        // Llama a la función para obtener los datos del codigo de Barras ingresado
        $datosProveedor = $this->extraeInfoBarcode($barcode_entrada);
        
        //var_dump($datosProveedor); die();
        if($datosProveedor["alertaProveedores"]==0 && $datosProveedor['errorProducto']==0)
        {
            // Los precios van en NULL 
            $precio_kilo = 'null';
            $precioTotal = 'null';
            $hoy = '"'.date("Y-m-d").'"';

             // Inserta la Entrada
            $idEntrada = $this->ModeloVentas->ingresarEntrada($datosProveedor['idProveedor'],$precioTotal,$hoy,$barcode_entrada);
            // Insertar los datos restantes
            $this->ModeloVentas->ingresarcomprad($idEntrada,$datosProveedor['idProducto'],$datosProveedor['pesoProducto'],$precio_kilo);
            echo $idEntrada;
        }
        else if($datosProveedor['errorProveedor']==1)
        {
            echo 'errorProveedor';
        } 
        else if($datosProveedor['errorProducto']==1)
        {
            echo 'errorProducto';
        }  

    }

    // Esta función sirve para crear una o varias entradas generales, en base a las partidas ya ingresadas 
    function creaEntradaGeneral()
    {
        // Obtenemos las partidas del día que no hayan sido gestionadas aún
        $entradasDelDia = $this->ModeloVentas->getIdEntradasDelDia();

        // Si hay partidas en el día continuamos con el proceso, de lo contrario devolveremos un mensaje de error
        if(count($entradasDelDia)!=0)
        {
            // Obtenemos los proveedores que se ingresaron hasta el momento y durante el día
            $proveedoresDelDia = $this->ModeloVentas->getComprasProveedoresPorDiaSinEntradaAlmacen();

            $entradasDelDia = $this->ModeloVentas->getIdEntradasDelDia();

            foreach($proveedoresDelDia as $proveedor)
            {   
                // Formamos el array para la Entrada General del Almacen
                $datosEntradaGeneral = array(
                    'idProveedor' => $proveedor->id_proveedor,
                    'fecha_registro' => date('Y-m-d')
                );
                // Guardamos y recuperamos el ID del registro insertado
                $idEntradaGeneral = $this->ModeloVentas->ingresarEntradaGeneralAlmacen($datosEntradaGeneral);

                foreach($entradasDelDia as $entradas)
                {
                    // Comparamos que el Id del proveedor sea igual al que está en el registro para saber que actualizar
                    if(($entradas->id_proveedor+0) == ($proveedor->id_proveedor+0))
                    {
                        // Ponemos el dato para actualizar la Entrada
                        $datosEntrada = array(
                            'id_entradas_generales' => $idEntradaGeneral
                        );
                        $this->ModeloVentas->actualizaEntradaDelDia($datosEntrada,$entradas->id_compra);
                    }  
                }
            }
            echo '1';
        }
        else echo '0';        
    }

    function getEntradasGeneralesSumadasAlmacen()
    {
        $entradasGenerales = $this->ModeloVentas->getListaEntradasGeneralesSinSumar();
        $json_data = array("data" => $entradasGenerales);
        echo json_encode($json_data);
    }   

    function creaPDFEntradaGeneralPorId($idEntradaGeneral)
    {
        $this->load->library('Pdf');
        $entradas = $this->ModeloVentas->getEntradasSinSumarAlmacenPorDia();
        $entradasGenerales = $this->ModeloVentas->getEntradaGeneralById($idEntradaGeneral);
       
        // Si hay entradas continuamos con el proceso, de lo contrario devolveremos un mensaje de error
        if(count($entradasGenerales)!=0)
        {

            date_default_timezone_set('America/Mexico_City');
            $this->load->library('Pdf');
            $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, TRUE, 'UTF-8', FALSE);

            // Set document information.
            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetAuthor('Carnico America');
            $pdf->SetTitle('Entrada de Almacen');

            // Set margins.
            $pdf->setPrintHeader(false);
            $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
            $pdf->SetMargins(15, 15, 15, true); // Left, top
            $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

            $totalCantidad = 0;
            foreach ($entradasGenerales as $general) 
            {     
                // Write data.
                $titulo = '<table >
                      <tr style="font-size: 11px;">
                        <td width="30%">
                            <img src="' . base_url() . 'public/img/ops.png" width="600%">
                        </td>
                        <td width="70%" align="center" style="color: #D40303;">
                          <strong>GRUPO CARNICO AMERICA S.A. DE C.V.</strong><br>
                          Excelencia en Alimentos<br>
                        </td>
                      </tr>
                      <tr>
                        <td width="30%">                   
                        </td>
                        <td width="70%" align="center" style="color: #003399;" style="font-size: 7px;">
                            R.F.C. GCA-9820601 - CS4 TELS. 01 (248) 484 51 85, 484 01 64, 484 83 10, 484 50 91<br>
                            LIBERTAD NORTE No. 519    Col. CENTRO    CP. 74000<br>
                            SAN MARTÍN TEXMELUCAN, PUE.
                        </td>
                      </tr>
                      <tr style="font-size: 13px;">
                        <td width="30%">
                            
                        </td>
                        <td width="70%" align="center" style="color: #D40303;">
                          <strong>ENTRADA DE ALMACEN No: ' . $general->id . '</strong><br>
                        </td>
                      </tr>
                    </table>';

                $html = '<br><br>
                        <table style="border: black 3px solid;" >
                        <tr style="font-size: 10px"> 
                            <td style="border: black 3px solid;" colspan="4">Fecha ' . date("Y-m-d") . '</td>
                            <td style="border: black 3px solid;" colspan="3">No Factura</td>
                        </tr>
                        <tr style="font-size: 10px">
                            <td style="border: black 3px solid;" colspan="4"><!--Proveedor ' . $general->razon_social . '--></td>
                            <td style="border: black 3px solid;" colspan="3">No Copia</td>
                        </tr>
                        <tr align="center" style="font-size: 10px">
                            <td style="border: black 3px solid;">Nombre del Producto </td>
                            <td style="border: black 3px solid;">Codigo del Producto</td>
                            <td style="border: black 3px solid;">Marca</td>
                            <td style="border: black 3px solid;">Kgs Proveedor</td>
                            <td style="border: black 3px solid;">Kgs Recibidos</td>
                            <td style="border: black 3px solid;">Diferencia</td>
                            <td style="border: black 3px solid;">Proveedor</td>
                        </tr>';

                foreach ($entradas as $entrada) 
                {
                    if($general->idProveedor==$entrada->id_proveedor && $entrada->id==$general->id)
                    {
                        $totalCantidad = $totalCantidad + $entrada->cantidad;
                        $html .='
                        <tr align="center" style="font-size: 8px;">
                                <td style="border: black 3px solid;">' . $entrada->nombre . ' </td>
                                <td style="border: black 3px solid;">' . $entrada->codigo . '</td>
                                <td style="border: black 3px solid;"> </td>
                                <td style="border: black 3px solid;">' . $entrada->cantidad . '</td>
                                <td style="border: black 3px solid;"> </td>
                                <td style="border: black 3px solid;"> </td>
                                <td style="border: black 3px solid;">' . $entrada->razon_social . '</td>
                            </tr>
                        ';
                    }         
                }
                 $html .= '</table>
                <br><br><br><br>
                <table style="border: black 3px solid;">
                      <tr style="font-size: 9px" align="center" >
                        <td width="30%">
                            Total de partidas: ' . count($entradas) . '
                        </td>
                        <td width="40%" align="center">
                          
                        </td>
                        <td width="30%">
                            Total en KGs: ' . $totalCantidad . '  
                        </td>
                      </tr>
                </table>';
                

                 $html .= '
                <br><br><br><br>
                <table >
                      <tr style="font-size: 9px" align="center" >
                        <td width="30%">
                            
                        </td>
                        <td width="40%" align="center">
                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Responsable del Almacen</strong><br><br>
                          <hr width="45%" align="center">
                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Firma<br>
                        </td>
                        <td width="30%">
                            
                        </td>
                      </tr>
                </table>';
                
                $pdf->AddPage();
                $pdf->resetColumns();
                $pdf->writeHTML($titulo, true, false, true, false, '');
                $pdf->writeHTML($html, true, false, true, false, '');
                $pdf->lastPage();
            }                        
            $pdf->Output('entrada.pdf', 'I');
        }   
    }

    function creaPDFEntradaGeneral()
    {
        $this->load->library('Pdf');

        $entradas = $this->ModeloVentas->getEntradasSinSumarAlmacenPorDia();

        $entradasGenerales = $this->ModeloVentas->getEntradaGeneralesDelDia();
       
        // Si hay entradas continuamos con el proceso, de lo contrario devolveremos un mensaje de error
        if(count($entradasGenerales)!=0)
        {

            date_default_timezone_set('America/Mexico_City');
            $this->load->library('Pdf');
            $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, TRUE, 'UTF-8', FALSE);

            // Set document information.
            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetAuthor('Carnico America');
            $pdf->SetTitle('Entrada de Almacen');

            // Set margins.
            $pdf->setPrintHeader(false);
            $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
            $pdf->SetMargins(15, 15, 15, true); // Left, top
            $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

            $totalCantidad = 0;
            foreach ($entradasGenerales as $general) 
            {     
                // Write data.
                $titulo = '<table >
                      <tr style="font-size: 11px;">
                        <td width="30%">
                            <img src="' . base_url() . 'public/img/ops.png" width="600%">
                        </td>
                        <td width="70%" align="center" style="color: #D40303;">
                          <strong>GRUPO CARNICO AMERICA S.A. DE C.V.</strong><br>
                          Excelencia en Alimentos<br>
                        </td>
                      </tr>
                      <tr>
                        <td width="30%">                   
                        </td>
                        <td width="70%" align="center" style="color: #003399;" style="font-size: 7px;">
                            R.F.C. GCA-9820601 - CS4 TELS. 01 (248) 484 51 85, 484 01 64, 484 83 10, 484 50 91<br>
                            LIBERTAD NORTE No. 519    Col. CENTRO    CP. 74000<br>
                            SAN MARTÍN TEXMELUCAN, PUE.
                        </td>
                      </tr>
                      <tr style="font-size: 13px;">
                        <td width="30%">
                            
                        </td>
                        <td width="70%" align="center" style="color: #D40303;">
                          <strong>ENTRADA DE ALMACEN No: ' . $general->id . '</strong><br>
                        </td>
                      </tr>
                    </table>';

                $html = '<br><br>
                        <table style="border: black 3px solid;" >
                        <tr style="font-size: 10px"> 
                            <td style="border: black 3px solid;" colspan="4">Fecha: ' . date("Y-m-d") . '</td>
                            <td style="border: black 3px solid;" colspan="3">No Factura: </td>
                        </tr>
                        <tr style="font-size: 10px">
                            <td style="border: black 3px solid;" colspan="4"><!--Proveedor ' . $general->razon_social . '--></td>
                            <td style="border: black 3px solid;" colspan="3">No Copia: </td>
                        </tr>
                        <tr align="center" style="font-size: 10px">
                            <td style="border: black 3px solid;">Nombre del Producto </td>
                            <td style="border: black 3px solid;">Codigo del Producto</td>
                            <td style="border: black 3px solid;">Marca</td>
                            <td style="border: black 3px solid;">Kgs Proveedor</td>
                            <td style="border: black 3px solid;">Kgs Recibidos</td>
                            <td style="border: black 3px solid;">Diferencia</td>
                            <td style="border: black 3px solid;">Proveedor</td>
                        </tr>';

                foreach ($entradas as $entrada) 
                {
                    if($general->idProveedor==$entrada->id_proveedor && $entrada->id==$general->id)
                    {
                        $totalCantidad = $totalCantidad + $entrada->cantidad;
                        $html .='
                        <tr align="center" style="font-size: 8px;">
                                <td style="border: black 3px solid;">' . $entrada->nombre . ' </td>
                                <td style="border: black 3px solid;">' . $entrada->codigo . '</td>
                                <td style="border: black 3px solid;"> </td>
                                <td style="border: black 3px solid;">' . $entrada->cantidad . '</td>
                                <td style="border: black 3px solid;"> </td>
                                <td style="border: black 3px solid;"> </td>
                                <td style="border: black 3px solid;">' . $entrada->razon_social . '</td>
                            </tr>
                        ';
                    }         
                }
               

                $html .= '</table>
                <br><br><br><br>
                <table style="border: black 3px solid;">
                      <tr style="font-size: 9px" align="center" >
                        <td width="30%">
                            Total de partidas: ' . count($entradas) . '
                        </td>
                        <td width="40%" align="center">
                          
                        </td>
                        <td width="30%">
                            Total en KGs: ' . $totalCantidad . '  
                        </td>
                      </tr>
                </table>';
                

                 $html .= '
                <br><br><br><br>
                <table >
                      <tr style="font-size: 9px" align="center" >
                        <td width="30%">
                            
                        </td>
                        <td width="40%" align="center">
                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Responsable del Almacen</strong><br><br>
                          <hr width="45%" align="center">
                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Firma<br>
                        </td>
                        <td width="30%">
                            
                        </td>
                      </tr>
                </table>';
                $pdf->AddPage();
                $pdf->resetColumns();
                $pdf->writeHTML($titulo, true, false, true, false, '');
                $pdf->writeHTML($html, true, false, true, false, '');
                $pdf->lastPage();
            }                        
            $pdf->Output('entrada.pdf', 'I');
        }    
    }
        
    // Función para extraer y obtener datos del codigo de barras
    function extraeInfoBarcode($barcode_entrada)
    {
        // Medimos la longitud del código de barras
        $longitud_barcode =  strlen($barcode_entrada);

        // Creamos un array para guardar los datos que obtengamos del código de barras
        $datosProveedor = array();

        // Buscamos el o los proveedores que correspondan a la longitud del códigio de barras
        $datos = $this->ModeloVentas->getDatosProveedorByLongitud($longitud_barcode);
        
        // Si solo viene una posible coincidencia, se hace la búsqueda

        /***********************************************************/
        /*** EL PROCESO SE HARÁ IGUAL PARA TODOS LOS PROVEEDORES ***/
        /***********************************************************/

        if(count($datos)==1)
        {
            // Guardamos el ID del Proveedor
            $datosProveedor['idProveedor'] = $datos[0]->id_proveedor;
            //var_dump($longitud_barcode); die();
            // Veremos a cual de los valores guardados en la base de datos 
            // corresponde la longitud del codigo de barras que se está ingresando.
            // Dependiendo de cual sea, serán los valores a tomar para obtener el 
            // codigo del producto y el peso
            if($longitud_barcode == ($datos[0]->longitud_codigo1 + 0))
            {
                $posicionInicialCodigoProducto = $datos[0]->codigoi;
                $longitudCodigoProducto = $datos[0]->codigof;
                $posicionInicialPeso = $datos[0]->pesoi;
                $longitudPeso = $datos[0]->pesof;
            }
            else if($longitud_barcode == ($datos[0]->longitud_codigo2 + 0))
            {
                $posicionInicialCodigoProducto = $datos[0]->codigoi_2;
                $longitudCodigoProducto = $datos[0]->codigof_2;
                $posicionInicialPeso = $datos[0]->pesoi_2;
                $longitudPeso = $datos[0]->pesof_2;
            } 
            else if($longitud_barcode == ($datos[0]->longitud_codigo3 + 0))
            {
                $posicionInicialCodigoProducto = $datos[0]->codigoi_3;
                $longitudCodigoProducto = $datos[0]->codigof_3;
                $posicionInicialPeso = $datos[0]->pesoi_3;
                $longitudPeso = $datos[0]->pesof_3;
            }    
            
            // Obtenemos la parte del código de Producto que viene en el codigo de barras
            $codigoProducto = substr($barcode_entrada,($posicionInicialCodigoProducto - 1),$longitudCodigoProducto- 1);

            
            // Con este codigo vamos a buscar a la BD los datos del Producto para obtener su ID y lo guardamos en el arreglo
            $datosProducto = $this->ModeloVentas->getDatosProducto($codigoProducto,$datosProveedor['idProveedor']);

            if($datosProducto==null)
            {
                $datosProveedor['errorProducto'] = 1;
                $datosProveedor["alertaProveedores"] = 0;
            }    
            else
            {
                $datosProveedor['idProducto'] = $datosProducto->productoid;

                // Obtenemos la parte del peso del Producto que viene en el codigo de barras y la guardamos en el arreglo
                $pesoProducto = substr($barcode_entrada,($posicionInicialPeso - 1),$longitudPeso); 
                $pesoProductoKilos = substr($pesoProducto,0,2); 
                $pesoProductoGramos = substr($pesoProducto,2,2); 
                $datosProveedor['pesoProducto'] = $pesoProductoKilos.".".$pesoProductoGramos;
                $datosProveedor['alertaProveedores'] = 0;
                $datosProveedor['errorProducto'] = 0;
            }
        }   
        else
        {
            $contadorProductos = 0;

            $datos = $this->ModeloVentas->getDatosProveedorByLongitud($longitud_barcode);

            foreach($datos as $proveedor)
            {
                $datosProveedor['idProveedor'] = $proveedor->id_proveedor;
                
                // Veremos a cual de los valores guardados en la base de datos 
                // corresponde la longitud del codigo de barras que se está ingresando.
                // Dependiendo de cual sea, serán los valores a tomar para obtener el 
                // codigo del producto y el peso
                if($longitud_barcode == ($proveedor->longitud_codigo1 + 0))
                {
                    $posicionInicialCodigoProducto = $proveedor->codigoi;
                    $longitudCodigoProducto = ($proveedor->codigof - $proveedor->codigoi) + 1;
                    $posicionInicialPeso = $proveedor->pesoi;
                    $longitudPeso = $proveedor->pesof;
                }
                else if($longitud_barcode == ($proveedor->longitud_codigo2 + 0))
                {
                    $posicionInicialCodigoProducto = $proveedor->codigoi_2;
                    $longitudCodigoProducto = $proveedor->codigof_2;
                    $posicionInicialPeso = $proveedor->pesoi_2;
                    $longitudPeso = $proveedor->pesof_2;
                } 
                else if($longitud_barcode == ($proveedor->longitud_codigo3 + 0))
                {
                    $posicionInicialCodigoProducto = $proveedor->codigoi_3;
                    $longitudCodigoProducto = $proveedor->codigof_3;
                    $posicionInicialPeso = $proveedor->pesoi_3;
                    $longitudPeso = $proveedor->pesof_3;
                } 

                // Obtenemos la parte del código de Producto que viene en el codigo de barras
                $codigoProducto = substr($barcode_entrada,($posicionInicialCodigoProducto - 1),$longitudCodigoProducto);
                
                // Con este codigo vamos a buscar a la BD los datos del Producto para obtener su ID y lo guardamos en el arreglo
                $datosProducto = $this->ModeloVentas->getDatosProducto($codigoProducto,$datosProveedor['idProveedor']);

                
                if($datosProducto!=null)
                {
                    $contadorProductos = $contadorProductos + 1;
                    $datosProveedor['idProducto'] = $datosProducto->productoid;

                    // Obtenemos la parte del peso del Producto que viene en el codigo de barras y la guardamos en el arreglo
                    $pesoProducto = substr($barcode_entrada,($posicionInicialPeso - 1),$longitudPeso); 
                    $pesoProductoKilos = substr($pesoProducto,0,2); 
                    $pesoProductoGramos = substr($pesoProducto,2,2); 
                    $datosProveedor['pesoProducto'] = $pesoProductoKilos.".".$pesoProductoGramos;
                    $datosProveedor['errorProducto'] = 0;
                } 
                else
                {
                    $datosProveedor['errorProducto'] = 1;
                }   

            }
            

            //echo $proveedor->codigof."<br>";
            
            if($contadorProductos==1)
            {
                $datosProveedor['alertaProveedores'] = 0;
            }
            else
            {
                $datosProveedor['alertaProveedores'] = 1;   
            }
        }
        
        // Regresamos el array
        return $datosProveedor;
    }

}