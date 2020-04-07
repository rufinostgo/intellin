$(document).ready(function () {
    console.log("SignupJS");
});

/**
 * AJAX 
 */

const search_code = () => {
    let value = $('.numero_contrato').val();
    console.log("SearchCode.. valor: " + value);
    if (value == "") {
        $('.numero_contrato').parent().find(".invalid-signup").text("Por favor indique su número de contrato.")
        $('.numero_contrato').addClass('is-invalid');
    } else {
        window.location.href="http://127.0.0.1:8000/welcome/"+value;
        /*fetch('http://127.0.0.1:8000/welcome/' + value)
        .then(function(response){
            return response.json();
        })
        .then(function(myJson){

        })
        .catch(function (error) {
            console.log('Hubo un problema con la petición Fetch:' + error.message);
            $('.numero_contrato').parent().find(".invalid-signup").text("El número ingresado no se encuentra, por favor intente de nuevo o bien reporte el error.")
            $('.numero_contrato').addClass('is-invalid');

        });*/
        
        /*fetch('https://pokeapi.co/api/v2/pokemon/' + value)
            .then(function (response) {
                return response.json();
            })
            .then(function (myJson) {
                console.log("Registro de Edificio");
                console.log(myJson);
            })
            .catch(function (error) {
                console.log('Hubo un problema con la petición Fetch:' + error.message);
                $('.numero_contrato').parent().find(".invalid-signup").text("El número ingresado no se encuentra, por favor intente de nuevo o bien reporte el error.")
                $('.numero_contrato').addClass('is-invalid');

            });*/
    }
}

$(".numero_contrato").on('keypress', function () {
    var keyCode = event.keyCode || event.which;
    if (keyCode == '13'){
      event.preventDefault();
      console.log('enter pressed');
      search_code();
    }else{
      $(this).removeClass('is-invalid');
    }
});
