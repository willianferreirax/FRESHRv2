<?php $v->layout("theme2/_theme"); ?>

<?php $v->start("css"); ?>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/deletar.css">
<?php $v->end(); ?>
   
<center>
  <div class='containerform'>
  <form name='excluir_conta' method="POST" action="?validar=true">
    <p><small class='sair'>Para confirmar a exclusão da conta, por favor informe:</small></p>

    <label class='infoemail'>Seu endereço de e-mail:</label>
    <br>
    <input type="email" name="email" placeholder='exemplo@exemplo.com'>
    <br>
    <br>

    <label>Senha:</label>
    <br>
    <input type="password" name="senha" placeholder='Nova senha'>
    <br>
    <br>

    <button class='cadastraraltinst' type="submit" value="validar">Prosseguir</button>
  </form>
</div>
</center>
