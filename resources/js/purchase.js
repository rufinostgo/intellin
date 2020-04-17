const act_tocheck1 = 'Motor Baterías'; // Accionamiento a verificar para controles en la sección de productos necesarios.
const act_tocheck2 = 'Motor AC'; // Accionamiento a verificar para controles en la sección de productos necesarios.
const act_tocheck3 = 'Cargador'; // Accionamiento a verificar para controles en la sección de Otros productos.
const act_tocheck4 = 'Interfase'; // Accionamiento a verificar para controles en la sección de Otros productos.

$(document).ready(function () {
    setTimeout(() => {
        //console.clear();
        //console.log("|| PURCHASE VIEW ||");
    }, 1000);

    $(".select_product").select2({
        placeholder: "Seleccione",
        allowClear: true
    });

    ocultar_valores_extra_interfase();

    $(".select_product_area").on("change", function () {
        //console.log("select_product_area");
        let id = $(this).val() != "" ? $(this).val() : "empty";
        let total = $(this).val() != "" ? products_gral[$(this).val()] : "0.00";
        $(this).parent().parent().find(".preci_total").text("$" + total);

        if (id != 'empty') {
            $(this).parent().parent().find(".show-p").prop("disabled", false);
            $(this).parent().parent().find(".show-p").attr("href", "#carouselModal_" + id);
            $(this).parent().parent().find(".show-p").removeClass('show_product-dis').addClass('show_product');
        } else {
            $(this).parent().parent().find(".show-p").prop("disabled", true);
            $(this).parent().parent().find(".show-p").attr("href", "#carouselModal");
            $(this).parent().parent().find(".show-p").removeClass('show_product').addClass('show_product-dis');
        }
        watch_needed_products($(this).parent().parent().parent()); // .ZoneProduct
        watch_other_products();
        calcular_totales();

        const parent_row_id = $(this).parent().parent().attr("id");
        const select_mb_id = parent_row_id.replace("web", "select");
        const select_mobile = $("#" + select_mb_id);
        if ($(select_mobile).val() != $(this).val()) {
            $(select_mobile).val($(this).val());
            $(select_mobile).trigger("change");
        } else {
            //console.log("Mismo value en ambos selects, se detienen triggers. (MSG Web)");
        }
    });

    $(".select_product_mobarea").on("change", function () {
        //console.log("select_product_mobarea");
        const total = $(this).val() != "" ? products_gral[$(this).val()] : "0.00";
        //console.log(total);
        $(this).parent().parent().parent().parent().find(".preci_total_mobile").text("$" + total);

        const select_id = $(this).attr("id");
        const row_area = select_id.replace("select", "web");
        const select_area = $("#" + row_area).find(".select_product_area");

        if ($(select_area).val() != $(this).val()) {
            $(select_area).val($(this).val());
            $(select_area).trigger("change");
        } else {
            //console.log("Mismo value en ambos selects, se detienen triggers. (MSG Mobile)");
        }
    });

    $(".select_product_extra").on("change", function () {
        let cant = $(this).val() != "" ? $(this).val() : "empty";
        const product_id = $(this).parent().parent().find(".extra_product_id").val();
        let product_price = products_gral[product_id].replace(",", "");

        if (cant != 'empty') {
            //console.log(cant + " del id (" + product_id + ") a precio unitario de " + product_price);
            let product_price_total = +cant * +product_price;
            $(this).parent().parent().find(".preci_total").text(currencyFormat(product_price_total));
            calcular_totales();
        } else {
            //console.log("empty for some reason");
            $(this).val("1");
            $(this).trigger("change");
        }


        let select_idweb = $(this).attr("id");
        let select_mb_id = select_idweb.replace("webselect", "select");
        let select_mobile = $("#" + select_mb_id);

        if ($(select_mobile).val() != $(this).val()) {
            //console.log("Select extra val: " + $(this).val());
            $(select_mobile).val($(this).val());
            $(select_mobile).trigger("change");
        } else {
            //console.log("Mismo value en ambos selects, se detienen triggers. (MSG Web)");
        }
    });

    $(".select_product_mobextra").on("change", function () {
        //console.log("select_product_mobextra");
        const cant = $(this).val() != "" ? $(this).val() : "empty";
        const product_id = $(this).parent().find(".extra_product_id").val();
        const product_price = products_gral[product_id].replace(",", "");
        const product_price_total = +cant * +product_price;
        //console.log("Productpricetotal: " + product_price_total);
        $(this).parent().parent().parent().parent().find(".preci_total_mobile").text(currencyFormat(product_price_total));

        const select_id = $(this).attr("id");
        const id_webselect = select_id.replace("select", "webselect");
        const select_area = $("#" + id_webselect);

        //console.log("selectid: " + select_id + " ... webselect: " + id_webselect);
        if ($(select_area).val() != $(this).val()) {
            $(select_area).val($(this).val());
            $(select_area).trigger("change");
        } else {
            //console.log("Mismo value en ambos selects, se detienen triggers. (MSG Mobile)");
        }
    });


});

