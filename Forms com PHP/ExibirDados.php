<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styledados.css">
    <title>Dados Forms</title>
</head>

<h1>Dados Recebidos</h1>
<body>
    <div class="Dados">
        <fieldset>
            <?php 
            include_once('config.php');

            $nome = $_POST['nome'];
            $email = $_POST['email'] ;
            $data_nasc = $_POST['nascimento'];
            $mensagem = $_POST['mensagem'];

            echo 'Nome: ' . $nome;
             echo '<br>';
            echo 'Email:  ' . $email;
            echo '<br>';
            echo 'Data de nascimento: ' . $data_nasc;
            echo '<br>';
            echo 'Mensagem: ' . $mensagem;

            $result = mysqli_query($conexao, "INSERT INTO usuarios(nome,email,data_nasc,mensagem) VALUES ('$nome', '$email', '$data_nasc', '$mensagem')");

            ?>
        </fieldset>
    </div>    
</body>
</html>










