<?php
    include "meus-dados.controller.php"  
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

    <div class="container meus-dados">
        <label for="nome">Nome</label>
        <input type="text"  disabled="true" value="<?php echo $usuario->nome?>">
        <label for="email">Email</label>
        <input type="text"  disabled="true" value="<?php echo $usuario->email?>">
        <label for="cpf">cpf</label>
        <input type="text"  disabled="true" value="<?php echo $usuario->cpf?>">
        <label for="senha">senha</label>
        <input type="text" disabled="true" value="<?php echo $usuario->password?>">
    </div>
</body>
</html>