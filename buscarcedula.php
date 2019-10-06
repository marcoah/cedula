<?php
/* Revision de cedula
*
*
*
*/

class SearchCurl {

    public static function SearchCNE($nac, $ci) {
        $url = "http://www.cne.gov.ve/web/registro_electoral/ce.php?nacionalidad=$nac&cedula=$ci";
        $resource = self::geUrl($url);
        $text = strip_tags($resource);

        $rempl = array('Cédula:', 'Nombre:', 'Estado:', 'Municipio:', 'Parroquia:', 'Centro:', 'Dirección:', 'SERVICIO ELECTORAL', 'Mesa:');
        $r = trim(str_replace($rempl, '|', self::limpiarCampo($text)));
        $resource = explode("|", $r);
        $datos = explode(" ", self::limpiarCampo($resource[2]));

        $jsondata = array();
        $jsondata["success"] = true;
        $jsondata["data"]["usuario"] = array();
        $jsondata["data"]["usuario"]["nacionalidad"] = $nac;
        $jsondata["data"]["usuario"]["cedula"] = $ci;
        $jsondata["data"]["usuario"]["nombres"] = $datos[0];
        $jsondata["data"]["usuario"]["apellidos"] = $datos[2];

        header('Content-type: application/json; charset=utf-8');
        echo json_encode($jsondata, JSON_FORCE_OBJECT);

        /*
         * $datoJson = array('success' => true, 'nacionalidad' => $nac, 'cedula' => $ci, 'nombres' => $datos[0], 'apellidos' => $datos[2]);
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($datoJson, JSON_FORCE_OBJECT);
        */
    }

    public static function geUrl($url) {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); // almacene en una variable
        curl_setopt($curl, CURLOPT_HEADER, FALSE);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        if (curl_exec($curl) === false) {
            echo 'Curl error: ' . curl_error($curl);
        } else {
            $return = curl_exec($curl);
        }
        curl_close($curl);

        return $return;
    }

    public static function limpiarCampo($valor) {
        $rempl = array('\n', '\t');
        $r = trim(str_replace($rempl, ' ', $valor));
        return str_replace("\r", "", str_replace("\n", "", str_replace("\t", "", $r)));
    }

}

if( isset($_GET['nacionalidad'],$_GET['cedula']) ) {

    $nacionalidad = $_GET['nacionalidad'];
    $cedula = htmlspecialchars($_GET['cedula']);

    $curls = new SearchCurl();
    $curls->SearchCNE($nacionalidad, $cedula);

} else {
    die("Solicitud no válida.");
}