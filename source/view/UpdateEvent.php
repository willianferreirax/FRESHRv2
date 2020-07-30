<?php
include 'connection.php';
session_start();
if(!$_SESSION['instituicao']){
  header('location:login.php');
  exit();
}
else{
  $id=$_GET['id_eve'];
  $conn=conexao();
  $select="select * from evento where cod_evento = {$id}";
  $res = $conn->prepare($select);//preparando query
  $res->execute();//executando
  $result = $res->fetchAll();

  $select="select * from interesses_evento where cod_evento={$id}";
  $res1 = $conn->prepare($select);
  $res1->execute();
  $selecionados= $res1->fetchAll();

}

?>
<!DOCTYPE html>
<html lang="pt_br">
<head>
  <!-- Required meta tags -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
  <meta charset="utf-8">
  <meta name="description" content="Junte-se ao FRESHR. Uma visão de prosperidade para a sua carreira.">
  <meta name="keywords" content="FRESHR, Eventos, Buscar, Profissão, Alterar evento, Currículo, Experiência, Conhecimento">
  <meta name="robots" content="Alterar evento, follow">
  <meta name="author" content="Iago Pereira, Lucas Campanelli, Nicholas Campanelli, Renato Melo, Willian Ferreira">
  <link rel="stylesheet" href="css/eventoinfo.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://kit.fontawesome.com/337796870f.js"></script>
  <link rel="icon" href="images/icon.png">
  <meta name="viewport" content="width=device-width">
  <meta name="theme-color" content="#162573">
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <title><?php echo $result[0]['nome_evento'];?> - FRESHR</title>
</head>
<body class='bgindex'>

  <?php
  if(isset($_REQUEST["validar"]) && $_REQUEST["validar"] == true){
    $conn=conexao();
    $erro = null;
    $coderro = null;
    $valido = false;

    if(strlen(utf8_decode($_POST["nome"])) < 1 || strlen(utf8_decode($_POST["nome"])) > 255) {
      $erro = " digite um nome válido.";
      $coderro = 1;
    }

    elseif(strlen(utf8_decode($_POST["dateinic"])) <10 || strlen(utf8_decode($_POST["dateinic"])) > 10) {
      $erro = " selecione uma data de inicio do evento.";
      $coderro = 3;
    }

    elseif(strlen(utf8_decode($_POST["datefinal"])) < 10 || strlen(utf8_decode($_POST["datefinal"])) > 10){
      $erro = "selecione uma data de termino do eventto.";
      $coderro = 4;
    }

    elseif(strtotime($_POST['dateinic']) > strtotime($_POST['datefinal'])){
      $erro = "A data de inicio é posterior à data de termino. Selecione de maneira correta";
      $coderro = 5;
    }

    elseif(strlen(utf8_decode($_POST["endereco"])) < 3 || strlen(utf8_decode($_POST["endereco"])) > 150){
      $erro = " digite um endereço valido(Mínimo 5 caracateres)";
      $coderro = 9;
    }
    elseif(strlen(utf8_decode($_POST["bairro"])) < 2 || strlen(utf8_decode($_POST["bairro"])) > 100){
      $erro = " digite um bairro válido (Mínimo 3 caracteres)";
      $coderro = 10;
    }
    elseif(strlen(utf8_decode($_POST["cidade"])) < 1 || strlen(utf8_decode($_POST["cidade"])) > 100){
      $erro = " digite uma cidade válida (Mínimo 1 caractere) ";
      $coderro = 11;
    }
    elseif(strlen(utf8_decode($_POST["estado"])) < 1 || strlen(utf8_decode($_POST["estado"])) > 2){
      $erro = " selecione o estado onde acontecerá o evento";
      $coderro = 12;
    }
    elseif(strlen(utf8_decode($_POST["cep"])) != 9) {
      $erro = " digite um cep válido";
      $coderro = 13;
    }
    elseif(strlen(utf8_decode($_POST["desc"])) < 1 || strlen(utf8_decode($_POST["desc"])) > 200){
      $erro = " digite uma descrição válida (Mínimo de 1 caractere)";
      $coderro = 14;
    }
    elseif(strtotime($_POST['dateinic'])<strtotime(date('Y-m-d'))){
      $erro=" a data de início já passou, insira outro valor.";
      $coderro = 15;
    }
    elseif(strlen(utf8_decode($_POST["preco"])) == "") {
      $erro = " defina um preço para o evento.";
      $coderro = 16;
    }
    elseif(strlen(utf8_decode($_POST["detalhe"])) == "") {
      $erro = " escreva todos os detalhes do seu evento.";
      $coderro = 17;
    }

    else{

		if(isset($_FILES['arquivo']['tmp_name']) && $_FILES['arquivo']['tmp_name']!=''){
		  $ext = strtolower(substr($_FILES['arquivo']['name'], -4));
		  $novo_nome = md5(time()).$ext;
		  $dir = "upload/";
		  move_uploaded_file($_FILES['arquivo']['tmp_name'], $dir.$novo_nome);

		  $valido = true;
		}
		else{
			$novo_nome = $result[0]['banner_evento'];
			$valido = true;
		}
    }

  }

  if(isset($valido) && $valido == true){

    $update = 'update evento set nome_evento = ? ,data_inicio = ? ,data_termino = ? ,hora_inicio = ? ,hora_termino = ? ,endereco_evento = ? ,bairro_evento = ? , cidade_evento = ? ,estado_evento = ? ,cep_evento = ? ,descricao_evento = ?, preco_evento = ?, detalhes_evento = ?, banner_evento = ? where cod_evento = ?';
    $stmt = $conn->prepare($update);

    //Atrelando os dados às tabelas
    $stmt->bindValue(1, $_POST["nome"]);
    $stmt->bindValue(2, $_POST["dateinic"]);
    $stmt->bindValue(3, $_POST["datefinal"]);
    $stmt->bindValue(4,$_POST["timeinic"]);
    $stmt->bindValue(5,$_POST["timefinal"]);
    $stmt->bindValue(6,$_POST["endereco"]);
    $stmt->bindValue(7,$_POST["bairro"]);
    $stmt->bindValue(8,$_POST["cidade"]);
    $stmt->bindValue(9,$_POST["estado"]);
    $stmt->bindValue(10,$_POST["cep"]);
    $stmt->bindValue(11,$_POST["desc"]);
    $stmt->bindValue(12,$_POST["preco"]);
    $stmt->bindValue(13,$_POST["detalhe"]);
    $stmt->bindValue(14,$novo_nome);
    $stmt->bindValue(15,$id);


    $stmt->execute();

    if($stmt->errorCode() != "00000"){
      $erro = "Erro código " . $stmt->errorCode() . ": ";
      $erro .= implode(", ", $stmt->errorInfo());
      echo $erro;
    } //Exibir erro de comunicação com o banco de dados
    else{

      $update = "update interesses_evento set interesseeve1 =?, interesseeve2 =?, interesseeve3 =?, interesseeve4 =?, interesseeve5 =?,interesseeve6 =?,interesseeve7 =?,interesseeve8 =?,interesseeve9 =?,interesseeve10 =?,interesseeve11 =?,interesseeve12 =?,interesseeve13 =?,interesseeve14 =?,interesseeve15=? where cod_evento = ?";

      $_interesse = $_POST['intchk'];
      //RECOLHENDO O INTERESSE1
      $count=0;
      for($i =0;$i<16;$i++){
        $count++;
        if(isset($_interesse[$i]) && $_interesse[$i] == 1){
          $interesse[$i] = "Informação e Tecnologia";
        }
        else if(isset($_interesse[$i]) && $_interesse[$i] == 2){
          $interesse[$i] = "Logística";
        }
        else if(isset($_interesse[$i]) && $_interesse[$i] == 3){
          $interesse[$i] = "Saúde";
        }
        else if(isset($_interesse[$i]) && $_interesse[$i] == 4){
          $interesse[$i] = "Engenharia";
        }
        else if(isset($_interesse[$i]) && $_interesse[$i] == 5){
          $interesse[$i] = "Administração e Negócios";
        }
        else if(isset($_interesse[$i]) && $_interesse[$i] == 6){
          $interesse[$i] = "Comunicação";
        }
        else if(isset($_interesse[$i]) && $_interesse[$i] == 7){
          $interesse[$i] = "Arte e Design";
        }
        else if(isset($_interesse[$i]) && $_interesse[$i] == 8){
          $interesse[$i] = "Direito";
        }
        else if(isset($_interesse[$i]) && $_interesse[$i] == 9){
          $interesse[$i] = "Educação";
        }
        else if(isset($_interesse[$i]) && $_interesse[$i] == 10){
          $interesse[$i] = "Turismo";
        }
        else if(isset($_interesse[$i]) && $_interesse[$i] == 11){
          $interesse[$i] = "Gastronomia";
        }
        else if(isset($_interesse[$i]) && $_interesse[$i] == 12){
          $interesse[$i] = "Ciências Exatas e Biológicas";
        }
        else if(isset($_interesse[$i]) && $_interesse[$i] == 13){
          $interesse[$i] = "Ciências Sociais e Humanas";
        }
        else if(isset($_interesse[$i]) && $_interesse[$i] == 14){
          $interesse[$i] = "Música";
        }
        else if(isset($_interesse[$i]) && $_interesse[$i] == 15){
          $interesse[$i] = $_POST["int15"];
        }
        else{
          $interesse[$i] = null;
        }
      }

      $stmt=$conn->prepare($update);

      //criando a quantidade de atrelamentos de acordo com a quantidade de interesses selecionados
      for($i=0;$i<$count-1;$i++){
        $stmt->bindValue($i+1, $interesse[$i]);

      }
      $stmt->bindValue(16, $id);
      $stmt->execute();
    }

    $script = "<script language='javascript'>
    location.href='painel_inst.php';
    alert('Evento editado com sucesso.');
    </script>";
    echo $script;
  }

  ?>

  <center>
    <input type='checkbox' id='dropcheck'>
    <input type='checkbox' id='chec'>
    <label for='chec' class='backdiv'></label>
    <div class='icons'>
      <a href='index.php'><i class="fas fa-home fa-2x"></i></a><br>
      <a href='listar_eventos.php'><i class="fas fa-map-marked fa-2x"></i></a><br>
      <a href='listar_inst.php'><i class="fas fa-users fa-2x"></i></a><br>
      <a href='sobre.php'><i class="fas fa-info fa-2x"></i></a><br>
      <a href='ajuda.php'><i class="fas fa-question fa-2x"></i></a><br>
      <hr>
    </div>
    <nav>
      <div class='menulist'>
        <a href='index.php'><div class='b1'>Página inicial</div></a>
        <a href='listar_eventos.php'><div class='b2'>Eventos</div></a>
        <a href='listar_inst.php'><div class='b3'>Instituição</div></a>
        <a href='sobre.php'><div class='b4'>Sobre nós</div></a>
        <a href='ajuda.php'><div class='b5'>Ajuda</div></a>
      </div>
      <label for='chec' class='backdiv'></label>
    </nav>

    <div class='dropdown'>
      <?php
      if(isset($_SESSION['usuario']))
      {
        echo "<h1 class='imageuser'>".substr($_SESSION['usuario'][0], 0, strlen($_SESSION['usuario'][0]) - (strlen($_SESSION['usuario'][0])-1))."".substr($_SESSION['usuario'][4], 0, strlen($_SESSION['usuario'][4]) - (strlen
        ($_SESSION['usuario'][4])-1))."</h1>";
      }

      if(isset($_SESSION['instituicao']))
      {
        echo "<h1 class='imageuser'>".substr($_SESSION['instituicao'][0], 0, strlen($_SESSION['instituicao'][0]) - (strlen($_SESSION['instituicao'][0])-4))."</h1>";
      }
      ?>
      <br>

      <?php
      if(isset($_SESSION['instituicao'][0])){
        echo "<a href='painel_inst.php' class='account'>Minha Conta</a>";
      }
      else{
        echo "<a href='painel_usuario.php' class='account'>Minha Conta</a>";
      }
      ?>

      <br>
      <a href='config.php' class='account'>Configurações</a>
      <br>
      <a href='ajuda.php' class='account'>Ajuda</a>
      <br>
      <br>
      <a href='logout_script.php' class='exit'>Sair</a>
    </div>

    <header class='cabecalhoindex' id='grid'>

      <div class='menudiv'>
        <div class='menubtn'>
          <label for='chec' class='labelchec'><i class="fas fa-bars fa-2x"></i></i></label>
        </div>
        <a href='index.php'><h1 class='logoeheader'>FRESHR</h1></a>
      </div>
      <div class='pesquisarbtn'>

      </div>

      <div class='userdiv'>
        <?php
        if(isset($_SESSION['instituicao'])){
          echo "<label for='dropcheck' class='dropcheck'><div class='userbtn'><i class='fas fa-user-circle fa-2x'></i>
          </div></label>";
        }
        else{
          echo "<div class='userbtn'><a href='login.php'><i class='fas fa-user-circle fa-2x'></i></a>
          </div>";
        }
        ?>
      </div>

    </header>
    <div class='elem1'>
      <div class="icontainer">
        <form name='criareventoform' method="POST" action=<?php echo"?validar=true?&id_eve=$id";?> enctype="multipart/form-data">
          <div class="form-group" id='imageup'>
            <label for="exampleFormControlFile1" style="width: 100%; height: 100%; border: none;">
              <img class='imagevis' src="upload/<?php echo $result[0]['banner_evento'];?>"></label>
              <input type="file" class="form-control-file" id="exampleFormControlFile1" name='arquivo'><div class="aviso">Para uma melhor experiência do usuário, o banner do evento deve ter <br>as medidas de <b>1280x540</b> ou a proporção <b>21:9</b> <br> <br>(Caso contrário, ele será cortado e redimensionado.)</div>
            </div>
            <div class="nomeev">
              <label class='labelint'>Dê um <b>nome</b> ao seu evento:</label><br>
              <?php
              if (isset($erro)) {
                if($coderro == 1){
                  echo "<div class='erro'>Por gentileza,".$erro."</div><br>";
                }
              }
              ?>
              <input class='inputcreate' id='createnome' type='text' name='nome' value='<?php echo $result[0]['nome_evento'];?>'><center><hr></center><br>
            </div>

            <div class="info1">
              <div class="infos">

                <label class='labelint'>Dê uma breve descrição para atrair o público para o seu evento</label><br>
                <?php
                if(isset($coderro) && $coderro == 14){
                  echo "<div class='erro'>Por gentileza,".$erro."</div><br>";
                }
                ?>
                <textarea draggable="false" placeholder="Venha e participe do evento mais esperado do ano!" name='desc' maxlength="149"><?php echo $result[0]['descricao_evento'];?></textarea>

                <label class='labelint'>Quando o evento irá <b>começar</b>?</label>
                <?php
                if (isset($erro)) {
                  if($coderro == 3){
                    echo "<div class='erro'>Por gentileza,".$erro."</div><br>";
                  }
                }
                ?>
                <?php
                if(isset($coderro) && $coderro == 5){
                  echo "<div class='erro'>Por gentileza,".$erro."</div><br>";
                }
                ?>
                <?php
                if(isset($coderro) && $coderro == 15){
                  echo "<div class='erro'>Por gentileza,".$erro."</div><br>";
                }
                ?>
                <input class='inputcreate' type='date' name='dateinic' value='<?php echo $result[0]['data_inicio'];?>'>
                <label class='labelint'>Quando o evento irá <b>acabar</b>?</label>
                <?php
                if(isset($coderro) && $coderro == 4){
                  echo "<div class='erro'>Por gentileza,".$erro."</div><br>";
                }
                ?>
                <input class='inputcreate' type='date' name='datefinal' value='<?php echo $result[0]['data_termino'];?>'>

                <label class='labelint'>Informe o horário que o evento <b>inciará</b>:</label>
                <?php
                if(isset($coderro) && $coderro == 6){
                  echo "<div class='erro'>Por gentileza,".$erro."</div><br>";
                }
                ?>
                <input class='inputcreate' type='time' name='timeinic' value='<?php echo $result[0]['hora_inicio'];?>'>

                <label class='labelint'>Informe o horário que o evento <b>encerrará</b>:</label>
                <?php
                if(isset($coderro) && $coderro == 7){
                  echo "<div class='erro'>Por gentileza,".$erro."</div><br>";
                }
                ?>
                <input class='inputcreate' type='time' name='timefinal' value='<?php echo $result[0]['hora_termino'];?>'>

                <label class='labelint'>Qual o <b>preço</b> do evento?</label><br>
                <?php
                if(isset($coderro) && $coderro == 16){
                  echo "<div class='erro'>Por gentileza,".$erro."</div><br>";
                }
                ?>
                <label for='preco' class='precocifra'>R$</label><input class='inputcreate' type='tel' id='preco' name='preco' value='<?php echo $result[0]['preco_evento']; ?>' onkeypress="mascara('preco' , window.event.keyCode , 'document.criareventoform.preco'); return blokletras(event);">

              </div>
              <div class="endereco">

                <div class='detalhe'>
                  <label class='labelint'>Nesse campo você deve informar todos os detalhes possíveis do evento</label><br>
                  <?php
                  if(isset($coderro) && $coderro == 17){
                    echo "<div class='erro'>Por gentileza,".$erro."</div><br>";
                  }
                  ?>
                  <textarea draggable="false" placeholder="A feira tecnológica ocorrerá nos dias 5, 6 e 7 de novembro. No dia 5 iniciará às 20 horas e terminará as 22 horas. Nos dias 6 e 7 inciará às 7 horas e encerrará às 22 horas. A entrada será na rua Dr. Almeida Lima. O preço é gratuito a partir das 20 horas. Para maiores informações, telefone. Junte-se ao grupo de pessoas com mentes abertas para um novo futuro!" name='detalhe' maxlength="500"><?php echo $result[0]['detalhes_evento']?></textarea>
                </div>

                <label class='labelint'>Informe o <b>logradouro</b> do evento:</label>
                <?php
                if(isset($coderro) && $coderro == 9){
                  echo "<div class='erro'>Por gentileza,".$erro."</div><br>";
                }
                ?>
                <input class='inputcreate' type='text' name='endereco' value='<?php $endereco = $result[0]['endereco_evento']; echo $endereco;?>'>

                <label class='labelint'>Qual <b>bairro</b> o evento ocorrerá?</label>
                <?php
                if(isset($coderro) && $coderro == 10){
                  echo "<div class='erro'>Por gentileza,".$erro."</div><br>";
                }
                ?>
                <input class='inputcreate' type='text' name='bairro' value='<?php echo $result[0]['bairro_evento'];?>'>

                <label class='labelint'>Qual <b>cidade</b> o evento ocorrerá?</label>
                <?php
                if(isset($coderro) && $coderro == 11){
                  echo "<div class='erro'>Por gentileza,".$erro."</div><br>";
                }
                ?>
                <input class='inputcreate' type='text' name='cidade' value='<?php echo $result[0]['cidade_evento'];?>'>

                <label class='labelint'>Qual <b>estado</b> o evento ocorrerá?</label><br>
                <?php
                if(isset($coderro) && $coderro == 12){
                  echo "<div class='erro'>Por gentileza,".$erro."</div><br>";
                }
                ?>
                <select name="estado">
                  <option value=<?php echo $result[0]['estado_evento'];?> selected><?php echo $result[0]['estado_evento'];?></option>
                  <option value="AC">Acre</option>
                  <option value="AL">Alagoas</option>
                  <option value="AP">Amapá</option>
                  <option value="AM">Amazonas</option>
                  <option value="BA">Bahia</option>
                  <option value="CE">Ceará</option>
                  <option value="DF">Distrito Federal</option>
                  <option value="ES">Espirito Santo</option>
                  <option value="GO">Goiás</option>
                  <option value="MA">Maranhão</option>
                  <option value="MT">Mato Grosso</option>
                  <option value="MS">Mato Grosso do Sul</option>
                  <option value="MG">Minas Gerais</option>
                  <option value="PA">Pará</option>
                  <option value="PB">Paraíba</option>
                  <option value="PR">Paraná</option>
                  <option value="PE">Pernambuco</option>
                  <option value="PI">Piauí</option>
                  <option value="RJ">Rio de Janeiro</option>
                  <option value="RJ">Rio Grande do Norte</option>
                  <option value="RS">Rio grande do sul</option>
                  <option value="RO">Rondônia</option>
                  <option value="RR">Roraima</option>
                  <option value="SC">Santa Catarina</option>
                  <option value="SP">São Paulo</option>
                  <option value="SE">Sergipe</option>
                  <option value="TO">Tocantins</option>
                </select><br>

                <label class='labelint'>Agora, digite o <b>CEP</b>:</label>
                <?php
                if(isset($coderro) && $coderro == 13){
                  echo "<div class='erro'>Por gentileza,".$erro."</div><br>";
                }
                ?>
                <input class='inputcreate' type='text' name='cep' value='<?php echo $result[0]['cep_evento'];?>'>
              </div>
            </div>
            <center>
              <br>
              <br>
              <div class='interesses'>
                <input type="checkbox" id='bti1' class='chkint' value=1  name='intchk[]'>
                <label for='bti1' class='interesse1' id='int1'>

                  Informação e Tecnologia
                </label>
                <input type="checkbox" id='bti2' class='chkint' value=2  name='intchk[]'>
                <label for='bti2' class='interesse2' id='int2'>
                  Logística
                </label>
                <input type="checkbox" id='bti3' class='chkint' value=3  name='intchk[]'>
                <label for='bti3' class='interesse3' id='int3'>
                  Saúde
                </label>
                <input type="checkbox" id='bti4' class='chkint' value=4  name='intchk[]'>
                <label for='bti4' class='interesse4' id='int4'>
                  Engenharia
                </label>
                <input type="checkbox" id='bti5' class='chkint' value=5  name='intchk[]'>
                <label for='bti5' class='interesse5' id='int5'>
                  Administração e Negócios
                </label>
                <input type="checkbox" id='bti6' class='chkint' value=6  name='intchk[]'>
                <label for='bti6' class='interesse6' id='int6'>
                  Comunicação
                </label>
                <input type="checkbox" id='bti7' class='chkint' value=7 onclick='intlimit(6)' name='intchk[]'>
                <label for='bti7' class='interesse7' id='int7'>
                  Arte e Design
                </label>
                <input type="checkbox" id='bti8' class='chkint' value=8 onclick='intlimit(7)' name='intchk[]'>
                <label for='bti8' class='interesse8' id='int8'>
                  Direito
                </label>
                <input type="checkbox" id='bti9' class='chkint' value=9 onclick='intlimit(8)' name='intchk[]'>
                <label for='bti9' class='interesse9' id='int9'>
                  Educação
                </label>
                <input type="checkbox" id='bti10' class='chkint' value=10 onclick='intlimit(9)' name='intchk[]'>
                <label for='bti10' class='interesse10' id='int10'>
                  Turismo
                </label>
                <input type="checkbox" id='bti11' class='chkint' value=11 onclick='intlimit(10)' name='intchk[]'>
                <label for='bti11' class='interesse11' id='int11'>
                  Gastronomia
                </label>
                <input type="checkbox" id='bti12' class='chkint' value=12 onclick='intlimit(11)' name='intchk[]'>
                <label for='bti12' class='interesse12' id='int12'>
                  Ciências Exatas e Biológicas
                </label>
                <input type="checkbox" id='bti13' class='chkint' value=13 onclick='intlimit(12)' name='intchk[]'>
                <label for='bti13' class='interesse13' id='int13'>
                  Ciências Sociais e Humanas
                </label>
                <input type="checkbox" id='bti14' class='chkint' value=14 onclick='intlimit(13)' name='intchk[]'>
                <label for='bti14' class='interesse14' id='int14'>
                  Música
                </label>
                <input type="checkbox" id='bti15' class='chkint' value=15 onclick='intlimit(14)' name='intchk[]'>
                <label for='bti15' class='interesse15' id='int15'>
                  <input type='text' class='outro' name='int15' id='test' placeholder="<?php

                  $varint[0] = "Informação e Tecnologia";
                  $varint[1] = "Logística";
                  $varint[2] = "Saúde";
                  $varint[3] = "Engenharia";
                  $varint[4] = "Administração e Negócios";
                  $varint[5] = "Comunicação";
                  $varint[6] = "Arte e Design";
                  $varint[7] = "Direito";
                  $varint[8] = "Educação";
                  $varint[9] = "Turismo";
                  $varint[10] = "Gastronomia";
                  $varint[11] = "Ciências Exatas e Biológicas";
                  $varint[12] = "Ciências Sociais e Humanas";
                  $varint[13] = "Música";
                  $contint = 0;
                  for($j = 1; $j < 16; $j++){
                    for($i = 0; $i < 14; $i++){
                      if((isset($selecionados[0]['interesseeve'.$j])) && ($selecionados[0]['interesseeve'.$j] != $varint[$i])){
                        $contint++;
                      }
                    }
                    if($contint == 14){
                      echo $selecionados[0]['interesseeve'.$j];
                    }
                    else {
                      $contint = 0;
                    }
                  }

                  ?>">
                </label>
              </div>

              <div class='btnext'><a href='eventinfo.php'><button class='prox'>Alterar</button></a></div>
            </center>
          </form>
        </div>
      </div>
      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </center>
    <?php
    //marcando os interesses que foram selecionados durante a criação do evento
    $interesses = array('Informação e Tecnologia', 'Logística', 'Saúde', 'Engenharia', 'Administração e Negócios', 'Comunicação', 'Arte e Design', 'Direito', 'Educação', 'Turismo', 'Gastronomia', 'Ciências Exatas e Biológicas', 'Ciências Sociais e Humanas', 'Música','outro');
    $outro=0;
    for($i=1;$i<=15;$i++){

      for($j=0;$j<15;$j++){
        if($selecionados[0]['interesseeve'.$i]==$interesses[$j]){
          echo"
          <script type='text/javascript'>
          document.getElementsByClassName('chkint')[$j].checked = true;

          </script>";
        }
        /*
        if($selecionados[0]['interesseeve'.$i] != $interesses[$j] && $selecionados[0]['interesseeve'.$i] != null){
        $outro++;
      }
      */
    }

  }
  /*
  if($outro ==225){
  echo"
  <script type='text/javascript'>
  document.getElementsByClassName('chkint')[14].checked = true;
  document.getElementById('test').value = 'si fude';
  </script>";
}
echo $outro;
*/
?>
</body>
<script src="js/jquery.mask.js"></script>
<script>
$(document).ready(function(){
  $('#preco').mask('000.000.000.000.000,00', {reverse: true});
})
</script>
</html>
