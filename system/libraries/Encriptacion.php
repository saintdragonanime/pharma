<?php if ( ! defined('BASEPATH')) exit('No se permite el acceso directo al script');

class CI_Encriptacion 
{
    public function my_encrypt($data, $key) 
    {
        // Generamos una cadena de bytes pseudo-aleatoria en base al método de cifrado
        // en este caso: blowfish
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('blowfish'));
        // Ciframos los datos usando blowfish
        $cifrado = openssl_encrypt($data, 'blowfish', $key, 0, $iv);
        // Añadimos el $iv y retornamos en base64
        // el $iv es necesario para poder decodificar los datos por eso lo unimos a 
        // los datos mediante un separador único (|||)
        return base64_encode($cifrado . '|||' . $iv);
    }

    /**
     * Función para desencriptar
     */
    public function my_decrypt($data, $key) 
    {
        // Decodificamos los datos y dividimos por el separador único (|||)
        $dataIv = explode('|||', base64_decode($data), 2);
        // comprobamos que tenemos 2 valores
        if(count($dataIv) != 2) {
            return false;
        }
        // Asignamos los datos, para una mejor lectura del código
        $data = $dataIv[0];
        $iv =  $dataIv[1];
        // Validamos longitud correcta del IV
        if(strlen($iv) != openssl_cipher_iv_length('blowfish')) {
            return false;
        }
        // desciframos los datos y retornamos
        return openssl_decrypt($data, 'blowfish', $key, 0, $iv);
    }
}

?>