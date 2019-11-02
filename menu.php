<header>
    <div class="container menu">
        <a href="index.php">HOME</a>
        
        <?php if(isset($_SESSION['user'])):?>
            <a href="meus-dados.php?id=<?php echo $_SESSION['user']->id?>">MEUS DADOS</a>
            <a href="login.controller.php?logout=true">DESLOGAR</a>
        <?php endif;?>

        <?php if(isset($_SESSION['admin'])):?>
            <a href="meus-dados.php?id=<?php echo $_SESSION['admin']->id?>">MEUS DADOS</a>
            <a href="index-admin.php">ÁREA ADMINISTRATIVA</a>
            <a href="login-admin.controller.php?logout=true">DESLOGAR</a>
            
        <?php endif;?>

        <?php if(!isset($_SESSION['user']) && !isset($_SESSION['admin']) ) :?>
            <a href="registro.php">REGISTRE-SE</a>
            <a href="login.php">LOGIN</a>
        <?php endif;?>
        
        <!-- <a href="">ÁREA ADMINISTRATIVA</a> -->
    </div>
</header>