<?php
  

    if(isset($_POST['pesquisa'])){
      $pesquisa = $_POST['pesquisa'];//coisas que a pessoa pode buscar
      $pesquisa = strtoupper($pesquisa);
      $pesquisa = '%'.$pesquisa.'%';
      //informações do evento, interesses do evento,instituições especificas

      //procurando um evento a partir de suas informações
      $select ="select * from evento where upper(nome_evento) like ? or data_inicio like ? or data_termino like ? or hora_inicio like ? or hora_termino like ? or upper(endereco_evento) like ? or upper(bairro_evento) like ? or upper(cidade_evento) like ? or upper(estado_evento) like ? or cep_evento like ? or upper(descricao_evento) like ?";

     
      $res->execute();

      //procurando um evento a partir de seus interesses
      $cod_evento="select cod_evento from interesses_evento where upper(interesseeve1) like ? or upper(interesseeve2) like ? or upper(interesseeve3) like ? or upper(interesseeve4) like ? or upper(interesseeve5) like ? or upper(interesseeve6) like ? or upper(interesseeve7) like ? or upper(interesseeve8) like ? or upper(interesseeve9) like ? or upper(interesseeve10) like ? or upper(interesseeve11) like ? or upper(interesseeve12) like ? or upper(interesseeve13) like ? or upper(interesseeve14) like ? or upper(interesseeve15) like ?";

     
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
           
          }
        }
        echo"<br><br>";
        $cont=0;

        