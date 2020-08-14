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
