<?php $v->layout("theme1/_theme"); ?>

<?php $v->start("css"); ?>
  <link rel="stylesheet" href="<?=asset('css/instituicoes.css')?>">
  <link rel="stylesheet" href="<?=asset('css/paginator.css')?>">
  <link rel="stylesheet" href="<?=asset('css/search.css')?>">     
<?php $v->end(); ?>

<?php $v->start("search"); ?>

	<form action="listar_eventos.php" id='formsearch' method="post" class='searchform'>
		<input type='checkbox' id='searchcheck'>
		<label for='searchcheck' id='iconmobile' onclick="transform()" class='searchlabel'><i class="fas fa-search"></i></label>
		
		<div class='search'>
			<input type='text' name='pesquisa' placeholder='Pesquisar eventos...' class='searchbar'>
			<input type='submit' id='enviar'><label for='enviar' id ='iconenviar' class="fas fa-search fa-1x"></label>
    </div>
    
	</form>

<?php $v->end(); ?>


<div class='elem1'>
 
  <?php
    foreach($all as $inst){
      echo "
      <p>{$inst->name}</p>
      <p>{$inst->address}</p>
      <p>{$inst->phone}</p>
      <p>{$inst->city}</p>
      <p>{$inst->state}</p>
      ";
    }
  ?>
  <?= "<a href={$router->route('web.showInst',['id'=>$inst->cod_inst])}>link</a>"?>

  <?= $pager->render()?>
  
</div>