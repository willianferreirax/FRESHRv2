<?php $v->layout("theme1/_theme"); ?>

<?php $v->start("css"); ?>
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

<center>
  <div class='elem1'>

    <?php foreach($all as $event){ ?>
        
        <div class='test'>
          <p> <?=$event->event_name?> </p>
          <p> <?=$event->address?> </p>
          <p> <?=$event->description?> </p>
          <p> <?=$event->city?> </p>
          <p> <?=$event->state?> </p>
        </div>
        
        <a href=<?=$router->route('web.showEvent',['id'=>$event->cod_event])?>>link</a>
        
      <?php }?>
  

    <?= $pager->render()?>
  </div>
</center>
