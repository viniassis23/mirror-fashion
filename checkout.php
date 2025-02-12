<?php
$con = mysqli_connect("localhost", "root", "", "mirrorfashion");
$dados = mysqli_query($con, "SELECT * FROM produtos WHERE id = $_POST[id]");
$produto = mysqli_fetch_array($dados);
?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Mirror Fashion</title>
    <link rel="stylesheet" href="css/bootstrap_flatly.min.css">

    <style>
        body {
            padding-top: 60px;
        }

        .form-control:invalid {
            border: 1px solid #c00;
        }

        .navbar {
            margin: 0;
        }

        .navbar .glyphicon {
            color: lightgreen;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php">
                <img src="img/logo-rodape.png" alt="Mirror Fashion" style="width: 60%;">
            </a>
            <button class="navbar-toggle" type="button" data-target=".navbar-collapse" data-toggle="collapse">
                <span class="glyphicon glyphicon-align-justify"></span>
            </button>
        </div>
        <ul class="nav navbar-nav collapse navbar-collapse">
            <li><a href="sobre.php"><span class="glyphicon glyphicon-home"></span> Sobre</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-question-sign"></span> Ajuda</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-list-alt"></span> Perguntas frequentes</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-bullhorn"></span> Entre em contacto</a></li>
        </ul>
    </nav>

    <div class="jumbotron">
        <div class="container">
            <h1>Ótima escolha!</h1>
            <p>Obrigado por comprar na Mirror Fashion!
                Preencha os seus dados para efetivar a compra.
            </p>
        </div> <!-- fim .container dentro do jumbotron -->
    </div> <!-- fim .jumbotron -->

    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-lg-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2 class="panel-title">Sua compra</h2>
                    </div> <!-- fim .panel-heading -->

                    <div class="panel-body">
                        <img src="img/produtos/foto<?= $_POST['id'] ?>-<?= $_POST['cor'] ?>.png" class="img-thumbnail img-responsive hidden-xs">

                        <dl>
                            <dt>Produto</dt>
                            <dd><?= $produto['nome'] ?></dd>

                            <dt>Preço</dt>
                            <dd id="preco"><?= $produto['preco'] ?></dd>

                            <dt>Cor</dt>
                            <dd><?= $_POST['cor'] ?></dd>

                            <dt>Tamanho</dt>
                            <dd><?= $_POST['tamanho'] ?></dd>
                        </dl>

                        <div class="form-group">
                            <label for="qt">Quantidade</label>
                            <input type="number" id="qt" class="form-control" min="1" max="99" value="1">
                        </div>
                        <div class="form-group">
                            <label for="total">Total</label>
                            <output for="qt valor" id="total" class="form-control">
                                <?= $produto['preco'] ?>
                            </output>
                        </div>

                    </div> <!-- fim .panel-body -->
                </div> <!-- fim .panel -->
            </div>

            <form class="col-sm-8 col-lg-9">
                <div class="row">
                    <fieldset class="col-md-6">
                        <legend>Dados pessoais</legend>

                        <div class="form-group">
                            <label for="nome">Nome completo</label>
                            <input type="text" name="nome" id="nome" class="form-control" autofocus required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <div class="input-group">
                                <span class="input-group-addon">@</span>
                                <input type="email" name="email" id="email" class="form-control" placeholder="email@exemplo.com">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="cpf">CPF</label>
                            <input type="text" name="cpf" id="cpf" class="form-control" data-mask="999.999.999-99" placeholder="000.000.000-00" required>
                        </div>

                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="spam" value="sim" checked>
                                Quero receber spam da Mirror Fashion
                            </label>
                        </div>
                    </fieldset>

                    <fieldset class="col-md-6">
                        <legend>Cartão de Crédito</legend>

                        <div class="form-group">
                            <label for="numero-cartao">Número - CVV</label>
                            <input type="text" name="numero-cartao" data-mask="9999 9999 9999 9999 - 999" id="numero-cartao" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="bandeira-cartao">Bandeira</label>
                            <select name="bandeira-cartao" id="bandeira-cartao" class="form-control">
                                <option value="master">Mastercard</option>
                                <option value="visa">VISA</option>
                                <option value="amex">American Express</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="validade-cartao">Validade</label>
                            <input type="month" name="validade-cartao" id="validade-cartao" class="form-control">
                        </div>
                    </fieldset>
                </div>
                <button type="submit" class="btn btn-primary btn-lg pull-right">
                    <span class="glyphicon glyphicon-thumbs-up"></span>
                    Confirmar Pedido
                </button>
            </form>
        </div> <!-- fim .row -->
    </div> <!-- fim .container da página -->

    <script>
        document.querySelector('input[type=email]').oninvalid = function() {
            // remove mensagens de erro antigas
            this.setCustomValidity("");

            //reexecuta validação
            if (!this.validity.valid) {
                // se inválido, coloca mensagem de erro
                this.setCustomValidity("Email inválido");
            }
        }
    </script>

    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>

    <script src="js/converteMoeda.js"></script>
    <script src="js/total.js"></script>
    <script src="js/inputmask-plugin.js"></script>
</body>

</html>