const calcular_totales = () => {
    let subtotal = 0,
        iva = 0,
        total = 0;
    $(".product_row").each(function () {
        let monto = $(this).find(".select_product_area").val() != "" ? products_gral[$(this).find(".select_product_area").val()].replace(',', '') : 0;
        subtotal = +subtotal + +monto;
    });
    $(".extra-row").each(function () {
        //console.log("Extra row");
        let cant = $(this).find(".select_product_extra").val() != "" ? $(this).find(".select_product_extra").val() : 1;
        let price = products_gral[$(this).find(".extra_product_id").val()].replace(',', '');
        let monto = +cant * +price;
        //console.log(cant + " * " + price + " = " + monto);
        subtotal = +subtotal + +monto;
    });
    iva = (subtotal * .16);
    total = +subtotal + +iva;
    $(".monto-subtotal").text(currencyFormat(subtotal));
    $(".monto-iva").text(currencyFormat(iva));
    $(".monto-total").text(currencyFormat(total));
}

const watch_needed_products = (div_zoneprod) => {
    //console.log("watch_needed_products()..");
    let motor_count = 0;
    const div_zp_extras = $(div_zoneprod).parent().find(".all_zone_extraprods");
    $(div_zoneprod).find(".product_row").each(function () {
        //console.log("PRODUCTO: " + $(this).find(".select_product_area  option:selected").text());
        if (products_act[$(this).find(".select_product_area").val()] != null) {
            const actuation = products_act[$(this).find(".select_product_area").val()];
            //console.log(actuation + " es dif de null");
            if (actuation == act_tocheck1 || actuation == act_tocheck2) {
                //console.log("Es un motor, se requieren productos..");
                motor_count++;
            }
        }
    });
    //console.log("Motores necesarios: " + motor_count);
    const zp_extras = $(div_zoneprod).parent().find(".zone-product-extras");
    if (motor_count > 0) {
        $(div_zp_extras).removeClass("d-none");
        let index_ctrl;
        if (motor_count == 1) {
            //console.log("Hay que utilizar el div control_1 con class #" + needed_prods['control_1']);
            index_ctrl = needed_prods['control_1'];
        } else if (motor_count > 1) {
            //console.log("Hay que utilizar el div control_5 con class #" + needed_prods['control_5']);
            index_ctrl = needed_prods['control_5'];
        }

        $.each(needed_prods, function (x, value) {
            if (value == index_ctrl) {
                const div_control = $(zp_extras).find("#row-prodn-" + index_ctrl);
                let classes = $(div_control).attr("class").split(/ +/);
                let already_shown = false;
                $.each(classes, function (y, _class) {
                    if (_class == 'row-prodn-true') {
                        already_shown = true;
                    }
                })

                if (!already_shown) {
                    //console.log("Se muestra " + value);
                    $(div_control).removeClass("row-prodn-false").addClass("row-prodn-true");
                    $(div_control).find(".select_product_extra").val("1");
                    $(div_control).find(".select_product_extra").trigger("change");

                    $(div_control).find('.select_product_extra').select2('val', '');
                    $(div_control).find('.select_product_extra option[value="0"]').detach();
                } else {
                    //console.log("Ya estamos mostrando esta fila, no la reinicies.")
                }
            } else {
                //console.log("Se esconde " + value);
                let other_div = $(zp_extras).find("#row-prodn-" + value);
                $(other_div).removeClass("row-prodn-true").addClass("row-prodn-false");

                let data = {
                    id: 0,
                    text: '0'
                };
                let newOption = new Option(data.text, data.id, true, true);
                $(other_div).find(".select_product_extra").append(newOption).trigger('change');
                //$(other_div).find(".select_product_extra").val("0");
                //$(other_div).find(".select_product_extra").trigger("change");
            }
        });
    } else {
        //console.log("Hay que esconder todos los divs.");
        $(div_zp_extras).addClass("d-none");
        let data = {
            id: 0,
            text: '0'
        };
        let newOption = new Option(data.text, data.id, true, true);
        $(zp_extras).find(".select_product_extra").append(newOption).trigger('change');
        $(zp_extras).find(".row-prodn").removeClass("row-prodn-true").addClass("row-prodn-false");
    }
}

