<?php

//Dados do servidor
$host='localhost';
$login='rtceo';
$senha='#Senh@rtce0astDB:';


//Conexão com o BD

$conecta=mysqli_connect($host,$login,$senha)or print("Erro ao conectar");
$banco=mysqli_select_db($conecta,'qbex');

//Verificação

if (!mysqli_connect($host,$login,$senha)){
    echo "Erro ao conectar ao banco de dados";
}



?>