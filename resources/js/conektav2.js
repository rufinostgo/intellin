Conekta.setPublicKey('key_LtVm2AzYeKMWzFRCaCCRyjA'); // Llave pública de pruebas
//Conekta.setPublicKey('key_RSyVhrFmXymCCgNkiqaCpyg');   // Llave pública de producción

const conektaSuccessResponseHandler = function (token_con) {
    //console.log("Success Conekta JS!");
    let $form = $("#card-form");
    $form.append($('<input type="hidden" name="conektaTokenId" id="conektaTokenId">').val(token_con.id));
 
    const data_con = new FormData();
    data_con.append('_token', $("meta[name='csrf-token']").attr("content"));
    data_con.append('conektaTokenId', token_con.id);
    data_con.append('shadow', 75000);
    data_con.append('extrapay_concept', $("#extrapay_concept").val());
    data_con.append('products_list', $("#products_list").val());
    data_con.append('depto_info', $("#depto_info").val());
    data_con.append('num_pagos', $("#num_pagos").val())


    $.each(['form_nombre', 'form_apellido_paterno', 'form_apellido_materno',
            'form_telefono', 'form_mail', 'form_envio_calle', 'form_envio_noext', 'form_envio_noint',
            'form_envio_cp', 'form_envio_estado', 'form_envio_municipio', 'form_envio_localidad',
            'form_envio_colonia', 'form_pago_tipo'
        ],
        function (index, value) {
            $form.append($('<input type="hidden" name="' + value + '" >').val($("#" + value).val()));
            data_con.append(value, $("#" + value).val());
        });

        console.log("READYs");
      fetch('try_payment', {
            method: 'POST',
            body: data_con,
        })
        .then(function (response) {
            return response.json();
        })
        .then(function (myJson) {
            console.log(myJson);
            $(".payment-proceed").prop('disabled', false);
            $(".payment-proceed").removeClass("btn-comprar-unabled").addClass("btn-comprar");
            $(".payment-proceed").html("PAGAR");

            if (myJson.success == 'success') {
                console.log("Success");
                $form.get(0).submit();
            } else {
                console.log("Unsuccessfully");
                $(".div-conekta-answer").show();
                $(".conekta-answer").text(myJson.error_msg);
            }
        }).catch(function (error) {
            console.log("El errorsini, sinisini");
            console.log(error);
        });
    //$form.get(0).submit();
};
const conektaErrorResponseHandler = function (response) {
    console.log("Error: " + response.message_to_purchaser);
 
    $(".payment-proceed").prop('disabled', false);
    $(".payment-proceed").removeClass("btn-comprar-unabled").addClass("btn-comprar");
    $(".payment-proceed").html("PAGAR");
    $(".div-conekta-answer").show();
    $(".conekta-answer").text("Error: " + response.message_to_purchaser);

    let $form = $("#card-form");
    $form.find(".card-errors").text(response.message_to_purchaser);
    $form.find("button").prop("disabled", false);
};


//jQuery para que genere el token después de dar click en submit
$(function () {
    $("#card-form").submit(function (event) {
        let $form = $(this);
        $form.find("button").prop("disabled", true);
        Conekta.Token.create($form, conektaSuccessResponseHandler, conektaErrorResponseHandler);
        return false;
    });
});


