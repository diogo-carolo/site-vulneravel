<?php 
    session_start();
    include("connection.php");
    include("utils.controller.php");
    if(isset($_POST['submit'])){
        criarUsuario($_POST);
    }

    function criarUsuario($dados){
        // $result = mysql_query("INSERT INTO usuarios (nome,email,cpf,password) VALUES ('".$dados['nome']."','".$dados['email']."','".$dados['cpf']."','". md5($dados['senha'])."')");


        // if (!$result) {
        //     echo 'Could not run query: ' . mysql_error();
        //     exit;
        // }

        $query =  $GLOBALS['db']->prepare("INSERT INTO usuarios (nome,email,cpf,password) VALUES (:nome,:email,:cpf, md5(:senha))");
		$query->bindValue(':nome',$dados['nome']);
		$query->bindValue(':email',$dados['email']);
		$query->bindValue(':cpf',$dados['cpf']);
		$query->bindValue(':senha',$dados['senha']);
		$query->execute();

        header('Location: registro.php?criado=true');
    }
?>