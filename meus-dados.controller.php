<?php
    session_start();
    include("connection.php");
    include("utils.controller.php");

    if(!isset($_SESSION['user']) &&  !isset($_SESSION['admin']) ){
        header('Location: 404.php');
    }

    if(isset($_GET['id']) && isset($_SESSION['user']) ){
        $usuario = getMeusDados($_GET['id']);
    }

    if(isset($_GET['id']) && isset($_SESSION['admin']) ){
        $usuario = getMeusDadosAdmin($_GET['id']);
    }


    function getMeusDados($id){

        $query =  $GLOBALS['db']->prepare("SELECT * FROM usuarios WHERE id = :id limit 1");
        $query->bindValue(':id',$id);
        $query->execute(); 
        $usuario = null;
        
        while ($row = $query->fetchObject()) {
            $usuario = $row;
        }
        return $usuario;
    }


    function getMeusDadosAdmin($id){

        $query =  $GLOBALS['db']->prepare("SELECT * FROM admin WHERE id = :id limit 1");
        $query->bindValue(':id',$id);
        $query->execute(); 
        $usuario = null;
        
        while ($row = $query->fetchObject()) {
            $usuario = $row;
        }
        return $usuario;
    }
?>