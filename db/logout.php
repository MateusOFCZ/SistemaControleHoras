<?php //Ao sair da conta destrói as sessões e redireciona o usuário pra index.
    session_start();
    session_destroy();
    header('Location: /');
    exit;
?>