<?php
  session_start();
  include("connection.php");
  include("utils.controller.php");

  if(isset($_GET) && isset($_GET['busca']) ){
    $noticias = busca($_GET['busca']);
    return;
  }

  $noticias = getNoticias();




  function getNoticias(){

    $result = mysql_query("SELECT titulo,imagem,id FROM noticias");

    if (!$result) {
        echo 'Could not run query: ' . mysql_error();
        exit;
    }

    $dados = [];
    
    while ($row = mysql_fetch_object($result)) {
        array_push($dados,$row);
    }

    return $dados;
  }

  function busca($busca){
    $result = mysql_query("SELECT titulo,imagem,id FROM noticias WHERE titulo like '%" . $busca ."%'");

    if (!$result) {
        echo 'Could not run query: ' . mysql_error();
        exit;
    }

    $dados = [];
    
    while ($row = mysql_fetch_object($result)) {
        array_push($dados,$row);
    }

    return $dados;
  }
?>