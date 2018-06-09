<?php
include("../config/setting.php");
@session_start();
$usuario = $_SESSION['admin'];
$senha = $_SESSION['pw'];
if(!isset($_SESSION['admin'])&& !isset($_SESSION['pw'])){
    header('Location:../index.php');
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
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/heroic-features.css" rel="stylesheet">

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
            echo "<a class='navbar-brand'>G-Blast Astatine</a>";
            ?>

        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="../sair.php">Sair</a></li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
<!-- Page Content -->
<div class="container">

    <legend>Cadastrar Novo Usuário</legend>
    <form action="" method="post" enctype='multipart/form-data' class='form-horizontal'>
        <div class='form-group'>
            <label class='col-md-4 control-label' for='player'></label>
            <div class='col-md-4'>
                <input type="text" name="usuario" id="usuario" placeholder="Usuário" class='form-control input-md' required=''>
                <input type="password" name="senha" id="senha" placeholder="******" class='form-control input-md' required=''>
            </div>
        </div>
        <div class='form-group'>
            <label class='col-md-4 control-label' for='player'></label>
            <div class='col-md-4 text-center'>
                <button type='submit' name='cadastrar' value='Cadastrar' class='btn btn-primary'>Cadastrar</button>
            </div>
        </div>

    </form>
    <?php
    if (isset($_POST['cadastrar']) == 'cadastrar'){
        $usuario=$_POST['usuario'];
        $senha=$_POST['senha'];

        if (empty($usuario)||empty($senha)) {
            echo "Preencha todos os dados";

        }else{
            $query="SELECT nome FROM usuarios WHERE nome='$usuario'";
            $result=mysqli_query($conecta,$query);
            $busca=mysqli_num_rows($result);
            $linha=mysqli_fetch_assoc($result);

            if ($busca > 0){
                echo " Usuário já cadastrado";
            }else{
                $cadastrar="INSERT INTO usuarios (nome,senha) VALUES ('$usuario','$senha')";
                if(mysqli_query($conecta,$cadastrar)){
                    echo "<h4>Cadastro realizado com sucesso</h4>";
                }else{
                    echo "<h4>Erro no cadastro</h4>";
                }
            }
        }
    }
    ?>


        <?php
          $query="SELECT nome,senha FROM usuarios";
          $result=mysqli_query($conecta,$query);
          $busca=mysqli_num_rows($result);
          $linha=mysqli_fetch_assoc($result);
        echo "<legend>Staffs Cadastrados na G-Blast</legend>";
        echo "<table border='2' class='table-responsive'><thead>";
        echo "<tr style='text-align: center;'><th>Nome</th><th>Senha</th></tr></thead><tbody>";


        do {
        $nome=$linha['nome'];
        $senha=$linha['senha'];


            echo "<tr><td style='text-align: center'>$nome</td><td> $senha </td></tr> ";


        } while ($linha = mysqli_fetch_assoc($result));

        echo "</tbody></table>";

        ?>


        <legend>Excluir Usuário da G-Blast</legend>
        <form action="" method="post" enctype='multipart/form-data' class='form-horizontal'>
            <div class='form-group'>
                <label class='col-md-4 control-label' for='player'></label>
                <div class='col-md-4'>
                    <input type="text" name="usuario" id="usuario" placeholder="Usuário" class='form-control input-md' required=''>
                </div>
            </div>
            <div class='form-group'>
                <label class='col-md-4 control-label' for='player'></label>
                <div class='col-md-4 text-center'>
                    <button type='submit' name='excluir' value='excluir' class='btn btn-primary'>Excluir</button>
                </div>
            </div>

        </form>

        <?php
        if (isset($_POST['excluir']) == 'excluir'){
            $exstaff=$_POST['usuario'];


            if (empty($exstaff)) {
                echo "Preencha todos os dados";

            }else{
                $query="SELECT nome FROM usuarios WHERE nome='$exstaff'";
                $result=mysqli_query($conecta,$query);
                $busca=mysqli_num_rows($result);
                $linha=mysqli_fetch_assoc($result);

                if ($busca == 0){
                    echo "";
                }else{
                    $exclusao="DELETE FROM usuarios where nome='$exstaff'";
                    if(mysqli_query($conecta,$exclusao)){
                        echo "<h4> Exclusão realizada com sucesso. Atualize a página. </h4>";
                    }else{
                        echo "<h4>Erro na exclusão</h4>";
                    }
                }
            }
        }
        ?>
        <hr>
    </div>



    <!-- Footer -->
    <footer>
        <div class="row">
            <div class="col-lg-12">
                <p style="color: #f38f39; text-align: center; ">Copyright &copy; Astatine 2016</p>
            </div>
        </div>
    </footer>



<!-- jQuery -->
<script src="../js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../js/bootstrap.min.js"></script>

</body>

</html>




