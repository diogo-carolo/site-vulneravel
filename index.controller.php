<?php

  session_start();
  include("connection.php");
  include("utils.controller.php");

  if(isset($_GET) && isset($_GET['busca']) ){
    // $noticias = busca($_GET['busca']);
    $noticias = busca(strip_tags($_GET['busca']));
    return;
  }

  $noticias = getNoticias();




  function getNoticias(){

    $query =  $GLOBALS['db']->prepare("SELECT titulo,imagem,id FROM noticias");
    $query->execute(); 
    $dados = [];
    
    while ($row = $query->fetchObject()) {
        array_push($dados,$row);
    }
    return $dados;

  }

  function busca($busca){
    $query =  $GLOBALS['db']->prepare("SELECT titulo,imagem,id FROM noticias WHERE titulo like :busca ");
    $query->bindValue(':busca','%'.$busca.'%');
    $query->execute(); 
    $dados = [];
    
    while ($row = $query->fetchObject()) {
        array_push($dados,$row);
    }
    return $dados;
  }
?>