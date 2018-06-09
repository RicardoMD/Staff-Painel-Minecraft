<?php
include("config/setting.php");
session_start();
$usuario = $_SESSION['nome'];
$senha = $_SESSION['senha'];

if(!isset($_SESSION['nome'])&& !isset($_SESSION['senha'])){
    header('Location:index.php');
    exit;}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>G-BLAST</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/heroic-features.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <?php
            header("Content-Type: text/html; charset=UTF-8", true);
            echo "<a class='navbar-brand'>Bem vindo $usuario</a>";
                ?>

        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="sair.php">Sair</a></li>
                </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

<!-- Page Content -->
<div class="container">

<div align="center" class="logo2"><img src="imagens/logotipo2.jpg"></div>

    <hr>

    <!-- Title -->
    <div class="row">
        <div class="col-lg-12">
            <h3 style="color: #f38f39">Gerenciador e Busca de Logs Astatine (G-BLAST)</h3>
        </div>
    </div>
    <!-- /.row -->

    <!-- Page Features -->
    <div class="row text-center">

        <div class="col-md-3 col-sm-6 hero-feature">
            <div class="thumbnail">
                <img src="imagens/cadastro.png" alt="">
                <div class="caption">
                    <h3>Cadastro</h3>
                    <p style="margin-bottom: 6px;" >Cadastrar novo Staff na G-BLAST</p>
                    <p style="color: red; font-size: 10px;"><strong>Necessário nível de acesso GER/CEO</strong></p>
                    <p>
                        <a href="./log/hvsadacbvetadfoknbw.php" class="btn btn-primary">Cadastrar</a>
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6 hero-feature">
            <div class="thumbnail">
                <img src="imagens/ban.png" alt="">
                <div class="caption">
                    <h3>Bans</h3>
                    <p style="padding-bottom: 20px;">Verificar o histórico de Bans</p>
                    <p>
                        <a href="log/bans.php" class="btn btn-primary">Pesquisar</a>
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6 hero-feature">
            <div class="thumbnail">
                <img src="imagens/ip.png" alt="">
                <div class="caption">
                    <h3>Pesquisa por IP</h3>
                    <p style="padding-bottom: 20px;">Verificar registros de login por IP</p>
                    <p>
                        <a href="log/colocaip.php" class="btn btn-primary">Pesquisar</a>
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6 hero-feature">
            <div class="thumbnail">
                <img src="imagens/nick.png" alt="">
                <div class="caption">
                    <h3>Pesquisa por Nick</h3>
                    <p style="padding-bottom: 20px;">Verificar registros de login por Nick</p>
                    <p>
                        <a href="log/verips.php" class="btn btn-primary">Pesquisar</a>
                    </p>
                </div>
            </div>
        </div>



    </div>
    <!-- /.row -->
    <!-- Page Features -->
    <div class="row text-center">

        <div class="col-md-3 col-sm-6 hero-feature">
            <div class="thumbnail">
                <img src="imagens/home.png" alt="">
                <div class="caption">
                    <h3>Homes</h3>
                    <p style="padding-bottom: 20px;">Verificar histórico de Home</p>
                    <p>
                        <a href="log/homes.php" class="btn btn-primary">Pesquisar</a>
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6 hero-feature">
            <div class="thumbnail">
                <img src="imagens/loja.png" alt="">
                <div class="caption">
                    <h3>Shop</h3>
                    <p>Verificar o histórico de Compra/Venda em Lojas</p>
                    <p>
                        <a href="log/shop.php" class="btn btn-primary">Pesquisar</a>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 hero-feature">
            <div class="thumbnail">
                <img src="imagens/money.png" alt="">
                <div class="caption">
                    <h3>Money</h3>
                    <p style="padding-bottom: 20px;">Verificar transações financeiras</p>
                    <p>
                        <a href="log/money.php" class="btn btn-primary">Pesquisar</a>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 hero-feature">
            <div class="thumbnail">
                <img src="imagens/chat.png" alt="">
                <div class="caption">
                    <h3>Chat</h3>
                    <p style="padding-bottom: 20px;">Verificar histórico de chat</p>
                    <p>
                        <a href="log/chat.php" class="btn btn-primary">Pesquisar</a>
                    </p>
                </div>
            </div>
        </div>


    </div>
    <!-- /.row -->
    <hr>

    <!-- Footer -->
    <footer>
        <div class="row">
            <div class="col-lg-12">
                <p style="color: #f38f39">Copyright &copy; Astatine 2016</p>
            </div>
        </div>
    </footer>

</div>
<!-- /.container -->

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

</body>

</html>
