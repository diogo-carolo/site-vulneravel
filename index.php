<?php 
	include 'index.controller.php';
?>


<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
	<link rel="stylesheet" href="style.css"/>
	<title>Document</title>
</head>
<body>
	<?php include("menu.php")?>
	

	<div class="container">
		<h1>NOTÍCIAS</h1>
	</div>

	<div class="buscar container" method="GET">
		<form action="">
		<label for="busca">BUSCA:</label>
			<input type="text" name="busca">
			<input type="submit" value="Buscar">
		</form>
		<div class="termo-buscado">
			<?php if(isset($_GET['busca']) && $_GET['busca'] != ""):?>
				Busca por:<?php echo $_GET['busca'] ?>
			<?php endif;?>
		</div>
	</div>

	<div class="container noticias">


		<?php for($i=0;$i<count($noticias);$i++): ?>

		<a href="noticia.php?id=<?php echo $noticias[$i]->id?>" style="background-image:url('img/<?php echo $noticias[$i]->imagem?>')" class="noticia">
			
			<div class="texto-noticia">
				<?php echo $noticias[$i]->titulo?>
			</div>
		</a>

		<?php endfor; ?>
	</div>
</body>
</html>