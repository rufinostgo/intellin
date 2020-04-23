$(document).ready(function () {
    setTimeout(() => {
        console.clear();
        console.log("Purchase V2");

        init_forms_placeholders();
        //introducir_datos_prueba();
        llenar_select_prueba();
    }, 1000);

    $("#check_factura").on("change", function () {
        let is_checked = $(this).prop("checked");
        if (is_checked) {
            $(".tab-datos-facturacion").show();
            set_required_fact_elements(true);
        } else {
            $(".tab-datos-facturacion").hide();
            set_required_fact_elements(false);
        }
    });

    $(".btn-comprar").on("click", function () {
        console.log("Button comprar.");
        proceed_toPayment();
    });

    $("#form_pago_card_expmes").on("change",function(){
        $("#form_pago_card_expmes_input").val($(this).val());
    });
    $("#form_pago_card_expanio").on("change",function(){
        $("#form_pago_card_expanio_input").val($(this).val());
    });
});

const init_forms_placeholders = () => {
    let selects_array = {
        "cfdi": "Indique su CFDI",
        "fact_pais": "Indique su país",
        "fact_estado": "Indique su estado",
        "fact_municipio": "Indique su municipio",
        "fact_localidad": "Indique su localidad",
        "fact_colonia": "Indique su colonia",
        "envio_estado": "Indique su estado",
        "envio_municipio": "Indique su municipio",
        "envio_colonia": "Indique su colonia",
        "envio_localidad": "Indique su localidad",
        "pago_card_expmes": "Mes",
        "pago_card_expanio": "Año"
    }
    $.each(selects_array, function (index, value) {
        $("#form_" + index).select2({
            placeholder: value,
            allowClear: true
        });
    });
}

const set_required_fact_elements = (is_required) => {
    let fact_elements = [
        "form_rfc",
        "form_cfdi",
        "form_razonsocial",
        "form_fact_pais",
        "form_fact_calle",
        "form_fact_noext",
        "form_fact_noint",
        "form_fact_cp",
        "form_fact_estado",
        "form_fact_municipio",
        "form_fact_colonia",
        "form_fact_localidad",
    ];

    $.each(fact_elements, function (index, value) {
        if (is_required) {
            //console.log("Agrega requerido a #" + value);
            $("#" + value).addClass("form-required");
        } else {
            //console.log("Se remueve el requerido a #" + value);
            $("#" + value).removeClass("form-required");
        }

    });
}

const proceed_toPayment = () => {
    console.log("proceed_toPayment");
    let everything_correct = true;
    $(".form-required").each(function () {
        let elem_type = $(this).prop('nodeName').toLowerCase();
        let elem_val = "";
        if (elem_type == 'input') {
            //console.warn($(this).prev().text()); // LABEL
            //console.warn($(this).attr("id"));
            elem_val = $(this).val();
        } else if (elem_type == 'select') {
            //console.warn($(this).parent().parent().prev().text()); // LABEL
            //console.warn($(this).attr("id"));
            elem_val = $(this).children("option:selected").val();
        }

        if (elem_val == "") {
            //console.log("--Respuesta vacia--");
            $(this).addClass('is-invalid');
            everything_correct = false;
        } else {
            $(this).removeClass('is-invalid');
        }
    });

    if (everything_correct) {
        console.log("DATOS CORRECTOS..");
        //trigger_payment_form();       //Hacer trigger a form de pagos para detonar pago Conekta.
        alert("Procede al pago.");
    } else {
        console.log("DATOS INCORRECTOS, NO SE PUEDE PROCEDER AL PAGO!");
    }

}

const trigger_payment_form = () => {
    $("#card-form").trigger("submit");
}

const introducir_datos_prueba = () => {
    $("#check_factura").prop("checked", false);
    $("#check_factura").trigger("change");

    llenar_select_prueba();
    $(".form-required").each(function () {
        if ($(this).prop('nodeName').toLowerCase() == 'input') {
            if ($(this).attr("id") == 'form_telefono') {
                $(this).val("6441784512");
            } else if ($(this).attr("id") == 'form_mail' || $(this).attr("id") == 'form_mail_confirm') {
                $(this).val("testing@mail.com");
            } else {
                $(this).val("Testing value");
            }
        }
    });

    $("#form_pago_card_nombre").val("Shadow Jalcam Beroscar");
        $("#form_pago_card_tarjeta").val("4242424242424242");
        $("#form_pago_card_cvc").val("123");
        $("#form_pago_card_expmes").val("10").trigger("change");
        $("#form_pago_card_expanio").val("2022").trigger("change");
}

const llenar_select_prueba = () => {
    $(".steps_purchase").find("select").each(function () {
        if ($(this).attr("id") != 'form_pago_card_expmes' &&
            $(this).attr("id") != 'form_pago_card_expanio' &&
            $(this).attr("id") != 'form_pago_tipo') {
            let data = {
                id: 'testing',
                text: 'Testing value'
            };
            let newOption = new Option(data.text, data.id, true, true);
            $(this).append(newOption).trigger('change');
        }
    });


    $.each(['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio',
            'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
        ],
        function (index, value) {
            let newOption = new Option(value, (index + 1) + "", true, true);
            $("#form_pago_card_expmes").append(newOption);
        });
        $("#form_pago_card_expmes").val("1").trigger("change");

    for (i = 2021; i <= 2030; i++) {
        let newOption = new Option(i + "", i + "", true, true);
        $("#form_pago_card_expanio").append(newOption);
    }
    $("#form_pago_card_expanio").val("2021").trigger("change");

}
