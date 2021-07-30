<?php //Arquivo padrão de conexão do banco de dados.
    include_once 'conexao.php';
    
    define('HOST', 'IP DO SERVIDOR');
    define('USER', 'USUÁRIO DO SERVIDOR');
    define('PASSWORD', 'SENHA DO SERVIDOR');
    define('DB', 'sch'); //Não é necessário alterar, apenas se modificado o nome do banco de dados.
    
    $connection = mysqli_connect(HOST, USER, PASSWORD, DB) or die ("Não foi possível conectar!")
?>