<!DOCTYPE html>
<?php
    session_start(); //Inicia uma sessão.
    
    if($_SESSION['email'] == false){ //Verifica se o usuário está logado, se não estiver redireciona para o login.
        header('Location: /'); //Redireciona o usuário pra index.
        exit;
    } else {
        $id = $_SESSION['id'];
        $pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1; //Verifica em qual pagina o usuário está, se não tiver nenhuma seta como 1 utilizando operadores ternários.
        $pagina_anterior = $pagina - 1;
		$pagina_posterior = $pagina + 1;

        $itens_por_pagina = 6; //Define quantos itens irão ser exibidos por página.

        $url_gethoras = "http://localhost/db/home.php?request=gethoras&usuario=$id"; //Chama a API

        $json_gethoras = file_get_contents($url_gethoras); //Obtem o conteúdo da página da API.
        $json_data_gethoras = json_decode($json_gethoras, true); //Decodifica o JSON da página da API.
        $inicio_manha_gethoras = $json_data_gethoras['inicio_manha']; //Salva a array do JSON.
        $termino_manha_gethoras = $json_data_gethoras['termino_manha']; //Salva a array do JSON.
        $inicio_tarde_gethoras = $json_data_gethoras['inicio_tarde']; //Salva a array do JSON.
        $termino_tarde_gethoras = $json_data_gethoras['termino_tarde']; //Salva a array do JSON.

        $total_itens = count($inicio_manha_gethoras); //Obtem o tamanho da array.

        $pagina_necessarias = ceil($total_itens/$itens_por_pagina); //Faz o calculo para verificar quantas páginas precisam ser criadas.

        $iniciar = ($itens_por_pagina*$pagina)-$itens_por_pagina; //Verifica qual item deve começar a ser exibido em cada página.

        $url_getitens = "http://localhost/db/home.php?request=getitens&usuario=$id&paginas=$itens_por_pagina&iniciar=$iniciar"; //Chama a API

        $json_getitens = file_get_contents($url_getitens); //Obtem o conteúdo da página da API.
        $json_data_getitens = json_decode($json_getitens, true); //Decodifica o JSON da página da API.
        $inicio_manha_getitens = $json_data_getitens['inicio_manha']; //Salva a array do JSON.
        $termino_manha_getitens = $json_data_getitens['termino_manha']; //Salva a array do JSON.
        $inicio_tarde_getitens = $json_data_getitens['inicio_tarde']; //Salva a array do JSON.
        $termino_tarde_getitens = $json_data_getitens['termino_tarde']; //Salva a array do JSON.

        $total_getitens = count($inicio_manha_getitens);  //Obtem o tamanho da array.
    }
?>
<html>
    <head>
        <link rel="stylesheet" href="css/all.css"> <!--CSS do Fontawesome para utilização dos icones.-->
        <link rel="stylesheet" type="text/css" href="css/styles.css"> <!--CSS do site.-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> <!--Bootstrap.-->
        <script type="text/javascript" src="js/functions_index.js"></script> <!--Javascript do site.-->
        <meta http-equiv='cache-control' content='no-cache'>
        <meta http-equiv='expires' content='0'>
        <meta http-equiv='pragma' content='no-cache'>
        <title>SCH ~ Início</title>
    </head>
    <body>
        <div class="FormBackground">
            <a href="/" target="_blank" class="Title">
    			Inicío
    		</a>
    		<p><a class="logout" href="/db/logout.php">
    			Sair
    		</a></p>
			<hr>
			<p class="Welcome">Olá <strong><?php print_r($_SESSION['nome'] . " " . $_SESSION['sobrenome'])?></strong>, seja bem vindo(a) ao SCH!</p> <!--Exibe uma mensagem de boas vindas e o nome do usuário-->
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col"><center>Início Manhã</center></th>
                        <th scope="col"><center>Término Manhã</center></th>
                        <th scope="col"><center>Início Tarde</center></th>
                        <th scope="col"><center>Término Tarde</center></th>
                        <th scope="col"><center>Operações</center></th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i=0; $i < $total_getitens; $i++) { ?> <!--Cria um novo conteúdo na tabela conforme a quantidade de itens.-->
                        <tr>
                            <td><center><?php echo $inicio_manha_getitens[$i]; ?></center></td> <!--Exibe o horário de inicio do periodo da manhã cadastrado no banco de dados.-->
                            <td><center><?php echo $termino_manha_getitens[$i]; ?></center></td> <!--Exibe o horário de término do periodo da manhã cadastrado no banco de dados.-->
                            <td><center><?php echo $inicio_tarde_getitens[$i]; ?></center></td> <!--Exibe o horário de inicio do periodo da tarde cadastrado no banco de dados.-->
                            <td><center><?php echo $termino_tarde_getitens[$i]; ?></center></td> <!--Exibe o horário de término do periodo da tarde cadastrado no banco de dados.-->
                            <td><center><i class="fas fa-pencil-alt"></i> <i class="fas fa-trash-alt"></i></center></td> <!--Insere os icones de edição e exclusão dos horários.-->
                        </tr>
                    <?php }?>
                </tbody>
            </table>
            <ul class="pagination"> <!--Inicio do Sistema de paginação.-->
                <?php if($pagina_anterior != 0){ ?> <!--Verifica se a paginação anterior é diferente de 0.-->
                    <li class="page-item"><a class="page-link" href="home.php?pagina=<?php echo $pagina_anterior; ?>"><span aria-hidden="true">&laquo;</span> Anterior</a></li> <!--Se a paginação anterior for diferente a 0 exibe o botão "Anterior".-->
                <?php } else {?>
                    <li class="page-item disabled"><a class="page-link" href="home.php?pagina=<?php echo $pagina_anterior; ?>"><span aria-hidden="true">&laquo;</span> Anterior</a></li> <!--Se a paginação anterior for igual a 0 exibe o botão "Anterior" bloqueado.-->
                <?php } ?>
                <?php for($i = 1; $i < $pagina_necessarias + 1; $i++){ ?>
                    <li class="page-item"><a class="page-link" href="home.php?pagina=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                <?php } ?>
                <?php if($pagina_posterior <= $pagina_necessarias){ ?>
                    <li class="page-item"><a class="page-link" href="home.php?pagina=<?php echo $pagina_posterior; ?>">Próximo <span aria-hidden="true">&raquo;</span></a></li> <!--Se a próxima página for igual ou maior que a paginação necessária exibe o botão "Próximo".-->
                <?php } else {?>
                    <li class="page-item disabled"><a class="page-link" href="home.php?pagina=<?php echo $pagina_posterior; ?>">Próximo <span aria-hidden="true">&raquo;</span></a></li> <!--Se a próxima página for maior que a paginação necessária exibe o botão "Próximo" bloqueado.-->
                <?php } ?>
            </ul> <!--Fim do Sistema de paginação.-->
        </div>
    </body>
</html>