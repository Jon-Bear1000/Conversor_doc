
$(function(){         
    $('#carregar').on('click', function(){
        let formdata = new FormData($("#formulario")[0])

        $.ajax({
            type: 'POST',
            url: 'converte.php',
            data: formdata,
            processData: false,
            contentType: false

        }).done(function(retorno){

            //Envia o conteúdo de converte.php para o componente com id="link"
            $('#retorno').html(retorno)
        })
       
    })
})  



  
