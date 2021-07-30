<?php
    session_start(); //Inicia uma sessão.
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/styles.css"> <!--CSS do site.-->
        <script type="text/javascript" src="js/functions_index.js"></script> <!--Javascript do site.-->
        <meta http-equiv='cache-control' content='no-cache'>
        <meta http-equiv='expires' content='0'>
        <meta http-equiv='pragma' content='no-cache'>
        <title>SCH ~ Login</title>
    </head>
    <body>
        <div class="FormBackground">
            <form name="FormDownload" action="/db/login.php" method="post" autocomplete="off">
                <a href="/" target="_blank" class="Title">
					Login
				</a>
				<hr>
				<?php
				    if(isset($_SESSION['email'])): //Se "email" existir irá exibir a mensagem de erro.
				?>
				        <center><text class="Warning_Invalid">ERRO: E-Mail ou Senha inválido!</text></center>
				<?php
				    endif;
				    unset($_SESSION['email']); //"Limpar" a sessão.
				?>
                <fieldset>
                    <legend>E-Mail</legend>
                    <input id="email" type="email" name="email" oninput="VerificarCampos()"><br> <!--Verificação de preenchimento do campo em Javascript.-->
                </fieldset>
                <br>
                <fieldset>
                    <legend>Senha:</legend>
                        <input id="senha" type="password" name="senha" oninput="VerificarCampos()" onkeydown="SenhaCaps(event)"><br>  <!--Verificação de preenchimento do campo e capslock em Javascript.-->
                        <text id="Warning_Caps">CAPS LOCK LIGADO</text> <!--Se o capslock estiver ligado exibe a mensagem.-->
                </fieldset>
                <br><br>
                <div class="coluna">
                    <input id="login" type="submit" value="Entrar" class="button">
                    <br>
                    <input id="register" type="button" value="Registrar-Se" class="button" onclick="window.location.href='/registro.php'">
                </div>
            </form>
        </div>
    </body>
</html>