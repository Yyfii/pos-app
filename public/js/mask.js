window._ = require('lodash');

try {

    window.$ = window.jQuery = require('jquery');
    require('jquery-mask-plugin');
    $('#telefone').mask('(00) 0 0000-0000', {reverse: true});
    var options = {
        onKeyPress: function (cpf, ev, el, op) {
            var masks = ['000.000.000-000', '00.000.000/0000-00'];
            $('.cpfOuCnpj').mask((cpf.length > 14) ? masks[1] : masks[0], op);
        }
    }
    $('.cpfOuCnpj').length > 11 ? $('.cpfOuCnpj').mask('00.000.000/0000-00', options) : $('.cpfOuCnpj').mask('000.000.000-00#', options);
    $('form').on('submit', function(){
        $('#telefone').unmask();
        $('.cpfOuCnpj').unmask();
    });

} catch (error) {
    console.log(error);
}


