let estados_list;

$(document).ready(function () {
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

    $("#check_terminos").on("change", function () {
        let is_checked = $(this).prop("checked");
        console.log("check_terminos: " + is_checked);
        if (is_checked) {
            console.log("Habilita comprar");
            $(".payment-proceed").removeClass("btn-comprar-unabled").addClass("btn-comprar");
            $(".payment-proceed").prop("disabled", false);
        } else {
            console.log("Deshabilita comprar");
            $(".payment-proceed").removeClass("btn-comprar").addClass("btn-comprar-unabled");
            $(".payment-proceed").prop("disabled", true);
        }
    });

    $(".payment-proceed").on("click", function () {
        console.log("Button comprar.");
        proceed_toPayment();
    });

    $("#form_pago_card_expmes").on("change", function () {
        $("#form_pago_card_expmes_input").val($(this).val());
    });
    $("#form_pago_card_expanio").on("change", function () {
        $("#form_pago_card_expanio_input").val($(this).val());
    });

    $("#delivery_choice_btn").on("click", function () {
        $("#delivery_choice_btn").removeClass("bt_enabled_no_background").addClass("bt_enabled");
        $("#instalation_choice_btn").removeClass("bt_enabled").addClass("bt_enabled_no_background");
        $(".extrapay_concept_label").text("Envío");
        $(".extrapay_concept_value").text(result_data['total_card'].delivery_price);
        $(".total_value").text(result_data['total_card'].total_delivery);
        $("#extrapay_concept").val("total_delivery");
    });

    $("#instalation_choice_btn").on("click", function () {
        $("#delivery_choice_btn").removeClass("bt_enabled").addClass("bt_enabled_no_background");
        $("#instalation_choice_btn").removeClass("bt_enabled_no_background").addClass("bt_enabled");
        $(".extrapay_concept_label").text("Instalación");
        $(".extrapay_concept_value").text(result_data['total_card'].instalation_price);
        $(".total_value").text(result_data['total_card'].total_instalation);
        $("#extrapay_concept").val("total_instalation");
    });

    $("#form_fact_estado,#form_envio_estado").on("change", function () {
        let id = $(this).attr("id");
        let munis_id = id.replace("estado", "municipio");
        let edo = $(this).val();
        let munis = estados_list[edo];

        $('#' + munis_id).empty();
        $.each(munis, function (index, value) {
            $("#" + munis_id).append(new Option(value, value, false, false));
        });

        console.log("Select estado " + $(this).attr("id") + " Value: " + edo);
        console.log(munis);
    });

    init_forms_placeholders();
    llenar_estadoslist()

    //llenar_select_prueba(); 
    //introducir_datos_prueba();

    $("#check_factura").prop("checked", false);
    $("#check_factura").trigger("change");
    $(".div_policy").append(result_data['policy']);

});

const llenar_estadoslist = () => {
    console.log("llenar_selects_domicilio");
    fetch('/json/estados.json')
        .then(function (response) {
            return response.json();
        })
        .then(function (myJson) {
            estados_list = myJson;
            $.each(estados_list, function (index, value) {
                $("#form_fact_estado").append(new Option(index, index, false, false));
                $("#form_envio_estado").append(new Option(index, index, false, false));
            });
        });
}

const init_forms_placeholders = () => {
    let selects_array = {
        "cfdi": "Indique su CFDI",
        "fact_pais": "Indique su país",
        "fact_estado": "Indique su estado",
        "fact_municipio": "Indique su municipio",
        //"fact_localidad": "Indique su localidad",
        //"fact_colonia": "Indique su colonia",
        "envio_estado": "Indique su estado",
        "envio_municipio": "Indique su municipio",
        //"envio_colonia": "Indique su colonia",
        //"envio_localidad": "Indique su localidad",
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
            elem_val = $(this).val();
        } else if (elem_type == 'select') {
            elem_val = $(this).children("option:selected").val();
        }

        if (elem_val == "") {
            $(this).addClass('is-invalid');
            everything_correct = false;
        } else {
            $(this).removeClass('is-invalid');
        }
    });


    if (everything_correct) {
        console.log("DATOS CORRECTOS..");
        trigger_payment_form(); //Hacer trigger a form de pagos para detonar pago Conekta.
    } else {
        console.log("DATOS INCORRECTOS, NO SE PUEDE PROCEDER AL PAGO!");
    }

}

const trigger_payment_form = () => {
    console.log("Trigger");
    $("#card-form").trigger("submit");
}

const introducir_datos_prueba = () => {

    $(".form-required").each(function () {
        if ($(this).prop('nodeName').toLowerCase() == 'input') {
            if ($(this).attr("id") == 'form_telefono') {
                $(this).val("6441784512");
            } else if ($(this).attr("id") == 'form_mail' || $(this).attr("id") == 'form_mail_confirm') {
                $(this).val("testing@mail.com");
            } else if ($(this).attr("id") == 'form_envio_cp') {
                $(this).val("85100");
            } else if ($(this).attr("id") == 'form_nombre') {
                $(this).val("Estrasol");
            } else if ($(this).attr("id") == 'form_apellido_paterno') {
                $(this).val("Prueba");
            } else {
                $(this).val("Testing value");
            }
        }
    });
    $("#form_apellido_materno").val("X");

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
