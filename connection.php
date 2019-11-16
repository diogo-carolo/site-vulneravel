<?php

    //FORMA ANTIGA

    // $user = "root"; 
    // $password = "poi123"; 
    // $database = "site_vulneravel"; 
    // $hostname = "localhost"; 
    
    // $con = mysql_connect( $hostname, $user, $password ) or die( ' Erro na conexão ' );
    // $db = mysql_select_db( $database ) or die( 'Erro na seleção do banco' );
    // mysql_set_charset('utf8');



    //NOVA FORMA COM PDO

    $db = new PDO("mysql:dbname=site_vulneravel;host=localhost;charset=utf8;","root","poi123");
    $db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $GLOBALS['db'] = $db;
   
?>
