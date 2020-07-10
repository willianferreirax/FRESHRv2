<?php $v->layout("theme2/_theme"); ?>

<?php $v->start("css"); ?>
  <link rel="stylesheet" href="<?=asset('css/eventoinfo.css')?>">
  <link rel="stylesheet" href="<?=asset('css/style.min.css')?>">
<?php $v->end(); ?>

<?php $v->start("scripts"); ?>
  <script src="<?=asset('js/validation.js')?>"></script>
<?php $v->end(); ?>

    <form name='cadastro_uso' class="form" method="POST" action="<?= $router->route("auth.registerInst") ?>">

      <div class="login_form_callback">
        <? $flash;?>
      </div>

      <label><b>Nome da instituição:</b></label>
      <br>
      <input type="text" name="name" placeholder='Nome'>
      <br>
      <br>

      <label><b>Endereço de e-mail:</b></label>
      <br>
      <input type="email" name="email" placeholder="exemplo@exemplo.com">
      <br>
      <br>

      <label><b>Senha:</b></label>
      <br>
      <input type="password" name="passwd" placeholder="Nova senha"><br><small>*Mínimo 10 caracteres</small>
      <br>
      <br>

      <label><b>Confirmar senha:</b></label>
      <br>
      <input type="password" name="confirm" placeholder="Repita a senha">
      <br>
      <br>

      <label><b>CEP:</b></label>
      <br>
      <input type="text" maxlength="9" size="10" name="cep" id='cep' title="99999-999">
      <br>
      <br>

      <label><b>Endereço:</b></label>
      <br>
      <input type="text" name="address" id='address'>
      <br>
      <br>

      <label><b>Bairro:</b></label>
      <br>
      <input type="text" name="neighbor" id='neighbor'>
      <br>
      <br>

      <label><b>Cidade:</b></label>
      <br>
      <input type="text" name="city" id='city'>
      <br>
      <br>

      <label class='labelint'><b>Estado:</b></label>
      <br>
      <input type="text" name="state" id="state" maxlength="2">
      <br>

      <label><b>CNPJ:</b></label>
      <br>
      <input type="text" name="cnpj" maxlength="18" placeholder="99.999.999.9999-99">
      <br>
      <br>

      <label><b>Telefone:</b></label>
      <br>
      <input type="text" name="phone" maxlength='15' placeholder="(99) 99999-9999">
      <br>

      <br>
      <small class='aindan'>Já está cadastrado?<br> <a href='<?=$router->route('web.login')?>'>Clique aqui para acessar sua conta!</a></small>
      <br>

      <br>
      <input type='submit' class='cadastrar' name='cadastrar' value='cadastrar'>
      <br>
      <br>
      <br>

    </form>