window.onload = function() { //Função "Ao carregar a janela".
    localStorage.clear(); //Limpa o armazenamento local.
    document.getElementById("Warning_Caps").style.opacity = "0"; //Procura o elemento pelo ID e seta a opacidade como 0.
    DesabilitarEnviar(true); //Desabilita o botão de enviar do formulário.
};

function VerificarCampos() { //Cria a função.
    VerificarEntradas(); //Executa outra função.
}

function VerificarEntradas() { //Cria a função.
    var senha = document.getElementById("senha").value; //Procura o elemento pelo ID e salva o valor em uma variável.
    var email = document.getElementById("email").value; //Procura o elemento pelo ID e salva o valor em uma variável.
    if(senha == "" || email == "") { //Verifica se os campos são nulos.
        DesabilitarEnviar(true); //Se for nulo executa a função e envia um valor.
    }else{
        DesabilitarEnviar(false); //Se não for nulo executa a função e envia um valor.
    }
}
            
function DesabilitarEnviar(tf) { //Cria a função.
    document.getElementById("login").disabled = tf; //Procura o elemento pelo ID e desabilita conforme o valor enviado ao chamar a função.
    if(tf == true){ //Verifica se o valor enviado pra função é "true".
        document.getElementById("login").setAttribute("class", "button disabled"); //Se for verdadeiro procura pelo elemento pelo ID e seta um atributo pro elemento.
    } else {
        document.getElementById("login").setAttribute("class", "button"); //Se for diferente de verdadeiro procura pelo elemento pelo ID e seta um atributo pro elemento.
    }
}

function SenhaCaps(event) { //Cria a função.
    var tf = event.getModifierState("CapsLock"); //Verifica se o estado do evento é "CapsLock".
    if(tf == true){ //Verifica se o valor enviado pra função é "true".
        document.getElementById("Warning_Caps").style.opacity = "1";  //Se for verdadeiro procura pelo elemento pelo ID e seta a opacidade.
    }else{
        document.getElementById("Warning_Caps").style.opacity = "0";  //Se for diferente de verdadeiro procura pelo elemento pelo ID e seta a opacidade.
    }
}