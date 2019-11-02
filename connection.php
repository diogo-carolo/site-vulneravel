<?php
    # Substitua abaixo os dados, de acordo com o banco criado
    
    $user = "root"; 
    $password = ""; 
    $database = "site-vulneravel"; 
    
    # O hostname deve ser sempre localhost 
    $hostname = "localhost"; 
    
    # Conecta com o servidor de banco de dados 
    $con = mysql_connect( $hostname, $user, $password ) or die( ' Erro na conexão ' );
    $db = mysql_select_db( $database ) or die( 'Erro na seleção do banco' );
    mysql_set_charset('utf8');


?>