<?php $v->layout("theme1/_theme"); ?>

<?php $v->start("css"); ?>
	<link rel="stylesheet" href="<?=asset('css/index.css')?>">
	<link rel="stylesheet" href="<?=asset('css/config.css')?>">
	<link rel="stylesheet" href="<?=asset('css/style.min.css')?>">
<?php $v->end(); ?>

<?php $v->start("body"); ?>
	<body class='background'>
<?php $v->end(); ?>

<?php $v->start("scripts"); ?>
	<script src="<?='a'//asset('js/form.js')?>"></script>
	<script src="<?=asset('js/jquery.js')?>"></script>
<?php $v->end(); ?>

<div class='statsdiv'>
	<h1 class='title'>Minhas informações</h1>
	
	<form action="<?=$router->route("appUser.update")?>" method="POST">

		<div class="login_form_callback">
			
		</div>

		<!-- NOME -->
		<label><b>Nome:</b></label>
		<input type="text" name="name"  value="">
		
		<label><b>Sobrenome:</b></label>
		<input type='text' name='last_name' placeholder='Novo Sobrenome'>
		
		<input class="cadastrar" type="submit" name="update_name" value="alterar">
		<br>

		<!-- EMAIL -->
		<label><b>Email:</b></label>
		<input type="text" name="email" placeholder="Novo email">
	
		<input class="cadastrar" type="submit" name="update_email" value="Alterar">
		<br>	

		<!-- SENHA -->
		<label><b>Senha:</b></label>
		<input type="password" name="pass" placeholder="Nova senha">

		<label><b>Confirmar senha:</b></label>
		<input type='password' name='confirm' placeholder='Repita a nova senha'>
		
		<input class="cadastrar" type="submit" name="update_pass" value="Alterar">
		
		<!-- DELETAR CONTA -->
		<a style="color: red; text-decoration: none !important;" href="javascript: if(confirm('Deseja realmente excluir sua conta? Essa ação é irreversivel!')) location.href='deletar_cadastro.php';">
			<div class="excluircad"><i class="far fa-trash-alt"></i>Excluir cadastro</div>
		</a>
		
		<!-- Voltar -->
		<button class="cadastraralt" href="<?=$router->route("appUser.userPanel")?>">Voltar</button>
	</form>
	
</div>
