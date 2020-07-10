<?php $v->layout("theme1/_theme"); ?>

<?php $v->start("css"); ?>
  <link rel="stylesheet" href="<?=asset('css/sobre.css')?>">
<?php $v->end(); ?>

<?php unset($_SESSION['user']);
unset($_SESSION['inst']);
?>

<center>
  <div class='content'>
    <div class='textos'>
      <h1 class='titulo'><b>Ajuda</b></h1>
      <hr>
      <h1 class='texto'>Conceitos básicos para usar o FRESHR.</h1>
      <br>
      <h1 class='titulo'><i class="fas fa-info"></i> <b>Conhecendo o FRESHR</b></h1>
      <br>
      <div class='lista'>
        <h1 class="texto">O FRESHR é uma plataforma em que instituições e empresas divulgam seus eventos que contribuirão para a sua vida profissional, assim como palestras e feiras profissionais. Saiba mais na página <a href='sobre.php'><i class="fas fa-info"></i> Sobre</a>.</h1>
        <br><hr><br>
        <h1 class='texto'>- O Botão <i class="fas fa-bars"></i> Menu abre a barra lateral, possibilitando ver as abas que levam às diferentes funcionalidades do FRESHR.</h1><br>
        <h1 class='texto'>- A barrinha azul e rosa que fica ao lado do ícone na barra lateral esquerda indica a página em que você se encontra.</h1><br>
        <h1 class='texto'>- Ao clicar no logo no canto superior esquerdo, você será levado(a) para a página inicial. O mesmo acontece quando você clica no logo superior nas páginas de login e cadastro.</h1>

      </div><br><hr><br>
      <h1 class='titulo'><i class="fas fa-sign-in-alt"></i> <b>Fazendo login no FRESHR</b></h1>
      <br>

      <div class='lista'>
        <h1 class='titulo2'> <b>Em qualquer página:</b></h1><br>
        <h1 class='texto'>- Para fazer login no FRESHR, basta clicar no ícone de usuário (<i class="fas fa-user-circle"></i>) e ele te levará para a página de login</h1><br>
        <h1 class='texto'>- Depois, insira seu login no campo "login"</h1><br>
        <h1 class='texto'>- E agora, sua senha no campo "senha"</h1><br>
        <h1 class='texto'>- Agora, após clicar em "entrar", você será direcionado(a) para a página da sua conta.</h1><br>

        <h1 class='titulo2'> <b>Na página inicial:</b></h1><br>
        <h1 class='texto'>- Na página inicial basta clicar em "entrar"</h1><br>
        <h1 class='texto'>- E inserir seu login no campo de login</h1><br>
        <h1 class='texto'>- E agora, sua senha no campo da senha</h1><br>
        <h1 class='texto'>- Agora clique em "entrar", você será direcionado(a) para a página da sua conta.</h1><br>
      </div>
    <hr><br>

    <h1 class='titulo'><i class="fas fa-search"></i> <b>Pesquisando eventos</b></h1>
    <br>

    <div class='lista'>
      <h1 class='titulo2'> <b>Em qualquer página (com exceção das páginas de Login, Cadastro, Ajuda e Sobre):</b></h1><br>
      <h1 class='texto'>- Para pesquisar eventos no FRESHR, você precisa de selecionar a barra de pesquisa que se encontra na parte superior das páginas</h1><br>
      <h1 class='texto'>- Depois, escreva o nome do evento que você busca</h1><br>
      <h1 class='texto'>- Você também pode pesquisar por qualquer outra informação do evento como Preço, Descrição, a Instituição que organiza o evento, a Cidade, o Estado ou as Áreas de Interesses do evento</h1><br>
      <h1 class='texto'>- Após escrever as informações que busca, pressione "enter" ou "return no seu teclado". Se estiver em dispositivos móveis, toque no ícone da lupa na barra de pesquisa.</h1><br>

      <h1 class='titulo2'> <b>Pesquisa manual:</b></h1><br>
      <h1 class='texto'>- Em qualquer página (com exceção das páginas de Cadastro e Login), clique no mapa (<i class="fas fa-map-marked"></i>)</h1><br>
      <h1 class='texto'>- Ele te direcionará para a página de eventos</h1><br>
      <h1 class='texto'>- Lá estarão todos os eventos já criados organizados em ordem de data de criação (o mais recente em cima)</h1><br>
      <h1 class='texto'>- Clique no evento que deseja.</h1><br>
    </div><hr><br>

    <h1 class='titulo'><i class="fas fa-search"></i> <b>Pesquisar instituições de ensino ou empresas:</b></h1>
    <br>

    <div class='lista'>
      <h1 class='titulo2'> <b>Em qualquer página (com exceção das páginas de Login, Cadastro, Ajuda e Sobre):</b></h1><br>
      <h1 class='texto'>- Assim como para pesquisar os eventos, para pesquisar instituições, basta você escrever o nome dessa instituição no campo de busca superior</h1><br>
      <h1 class='texto'>- Após isso, pressione "enter", ou "return" em seu teclado.</h1><br>
      <h1 class='texto'>- Em celulares ou outros dispositivos móveis, toque na lupa.</h1><br>

      <h1 class='titulo2'> <b>Pesquisa manual:</b></h1><br>
      <h1 class='texto'>- Em qualquer página (com exceção das páginas de Cadastro e Login), clique no ícone de instituição (<i class="fas fa-users"></i>)</h1><br>
      <h1 class='texto'>- Ele te direcionará para a página de instituições</h1><br>
      <h1 class='texto'>- Lá estarão todos as instituições já criadas organizadas em ordem de data de criação (a mais recente em cima)</h1><br>
      <h1 class='texto'>- Clique na instituição que deseja.</h1><br>
    </div><hr><br>

    <h1 class='titulo'><i class="fas fa-map-marked"></i> <b>Página de exibição do evento</b></h1>
    <br>

    <div class='lista'>
      <h1 class='texto'>- A página de exibição do evento mostra todas as informações do evento como o nome, a descrição, o preço de entrada, local, data, hora entre outros.</h1><br>
      <h1 class='texto'>- Nessa página, é possivel marcar presença no evento, avaliá-lo ou marcar interesse.</h1><br>
      <h1 class='texto'>- O botão de confirmar presença mostra a quantidade de pesssoas que já confirmaram presença nesse evento.</h1><br>
    </div>

    <h1 class='titulo'><i class="fas fa-map-marked"></i> <b>Página de exibição da instituição</b></h1>
    <br>

    <div class='lista'>
      <h1 class='texto'>- A página de exibição da instituição mostra todas as informações da instituição como o nome, endereço, cnpj, telefone, eventos atuais e eventos passados.</h1><br>
      <h1 class='texto'>- Nessa página, é possivel seguir a instituição para receber os eventos mais recentes que ela divulga.</h1><br>
      <h1 class='texto'>- Ao clicar num evento na página da instituição você será levado(a) à página de exibição do evento selecionado.</h1><br>
    </div><hr><br>

    <h1 class='titulo'><i class="fas fa-plus-circle"></i> <b>Criar um evento</b></h1>
    <br>

    <div class='lista'>
      <h1 class='texto'>- Para criar um evento você deve possuir uma conta de instituição.</h1><br>
      <h1 class='texto'>- Em qualquer página (com exceçâo das páginas de Login, Cadastro, Listagem de eventos e Listagem de instituições), clique em "Criar evento" na parte superior da página</h1><br>
      <h1 class='texto'>- Esse botão te levará para a página de criação de evento</h1><br>
      <h1 class='texto'>- Será mostrado para você o campo com um (+), onde você fará <i>upload</i> (envio) do <i>banner</i> do evento.</h1><br>
      <h1 class='texto'>- Logo abaixo, existe os campos de nome, descrição, data de início e outras informações do evento.</h1><br>
      <h1 class='texto'>- Após o preenchimento dos campos, você precisa de informar as áreas de intersse do evento. Por meio delas, a plataforma vai relacioná-las com as áreas de interesses dos usuários para saber para quem deve ser mostrado o seu evento.</h1><br>
    </div><hr><br>

    <h1 class='titulo'><i class="fas fa-cog"></i> <b>Alterar as informações cadastrais da conta</b></h1>
    <br>

    <div class='lista'>
      <h1 class='texto'>- No canto superior direito, é possivel ver o ícone de usuário (<i class="fas fa-user-circle"></i>)</h1><br>
      <h1 class='texto'>- Ao clicar nesse ícone, será aberto o <i>dropdown</i> com as opções "Minha Conta" "Configurações" e "Ajuda"</h1><br>
      <h1 class='texto'>- Clique em "Configurações"</h1><br>
      <h1 class='texto'>- Serão exibidos campos com as informações da sua conta</h1><br>
      <h1 class='texto'>- Cada campo contém um botão "Editar"</h1><br>
      <h1 class='texto'>- Clique no botão editar do respectivo campo que deseja alterar</h1><br>
      <h1 class='texto'>- Você será redirecionado(a) à página de edição do campo</h1><br>
      <h1 class='texto'>- Edite a informação que deseja e depois clique em "alterar"</h1><br>
      <h1 class='texto'>- Não é possível (se você for uma instituição) alterar o CNPJ.</h1><br>
    </div>

  </div>
</center>