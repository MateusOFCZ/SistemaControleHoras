<?php //Arquivo padrão de conexão do banco de dados.
    include_once 'conexao.php';
    
    define('HOST', 'localhost');
    define('USER', 'root');
    define('PASSWORD', '');
    define('DB', 'sch');
    
    $connection = mysqli_connect(HOST, USER, PASSWORD, DB) or die ("Não foi possível conectar!")
?>