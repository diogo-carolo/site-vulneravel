<?php
  session_start();
  include("connection.php");
	include("utils.controller.php");
	

	if(isset($_POST['submit'])){
		console_log($_POST);
		login($_POST);
	}

	if(isset($_GET['logout'])){
		session_destroy();
		header('Location: index.php');  
	}


	function login($dados){

		$result = mysql_query("SELECT * FROM admin WHERE email = '".$dados['email']."' AND password = '". md5($dados['password']) ."' LIMIT 1");
		if (!$result) {
				echo 'Could not run query: ' . mysql_error();
				exit;
		}
		$user = null;
		while ($row = mysql_fetch_object($result)) {
			 $user = $row;
		}

		if(isset($user)){
				
				$_SESSION['admin'] = $user;
				console_log($_SESSION);
				
				header('Location: index.php');
		}
		else{
				console_log("errou!");
				header('Location: login-admin.php?error=true');
		}
	 
}

?>