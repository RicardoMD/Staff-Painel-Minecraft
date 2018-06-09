<?php
include ("config/setting3.php");
@session_start();
?>
<!DOCTYPE html>
<html lang="en">
<meta Name=”robots” content=”noindex”>
<head>
    <meta charset="UTF-8">
    <title>Sistema de Cadastro G-Blast</title>
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
</head>
<body>

<div id="login" class="bradius">
    <div class="message">Necessário senha com nível de acesso GER/CEO</div>
    <div class="logo"><img src="./imagens/logotipo1.png"></div>
    <div class="acomodar">

        <form action="" method="post">
            <label for="usuario">Usuário: </label> <input name="usuario" id="usuario" type="text" value="" class="txt bradius">
            <label for="senha">Senha: </label><input name="senha" id="senha" type="password" value="" class="txt bradius">
            <input type="submit" class="sb bradius" value="Entrar">
            <input type="hidden" name="entrar" value="login">
        </form>
        <?php
        if (isset($_POST['entrar'])&& $_POST['entrar']== "login"){
            $usuario=$_POST['usuario'];
            $senha=$_POST['senha'];

            if (empty($usuario)||empty($senha)){
                echo "Preencha todos os dados";

            }else{
                $query="SELECT nome,senha FROM usuarios WHERE nome='$usuario' AND senha='$senha'";
                $result=mysqli_query($conecta,$query);
                $busca=mysqli_num_rows($result);
                $linha=mysqli_fetch_assoc($result);

                if ($busca > 0){
                    $_SESSION['admin']=$linha['nome'];
                    $_SESSION['pw']=$linha['senha'];
                    header('Location:./log/cadastro.php');
                    exit;
                }else{
                    echo "Usuário e/ou senha inválido";        }
            }
        }
        ?>
    </div>





</div>

</body>
</html>