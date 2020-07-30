<?php
	session_start();
if(!$_SESSION['instituicao']){
    header('location:login.php');
    exit();
}
$cnpj = $_SESSION['instituicao'][3];

?>

<!doctype html>
<html lang="pt-br">
  <head>
    <title><?php echo $_SESSION['instituicao'][0];?> - FRESHR</title>
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
	<script type='text/javascript'>
  function mascara(formato, keypress, objeto){
    campo = eval(objeto);

    //TELEFONE
    if(formato == 'telefone'){
      separador1 = '(';
      separador2 = ') ';
      separador3 = '-';
      conjunto1 = 0;
      conjunto2 = 3;
      conjunto3 = 9;
      if(telefone.value.length == conjunto1){
        telefone.value = telefone.value + separador1;
      }
      if(telefone.value.length == conjunto2){
        telefone.value = telefone.value + separador2;
      }
      if(telefone.value.length == conjunto3){
        telefone.value = telefone.value + separador3;
      }
    }

    //TELEFONE
    if(formato == 'cep_inst'){
      separador1 = '-';
      conjunto1 = 0;
      conjunto2 = 5;
      if(cep_inst.value.length == conjunto1){
        cep_inst.value = cep_inst.value;
      }
      if(cep_inst.value.length == conjunto2){
        cep_inst.value = cep_inst.value + separador1;
    }
  }
}
  </script>
  </head>
<body>
<center>

	<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<header class='cabecalho'>
	 <a href="index.php" class='homea'>
		 <label for='logospace' class='logo'>
			 <h1 class='logospace'></h1>
		 </label>
	 </a>
	 <hr>
 </header>

<?php

if (isset($_POST['senha_inst'])) {


 	echo"<form name='alterar_f' method='POST' action='?validar=true'>

        <h5>Escreva a nova senha</h5><br>

        <label><b>Senha:</b></label>
        <br>
        <input type='password' name='senha_inst' placeholder='Nova senha'>
        <br>
		<br>
		<input type='password' name='confirmar_senha' placeholder='Confirmar senha'>
        <br>
        <br>


	    <input class='cadastrar' type='submit' name='alterar' value='Alterar'>

	    <br><br>


		<a href='painel_inst.php'><div class='back'>Voltar</div></a>
	    </form>";
}


else if (isset($_POST['nome_inst'])) {


 	echo"<form name='alterar_f' method='POST' action='?validar=true'>

        <h5>Escreva o novo nome</h5><br>

        <label><b>Nome:</b></label>
        <br>
        <input type='text' name='nome_inst' placeholder='Novo nome'>
        <br>
        <br>


	    <input class='cadastrar' type='submit' name='alterar' value='Alterar'>

	    <br><br>


		<a href='painel_inst.php'><div class='back'>Voltar</div></a>
	    </form>";
}



else if (isset($_POST['endereco_inst'])) {


 	echo"<form name='alterar_f' method='POST' action='?validar=true'>

        <h5>Escreva o novo endereço</h5><br>

        <label><b>Endereço:</b></label>
        <br>
        <input type='text' name='endereco_inst' placeholder='Novo endereço'>
        <br>
        <br>


	    <input class='cadastrar' type='submit' name='alterar' value='Alterar'>

	    <br><br>


		<a href='painel_inst.php'><div class='back'>Voltar</div></a>
	    </form>";

	}





else if (isset($_POST['bairro_inst'])) {


 	echo"<form name='alterar_f' method='POST' action='?validar=true'>

        <h5>Escreva o novo bairro</h5><br>

        <label><b>Bairro:</b></label>
        <br>
        <input type='text' name='bairro_inst' placeholder='Novo bairro'>
        <br>
        <br>


	    <input class='cadastrar' type='submit' name='alterar' value='Alterar'>

	    <br><br>


		<a href='painel_inst.php'><div class='back'>Voltar</div></a>
	    </form>";
	}




