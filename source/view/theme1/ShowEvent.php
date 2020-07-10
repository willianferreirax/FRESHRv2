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
        <h1 class="nome"> <?= "test1"/*$event->name*/?></h1>
      </div>
    </div>

    <div class="infos">
      <div class="infos2">
      <h1 class='desceve'> <?="test2"/*$evento[11]*/?></h1>
      <br>
      <h1 class='desceve'><?= "test3"/*$evento[16]*/?></h1>
      <br>
      </div>
    </div>

    <div class="infos3">
      <hr class='linha'>
      <br>

      <h1 class='preco'> 
        Preço: 
        <?php
        /*
        if(isset($event->price) && $event->price != "0"){
          echo "RS ".$event->price;
        }
        else{
          echo "Grátis";
        }
        */
        ?>
      </h1>
      <br>

      <h1 class='dataeve'> 
        Período:<br> 
        <?= "test4"/*$evento[2] . ", ". $evento[4] . " até<br> " . $evento[2] . ", ".$evento[5]*/?>
      </h1>
      <br>
      
      <h1 class='endereeve'> 
        <?= "test5"/*$evento[6] . " - " . $evento[8] . ", " . $evento[9]*/ ?> 
      </h1>
      <br>
    </div>

      <br>
      <br>
      
      <a href="listar_eventos.php">
        <button class='voltar'>Voltar</button>
      </a>

      <br>
      <hr style="width: 100%;"><br>

      <h1 class='comenttitle'>Comentários</h1><br>
      <div class='listcoment'>

      </div>
  </div>
</div>