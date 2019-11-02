<?php 
	include 'index-admin.controller.php';
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
		<h1>ADMIN</h1>
	</div>

	<div class="container noticias">

        <table>
            <thead>
                <td>id</td>
                <td>Título</td>
                <td>Texto</td>
                <td>imagem</td>
                <td>Actions</td>
            </thead>
            <?php for($i=0;$i<count($noticias);$i++): ?>
            
            <tr class="<?php echo $i%2 == 0 ? 'par'  :  'impar' ?>">
                <td>
                    <?php echo $noticias[$i]->id?>
                </td>
                <td>
                    <?php echo $noticias[$i]->titulo?>
                </td>
                <td>
                    <?php echo $noticias[$i]->texto?>
                </td>     
                <td>
                    <img style="width:100px;" src="img/<?php echo $noticias[$i]->imagem?>" alt="">
                </td>     
                <td>
                    <a href="index-admin.controller.php?delete=<?php echo $noticias[$i]->id?>">Deletar</a>
                </td>                
            </tr>

            <!-- <a href="noticia.php?id=<?php echo $noticias[$i]->id?>" style="background-image:url('img/<?php echo $noticias[$i]->imagem?>')" class="noticia">
                
                <div class="texto-noticia">
                    <?php echo $noticias[$i]->titulo?>
                </div>
            </a> -->

            <?php endfor; ?>
        </table>
		
	</div>

    <div class="container login">
		<form enctype="multipart/form-data" method="POST">
            <div class="criado">CRIAR NOTICIA</div>
            <label for="titulo">Titulo:</label>
            <input type="text" name="titulo">
            <label for="texto">Texto:</label>
            <input type="text" name="texto">
            <label for="imagem">Imagem</label>
            <input type="file" name="imagem">
            <input type="submit" name="submit" value="ENVIAR">
        </form>
	</div>
</body>
</html>