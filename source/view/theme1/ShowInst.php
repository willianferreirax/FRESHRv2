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

    if(isset($_SESSION['usuario'])){
      $result = $conn->prepare("select * from seguir where cod_usuario = {$_SESSION['usuario'][3]} and CNPJ = '$id'");
      $result->execute();

      if($result->fetchColumn() > 0){
        echo "<a href='exibir_inst.php?id=$id&seguir=true'><button class='deixardeseguir'>Deixar de seguir <i class='fas fa-check-double' id='followicon'></i></button><br></a>";
      }
      elseif($result->fetchColumn() == 0){
        echo "<a href='exibir_inst.php?id=$id&seguir=true'><button class='seguir'>Seguir <i class='fas fa-check-double' id='followicon'></i></button><br></a>";
      }

    }
    else{
      echo "<small>".$faculdade[8]." pessoa(s) segue(m) essa instituição</small><br>";
    }

    echo"<br><br><div class='useremail'>".$faculdade[6]."</div><br>";
    echo"<div class='useremail'>Telefone: ".$faculdade[7]."</div>";
    echo"<div class='useremail'>Endereço: ".$faculdade[1].", ".$faculdade[2].", ".$faculdade[3]." - ".$faculdade[4]."</div>";
    echo"<div class='useremail'>CEP: ".$faculdade[5]."</div>";

    echo "<div class='title'>Eventos atuais</div>";

    if(isset($atuais) && count($atuais) != 0){
      foreach($atuais as $row){
        $imagem ='upload/'.$row['banner_evento'];
        echo "
        <div class='elem1'>
        <a href='exibir_evento.php?id= $row[cod_evento]'>
        <div class='searchinfo'>
        <img class='imagemres' src='$imagem'>
        <div class='nomeres'>
        <h1 class='nomeres'>$row[nome_evento]</h1>
        <div class='descres'>
        <h2 class='descres'>$row[descricao_evento]</h2>
        <div class='enderes'>
        <h2 class='enderes'>$row[endereco_evento] | $row[cidade_evento], $row[estado_evento]</div></div></div>
        <div class='precores'>
        <h2 class='precores'>";
        $precoval = $row['preco_evento'];
        if(isset($row['preco_evento']) && $precoval != "0,0" && $precoval != "0,00" && $precoval != "0"){
          echo "R$$row[preco_evento]";
        }
        else{
          echo "Grátis";
        }
        echo"
        </h2>
        </div>
        </div>
        </a>
        </div>";
      }
    }
    else{
      echo "<h1 class='avisoevent'>Não há eventos criados ainda.</h1>";
    }
    ?>

    <?php
    echo "<div class='title'>Eventos passados</div>";
    if(isset($passados) && count($passados) != 0){
      foreach($passados as $row){
        $imagem ='upload/'.$row['banner_evento'];
        echo "
        <div class='elem1'>
        <a href='exibir_evento.php?id= $row[cod_evento]'>
        <div class='searchinfo'>
        <img class='imagemres' src='$imagem'>
        <div class='nomeres'>
        <h1 class='nomeres'>$row[nome_evento]</h1>
        <div class='descres'>
        <h2 class='descres'>$row[descricao_evento]</h2>
        <div class='enderes'>
        <h2 class='enderes'>$row[endereco_evento] | $row[cidade_evento], $row[estado_evento]</div></div></div>
        <div class='precores'>
        <h2 class='precores'>";
        $precoval = $row['preco_evento'];
        if(isset($row['preco_evento']) && $precoval != "0,0" && $precoval != "0,00" && $precoval != "0"){
          echo "R$$row[preco_evento]";
        }
        else{
          echo "Grátis";
        }
        echo"
        </h2>
        </div>
        </div>
        </a>
        </div>";
      }
    }
    else{
      echo "<h1 class='avisoevent'>Essa instituição não promoveu nenhum evento.</h1>";
    }

    ?>
  </div>

</center>

</body>
</html>