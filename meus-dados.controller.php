<?php
    session_start();
    include("connection.php");
    include("utils.controller.php");

    if(!isset($_SESSION['user']) &&  !isset($_SESSION['admin']) ){
        header('Location: 404.php');
    }

    if(isset($_GET['id']) && isset($_SESSION['user']) ){
        $usuario = getMeusDados($_SESSION["user"]->id);
    }

    if(isset($_GET['id']) && isset($_SESSION['admin']) ){
        $usuario = getMeusDadosAdmin($_SESSION["admin"]->id);
    }


    function getMeusDados($id){
        $result = mysql_query("SELECT * FROM usuarios WHERE id = ".$id." limit 1");

        if (!$result) {
            echo 'Could not run query: ' . mysql_error();
            exit;
        }

        $usuario = null;
        
        while ($row = mysql_fetch_object($result)) {
            $usuario = $row;
        }
        return $usuario;
    }


    function getMeusDadosAdmin($id){
        $result = mysql_query("SELECT * FROM admin WHERE id = ".$id." limit 1");

        if (!$result) {
            echo 'Could not run query: ' . mysql_error();
            exit;
        }

        $usuario = null;
        
        while ($row = mysql_fetch_object($result)) {
            $usuario = $row;
        }
        return $usuario;
    }
?>