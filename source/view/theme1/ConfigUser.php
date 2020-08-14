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
	<form name="config" method="POST" action="alterar_usu.php">

		<label><b>Nome:</b></label>

		<input type="text" name="nome" value="" disabled>
		
		<input class="cadastrar" type="submit" name="nome_usu" value="Alterar">


		<label><b>Email:</b></label>
		
		<input type="text" name="email" value='' disabled>
		
		<input class="cadastrar" type="submit" name="email_usu" value="Alterar">
		
		

		<label><b>Senha:</b></label>
		
		<input type="password" name="senha" value='' disabled>
		
		<input class="cadastrar" type="submit" name="senha_usu" value="Alterar">
		
		
		<!-- DELETAR CONTA -->
		<a style="color: red; text-decoration: none !important;" href="javascript: if(confirm('Deseja realmente excluir sua conta? Essa ação é irreversivel!')) location.href='deletar_cadastro.php';">
			<div class="excluircad"><i class="far fa-trash-alt"></i>Excluir cadastro</div>
		<a>
		
		<!-- Voltar -->
		<button class="cadastraralt" href="painel_inst.php">Voltar</button>
	</form>
</div>
