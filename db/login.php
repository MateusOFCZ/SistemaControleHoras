<?php
    session_start(); //Inicia uma sessão.
    include_once 'conexao.php'; //Incluí o arquivo de conexão com o banco de dados.
    
    $email = mysqli_real_escape_string($connection, $_POST['email']); //Obtem os dados do formulário.
    $senha = mysqli_real_escape_string($connection, $_POST['senha']); //Obtem os dados do formulário.
    
    if(empty($email) || empty($senha)) { //Verifica os dados são nulos.
        header('Location: /'); //Redireciona o usuário pra index.
        exit;
    }
    
    $query = "SELECT * FROM `usuarios` WHERE `email` = '$email' and `senha` = MD5('$senha');"; //Instanciando a query.
    $result = mysqli_query($connection, $query); //Faz a conexão com o banco de dados e executa a query.
    
    $row = mysqli_num_rows($result); //Obtem a quantidade de linhas retornadas.
    
    if($row == 1) { //Verifica se a quantidade de resultados da query é igual a 1.
        while ($row = $result->fetch_assoc()) { //Procura pelos resultados da query por linha.
            $_SESSION['id'] = $row['id']; //Procura pelos resultados da query pela linha e salva na variável da sessão.
            $_SESSION['senha'] = $row['senha']; //Procura pelos resultados da query pela linha e salva na variável da sessão.
            $_SESSION['nome'] = $row['nome']; //Procura pelos resultados da query pela linha e salva na variável da sessão.
            $_SESSION['sobrenome'] = $row['sobrenome']; //Procura pelos resultados da query pela linha e salva na variável da sessão.
        }

        $_SESSION['email'] = $email; //Cria uma variável na sessão e salva o email do usuário.
        header('Location: /'); //Redireciona o usuário pra index.
        exit;
    } else {
        $_SESSION['email'] = false; //Cria uma variável na sessão pra exibir a mensagem de erro.
        header('Location: /'); //Redireciona o usuário pra index.
        exit;
    }
    $connection->close(); //Fecha a conexão

    header('Location: /'); //Redireciona o usuário pra index.
    exit;
?>