else if (isset($_POST['cidade_inst'])) {


 	echo"<form name='alterar_f' method='POST' action='?validar=true'>

        <h5>Escreva a nova cidade</h5><br>

        <label><b>Cidade:</b></label>
        <br>
        <input type='text' name='cidade_inst' placeholder='Nova cidade'>
        <br>
        <br>


	    <input class='cadastrar' type='submit' name='alterar' value='Alterar'>

	    <br><br>


		<a href='painel_inst.php'><div class='back'>Voltar</div></a>
	    </form>";
	}



else if (isset($_POST['cep_inst'])) {


 	echo"<form name='alterar_f' method='POST' action='?validar=true'>

        <h5>Escreva o novo CEP</h5><br>

        <label><b>CEP:</b></label>
        <br>
        <input type='text' name='cep_inst' onkeypress='mascara('cep_inst') placeholder='Novo CEP'>
        <br>
        <br>


	    <input class='cadastrar' type='submit' name='alterar' value='Alterar'>

	    <br><br>


		<a href='painel_inst.php'><div class='back'>Voltar</div></a>
	    </form>";
	}


else if (isset($_POST['email_inst'])) {


 	echo"<form name='alterar_f' method='POST' action='?validar=true'>

        <h5>Escreva o novo Email:</h5><br>

        <label><b>Email:</b></label>
        <br>
        <input type='email' name='email_inst' placeholder='Novo Email'>
        <br>
        <br>


	    <input class='cadastrar' type='submit' name='alterar' value='Alterar'>

	    <br><br>


		<a href='painel_inst.php'><div class='back'>Voltar</div></a>
	    </form>";
	}



else if (isset($_POST['telefone_inst'])) {


 	echo"<form name='alterar_f' method='POST' action='?validar=true'>

        <h5>Escreva novo telefone</h5><br>

        <label><b>Telefone:</b></label>
        <br>
        <input type='text' name='telefone_inst' maxlength='15' placeholder='(99) 99999-9999' onkeypress='mascara('telefone', window.event.keyCode, 'document.cadastro_uso.telefone')'> <br><small>*(com DDD)</small>
        <br>
        <br>


	    <input class='cadastrar' type='submit' name='alterar' value='Alterar'>

	    <br><br>


		<a href='painel_inst.php'><div class='back'>Voltar</div></a>
	    </form>";
}
else if (isset($_POST['estado_inst'])) {


 	echo"<form name='alterar_f' method='POST' action='?validar=true'>

        <h5>Insira um estado novo</h5><br>

        <label><b>Estado:</b></label>
        <br>
				<select name='estado_inst'>
					<option value='AC'>Acre</option>
					<option value='AL'>Alagoas</option>
					<option value='AP'>Amapá</option>
					<option value='AM'>Amazonas</option>
					<option value='BA'>Bahia</option>
					<option value='CE'>Ceará</option>
					<option value='DF'>Distrito Federal</option>
					<option value='ES'>Espirito Santo</option>
					<option value='GO'>Goiás</option>
					<option value='MA'>Maranhão</option>
					<option value='MT'>Mato Grosso</option>
					<option value='MS'>Mato Grosso do Sul</option>
					<option value='MG'>Minas Gerais</option>
					<option value='PA'>Pará</option>
					<option value='PB'>Paraíba</option>
					<option value='PR'>Paraná</option>
					<option value='PE'>Pernambuco</option>
					<option value='PI'>Piauí</option>
					<option value='RJ'>Rio de Janeiro</option>
					<option value='RJ'>Rio Grande do Norte</option>
					<option value='RS'>Rio grande do Sul</option>
					<option value='RO'>Rondônia</option>
					<option value='RR'>Roraima</option>
					<option value='SC'>Santa Catarina</option>
					<option value='SP' selected>São Paulo</option>
					<option value='SE'>Sergipe</option>
					<option value='TO'>Tocantins</option>
				</select><br>
        <br>
        <br>


	    <input class='cadastrar' type='submit' name='alterar' value='Alterar'>

	    <br><br>


		<a href='painel_inst.php'><div class='back'>Voltar</div></a>
	    </form>";
}
else{
	header('Location:painel_inst.php');
	exit();
}
?>

