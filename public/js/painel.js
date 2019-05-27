jQuery(function($){

    $('#data_nascimento').mask("99/99/9999");
    $('.hora').mask("99:99");

    $('#idade').mask("99");
    $('#cpf').mask("999.999.999-99");

    $('#celular').mask("(99) 99999-9999");

    $('#data').mask("99/99/9999");
    $('.data').mask("99/99/9999");

    // Outra Universidade
    $(".universidade").on('change', function(event){
        event.preventDefault();
        var option = $(".universidade option:selected").val();
        //console.log(option);

        if (option == 'OUTRA') {
            $(".outra_universidade").show();
        }else{
            $(".outra_universidade").hide();
        }
    });

    $(function(){
        var option = $(".universidade option:selected").val();

        if (option == 'OUTRA') {
            $(".outra_universidade").show();
        }else{
            $(".outra_universidade").hide();
        }

    });
    // Outra Universidade

});


