<?php

function lista_pessoas() {

    $dbHost = "localhost";
    $dbUser = "root";
    $dbPassword = "";
    $dbName = "selecao";
    $port = "3306";

    $conexao = new mysqli($dbHost, $dbUser, $dbPassword, $dbName, $port);

    $result = mysqli_query($conexao, "SELECT * FROM pessoa ORDER BY id");
    $list = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_close($conexao);
    return $list;
}
function delete_pessoa($id) {
    
    $dbHost = "localhost";
    $dbUser = "root";
    $dbPassword = "";
    $dbName = "selecao";
    $port = "3306";

    $conexao = new mysqli($dbHost, $dbUser, $dbPassword, $dbName, $port);

    $result = mysqli_query($conexao, "DELETE FROM pessoa WHERE id='{$id}'");
    mysqli_close($conexao);
    return $result;
}
function get_pessoa($id) {
    
    $dbHost = "localhost";
    $dbUser = "root";
    $dbPassword = "";
    $dbName = "selecao";
    $port = "3306";

    $conexao = new mysqli($dbHost, $dbUser, $dbPassword, $dbName, $port);

    $result = mysqli_query($conexao, "SELECT * FROM pessoa WHERE id='{$id}'");
    $pessoa = mysqli_fetch_assoc($result);
    mysqli_close($conexao);
    return $pessoa;
}
function get_next_pessoa($id) {
    
    $dbHost = "localhost";
    $dbUser = "root";
    $dbPassword = "";
    $dbName = "selecao";
    $port = "3306";

    $conexao = new mysqli($dbHost, $dbUser, $dbPassword, $dbName, $port);

    $result = mysqli_query($conexao, "SELECT max(id) as next FROM pessoa");
    $next = (int) mysqli_fetch_assoc($result)['next'] +1;
    mysqli_close($conexao);
    return $next;
}
function insert_pessoa($pessoa) {
    
    $dbHost = "localhost";
    $dbUser = "root";
    $dbPassword = "";
    $dbName = "selecao";
    $port = "3306";

    $conexao = new mysqli($dbHost, $dbUser, $dbPassword, $dbName, $port);

    $sql = "INSERT INTO pessoa (id, nome, endereco, bairro,tel, email)
       VALUES ( '{$pessoa['id']}', '{$pessoa['nome']}',
        '{$pessoa['endereco']}',
        '{$pessoa['bairro']}', '{$pessoa['tel']}',
        '{$pessoa['email']}'
        )";
    $result = mysqli_query($conexao, $sql);
    mysqli_close($conexao);
    return $result;
}
function update_pessoa($pessoa) {
    
    $dbHost = "localhost";
    $dbUser = "root";
    $dbPassword = "";
    $dbName = "selecao";
    $port = "3306";

    $conexao = new mysqli($dbHost, $dbUser, $dbPassword, $dbName, $port);

    $sql = "UPDATE pessoa SET nome = '{$pessoa['nome']}',endereco = '{$pessoa['endereco']}',bairro = '{$pessoa['bairro']}',tel = '{$pessoa['tel']}',email = '{$pessoa['email']}'
        WHERE id = '{$pessoa['id']}'";
    $result = mysqli_query($conexao, $sql);
    mysqli_close($conexao);
    return $result;
}



?>