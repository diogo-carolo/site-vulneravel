<?php
  
  header("Content-type: text/html; charset=utf-8");
  session_start();
  include("connection.php");
  include("utils.controller.php");

  $id = $_GET['id'];

  $noticias = getNoticia($id);
  $comentarios = getComentarios($id);


  if(isset($_POST["comentario"])){
      criarComentario($_POST["comentario"],$_POST["id_usuario"],$id);
  }




  function getNoticia($id){

    $result = mysql_query("SELECT titulo,imagem,texto,id FROM noticias WHERE id=".$id);

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

  function getComentarios($id){
    $result = mysql_query("SELECT u.nome,u.email,c.comentario,c.id_noticia FROM usuarios u INNER JOIN comentarios c on c.id_usuario = u.id WHERE c.id_noticia=".$id);

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

  function criarComentario($comentario,$usuario,$noticia){
    $result = mysql_query("INSERT INTO comentarios (id_usuario,id_noticia,comentario) VALUES (".$usuario.",".$noticia.",'".$comentario."')");

    if (!$result) {
        echo 'Could not run query: ' . mysql_error();
        exit;
    }

    header('Location: noticia.php?id='.$noticia);

  }
?>