const watch_other_products = () => {
    let motor_exists = false;
    $(".product_row").each(function () {
        //console.log("PRODUCTO: " + $(this).find(".select_product_area  option:selected").text());
        if (products_act[$(this).find(".select_product_area").val()] != null) {
            const actuation = products_act[$(this).find(".select_product_area").val()];
            //console.log(actuation + " es dif de null");
            if (actuation == act_tocheck1) {
                //console.log("Es un motor de baterías");
                motor_exists = true;
            }
        }
    });

    //console.log("Motor exists: " + motor_exists);
    const div_cargador = $("#row-prodn-" + other_prods['cargador']);
    const div_interfase = $("#row-prodn-" + other_prods['interfase']);
    if (motor_exists) {
        $(".all_otherprods").removeClass("d-none");
        let classes = $(div_cargador).attr("class").split(/ +/);
        let already_shown = false;
        $.each(classes, function (y, _class) {
            if (_class == 'row-prodn-true') {
                already_shown = true;
            }
        })
        if (!already_shown) {
            $(div_cargador).removeClass("row-prodn-false").addClass("row-prodn-true");
            $(div_cargador).find(".select_product_extra").val("1");
            $(div_cargador).find(".select_product_extra").trigger("change");
            $(div_cargador).find('.select_product_extra').select2('val', '');
            $(div_cargador).find('.select_product_extra option[value="0"]').detach();

            $(div_interfase).find(".select_product_extra").val("0");
            $(div_interfase).find(".select_product_extra").trigger("change");


        } else {
            //console.log("Ya estamos mostrando esta fila, no la reinicies.")
        }
    } else {
        //console.log("Hay que esconder el div de cargador");
        $(".all_otherprods").addClass("d-none");
        let data = {
            id: 0,
            text: '0'
        };
        let newOption = new Option(data.text, data.id, true, true);
        $(div_cargador).find(".select_product_extra").append(newOption).trigger('change');
        $(div_cargador).removeClass("row-prodn-true").addClass("row-prodn-false");

        $(div_interfase).find(".select_product_extra").val("0");
        $(div_interfase).find(".select_product_extra").trigger("change");
    }
}

const ocultar_valores_extra_interfase = () => {
    $("#row-prodn-" + other_prods['interfase']).find(".select_product").select2('val', '');
    $("#row-prodn-" + other_prods['interfase']).find('.select_product option[value="2"]').detach();
    $("#row-prodn-" + other_prods['interfase']).find('.select_product option[value="3"]').detach();
    $("#row-prodn-" + other_prods['interfase']).find('.select_product option[value="4"]').detach();
    $("#row-prodn-" + other_prods['interfase']).find('.select_product option[value="5"]').detach();

    let index = 0,
        id_modal_inte;
    $.each(other_prods, function (x, val) {
        if (x == 'interfase') {
            id_modal_inte = index;
        }
        index++;
    });
    $("#productModal-oth" + id_modal_inte).find('.select_product option[value="1"]').detach();
    $("#productModal-oth" + id_modal_inte).find('.select_product option[value="2"]').detach();
    $("#productModal-oth" + id_modal_inte).find('.select_product option[value="3"]').detach();
    $("#productModal-oth" + id_modal_inte).find('.select_product option[value="4"]').detach();
    $("#productModal-oth" + id_modal_inte).find('.select_product option[value="5"]').detach();
    let data_0 = {
        id: 0,
        text: '0'
    };
    let data_1 = {
        id: 1,
        text: '1'
    };
    let newOption_0 = new Option(data_0.text, data_0.id, true, true);
    let newOption_1 = new Option(data_1.text, data_1.id, false, false);
    $("#productModal-oth" + id_modal_inte).find('.select_product').append(newOption_0)
    $("#productModal-oth" + id_modal_inte).find('.select_product').append(newOption_1).trigger('change');;

}

const currencyFormat = (num) => {
    return '$' + num.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
}
