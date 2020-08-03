<?php $v->layout("theme1/_theme"); ?>

<?php $v->start("css"); ?>
<link rel="stylesheet" href="<?=asset('css/index.css')?>">
<?php $v->end(); ?>

<?php $v->start("scripts"); ?>
<script type='text/javascript' src="<?=asset('js/jquery.js')?>"></script>
<?php $v->end(); ?>

<center>
<?php $v->start("search"); ?>

	<form action=<?=$router->route("web.search")?> id='formsearch' method="post" class='searchform'>
		<input type='checkbox' id='searchcheck'>
		<label for='searchcheck' id='iconmobile' onclick="transform()" class='searchlabel'><i class="fas fa-search"></i></label>
		
		<div class='search'>
			<input type='text' name='search-text' placeholder='Pesquisar eventos...' class='searchbar'>
			<input type='submit' id='enviar' name='search'><label for='enviar' id ='iconenviar' class="fas fa-search fa-1x"></label>
		</div>
	</form>

<?php $v->end(); ?>

<div class='statsdiv'>
	<h1 class='logoindex'>FRESHR</h1>
	<h2 class='slogan'>Uma visão de prosperidade para a sua carreira</h2>
	<h3 class='descricao' name='desc' id='desc'>Busque eventos, palestras e feiras profissionais ao seu alcance. <br>Qualifique-se!</h3>
	
	<?php
		if(isset($_SESSION['user'])){

			echo 'voce está logado USUARIO';
			echo $_SESSION['user'];
		}
		elseif(isset($_SESSION['inst'])){
			echo 'voce esta logado INST';
			echo $_SESSION['inst'];
		}
		else{
			echo "<a href=".$router->route("web.cadChoose")."><button class='cadastrar'>Cadastre-se</button></a>";
			echo "<a href=".$router->route("web.login")."><button class='cadastraralt'>Entrar</button></a>";
		}
	?>
</div>
</center>
