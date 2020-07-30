<?php
session_start();
if(!isset($_SESSION['instituicao']) && !isset($_SESSION['usuario'])){
header('Location:index.php');
exit();
}
?>
<!doctype html>
<html lang="pt-br">
<head>
	<title><?php if(isset($_SESSION['instituicao']) && $_SESSION['instituicao'] != '')echo $_SESSION['instituicao'][0]; else echo $_SESSION['usuario'][0]." ".$_SESSION['usuario'][4];?> - FRESHR</title>
	<!-- Required meta tags -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
	<meta charset="utf-8">
	<meta name="description" content="Junte-se ao FRESHR. Uma visão de prosperidade para a sua carreira.">
	<meta name="keywords" content="FRESHR, Eventos, Buscar, Profissão, Página Inicial">
	<meta name="robots" content="Index, follow">
	<meta name="author" content="Iago Pereira, Lucas Campanelli, Nicholas Campanelli, Renato Melo, Willian Ferreira">
	<link rel="stylesheet" href="css/config.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://kit.fontawesome.com/337796870f.js"></script>
	<link rel="shortcut icon" href="images/icon.png">
	<meta name="viewport" content="width=device-width">
	<meta name="theme-color" content="#121212">
	<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body class='background'>

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<center>
		<input type='checkbox' id='dropcheck'>
		<input type='checkbox' id='chec'>
		<div class='icons'>
			<a href='index.php'><i class="fas fa-home fa-2x"></i></a><br>
			<a href='listar_eventos.php'><i class="fas fa-map-marked fa-2x"></i></a><br>
			<a href='listar_inst.php'><i class="fas fa-users fa-2x"></i></a><br>
			<a href='sobre.php'><i class="fas fa-info fa-2x"></i></a><br>
			<a href='ajuda.php'><i class="fas fa-question fa-2x"></i></a><br>
			<hr>
		</div>
		<a href='index.php'><h1 class='logoeheader'>FRESHR</h1></a>
		<nav>
			<div class='menulist'>
				<a href='index.php'><div class='b1'>Página inicial</div></a>
				<a href='listar_eventos.php'><div class='b2'>Eventos</div></a>
				<a href='listar_inst.php'><div class='b3'>Instituição</div></a>
				<a href='sobre.php'><div class='b4'>Sobre nós</div></a>
				<a href='ajuda.php'><div class='b5'>Ajuda</div></a>
			</div>
			<label for='chec' class='backdiv'></label>
		</nav>
		<div class='dropdown'>
			<?php
			if(isset($_SESSION['usuario']))
			{
				echo "<h1 class='imageuser'>".substr($_SESSION['usuario'][0], 0, strlen($_SESSION['usuario'][0]) - (strlen($_SESSION['usuario'][0])-1))."".substr($_SESSION['usuario'][4], 0, strlen($_SESSION['usuario'][4]) - (strlen($_SESSION['usuario'][4])-1))."</h1>";
			}
			if(isset($_SESSION['instituicao']))
			{
				echo "<h1 class='imageuser'>".substr($_SESSION['instituicao'][0], 0, strlen($_SESSION['instituicao'][0]) - (strlen($_SESSION['instituicao'][0])-4))."</h1>";
			}
			?>
			<br>
			<?php
			if(isset($_SESSION['instituicao'][0])){
				echo "<a href='painel_inst.php' class='account'>Minha Conta</a>";
			}
			else{
				echo "<a href='painel_usuario.php' class='account'>Minha Conta</a>";
			}
			?>
			<br>
			<a href='config.php' class='account'>Configurações</a>
			<br>
			<a href='ajuda.php' class='account'>Ajuda</a>
			<br>
			<br>
			<a href='logout_script.php'><div class='exit'>Sair</div></a>
		</div>
		<header class='cabecalhoindex' id='grid'>
			<div class='menudiv'>
				<div class='menubtn'>
					<label for='chec' class='labelchec'><i class="fas fa-bars fa-2x"></i></label>
				</div>
			</div>
			<div class='pesquisarbtn'>
				<form action="listar_eventos.php" id='formsearch' method="post" class='searchform'>
					<input type='checkbox' id='searchcheck'>
					<label for='searchcheck' id='iconmobile' onclick="transform()" class='searchlabel'><i class="fas fa-search"></i></label>
					<div class='search'>
						<input type='text' placeholder='Pesquisar eventos...' class='searchbar'>
						<input type='submit' id='enviar'><label for='enviar' id ='iconenviar' class="fas fa-search fa-1x"></label>
					</div>
				</form>
			</div>
			<div class='userdiv'>
				<?php
				if(isset($_SESSION['instituicao'])){
					echo "<div class='creatediv'><a href='eventinfo.php'><button class='cadastrarevent'>Criar evento</button></a>
					</div></label>";
					echo "<div class='criaricon'><a href='eventinfo.php'><i class='fas fa-plus-circle fa-2x'></i></a>
					</div></label>";
				}
				?>
				<label for='dropcheck' class='dropcheck'><div class='userbtn'><i class="fas fa-user-circle fa-2x"></i>
				</div></label>
			</div>
		</header>


		<div class='statsdiv'>

			<h1 class='title'>Minhas informações</h1>

			<?php
			if(isset($_SESSION['instituicao'])) {
				echo '<form name="config" method="POST" action="alterar_inst.php">
				<br>

				<label><b>Nome:</b></label>
				<br>
					<input type="text" name="nome" value="'.$_SESSION["instituicao"][0].'" disabled>
				<br>
				<input class="cadastrar" type="submit" name="nome_inst" value="Alterar">
				<br>
				<br>

				<label><b>Telefone:</b></label>
				<br>
					<input type="text" name="telefone" value="'.$_SESSION["instituicao"][9].'" disabled>
				<br>
				<input class="cadastrar" type="submit" name="telefone_inst" value="Alterar">
				<br>
				<br>

				<label><b>Endereço:</b></label>
				<br>
					<input type="text" name="endereco" value="'.$_SESSION["instituicao"][4].'" disabled>
				<br>
				<input class="cadastrar" type="submit" name="endereco_inst" value="Alterar">
				<br>
				<br>

				<label><b>Bairro:</b></label>
				<br>
					<input type="text" name="bairro" value="'.$_SESSION["instituicao"][5].'" disabled>
				<br>
				<input class="cadastrar" type="submit" name="bairro_inst" value="Alterar">
				<br>
				<br>

				<label><b>Cidade:</b></label>
				<br>
					<input type="text" name="cidade" value="'.$_SESSION["instituicao"][6].'" disabled>
				<br>
				<input class="cadastrar" type="submit" name="cidade_inst" value="Alterar">
				<br>
				<br>

				<label><b>Estado:</b></label>
				<br>
					<input type="text" name="estado" value="'.$_SESSION["instituicao"][7].'" disabled>
				<br>
				<input class="cadastrar" type="submit" name="estado_inst" value="Alterar">
				<br>
				<br>

				<label><b>CEP:</b></label>
				<br>
					<input type="text" name="cep" value="'.$_SESSION["instituicao"][8].'" disabled>
				<br>
				<input class="cadastrar" type="submit" name="cep_inst" value="Alterar">
				<br>
				<br>

				<label><b>Email:</b></label>
				<br>
					<input type="text" name="email" value="'.$_SESSION["instituicao"][1].'" disabled>
				<br>
				<input class="cadastrar" type="submit" name="email_inst" value="Alterar">
				<br>
				<br>

				<label><b>Senha:</b></label>
				<br>
					<input type="password" name="senha" value='.$_SESSION['instituicao'][2].' disabled>
				<br>
				<input class="cadastrar" type="submit" name="senha_inst" value="Alterar">
				<br>
				<br>
				<br>
				';
				?>
				<a style="color: red; text-decoration: none !important;" href="javascript: if(confirm('Deseja realmente excluir sua conta? Essa ação é irreversivel!')) location.href='deletar_cadastro.php';"><div class="excluircad"><i class="far fa-trash-alt"></i>Excluir cadastro<a></div>
				<?php
				echo '


				<button class="cadastraralt" href="painel_inst.php">Voltar</button>

				</form>';
			}
			elseif(isset($_SESSION['usuario'])){

				echo'
				<form name="config" method="POST" action="alterar_usu.php">

				<label><b>Nome:</b></label>
				<br>
					<input type="text" name="nome" value="'.$_SESSION["usuario"][0]." ".$_SESSION["usuario"][4].'" disabled>
				<br>
				<input class="cadastrar" type="submit" name="nome_usu" value="Alterar">
				<br>
				<br>

				<label><b>Email:</b></label>
				<br>
					<input type="text" name="email" value='.$_SESSION["usuario"][1].' disabled>
				<br>
				<input class="cadastrar" type="submit" name="email_usu" value="Alterar">
				<br>
				<br>

				<label><b>Senha:</b></label>
				<br>
					<input type="password" name="senha" value='.$_SESSION["usuario"][2].' disabled>
				<br>
				<input class="cadastrar" type="submit" name="senha_usu" value="Alterar">
				<br>
				<br>
				';
				?>
				<a style="color: red; text-decoration: none !important;" href="javascript: if(confirm('Deseja realmente excluir sua conta? Essa ação é irreversivel!')) location.href='deletar_cadastro.php';"><div class="excluircad"><i class="far fa-trash-alt"></i>Excluir cadastro<a></div>
				<?php
				echo '<br><br>

				<button class="cadastraralt" href="painel_inst.php">Voltar</button>
				';
			}

			?>
		</div>
	</body>
	</html>
