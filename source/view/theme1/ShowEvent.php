<?php $v->layout("theme1/_theme"); ?>

<?php $v->start("css"); ?>
  <link rel="stylesheet" href="<?=asset('css/exibir.css')?>">
  <link rel="stylesheet" href="<?=asset('css/style.css')?>">
<?php $v->end(); ?>

<div class='elem1'>

  <div class="infocontainer">
    <img class="banner" src="<?='upload/'.$event->thumb?>" draggable="false">

    <div class="info1">
      <div class="topo">
        <h1 class="nome">Nome: <?=$event->event_name?></h1>
      </div>
    </div>

    <div class="infos">
      <div class="infos2">
      <h1 class='desceve'>Descrição: <?=$event->description?></h1>
      <br>
      <h1 class='desceve'>Detalhes: <?=$event->detail?></h1>
      <br>
      </div>
    </div>

    <div class="infos3">
      <hr class='linha'>
      <br>
      <h1 class='preco'> 
        Preço: <?=$event->price?>
      </h1>
      <br>

      <h1 class='dataeve'> 
        Período:<br> 
        <?= $event->date_begin . ", ".$event->hour_begin ." até<br> " . $event->date_end . ", ".$event->hour_end?>
      </h1>
      <br>
      
      <h1 class='endereeve'> 
        <?=$event->address . " - " . $event->city . ", " . $event->state?> 
      </h1>
      <br>
    </div>

      <br>
      <br>
      
      <a href= <?=$router->route("web.allEvent")?>>
        <button class='voltar'>Voltar</button>
      </a>

      <br>
      <hr style="width: 100%;"><br>

      <h1 class='comenttitle'>Comentários</h1><br>
      <div class='listcoment'>

      </div>
  </div>
</div>