<?php
if(isset($_REQUEST["validar"]) && $_REQUEST["validar"] == true){

	include "connection.php";
	$conn = conexao();
	//declaramos as variáveis se o post correspondente existir (isset) e alteramos o comando sql de acordo com o item que foi escolhido para ser alterado

	if(isset($_POST['senha_inst'])){

		if(strlen(utf8_decode($_POST["senha_inst"])) < 10 || strlen(utf8_decode($_POST["senha_inst"])) > 100){
			$erro = "Digite uma senha válida (use entre 10 e 100 caracteres).";
			echo "<div class='erro'>".$erro."</div><br>";
		}
		elseif($_POST["senha_inst"] != $_POST["confirmar_senha"]){
			$erro = "Confirmação de senha inválida. Por favor, digite novamente.";
			echo "<div class='erro'>".$erro."</div><br>";
		}
		else{
			$senha = md5($_POST['senha_inst']);
			$update = "update faculdade set senha_inst=? where cnpj = ? ";
			$res = $conn->prepare($update);
			$res->bindValue(1,$senha);
			$res->bindValue(2,$_SESSION['instituicao'][3]);
			$res->execute();
			$script = "<script language=javascript>
			location.href='logout_script.php';
			alert('Senha alterada com sucesso. Faça login novamente para continuar.');
			</script>";
			echo $script;
		}

	}

	elseif(isset($_POST['nome_inst'])){
		if (strlen(utf8_decode($_POST["nome_inst"]))<5 || strlen(utf8_decode($_POST["nome_inst"]))>255) {
			$erro = "Preencha o campo nome corretamente (pelo menos 5 caracteres)";
			echo "<div class='erro'>".$erro."</div><br>";
		}
		else{
			$nome_inst = $_POST["nome_inst"];
			$update = "update faculdade set nome_inst=? where cnpj = ? ";
			$res = $conn->prepare($update);
			$res->bindValue(1,$nome_inst);
			$res->bindValue(2,$_SESSION['instituicao'][3]);
			$res->execute();
			$script = "<script language=javascript>
			location.href='logout_script.php';
			alert('Nome alterado com sucesso. Faça login novamente para continuar.');
			</script>";
			echo $script;
		}
	}

	elseif(isset($_POST['endereco_inst']) && $_POST['endereco_inst']){
		if(strlen(utf8_decode($_POST['endereco_inst']))<3 || strlen(utf8_decode($_POST['endereco_inst']))>255){
			$erro="Digite um endereço válido.";
			echo "<div class='erro'>".$erro."</div><br>";
		}
		else{
			$endereco_inst = $_POST["endereco_inst"];
			$update = "update faculdade set endereco_inst=? where cnpj = ? ";
			$res = $conn->prepare($update);
			$res->bindValue(1,$endereco_inst);
			$res->bindValue(2,$_SESSION['instituicao'][3]);
			$res->execute();
			$script = "<script language=javascript>
			location.href='logout_script.php';
			alert('Endereço alterado com sucesso. Faça login novamente para continuar.');
			</script>";
			echo $script;
		}

	}

	elseif(isset($_POST['bairro_inst'])){
		if(strlen(utf8_decode($_POST["bairro_inst"]))<2 || strlen(utf8_decode($_POST["bairro_inst"]))>80){
			$erro= "Digite um bairro válido.";
			echo "<div class='erro'>".$erro."</div><br>";
		}
		else{
			$bairro_inst = $_POST["bairro_inst"];
			$update = "update faculdade set bairro_inst=? where cnpj = ? ";
			$res = $conn->prepare($update);
			$res->bindValue(1,$bairro_inst);
			$res->bindValue(2,$_SESSION['instituicao'][3]);
			$res->execute();
			$script = "<script language=javascript>
			location.href='logout_script.php';
			alert('Bairro alterado. Faça login novamente para continuar.');
			</script>";
			echo $script;
		}
	}

	elseif(isset($_POST['cidade_inst'])){
		if(strlen(utf8_decode($_POST["cidade_inst"]))<5 || strlen(utf8_decode($_POST["cidade_inst"]))>255){
			$erro= "Digite uma cidade válida";
			echo "<div class='erro'>".$erro."</div><br>";
		}
		else{
			$cidade_inst = $_POST["cidade_inst"];
			$update = "update faculdade set cidade_inst=? where cnpj = ? ";
			$res = $conn->prepare($update);
			$res->bindValue(1,$cidade_inst);
			$res->bindValue(2,$_SESSION['instituicao'][3]);
			$res->execute();
			$script = "<script language=javascript>
			location.href='logout_script.php';
			alert('Cidade alterada com sucesso. Faça login novamente para continuar.');
			</script>";
			echo $script;
		}
	}

	elseif(isset($_POST['cep_inst'])){
		if(strlen(utf8_decode($_POST["cep_inst"]))<8 || strlen(utf8_decode($_POST["cep_inst"]))>9){
			$erro= "Digite corretamente o CEP";
			echo "<div class='erro'>".$erro."</div><br>";
		}
		else{
			$cep_inst = $_POST["cep_inst"];
			$update = "update faculdade set cep_inst=? where cnpj = ? ";
			$res = $conn->prepare($update);
			$res->bindValue(1,$cep_inst);
			$res->bindValue(2,$_SESSION['instituicao'][3]);
			$res->execute();
			$script = "<script language=javascript>
			location.href='logout_script.php';
			alert('CEP alterado com sucesso. Faça login novamente para continuar.');
			</script>";
			echo $script;
		}
	}

	elseif(isset($_POST['email_inst'])){
		if(!filter_var($_POST["email_inst"], FILTER_VALIDATE_EMAIL)){
			$erro = "Digite um email valido.";
			echo "<div class='erro'>".$erro."</div><br>";
		}
		else{
			$email_inst = $_POST["email_inst"];
			$result = $conn->prepare("select * from faculdade where email_inst = '{$email_inst}'");
      		$result->execute(); //Executa o comando

			if($result->fetchColumn() > 0){ //Se retornar mais de 0 resultado, existe um email igual cadastrado
				$erro = "Não é possivel utilizar o email digitado, por favor, insira outro";
				echo "<div class='erro'>".$erro."</div><br>";
			}
			else{
				$update = "update faculdade set email_inst=? where cnpj = ? ";
				$res = $conn->prepare($update);
				$res->bindValue(1,$email_inst);
				$res->bindValue(2,$_SESSION['instituicao'][3]);
				$res->execute();
				$script = "<script language=javascript>
				location.href='logout_script.php';
				alert('Endereço de e-mail alterado com sucesso. Faça login novamente para continuar.');
				</script>";
				echo $script;
			}
		}
	}

	elseif(isset($_POST['telefone_inst']) && $_POST['telefone_inst']){
		if(strlen(utf8_decode($_POST["telefone_inst"]))<14 || strlen(utf8_decode($_POST["telefone_inst"]))>15){
			$erro= "Insira um telefone válido.";
			echo "<div class='erro'>".$erro."</div><br>";
		}
		else{
			$telefone_inst = $_POST["telefone_inst"];
			$update = "update faculdade set telefone_inst=? where cnpj = ? ";
			$res = $conn->prepare($update);
			$res->bindValue(1,$telefone_inst);
			$res->bindValue(2,$_SESSION['instituicao'][3]);
			$res->execute();
			$script = "<script language=javascript>
			location.href='logout_script.php';
			alert('Telefone alterado com sucesso. Faça login novamente para continuar.');
			</script>";
			echo $script;
		}
	}

	elseif(isset($_POST['estado_inst']) && $_POST['estado_inst'] != ""){
		if(strlen(utf8_decode($_POST["estado_inst"]))< 2 || strlen(utf8_decode($_POST["estado_inst"]))>80){
			$erro="Digite uma estado valido";
			echo "<div class='erro'>".$erro."</div><br>";
		}
		else{
			$estado_inst = $_POST["estado_inst"];
			$update = "update faculdade set estado_inst=? where cnpj = ? ";
			$res = $conn->prepare($update);
			$res->bindValue(1,$estado_inst);
			$res->bindValue(2,$_SESSION['instituicao'][3]);
			$res->execute();
			$script = "<script language=javascript>
			location.href='logout_script.php';
			alert('Estado alterado com sucesso. Faça login novamente para continuar.');
			</script>";
			echo $script;
		}
	}

}

?>
</center>
</body>
</html>
