<?php
    include "noticia.controller.php"  
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css"/>
    
    <title>Document</title>
</head>
<body>
    <?php include("menu.php")?>
    
    <div class="container">
		<h1><?php echo $noticias[0]->titulo?></h1>
    </div>
    
    <div class="container corpo">
        <img src="img/<?php echo $noticias[0]->imagem?>" alt="">

        <div class="conteudo">
           <?php echo $noticias[0]->texto?>
        </div>

    </div>

    <div class="container">
		<h1>COMENTARIOS</h1>
    </div>

    <div class="container comentarios">


        <?php for($i=0;$i<count($comentarios);$i++): ?>
        <div class="comentario">
            <img src="img/avatar.jpg" alt="">
            <div class="comentario-texto">
                <?php echo $comentarios[$i]->comentario?>
            </div>
        </div>
        <?php endfor; ?>

    </div>
    <?php if(isset($_SESSION['user'])):?>
    <div class="container postar-comentario">
        <form action="noticia.controller.php?id=<?php echo  $noticias[0]->id?>" method="POST">
            <label for="comentario">Comentário:</label>
            <input type="text" name="comentario">
            <input type="hidden" name="id_usuario" value="1" >
            <button tupe="submit">ENVIAR!</button>
        </form>
    </div>
    <?php endif;?>
    

</body>
</html>