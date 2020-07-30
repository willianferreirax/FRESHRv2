	<?php
	session_start();
	if(!isset($_SESSION['usuario'])){
		header('location:index.php');
		exit();
	}
	?>

	<!doctype html>
	<html lang="pt-br">
	  <head>
		<title><?php if(isset($_SESSION['usuario'][0]) && $_SESSION['usuario'][0] != ""){echo $_SESSION['usuario'][0]." ".$_SESSION['usuario'][4];} ?> - FRESHR</title>
	  <!-- Required meta tags -->
	  <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
	  <meta charset="utf-8">
	  <meta name="description" content="Junte-se ao FRESHR. Uma visão de prosperidade para a sua carreira.">
	  <meta name="keywords" content="FRESHR, Eventos, Buscar, Profissão, Página Inicial">
	  <meta name="robots" content="Index, follow">
	  <meta name="author" content="Iago Pereira, Lucas Campanelli, Nicholas Campanelli, Renato Melo, Willian Ferreira">
	  <link rel="stylesheet" href="css/changeinfo.css">
	  <link rel="stylesheet" href="css/style.css">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	  <script src="https://kit.fontawesome.com/337796870f.js"></script>
	  <link rel="shortcut icon" href="images/icon.png">
	  <meta name="viewport" content="width=device-width">
	  <meta name="theme-color" content="#121212">
	  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

	  <!-- Bootstrap CSS -->
	  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<script language='JavaScript'>
	  function blockNumber(objEvent){
		var keycode;
		keycode = objEvent.keyCode;
		if(keycode >= 97 && keycode <= 122){ //Permitir letras
		  return true;
		}
		else if(keycode >= 65 && keycode <= 90){ //Permitir letras maiúsculas
		  return true;
		}
		else if(keycode == 39 || keycode == 180 || keycode == 94 || keycode == 126|| keycode == 225 || keycode == 233 || keycode == 237 || keycode == 243 || keycode == 250 || keycode == 226 || keycode == 227 || keycode == 234 || keycode == 212 || keycode == 32 || keycode == 231 || keycode == 199){ //Permitir acentuação gráfica
		  return true;
		}
		else{
		  return false;
		}
	  }
	  </script>
	  </head>
	<body>

		<!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	<center>

	 <header class='cabecalho'>
      <a href="index.php" class='homea'>
        <label for='logospace' class='logo'>
          <h1 class='logospace'></h1>
        </label>
      </a>
      <hr>
    </header>

	<?php
		if(isset($_REQUEST["validar"]) && $_REQUEST["validar"] == true){

		include "connection.php";
		$conn = conexao();

		//declaramos as variáveis se o post correspondente existir (isset) e alteramos o comando sql de acordo com o item que foi escolhido para ser alterado


	  if(isset($_POST['nome_usu'])){

		if (strlen(utf8_decode($_POST["nome_usu"])) < 2 || strlen(utf8_decode($_POST["nome_usu"])) > 255) {
		  $erro = " digite um nome válido.";
		  echo "<div class='erro'>Por gentileza,".$erro."</div><br>";
		}
		elseif(strlen(utf8_decode($_POST["sobrenome"])) < 2 || strlen(utf8_decode($_POST["sobrenome"])) > 255){
		  $erro = " digite um sobrenome válido.";
		  echo "<div class='erro'>Por gentileza,".$erro."</div><br>";
		}
		else{

		  $nome_usu = $_POST["nome_usu"];
		  $sobrenome = $_POST["sobrenome"];
		  $update = "update usuario set nome_usuario = ?, sobrenome_usuario=? where cod_usuario = ? ";
		  $res = $conn->prepare($update);
		  $res->bindValue(1,$nome_usu);
		  $res->bindValue(2,$sobrenome);
		  $res->bindValue(3,$_SESSION['usuario'][3]);
		  $res->execute();
			$script = "<script language=javascript>
			location.href='logout_script.php';
			alert('Nome alterado com sucesso. Faça login novamente para continuar.');
			</script>";
			echo $script;
		}
	  }

	  elseif(isset($_POST['email_usu'])){

		if(!filter_var($_POST["email_usu"], FILTER_VALIDATE_EMAIL)){

		  $erro = " digite um email valido.";
		  echo "<div class='erro'>Por gentileza,".$erro."</div><br>";

		}
		else{
			$email = $_POST['email_usu'];
		  $result = $conn->prepare("select * from usuario where email_usuario = '{$email}'"); //Comando de seleção que verifica se há um email igual no banco de dados
		  $result->execute(); //Executa o comando

		  if($result->fetchColumn() > 0){ //Se retornar mais de 0 resultado, existe um email igual cadastrado
			$erro = "Não é possivel utilizar o email digitado, por favor, insira outro";
			echo "<div class='erro'>".$erro."</div><br>";
		  }

		  else{

			$email = $_POST['email_usu'];
			$update = "update usuario set email_usuario=? where cod_usuario = ? ";
			$res = $conn->prepare($update);
			$res->bindValue(1,$email);
			$res->bindValue(2,$_SESSION['usuario'][3]);
			$res->execute();
			$script = "<script language=javascript>
			location.href='logout_script.php';
			alert('E-mail alterado com sucesso. Faça login novamente para continuar.');
			</script>";
			echo $script;

		  }
		}

	  }

		elseif(isset($_POST['senha_usu'])){
		  if(strlen(utf8_decode($_POST["senha_usu"])) < 8 || strlen(utf8_decode($_POST["senha_usu"])) > 100){
			$erro = "Digite uma senha válida (use entre 8 e 100 caracteres).";
			echo "<div class='erro'>".$erro."</div><br>";
		  }
		  elseif($_POST["senha_usu"] != $_POST["confirmar"]){
			$erro = "Confirmação de senha inválida. Por favor, digite novamente.";
			echo "<div class='erro'>".$erro."</div><br>";
		  }
		  else{
			$senha = md5($_POST['senha_usu']);
			$update = "update usuario set senha_usuario=? where cod_usuario = ? ";
			$res = $conn->prepare($update);
			$res->bindValue(1,$senha);
			$res->bindValue(2,$_SESSION['usuario'][3]);
			$res->execute();
			$script = "<script language=javascript>
			location.href='logout_script.php';
			alert('Senha alterada com sucesso. Faça login novamente para continuar.');
			</script>";
			echo $script;
		  }

		}
	  }
	?>

	<?php
	if (isset($_POST['nome_usu'])) {


		echo"<form name='alterar_u' method='POST' action='?validar=true'>

			   <h5>Digite seu nome:</h5><br>

			   <label><b>Nome:</b></label>
			   <br>
			   <input type='text' name='nome_usu' placeholder='Novo nome' onkeypress='return blockNumber(event)'>
			   <br>
			   <label><b>Sobrenome:</b></label>
			   <br>
			   <input type='text' name='sobrenome' placeholder='Novo Sobrenome' onkeypress='return blockNumber(event)'>
				<br>
				<br>

		   <button class='cadastrar' type='submit' value='Logar'> Alterar </button>
		   <br>
		   <br>


		   </form>
		   <a href='painel_usuario.php'><button class='back'>Voltar</button></a>";
	}

	elseif(isset($_POST['email_usu'])){
		echo"<form name='alterar_u' method='POST' action='?validar=true'>

			   <h5>Digite o novo email:</h5><br>

			   <label><b>Email:</b></label>
			   <br>
			   <input type='email' name='email_usu' placeholder='Novo email'>
			   <br>


		   <br><br>

		   <button class='cadastrar' type='submit' value='Logar'> Alterar </button>
		   <br>
		   <br>


		   </form>
		   <a href='painel_usuario.php'><button class='back'>Voltar</button></a>";
	}

	elseif(isset($_POST['senha_usu'])){
		echo"<form name='alterar_u' method='POST' action='?validar=true'>

			   <h5>Digite a nova senha:</h5><br>

			   <label><b>Senha:</b></label>
			   <br>
			   <input type='password' name='senha_usu' placeholder='Nova senha'>
			   <br>
			   <label><b>Confirmar senha:</b></label>
			   <br>
			   <input type='password' name='confirmar' placeholder='Repita a senha'>
			   <br>
			<br>
		   <button class='cadastrar' type='submit' value='Logar'> Alterar </button>
		   <br>
		   <br>


		   </form>
		   <a href='painel_usuario.php'><button class='back'>Voltar</button></a>";

	}
	else{
	  header('Location : painel_usuario.php');
	  exit();
	}

	?>
	</center>
	</body>
	</html>
