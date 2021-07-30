<?php
    header("Access-Control-Allow-Origin: *"); //Configurações da página.
    header('Access-Control-Allow-Methods: GET, POST, OPTIONS'); //Configurações da página.
    header("Access-Control-Allow-Headers: Content-Type, Authorization"); //Configurações da página.
    header('Content-Type: application/json'); //Configurações da página.
    session_start(); //Inicia uma sessão.
    include_once 'conexao.php'; //Incluí o arquivo de conexão com o banco de dados.
    
    $request = $_REQUEST['request']; //Obtem os dados por request.

    if(empty($request)) { //Verifica se a request foi passada.
        echo "invalid_request"; //Exibe mensagem de erro.
        header('Location: /'); //Redireciona o usuário pra index.
        exit;
        die(); //Finaliza o processo.
    } else {
        if($request == "gethoras") { //Verifica se "request" é igual a "gethoras".
            $id = $_REQUEST['usuario']; //Obtem os dados por request.

            if(empty($id)) { //Verifica se a request foi passada.
                echo "invalid_request"; //Exibe mensagem de erro.
                header('Location: /'); //Redireciona o usuário pra index.
                exit;
                die(); //Finaliza o processo.
            } else {
                $query = "SELECT `inicio_manha`, `termino_manha`, `inicio_tarde`, `termino_tarde` FROM `horas` WHERE `usuario` = $id;"; //Instanciando a query.
                $result = mysqli_query($connection, $query); //Faz a conexão com o banco de dados e executa a query.
                
                $row = mysqli_num_rows($result); //Obtem a quantidade de linhas retornadas.
                
                if ($row > 0) { //Verifica se a quantidade de linhas é maior que 0.
                    while ($res = mysqli_fetch_row($result)) { //Procura pelos resultados da query por linha.
                        $inicio_manha["inicio_manha"][] = $res[0];  //Salva em uma array os resultados da linha 0.
                        $termino_manha["termino_manha"][] = $res[1]; //Salva em uma array os resultados da linha 1.
                        $inicio_tarde["inicio_tarde"][] = $res[2]; //Salva em uma array os resultados da linha 2.
                        $termino_tarde["termino_tarde"][] = $res[3]; //Salva em uma array os resultados da linha 3.
                    }
                } else {
                    $inicio_manha["inicio_manha"][] = null; //Define a array como nula.
                    $termino_manha["termino_manha"][] = null; //Define a array como nula.
                    $inicio_tarde["inicio_tarde"][] = null; //Define a array como nula.
                    $termino_tarde["termino_tarde"][] = null; //Define a array como nula.
                }
            
                $jsons = json_encode(array_merge($inicio_manha, $termino_manha, $inicio_tarde, $termino_tarde), JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); //Transforma as arrays em json.
                echo $jsons; //Exibe os jsons.
                die(); //Finaliza o processo.
            }
        } else if($request == "getitens") {
            $id = $_REQUEST['usuario']; //Obtem os dados por request.
            $iniciar = $_REQUEST['iniciar']; //Obtem os dados por request.
            $paginas = $_REQUEST['paginas']; //Obtem os dados por request.
            
            if(empty($id) || empty($paginas)) { //Verifica se as requests foram passadas.
                echo "invalid_request"; //Exibe mensagem de erro.
                header('Location: /'); //Redireciona o usuário pra index.
                exit;
                die(); //Finaliza o processo.
            } else {
                if (!$iniciar) {
                    $iniciar = 0;
                }
                $query = "SELECT `inicio_manha`, `termino_manha`, `inicio_tarde`, `termino_tarde` FROM `horas` WHERE `usuario` = $id LIMIT $iniciar, $paginas;"; //Instanciando a query.
                $result = mysqli_query($connection, $query); //Faz a conexão com o banco de dados e executa a query.
                
                $row = mysqli_num_rows($result); //Obtem a quantidade de linhas retornadas.
                
                if ($row > 0) { //Verifica se a quantidade de linhas é maior que 0.
                    while ($res = mysqli_fetch_row($result)) { //Procura pelos resultados da query por linha.
                        $inicio_manha["inicio_manha"][] = $res[0]; //Salva em uma array os resultados da linha 0.
                        $termino_manha["termino_manha"][] = $res[1];//Salva em uma array os resultados da linha 1.
                        $inicio_tarde["inicio_tarde"][] = $res[2];//Salva em uma array os resultados da linha 2.
                        $termino_tarde["termino_tarde"][] = $res[3];//Salva em uma array os resultados da linha 3.
                    }
                } else { //Se for menor ou igual a 0 define as arrays como nulas.
                    $inicio_manha["inicio_manha"][] = null; //Define a array como nula.
                    $termino_manha["termino_manha"][] = null; //Define a array como nula.
                    $inicio_tarde["inicio_tarde"][] = null; //Define a array como nula.
                    $termino_tarde["termino_tarde"][] = null; //Define a array como nula.
                }

                $jsons = json_encode(array_merge($inicio_manha, $termino_manha, $inicio_tarde, $termino_tarde), JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); //Transforma as arrays em json.
                echo $jsons; //Exibe os jsons.
                die(); //Finaliza o processo.
            }
        } else {
            echo "invalid_request"; //Exibe mensagem de erro.
            header('Location: /'); //Redireciona o usuário pra index.
            exit;
            die(); //Finaliza o processo.
        }
    }
    $connection->close(); //Fecha a conexão
?>