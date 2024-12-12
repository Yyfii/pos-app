 // Seleciona todos os elementos com a classe .btn
 const buttons = document.querySelectorAll('.step-btn');

 // Adiciona um evento de clique a cada botão
 buttons.forEach(button => {
    button.addEventListener('click', () => {
        // Captura o ID do botão
        const buttonId = button.id;

        // Remove os últimos 4 caracteres do ID
        const modifiedId = buttonId.slice(0, -4);

        secao = document.getElementById(modifiedId);
        const inputsDiv1 = secao.querySelectorAll('input');
        const cpfNotChange = document.getElementById("cpfNotChange");
       // Impede que o usuário digite no campo
       if(cpfNotChange){
                cpfNotChange.addEventListener('keydown', (event) => {
            event.preventDefault(); // Impede qualquer tecla de ser pressionada
        });

            // Impede que o usuário cole texto no campo
            cpfNotChange.addEventListener('paste', (event) => {
                event.preventDefault(); // Impede a ação de colar
            });
       }


        if(secao.classList[1] == 'none'){
            secao.classList.remove('none');
            secao.classList.add('show');
            inputsDiv1.forEach(input => input.setAttribute('enable'));
            inputsDiv1.forEach(input => input.removeAttribute('required'));
        }
        else{
            secao.classList.remove('show');
            secao.classList.add('none');
            inputsDiv1.forEach(input => input.removeAttribute('disabled'));
            inputsDiv1.forEach(input => input.addAttribute('required'));

        }
        
    });
});