<?php
include("../config/setting2.php");
@session_start();
if(!isset($_SESSION['nome'])&& !isset($_SESSION['senha'])){
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
                <li style="padding-right: 20px;"><a href="../painel.php">Voltar</a></li>
                <li><a href="../sair.php">Sair</a></li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
<!-- Page Content -->
<div class="container">

    <legend>Verificar histórico de Homes</legend>
    <form action="" method="post" enctype='multipart/form-data' class='form-horizontal'>
        <div class='form-group'>
            <label class='col-md-4 control-label' for='player'></label>
            <div class='col-md-4'>
                <input type="text" name="player" id="player" placeholder="Nick do player" class='form-control input-md' required=''>
            </div>
        </div>
        <div class='form-group'>
            <label class='col-md-4 control-label' for='player'></label>
            <div class='col-md-4 text-center'>
                <button type='submit' name='verificar' value='verificar' class='btn btn-primary'>Verificar</button>
            </div>
        </div>

    </form>
    <?php
    if (isset($_POST['verificar'])== 'verificar') {
        $player = $_POST['player'];

        if (empty($player)) {
            echo "Digite o Nick de um player";

        } else {
            $query = "SELECT owner_name,home,world,x,y,z,inactive,register_date FROM ast_homes WHERE owner_name='$player'";
            $result = mysqli_query($conecta, $query);
            $busca = mysqli_num_rows($result);
            $linha = mysqli_fetch_assoc($result);

            if ($busca > 0) {


                echo "<table border='2' class='table-responsive'><thead>";
                echo "<tr style='text-align: center;'><th>Data</th><th><strong>Nome da home</strong></th><th>Local</th><th>Coordenadas</th><th>Status da Home</th></tr></thead><tbody>";


                do {
                    $nome=$linha['owner_name'];
                    $nomedahome=$linha['home'];
                    $mundo=$linha['world'];
                    $x=$linha['x'];
                    $y=$linha['y'];
                    $z=$linha['z'];
                    $datadesethome=$linha['register_date'];
                    $inactive=$linha['inactive'];
                    if ($inactive == 1){
                        $statusdahome= "deletada ou sobrescrita";
                    } else{
                        $statusdahome=" ativa";
                    }

                    echo "<tr><td style='text-align: center'>[$datadesethome]</td><td>$nome setou a home:</strong> <span style='color:red;'>$nomedahome</span></td><td>$mundo</td><td>X:$x, Y:$y, Z:$z</td><td><span style='color:blue;'><strong>$statusdahome</strong></span></td></tr> ";


// finaliza o loop que vai mostrar os dados
                } while ($linha = mysqli_fetch_assoc($result));
                echo "</tbody></table>";

// fim do if
            }else{
                echo "<h4>O Jogador $player não tem nenhuma home setada no servidor</h4>";
            }
        }
    }
    ?>




    <hr>

    <!-- Footer -->
    <footer>
        <div class="row">
            <div class="col-lg-12">
                <p style="color: #f38f39">Copyright &copy; Astatine 2016</p>
            </div>
        </div>
    </footer>



    <!-- jQuery -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

</body>

</html>




