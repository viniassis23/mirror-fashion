<!DOCTYPE html>
<html>

<head>
    <title><?php print $cabecalho_title; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/estilos.css">
    <?php print @$cabecalho_css; ?>
    <link rel="stylesheet" href="css/mobile.css" media="(max-width: 939px)">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>

</head>

<body>
    <header class="container">
        <h1><img src="img/logo.png" alt="Mirror Fashion"></h1>

        <p class="sacola">Nenhum item na sacola de compras</p>

        <nav class="menu-opcoes">
            <ul>
                <li><a href="#">Sua Conta</a></li>
                <li><a href="#">Lista de Desejos</a></li>
                <li><a href="#">Cartão Fidelidade</a></li>
                <li><a href="sobre.php">Sobre</a></li>
                <li><a href="#">Ajuda</a></li>
            </ul>
        </nav>
    </header>