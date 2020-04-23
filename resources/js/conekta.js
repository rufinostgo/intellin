Conekta.setPublicKey('key_LtVm2AzYeKMWzFRCaCCRyjA'); // Llave pública de pruebas
//Conekta.setPublicKey('key_RSyVhrFmXymCCgNkiqaCpyg');   // Llave pública de producción

const conektaSuccessResponseHandler = function (token) {
    console.log("Success Conekta JS!");
    let $form = $("#card-form");
    $form.append($('<input type="hidden" name="conektaTokenId" id="conektaTokenId">').val(token.id));
    //execute_order (token);
    console.log("a punto de hacer commit de verdad :)..");
    $form.get(0).submit(); //Hace submit
};
const conektaErrorResponseHandler = function (response) {
    let $form = $("#card-form");
    $form.find(".card-errors").text(response.message_to_purchaser);
    $form.find("button").prop("disabled", false);
};


//jQuery para que genere el token después de dar click en submit
$(function () {
    $("#card-form").submit(function (event) {
        let $form = $(this);
        // Previene hacer submit más de una vez
        $form.find("button").prop("disabled", true);
        Conekta.Token.create($form, conektaSuccessResponseHandler, conektaErrorResponseHandler);
        return false;
    });
});


const execute_order = (token) => {
    const data = new FormData();
    //data.append('xxx', xxx);

    fetch('execute-order', {
            method: 'POST',
            body: data
        })
        .then(function (response) {
            return response.json();
        })
        .then(function (myJson) {
            console.log("Json de respuesta:");
            console.log(myJson);
        })
        .catch(function (error) {
            console.log('Request failed', error)
        });
}
