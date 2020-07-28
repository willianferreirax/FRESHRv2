<?php $v->layout("theme1/_theme"); ?>

<?php $v->start("css"); ?>
  <link rel="stylesheet" href="<?=asset('css/panel_inst.css')?>">
  <link rel="stylesheet" href="<?=asset('css/style.css')?>">
  <link rel="stylesheet" href="<?=asset('css/exibir_inst.css')?>">
<?php $v->end(); ?>

  <div class='statsdiv'>
    <h1 class='imageuser'><?= substr($inst->name, 0, strlen($inst->name) - (strlen($inst->name)-4)) ?></h1>
    <div class='username'><?= $inst->name ?></div>

    <br><br>
    <div class='useremail'><?= $inst->email ?></div><br>
    <div class='useremail'>Telefone: <?= $inst->phone ?></div>
    <div class='useremail'>Endereço: <?= $inst->address.", ".$inst->neighbor.", ".$inst->city." - ".$inst->state ?></div>
    <div class='useremail'>CEP: <?= $inst->cep ?></div>

    <div class='title'>Eventos
    
    <?php foreach($events as $event){ ?>    
            <div>
            <p> <?=$event->event_name?> </p>
            <p> <?=$event->address?> </p>
            <p> <?=$event->description?> </p>
            <p> <?=$event->city?> </p>
            <p> <?=$event->state?> </p>
            </div>

            <a href=<?=$router->route('web.showEvent',['id'=>$event->cod_event])?>>link</a>
    <?php } ?>

    
    </div>
     
  </div>
