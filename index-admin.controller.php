<?php
  session_start();
  include("connection.php");
  include("utils.controller.php");


	if(!isset($_SESSION['admin'])){
		header('Location: 404.php');
	}


	if(isset($_GET['delete'])){
		deletarNoticia($_GET['delete']);
	}

	if(isset($_POST['submit'])){
		console_log($_FILES);
		criarImagem($_POST,$_FILES);
	}

  $noticias = getNoticias();


	function deletarNoticia($id){

		$query =  $GLOBALS['db']->prepare("DELETE FROM noticias WHERE id = :id");
		$query->bindValue(':id',$id);
		$query->execute(); 

		getNoticias();
		header('Location: index-admin.php');
	}

	function getNoticias(){

		$query =  $GLOBALS['db']->prepare("SELECT* FROM noticias");
		$query->execute(); 
		$dados = [];
		
		while ($row = $query->fetchObject()) {
			array_push($dados,$row);
		}
		return $dados;
	}
	
	function criarImagem($dados,$files){
		$target_dir = "img/";
		$target_file = $target_dir . basename($files["imagem"]["name"]);
		$uploadOk = 1;
		if(isset($_POST["submit"])) {
			echo "File is an image - " . $check["mime"] . ".";
			if (move_uploaded_file($files["imagem"]["tmp_name"], $target_file)) {
				echo "The file ". basename( $files["imagem"]["name"]). " has been uploaded.";
				$dados['imagem'] = $files['imagem']['name'];
				criarNoticia($dados);	
				$uploadOk = 1;
			} else {
					echo "Sorry, there was an error uploading your file.";
					$uploadOk = 0;
			}
			
		}
	}
	function criarNoticia($dados){

		$query =  $GLOBALS['db']->prepare("INSERT INTO noticias (titulo,texto,imagem) VALUES (:titulo,:texto,:imagem)");
		$query->bindValue(':titulo',$dados['titulo']);
		$query->bindValue(':texto',$dados['texto']);
		$query->bindValue(':imagem',$dados['imagem']);
		$query->execute(); 

		header('Location: index-admin.php?criado=true');
	}
?>