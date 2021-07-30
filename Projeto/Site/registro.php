<?php
    session_start(); //Inicia uma sessão.
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/styles.css"> <!--CSS do site.-->
        <script type="text/javascript" src="js/functions_register.js"></script> <!--Javascript do site.-->
        <meta http-equiv='cache-control' content='no-cache'>
        <meta http-equiv='expires' content='0'>
        <meta http-equiv='pragma' content='no-cache'>
        <title>SCH ~ Registro</title>
    </head>
    <body>
        <div class="FormBackground">
            <form name="FormRegister" action="/db/register.php" method="post" autocomplete="off">
                <a href="/" target="_blank" class="Title">
					Registro
				</a>
				<hr>
				<?php
				    if(isset($_SESSION['registrado'])): //Se "registrado" existir exibe a mensagem de sucesso.
				?>
				        <center><text class="Warning_Valid">Registrado com sucesso!</text></center>
				<?php
				    endif;
				    unset($_SESSION['registrado']); //"Limpar" a sessão.
				?>
				
				<?php
				    if(isset($_SESSION['conta_existente'])): //Se "conta_existente" existir exibe a mensagem de erro.
				?>
				        <center><text class="Warning_Invalid">E-Mail em uso!</text></center>
				<?php
				    endif;
				    unset($_SESSION['conta_existente']); //"Limpar" a sessão.
				?>
				
				<?php
				    if(isset($_SESSION['erro_registro'])): //Se "erro_registro" existir exibe a mensagem de erro.
				?>
				        <center><text class="Warning_Invalid">Erro ao se registrar, tente novamente mais tarde!</text></center>
				<?php
				    endif;
				    unset($_SESSION['erro_registro']); //"Limpar" a sessão.
				?>
                <fieldset>
                    <legend>Nome</legend>
                    <input id="nome" type="text" name="nome" oninput="VerificarCampos()"><br> <!--Verificação de preenchimento do campo em Javascript.-->
                </fieldset>
                <br>
                <fieldset>
                    <legend>Sobrenome</legend>
                    <input id="sobrenome" type="text" name="sobrenome" oninput="VerificarCampos()"><br> <!--Verificação de preenchimento do campo em Javascript.-->
                </fieldset>
                <br>
                <fieldset>
                    <legend>E-Mail</legend>
                    <input id="email" type="email" name="email" oninput="VerificarCampos()"><br> <!--Verificação de preenchimento do campo em Javascript.-->
                </fieldset>
                <br>
                <fieldset>
                    <legend>Senha:</legend>
                        <input id="senha" type="password" name="senha" oninput="VerificarCampos()" onkeydown="SenhaCaps(event)"><br> <!--Verificação de preenchimento do campo e capslock em Javascript.-->
                        <text id="Warning_Caps">CAPS LOCK LIGADO</text>
                </fieldset>
                <br><br>
                <div class="coluna">
                    <input id="register" type="submit" value="Registrar-Se" class="button">
                    <br>
                    <input id="login" type="button" value="Voltar" class="button" onclick="window.location.href='/index.php'">
                </div>
            </form>
        </div>
    </body>
</html>