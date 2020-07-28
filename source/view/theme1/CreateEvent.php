<?php $v->layout("theme1/_theme"); ?> 
<?php $v->start("css"); ?>
  <link rel="stylesheet" href="<?= asset("css/eventoinfo.css"); ?>">
  <link rel="stylesheet" href="<?= asset("css/style.min.css"); ?>">
<?php $v->end(); ?>

<?php $v->start("scripts"); ?>
  <script src="<?=asset("js/jquery.mask.js");?>"></script>
  <script src="<?=asset("js/validation.js");?>"></script>
  <script src="<?=asset('js/form.js')?>"></script>
  <script src="<?=asset('js/jquery.js')?>"></script>
  <script src="<?=asset('js/jquery-ui.js')?>"></script>
<?php $v->end();?>

<div class='elem1'>

  <div class="icontainer">
    <form name='criareventoform' method="POST" action="<?=$router->route('appInst.createEvent')?>" enctype="multipart/form-data">

      <div class="form-group" id='imageup'>

        <label for="exampleFormControlFile1" style="width: 100%; height: 100%; border: none;">
          <img class="imagevis" id="imagevis" border="0">
          <input type="file" class="form-control-file" id="exampleFormControlFile1" name='thumb'>
          <div class="aviso">Para uma melhor experiência do usuário, o banner do evento deve ter <br>as medidas de <b>1280x540</b> ou a proporção <b>21:9</b> <br> <br>(Caso contrário, ele será cortado e redimensionado.)</div>
        </label>

      </div>   
      
      <div class="nomeev">

        <label class='labelint'>Dê um <b>nome</b> ao seu evento:</label><br>
        <input class='inputcreate' id='createnome' type='text' name='name' placeholder='Feira Tecnológica 2019' maxlength="80">
        <center><hr></center><br>

      </div>

      <div class="login_form_callback">
        <? $flash;?>
      </div>

      <div class="info1">
        <div class="infos">

          <label class='labelint'>Dê uma breve descrição para atrair o público para o seu evento</label><br>
          <textarea draggable="false" placeholder="A feira tecnológica é um evento para abrir o seu conhecimento sobre a sociedade atual. Venha conhecer!" name='description' maxlength="149"></textarea>

          <label class='labelint'>Quando o evento irá <b>começar</b>?</label><br>
          <input class='inputcreate' type='date' name='date_begin' min=<?= date('Y-m-d')?>>

          <label class='labelint'>Quando o evento irá <b>acabar</b>?</label><br>
          <input class='inputcreate' type='date' name='date_end' min=<?= date('Y-m-d')?>>

          <label class='labelint'>Informe o horário que o evento <b>inciará</b>:</label>
          <input class='inputcreate' type='time' name='hour_begin'>

          <label class='labelint'>Informe o horário que o evento <b>encerrará</b>:</label>
          <input class='inputcreate' type='time' name='hour_end'>

          <label class='labelint'>Qual o <b>preço</b> do evento?</label><br>
          <label for='preco' class='precocifra'>R$</label>
          <input class='inputcreate' type='tel' id='preco' name='price' placeholder="R$ 12,00">

        </div>

        <div class="endereco">

          <div class='detalhe'>
            <label class='labelint'>Nesse campo você deve informar todos os detalhes possíveis do evento</label><br>
            <textarea draggable="false" placeholder="A feira tecnológica ocorrerá nos dias 5, 6 e 7 de novembro. No dia 5 iniciará às 20 horas e terminará as 22 horas. Nos dias 6 e 7 inciará às 7 horas e encerrará às 22 horas. A entrada será na rua Dr. Almeida Lima. O preço é gratuito a partir das 20 horas. Para maiores informações, telefone. Junte-se ao grupo de pessoas com mentes abertas para um novo futuro!" name='detail' maxlength="500"></textarea>
          </div>

          <label class='labelint'>Agora, digite o <b>CEP</b>:</label><br>
          <input class='inputcreate' type='tel' maxlength="9" size="10" name="cep" title="99999-999">

          <label class='labelint'>Informe o <b>logradouro</b> do evento:</label>
          <input class='inputcreate' type='text' name='address' placeholder='Rua Dr. Almeida Lima, 1233'>

          <label class='labelint'>Qual <b>bairro</b> o evento ocorrerá?</label><br>
          <input class='inputcreate' type='text' name='neighbor' placeholder='Mooca'>

          <label class='labelint'>Qual <b>cidade</b> o evento ocorrerá?</label><br>
          <input class='inputcreate' type='text' name='city' placeholder='São Paulo'>

          <label class='labelint'>Qual <b>estado</b> o evento ocorrerá?</label><br>
          <select name="state">
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
            <option value="SP" selected>São Paulo</option>
            <option value="SE">Sergipe</option>
            <option value="TO">Tocantins</option>
          </select><br>

        </div>
      </div>
      <input type='submit' class='cadastrar' name='cadastrar' value='cadastrar'>
    </form>
  </div>
</div>