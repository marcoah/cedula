<?php
    $rif='J075752937';
    $url="http://contribuyente.seniat.gob.ve/BuscaRif/BuscaRif.jsp?p_rif=$rif";
    $ch = curl_init();
    curl_setopt ($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // almacene en una variable
    curl_setopt($ch, CURLOPT_HEADER, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    $xxx1 = curl_exec($ch);
    curl_close($ch);
    // Separamos el resultado en un arreglo y dividirlo por \n\r\n
    $xxx = explode("\n\r\n", $xxx1);
    // Con este comando podemos ver toda la pantalla de seniat impresa por reglones de arreglos
    //print_r($xxx);
    // Impreme el rif y la razon social
    print_r($xxx[6]);
