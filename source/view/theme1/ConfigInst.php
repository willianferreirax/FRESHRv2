<?php $v->layout("theme1/_theme"); ?>

<?php $v->start("css"); ?>
	<link rel="stylesheet" href="css/config.css">
	<link rel="stylesheet" href="css/style.css">
<?php $v->end(); ?>

<?php $v->start("body"); ?>
	<body class='background'>
<?php $v->end(); ?>


<div class='statsdiv'>
	<h1 class='title'>Minhas informações</h1>

	<form name="config" method="POST" action="alterar_inst.php">
				

		<label><b>Nome:</b></label>
		
		<input type="text" name="nome" value="" disabled>
		
		<input class="cadastrar" type="submit" name="nome_inst" value="Alterar">
		

		<label><b>Telefone:</b></label>
		
		<input type="text" name="telefone" value="" disabled>
		
		<input class="cadastrar" type="submit" name="telefone_inst" value="Alterar">
		

		<label><b>Endereço:</b></label>
		
		<input type="text" name="endereco" value="" disabled>
		
		<input class="cadastrar" type="submit" name="endereco_inst" value="Alterar">


		<label><b>Bairro:</b></label>
		
		<input type="text" name="bairro" value="" disabled>
		
		<input class="cadastrar" type="submit" name="bairro_inst" value="Alterar">


		<label><b>Cidade:</b></label>
		
		<input type="text" name="cidade" value="" disabled>
		
		<input class="cadastrar" type="submit" name="cidade_inst" value="Alterar">
		
		

		<label><b>Estado:</b></label>
		
		<input type="text" name="estado" value="" disabled>
		
		<input class="cadastrar" type="submit" name="estado_inst" value="Alterar">
		

		<label><b>CEP:</b></label>
		
		<input type="text" name="cep" value="" disabled>
		
		<input class="cadastrar" type="submit" name="cep_inst" value="Alterar">
		

		<label><b>Email:</b></label>
		
		<input type="text" name="email" value="" disabled>
		
		<input class="cadastrar" type="submit" name="email_inst" value="Alterar">
		

		<label><b>Senha:</b></label>
		
		<input type="password" name="senha" value='' disabled>
		
		<input class="cadastrar" type="submit" name="senha_inst" value="Alterar">
		
		
		<a style="color: red; text-decoration: none !important;" href="javascript: if(confirm('Deseja realmente excluir sua conta? Essa ação é irreversivel!')) location.href='deletar_cadastro.php';">
			<div class="excluircad"><i class="far fa-trash-alt"></i>Excluir cadastro</div>
		</a>
		

		<button class="cadastraralt" href="painel_inst.php">Voltar</button>

	</form>
</div>
