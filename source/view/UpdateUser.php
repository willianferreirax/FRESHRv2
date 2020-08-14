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