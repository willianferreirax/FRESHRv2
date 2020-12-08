<?php $v->layout("theme2/_theme"); ?>

<?php $v->start("css"); ?>
    <link rel="stylesheet" href="./source/assets/css/index.css">
    <link rel="stylesheet" href="./source/assets/css/style.min.css">
<?php $v->end(); ?>

<form  action="<?=$router->route("auth.login") ?>" method="post">

    <div class="login_form_callback">
        
    </div>
    
    <p><label>Email</label></p>
    <p><input type="text" name="email" placeholder="Login"></p>
    
    <p><label>Senha</label></p>
    <p><input type="password" name="passwd" placeholder="Palavra-passe"></p>
    
    <h1 class='aindan'>
        <p>Ainda não é cadastrado?</p> 
        <a href="<?=$router->route("web.cadChoose")?>">Cadastre-se aqui!</a>
    </h1>
    <br>
    <button class='cadastrar' type="submit" value="Logar"> Entrar </button>

</form>