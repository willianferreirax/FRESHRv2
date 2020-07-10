<?php $v->layout("theme1/_theme"); ?>

<?php $v->start("css"); ?>
  <link rel="stylesheet" href="<?=asset('css/panel_inst.css')?>">
<?php $v->end(); ?>

<?php $v->start("body"); ?>
  <body class='background'>
<?php $v->end(); ?>

<div class='statsdiv'>

  <?="<div class='imageuser'>".substr($inst->name, 0, strlen($inst->name) - (strlen($inst->name)-4))."</div>"?>

  <?="<h1 class='username'>Olá, ".$inst->name."</h1>";?>
  
  <h2 class='title no-float'>
    Meus Eventos
  </h2>

  <div class='box'>
  </div>

  <div class='box'>

  </div>
  <div class='box'>

  </div>
  

  <div class='cadastrarevent'>
    <a href=<?=$router->route('web.createEvent')?>>
      <button>Criar evento</button>
    </a>
  </div>

  <div class="config">

  </div>

</div>