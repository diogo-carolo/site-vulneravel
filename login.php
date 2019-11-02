<?php
    session_start();
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
    
    <div class="container login">
        <form action="login.controller.php" method="POST">
            <?php if(isset($_GET['error'])):?>
                <div class="criado">
                    usuário não encontrado!
                </div>
            <?php endif;?>
            <label for="login">Login:</label>
            <input type="text" name="email">
            <label for="senha">Senha:</label>
            <input type="password" name="password">
            <button type="submit" value="true" name="submit">ENTRAR</button>
            <div class="criar-conta">
                Ainda não é cadastrado? <a href="registro.php">Clique aqui</a>
            </div>
            <div class="esqueci-senha">
                Recuperar senha
            </div>
        </form>
    </div>
</body>
</html>