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

    <legend>Verifique o histórico de chat do Player</legend>
    <form action="" method="post" enctype='multipart/form-data' class='form-horizontal'>
        <div class='form-group'>
            <label class='col-md-4 control-label' for='player'></label>
            <div class='col-md-4'>
                <input type="text" name="nome" id="nome" placeholder="Digite uma palavra chave" class='form-control input-md' required=''>
            </div>
        </div>
        <div class='form-group'>
            <label class='col-md-4 control-label' for='player'></label>
            <div class='col-md-4 text-center'>
                <button type='submit' name='verificar' value='verificar' class='btn btn-primary'>Verificar</button>
            </div>
        </div>

    </form>

    </div>

    <?php
    if (isset($_POST['verificar'])== 'verificar') {
        $nome = $_POST['nome'];

        $directory = '../logs/';
        $dir = opendir($directory);
        $search1 = "issued server command: /g ";

        echo "<h4>Histórico no chat global</h4>";

        echo "<ul>";

        while (($file = readdir($dir)) !== false) {

            $filename = $directory . $file;
            $type = filetype($filename);



            if ($type == 'file') {
                $lines = file($filename);
                $result= date('d-m-Y', filemtime($filename));

                foreach ($lines as $line) {
                    // Check if the line contains the string we're looking for, and print if it does
                    if (strpos($line, $search1) !== false && strpos($line, $nome) !== false)
                        echo "<li style='color: black; background-color: white; border: solid 1px #f38f39;list-style: none'> $result $line </li>";
                }

                echo "</ul>";


            }
        }




    }
    ?>
            <?php
        if (isset($_POST['verificar'])== 'verificar') {
            $nome = $_POST['nome'];

            $directory = '../logs/';
            $dir = opendir($directory);
            $search1 = "issued server command: /tell ";

            echo"<h4>Histórico no chat privado(tell)</h4>";
            echo "<ul>";

            while (($file = readdir($dir)) !== false) {

                $filename = $directory . $file;
                $type = filetype($filename);



                if ($type == 'file') {
                    $lines = file($filename);
                    $result= date('d-m-Y', filemtime($filename));








                    foreach ($lines as $line) {
                        // Check if the line contains the string we're looking for, and print if it does
                        if (strpos($line, $search1) !== false && strpos($line, $nome) !== false)
                            echo "<li style='color: black; background-color: white; border: solid 1px #f38f39;list-style: none'> $result $line </li>";
                    }

                    echo "</ul>";


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




























