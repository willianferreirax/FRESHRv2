<?php $v->layout("theme2/_theme"); ?>

<?php $v->start("css"); ?>
    <link rel="stylesheet" href="<?=asset('css/index.css')?>">
    <link rel="stylesheet" href="<?=asset('css/style.min.css')?>">
<?php $v->end(); ?>

<form class="form" name='cadastro_uso' method="POST" action="<?=$router->route('auth.registerUser')?>">

  <div class="login_form_callback">
    <? $flash;?>
  </div>

  <label><b>Nome:</b></label>
  <br>
  <input type="text" name="name" placeholder='Nome'>
  <br>
  <input type="text" name="last_name" placeholder='Sobrenome'>
  <br>
  <br>

  <label><b>Endereço de e-mail:</b></label>
  <br>
  <input type="email" name="email" placeholder='exemplo@exemplo.com'>
  <br>
  <br>

  <label><b>Senha:</b></label>
  <br>
  <input type="password" name="passwd" placeholder='senha'>
  <br>
  <br>

  <label><b>Confirmar senha:</b></label>
  <br>
  <input type="password" name="confirm" placeholder='Repita a senha'>
  <br>
  <br>

  <small class='aindan'>Já está cadastrado?
    <a href="<?=$router->route("web.login")?>">Clique aqui para acessar sua conta!</a>
  </small>

  <button class='cadastrar' type="submit" value="Logar"> Entrar </button>
  <br><br>
</form>