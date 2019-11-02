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
		$result = mysql_query("DELETE FROM noticias WHERE id = " . $id);

		if (!$result) {
			echo 'Could not run query: ' . mysql_error();
			exit;
		}

		getNoticias();
		header('Location: index-admin.php');
	}

  function getNoticias(){

    $result = mysql_query("SELECT * FROM noticias");

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
	
	function criarImagem($dados,$files){
		$target_dir = "img/";
		$target_file = $target_dir . basename($files["imagem"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
				$check = getimagesize($files["imagem"]["tmp_name"]);
				// if($check !== false) {
						echo "File is an image - " . $check["mime"] . ".";
						if (move_uploaded_file($files["imagem"]["tmp_name"], $target_file)) {
							echo "The file ". basename( $files["imagem"]["name"]). " has been uploaded.";
							$dados['imagem'] = $files['imagem']['name'];
							criarNoticia($dados);	
						} else {
								echo "Sorry, there was an error uploading your file.";
						}
						$uploadOk = 1;
				// } else {
				// 		echo "File is not an image.";
				// 		$uploadOk = 0;
				// }
		}
	}
	function criarNoticia($dados){
		$result = mysql_query("INSERT INTO noticias (titulo,texto,imagem) VALUES ('".$dados['texto']."','".$dados['texto']."','".$dados['imagem']."')");


		if (!$result) {
				echo 'Could not run query: ' . mysql_error();
				exit;
		}

		header('Location: index-admin.php?criado=true');
	}
?>