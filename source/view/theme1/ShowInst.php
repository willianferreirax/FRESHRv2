<?php $v->start("css"); ?>
  <link rel="stylesheet" href="<?=asset('css/panel_inst.css')?>">
  <link rel="stylesheet" href="<?=asset('css/style.css')?>">
  <link rel="stylesheet" href="<?=asset('css/exibir_inst.css')?>">
<?php $v->end(); ?>

  <div class='statsdiv'>
    <?php
    echo "<h1 class='imageuser'>".substr($faculdade[0], 0, strlen($faculdade[0]) - (strlen($faculdade[0])-4))."</h1>";
    ?>
    <?php
    echo"<div class='username'>".$faculdade[0]."</div>";

    echo"<br><br><div class='useremail'>".$faculdade[6]."</div><br>";
    echo"<div class='useremail'>Telefone: ".$faculdade[7]."</div>";
    echo"<div class='useremail'>Endereço: ".$faculdade[1].", ".$faculdade[2].", ".$faculdade[3]." - ".$faculdade[4]."</div>";
    echo"<div class='useremail'>CEP: ".$faculdade[5]."</div>";

    echo "<div class='title'>Eventos atuais</div>";

    
    echo "<div class='title'>Eventos passados</div>";
    
  
    ?>
  </div>

</center>

</body>
</html>