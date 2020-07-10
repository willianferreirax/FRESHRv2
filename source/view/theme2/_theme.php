<!doctype html>
<html lang="pt-br">
<head>
    <title> <?=$title?> </title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <meta charset="utf-8">
    <meta name="description" content="Acesse o FRESHR. Uma visão de prosperidade para a sua carreira.">
    <meta name="keywords" content="FRESHR, Eventos, Buscar, Profissão, Login, Feiras, Experiência, Currículo">
    <meta name="robots" content="Index, follow">
    <meta name="author" content="Iago Pereira, Lucas Campanelli, Nicholas Campanelli, Renato Melo, Willian Ferreira">
    <meta name="viewport" content="width=device-width">
    <meta name="theme-color" content="#121212">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" cross-site="SameSite">
    <link rel="icon" href="<?=asset('images/icon.png')?>">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?=asset('css/style.css')?>">
    <link rel="stylesheet" href="<?=asset('css/auth.css')?>">
    

    <?= $v->section("css")?>

    <script src="<?=asset('js/jquery.js')?>"></script>
    <script src="<?=asset('js/jquery-ui.js')?>"></script>
    <script src="<?=asset('js/form.js')?>"></script>

    <?= $v->section("scripts")?>
</head>

<body>

<center>
    <header class='cabecalho'>
        <a href=<?=$router->route('web.home')?> class='homea'>
            <label for='logospace' class='logo'>
                <h1 class='logospace'></h1>
            </label>
        </a>
        <hr>
    </header>

    <div class='containerform'>
        <?= $v->section("content")?>
    </div>
</center>

</body>
</html>