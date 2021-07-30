# Sistema de Controle de Horas

## Arquivos

 - O site está localizado em "[Projeto](https://github.com/MateusOFCZ/SistemaControleHoras/tree/master/Projeto) > [Site](https://github.com/MateusOFCZ/SistemaControleHoras/tree/master/Projeto/Site)";
	 - A pasta "[webfonts](https://github.com/MateusOFCZ/SistemaControleHoras/tree/master/Projeto/Site/webfonts)" localizado em "[Projeto](https://github.com/MateusOFCZ/SistemaControleHoras/tree/master/Projeto) > [Site](https://github.com/MateusOFCZ/SistemaControleHoras/tree/master/Projeto/Site)" é referente ao Fontawesome para utilização dos icones do site;
	 - Os arquivos CSS estão localizados em "[Projeto](https://github.com/MateusOFCZ/SistemaControleHoras/tree/master/Projeto) > [Site](https://github.com/MateusOFCZ/SistemaControleHoras/tree/master/Projeto/Site) > [css](https://github.com/MateusOFCZ/SistemaControleHoras/tree/master/Projeto/Site/css)";
		- O arquivo "[all.css](https://github.com/MateusOFCZ/SistemaControleHoras/blob/master/Projeto/Site/css/all.css)" localizado em "[Projeto](https://github.com/MateusOFCZ/SistemaControleHoras/tree/master/Projeto) > [Site](https://github.com/MateusOFCZ/SistemaControleHoras/tree/master/Projeto/Site) > [css](https://github.com/MateusOFCZ/SistemaControleHoras/tree/master/Projeto/Site/css)" é referente ao Fontawesome para utilização dos icones do site;
	 - Os arquivos Javascript estão localizados em "[Projeto](https://github.com/MateusOFCZ/SistemaControleHoras/tree/master/Projeto) > [Site](https://github.com/MateusOFCZ/SistemaControleHoras/tree/master/Projeto/Site) > [js](https://github.com/MateusOFCZ/SistemaControleHoras/tree/master/Projeto/Site/js)";
	 - Os arquivos relacionados ao banco de dados estão localizados em "[Projeto](https://github.com/MateusOFCZ/SistemaControleHoras/tree/master/Projeto) > [Site](https://github.com/MateusOFCZ/SistemaControleHoras/tree/master/Projeto/Site) > [db](https://github.com/MateusOFCZ/SistemaControleHoras/tree/master/Projeto/Site/db)";
 - A SQL do banco de dados está localizado em "[Projeto](https://github.com/MateusOFCZ/SistemaControleHoras/tree/master/Projeto) > [SQL](https://github.com/MateusOFCZ/SistemaControleHoras/tree/master/Projeto/SQL)".
**Todos os arquivos principais do site estão comentados.**

## Configurações Necessárias

### Requisitos Recomendados:
 - **PHP:** 7.4.10;
 - **Bootstrap:** 5.0.2;
 - **Fontawesome:** 4.10.

### Banco de Dados:
Para o projeto funcionar, execute a SQL e insira as informações para a conexão com o banco de dados no arquivo "[conexao.php](https://github.com/MateusOFCZ/SistemaControleHoras/blob/master/Projeto/Site/db/conexao.php)" localizado em "[Projeto](https://github.com/MateusOFCZ/SistemaControleHoras/tree/master/Projeto) > [Site](https://github.com/MateusOFCZ/SistemaControleHoras/tree/master/Projeto/Site) > [db](https://github.com/MateusOFCZ/SistemaControleHoras/tree/master/Projeto/Site/db)".

> **Se você estiver rodando o projeto em "localhost" não é necessário**
> **efetuar a configuração de conexão com o banco de dados.**

O arquivo "[conexao.php](https://github.com/MateusOFCZ/SistemaControleHoras/blob/master/Projeto/Site/db/conexao.php)" está estruturado da seguinte forma:

    1 <?php //Arquivo padrão de conexão do banco de dados.
	2     include_once 'conexao.php';
	3  
	4     define('HOST', 'IP DO SERVIDOR');
	5     define('USER', 'USUÁRIO DO SERVIDOR');
	6     define('PASSWORD', 'SENHA DO SERVIDOR');
	7     define('DB', 'sch'); //Não é necessário alterar, apenas se modificado o nome do banco de dados.
	8    
	9     $connection = mysqli_connect(HOST, USER, PASSWORD, DB) or die ("Não foi possível conectar!")
    10 ?>

Para configurar corretamente altere somente as informações destacadas no arquivo "[conexao.php](https://github.com/MateusOFCZ/SistemaControleHoras/blob/master/Projeto/Site/db/conexao.php)".
Para verificar se a conexão está sendo feita acesse "SEUSITE.DOMINIO/db/conexao.php" se a página estiver em branco significa que a conexão está correta, caso contrário, reveja as informações inseridas no arquivo "[conexao.php](https://github.com/MateusOFCZ/SistemaControleHoras/blob/master/Projeto/Site/db/conexao.php)".