<?php

    $dbHost = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'formulario-teste';
    $port = 3306;
    $conexao = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName, 3306);

    //if($conexao->connect_errno)
    //{
    //    echo "Erro";
    //}
    //else
    //{
    //    echo "Conexão efetuada com sucesso";
    //}


?>