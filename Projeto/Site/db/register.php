<?php
    session_start(); //Inicia uma sessão.
    include_once 'conexao.php'; //Incluí o arquivo de conexão com o banco de dados.
    
    $nome = mysqli_real_escape_string($connection, $_POST['nome']); //Obtem os dados do formulário.
	$sobrenome = mysqli_real_escape_string($connection, $_POST['sobrenome']); //Obtem os dados do formulário.
    $email = mysqli_real_escape_string($connection, $_POST['email']); //Obtem os dados do formulário.
    $senha = mysqli_real_escape_string($connection, $_POST['senha']); //Obtem os dados do formulário.
    
    if(empty($email) || empty($senha) || empty($nome) || empty($sobrenome)) { //Verifica os dados são nulos.
        header('Location: /registro.php'); //Redireciona pro registro.
        exit;
    }
    
    $query = "SELECT email FROM usuarios WHERE email = '$email'"; //Instanciando a query.
    $result = mysqli_query($connection, $query); //Faz a conexão com o banco de dados e executa a query.
    
    $row = mysqli_num_rows($result); //Obtem a quantidade de linhas retornadas.
    
    if($row === 1) { //Verifica se a quantidade de itens retornados pela query é identico a 1.
        $_SESSION['conta_existente'] = true; //Cria uma variável na sessão pra exibir a mensagem de erro.
        header('Location: /registro.php'); //Redireciona pro registro.
        exit;
    } else {
        $query = "INSERT INTO `usuarios` (`email`, `senha`, `nome`, `sobrenome`) VALUES ('$email', MD5('$senha'), '$nome', '$sobrenome')"; //Instanciando a query.
        
        if($connection->query($query) === TRUE){  //Faz a conexão com o banco de dados e executa a query, verifica se a mesma foi executada com sucesso.
            $_SESSION['registrado'] = true; //Cria uma variável na sessão pra exibir a mensagem de sucesso.
        } else {
			$_SESSION['erro_registro'] = true; //Cria uma variável na sessão pra exibir a mensagem de erro.
			header('Location: /registro.php');  //Redireciona pro registro.
			exit;
		}
	}
    
    $connection->close(); //Fecha a conexão
    
    header('Location: /registro.php'); //Redireciona pro registro.
    exit();
?>