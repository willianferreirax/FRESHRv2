<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Junte-se ao FRESHR. Uma visão de prosperidade para a sua carreira.">
	<meta name="keywords" content="FRESHR, Eventos, Buscar, Profissão, Página Inicial, Palestras, Experiência, Conhecimento, Currículo">
	<meta name="robots" content="Index, follow">
    <meta name="author" content="Iago Pereira, Lucas Campanelli, Nicholas Campanelli, Renato Melo, Willian Ferreira">
    <meta name="viewport" content="width=device-width">
	<meta name="theme-color" content="#121212">
	<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <link rel="icon" href="<?=asset("images/icon.png");?>">
    <?= $v->section("css")?>
	<link rel="stylesheet" href="<?=asset("css/style.css");?>">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">

    <script src="https://kit.fontawesome.com/337796870f.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	
    <title> <?=$title?> </title>

</head>
 
<?php if ($v->section('body')): ?>
    <?=$v->section('body')?>
<?php else: ?>
   <?="<body class='bgindex'>"?>
<?php endif ?>

<header class='cabecalhoindex' id='grid'>
    <!-- icone menu -->
    
        <div class='menudiv'>
            <div class='menubtn'>
                <label for='chec' class='labelchec'><i class="fas fa-bars fa-2x"></i></i></label>
            </div>
        </div>

        <!-- icone freshr no cabeçalho -->
        <a href=<?=$router->route("web.home")?>><h1 class='logoeheader'>FRESHR</h1></a>

        <!--barra de pesquisa  -->
        <div class='pesquisarbtn'>
            <?= $v->section("search")?>
        </div>
        
        <div class='userdiv'>
            <!-- coloca o icone de usuario no canto superior direito -->
        <?php 
            if(isset($_SESSION['user'])){
                echo "
                <label for='dropcheck' class='dropcheck'>
                    <div class='userbtn'>
                        <i class='fas fa-user-circle fa-2x'></i>
                    </div>
                </label>";
            }
            else if(isset($_SESSION['inst'])){
                echo "
                <label for='dropcheck' class='dropcheck'>
                    <div class='userbtn'>
                        <i class='fas fa-user-circle fa-2x'></i>
                    </div>
                </label>";
            }
            else{
                echo "
                <div class='userbtn'>
                    <a href=".$router->route("web.login")."> <i class='fas fa-user-circle fa-2x'></i> </a>
                </div>";
            }
        ?>
        </div>
      
</header>

    <label for='chec' class='backdiv'></label>
    <input type='checkbox' id='chec'>
    <input type='checkbox' id='dropcheck'>

    <div class='icons'>
        <a href="<?=$router->route("web.home")?>"><i class="fas fa-home fa-2x"></i></a><br>
        <a href="<?=$router->route("web.allEvent")?>"><i class="fas fa-map-marked fa-2x"></i></a><br>
        <a href="<?=$router->route("web.allInst")?>"><i class="fas fa-users fa-2x"></i></a><br>
        <a href="<?=$router->route("web.about")?>"><i class="fas fa-info fa-2x"></i></a><br>
        <a href="<?=$router->route("web.help")?>"><i class="fas fa-question fa-2x"></i></a><br>
        <hr>
    </div>

    <nav class ="nav">
        <div class='menulist'>
            <a href="<?=$router->route("web.home")?>"><div class='b1'>Página inicial</div></a>
            <a href="<?=$router->route("web.allEvent")?>"><div class='b2'>Eventos</div></a>
            <a href="<?=$router->route("web.allInst")?>"><div class='b3'>Instituição</div></a>
            <a href="<?=$router->route("web.about")?>"><div class='b4'>Sobre nós</div></a>
            <a href="<?=$router->route("web.help")?>"><div class='b5'>Ajuda</div></a>
        </div> 
    </nav>

    <div class='dropdown'>
        <!-- dentro do dropdown do icone do usuario coloca as iniciais -->
        <?php
            if(isset($_SESSION['user']))
            {
                echo "<h1 class='imageuser'>".$user->name."</h1>";
            }

            if(isset($_SESSION['inst']))
            {
                echo "<h1 class='imageuser'>".$inst->name."</h1>";
            }
        ?>
        <br>
            <!-- dentro do dropdown altera o link dependendo de que tipo de conta está logada -->
        <?php
            if(isset($_SESSION['inst'])){
                echo "<p><a href=".$router->route('appInst.instPanel')." class='account'>Minha Conta</a></p>";
            }
            if(isset($_SESSION['user'])){
                echo "<p><a href=".$router->route('appUser.userPanel')."  class='account'>Minha Conta</a></p>";
            }
        ?>

        <p><a href="<?=$router->route("appUser.configUser") ?>" class='account'>Configurações</a></p>      

        <p><a href="<?=$router->route("web.help") ?>" class='account'>Ajuda</a></p>

        <?php
            if(isset($_SESSION['inst'])){
                echo "<p><a href=".$router->route('appInst.logoff')."><div class='exit'>Sair</div></a></p>";
            }
            if(isset($_SESSION['user'])){
                echo "<p><a href=".$router->route('appUser.logoff')."><div class='exit'>Sair</div></a></p>";
            }
        ?>

    </div>

    <main>
        <?= $v->section("content")?>
    </main>

    <?= $v->section("scripts"); ?>
    
</body>
</html>