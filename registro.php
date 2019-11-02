<?php include("registro.controller.php")?>
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
    
    <div class="container cadastro">
      
        <form action="registro.controller.php" method="POST">
        <?php if(isset($_GET['criado'])):?>
            <div class="criado">
                Usuário criado com sucesso!
            </div>
        <?php endif;?>
            <div class="text-cadastro">Cadastro de usuário</div>
            <label for="nome">Nome:</label>
            <input type="text" name="nome">
            <label for="email">Email:</label>
            <input type="text" name="email">
            <label for="senha">Senha:</label>
            <input type="password" name="senha">
            <label for="cpf">CPF:</label>
            <input type="text" name="cpf">
            <button type="sumit" value="true" name="submit">CADASTRAR</button>
            
        </form>
    </div>
</body>
</html>