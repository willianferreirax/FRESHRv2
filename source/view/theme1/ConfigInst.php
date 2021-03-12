<?php $v->layout("theme1/_theme"); ?>

<?php $v->start("css"); ?>
	<link rel="stylesheet" href="<?=asset('css/config.css')?>">
	<link rel="stylesheet" href="<?=asset('css/style.css')?>">
<?php $v->end(); ?>

<?php $v->start("body"); ?>
	<body class='background'>
<?php $v->end(); ?>


<div class='statsdiv'>
	<h1 class='title'>Minhas informações</h1>

	<form name="config" method="POST" action="<?=$router->route("appInst.update")?>">
				
		<!-- name -->
		<label><b>Nome:</b></label>
		<input type="text" name="name" value="" placeholder="Novo nome">
		
		<input class="cadastrar" type="submit" name="update_name" value="Alterar"><br>
		
		<!-- phone -->
		<label><b>Telefone:</b></label>
		<input type="text" name="phone" placeholder="Novo telefone" value="">
		
		<input class="cadastrar" type="submit" name="update_phone" value="Alterar"><br>
		
		<!-- adress -->
		<label><b>Endereço:</b></label>
		<input type="text" name="address" placeholder="Novo endereço" value="">
		
		<input class="cadastrar" type="submit" name="update_address" value="Alterar"><br>

		<!-- neighbor -->
		<label><b>Bairro:</b></label>
		<input type="text" name="neighbor" placeholder="Novo bairro" value="">
		
		<input class="cadastrar" type="submit" name="update_neighbor" value="Alterar"><br>

		<!-- city -->
		<label><b>Cidade:</b></label>
		<input type="text" name="city" placeholder="Nova cidade" value="">
		
		<input class="cadastrar" type="submit" name="update_city" value="Alterar"><br>
		
		<!-- state -->
		<label><b>Estado:</b></label>
        
			<select name='state'>
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
			</select>
		
		
		<input class="cadastrar" type="submit" name="update_state" value="Alterar"><br>
		
		<!-- cep -->
		<label><b>CEP:</b></label>
		<input type="text" name="cep" placeholder="Novo CEP" value="">
		
		<input class="cadastrar" type="submit" name="update_CEP" value="Alterar"><br>
		
		<!-- email -->
		<label><b>Email:</b></label>
		<input type="text" name="email" placeholder="Novo Email" value="">
		
		<input class="cadastrar" type="submit" name="update_email" value="Alterar"><br>
		
		<!-- password -->
		<label><b>Senha:</b></label>
		<input type="password" name="pass" placeholder="Nova senha" value=''>

		<label><b>Confirmar senha:</b></label>
		<input type='password' name='confirm' placeholder='Repita a nova senha'>
		
		<input class="cadastrar" type="submit" name="update_pass" value="Alterar"><br>
		
		
		<a style="color: red; text-decoration: none !important;" href="javascript: if(confirm('Deseja realmente excluir sua conta? Essa ação é irreversivel!')) location.href='deletar_cadastro.php';">
			<div class="excluircad"><i class="far fa-trash-alt"></i>Excluir cadastro</div>
		</a>
		

		<button class="cadastraralt" href="<?=$router->route("appUser.instPanel")?>">Voltar</button>

	</form>
</div>
