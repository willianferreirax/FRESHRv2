
    <?php
    include 'connection.php';
    $conn = conexao();
    $result1=array();
    $result2=array();

    if(isset($_POST['pesquisa'])){
      $pesquisa = $_POST['pesquisa'];//coisas que a pessoa pode buscar
      $pesquisa = strtoupper($pesquisa);
      $pesquisa = '%'.$pesquisa.'%';
      //informações do evento, interesses do evento,instituições especificas

      //procurando um evento a partir de suas informações
      $select ="select * from evento where upper(nome_evento) like ? or data_inicio like ? or data_termino like ? or hora_inicio like ? or hora_termino like ? or upper(endereco_evento) like ? or upper(bairro_evento) like ? or upper(cidade_evento) like ? or upper(estado_evento) like ? or cep_evento like ? or upper(descricao_evento) like ?";

      $res=$conn->prepare($select);
      $res->bindParam(1,$pesquisa);
      $res->bindParam(2,$pesquisa);
      $res->bindParam(3,$pesquisa);
      $res->bindParam(4,$pesquisa);
      $res->bindParam(5,$pesquisa);
      $res->bindParam(6,$pesquisa);
      $res->bindParam(7,$pesquisa);
      $res->bindParam(8,$pesquisa);
      $res->bindParam(9,$pesquisa);
      $res->bindParam(10,$pesquisa);
      $res->bindParam(11,$pesquisa);

      $res->execute();

      //procurando um evento a partir de seus interesses
      $cod_evento="select cod_evento from interesses_evento where upper(interesseeve1) like ? or upper(interesseeve2) like ? or upper(interesseeve3) like ? or upper(interesseeve4) like ? or upper(interesseeve5) like ? or upper(interesseeve6) like ? or upper(interesseeve7) like ? or upper(interesseeve8) like ? or upper(interesseeve9) like ? or upper(interesseeve10) like ? or upper(interesseeve11) like ? or upper(interesseeve12) like ? or upper(interesseeve13) like ? or upper(interesseeve14) like ? or upper(interesseeve15) like ?";

      $res1=$conn->prepare($cod_evento);
      $res1->bindParam(1,$pesquisa);
      $res1->bindParam(2,$pesquisa);
      $res1->bindParam(3,$pesquisa);
      $res1->bindParam(4,$pesquisa);
      $res1->bindParam(5,$pesquisa);
      $res1->bindParam(6,$pesquisa);
      $res1->bindParam(7,$pesquisa);
      $res1->bindParam(8,$pesquisa);
      $res1->bindParam(9,$pesquisa);
      $res1->bindParam(10,$pesquisa);
      $res1->bindParam(11,$pesquisa);
      $res1->bindParam(12,$pesquisa);
      $res1->bindParam(13,$pesquisa);
      $res1->bindParam(14,$pesquisa);
      $res1->bindParam(15,$pesquisa);

      $res1->execute();

      $result1=$res1->fetchAll();

      foreach($result1 as $row){
        $select2='select * from evento where cod_evento=? order by cod_evento desc';
        $res1=$conn->prepare($select2);
        $res1->bindParam(1,$row['cod_evento']);
        $res1->execute();
        $result1=$res1->fetchAll();//substitui oq está dentro ou adiciona??
      }

      //procurando um evento a partir da instituição que o cadastrou

      $CNPJ="select CNPJ from faculdade where upper(nome_inst) like ?";
      $res2=$conn->prepare($CNPJ);
      $res2->bindParam(1,$pesquisa);
      $res2->execute();
      $result2=$res2->fetchAll();

      foreach($result2 as $row){
        $select3="select * from evento where CNPJ = ? order by cod_evento desc";
        $res2=$conn->prepare($select3);
        $res2->bindParam(1,$row['CNPJ']);
        $res2->execute();
        $result2=$res2->fetchAll();
      }

    }
    else{

      $res=$conn->prepare("select * from evento order by cod_evento desc");
      $res->execute();

    }
    $result = $res->fetchAll();


    ?>

    <body>
      <div class='elem1'>
        <?php
        $codigos=array();
        foreach ($result as $row) {
          array_push($codigos,$row['cod_evento']);
          if($row['visibilidade_evento']==1){
            $imagem ='upload/'.$row['banner_evento'];
            echo "
            <a href='exibir_evento.php?id= $row[cod_evento]'>
            <div class='searchinfo'>
            <img class='imagemres' src='$imagem'>
            <div class=nomeres>
            <h1>$row[nome_evento]</h1>
            <div class=descres>
            <h2>$row[descricao_evento]</h2>
            <div class='enderes'>
            <h2>$row[endereco_evento] | $row[cidade_evento], $row[estado_evento]</div></div></div>
            <div class=precores>
            <h2>";
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
            </a>";
          }
        }
        echo"<br><br>";
        $cont=0;

        foreach ($result1 as $row) {

          for($i=0; $i<count($codigos); $i++){
            if($codigos[$i] == $row['cod_evento']){
              $cont++;
            }
          }

          if($cont == 0){
            array_push($codigos,$row['cod_evento']);
            if($row['visibilidade_evento']==1){
              $imagem ='upload/'.$row['banner_evento'];
              echo "
              <a href='exibir_evento.php?id= $row[cod_evento]'>
              <div class='searchinfo'>
              <img class='imagemres' src='$imagem'>
              <div class=nomeres>
              <h1>$row[nome_evento]</h1>
              <div class=descres>
              <h2>$row[descricao_evento]</h2>
              <div class='enderes'>
              <h2>$row[endereco_evento] | $row[cidade_evento], $row[estado_evento]</div></div></div>
              <div class=precores>
              <h2>";
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
              </a>";
            }
          }

        }
        $cont=0;
        foreach ($result2 as $row) {

          for($i=0; $i<=count($codigos); $i++){
            if(isset($codigos[$i]) && $codigos[$i] == $row['cod_evento']){
              $cont++;
            }
          }
          if($cont == 0){
            array_push($codigos,$row['cod_evento']);
            if($row['visibilidade_evento']==1){
              $imagem ='upload/'.$row['banner_evento'];
              echo "
              <a href='exibir_evento.php?id= $row[cod_evento]'>
              <div class='searchinfo'>
              <img class='imagemres' src='$imagem'>
              <div class=nomeres>
              <h1>$row[nome_evento]</h1>
              <div class=descres>
              <h2>$row[descricao_evento]</h2>
              <div class='enderes'>
              <h2>$row[endereco_evento] | $row[cidade_evento], $row[estado_evento]</div></div></div>
              <div class=precores>
              <h2>";
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
              </a>";
            }
          }
        }
        echo "<br>";
        ?>
      </div>
      
