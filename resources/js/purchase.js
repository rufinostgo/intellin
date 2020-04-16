const act_tocheck1 = 'Motor Baterías'; // Accionamiento a verificar para controles en la sección de productos necesarios.
const act_tocheck2 = 'Motor AC'; // Accionamiento a verificar para controles en la sección de productos necesarios.
const act_tocheck3 = 'Cargador'; // Accionamiento a verificar para controles en la sección de Otros productos.
const act_tocheck4 = 'Interfase'; // Accionamiento a verificar para controles en la sección de Otros productos.

$(document).ready(function () {
    setTimeout(() => {
        //console.clear();
        console.log("|| PURCHASE VIEW ||");
    }, 1000);

    $(".select_product").select2({
        placeholder: "Seleccione",
        allowClear: true
    });

    /**Ocultamos inicialmente el div de Cargador.. */
    $("#row-prodn-" + needed_prods['cargador']).removeClass("row-prodn-true").addClass("row-prodn-false");
    /**Removemos las opciones inecesarias en el div de Interfase */
    //$("#row-prodn-" + needed_prods['interfase']).find(".select_product option[value=2]").remove();

    $(".select_product_area").on("change", function () {
        console.log("select_product_area");
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
            console.log("Mismo value en ambos selects, se detienen triggers. (MSG Web)");
        }
    });

    $(".select_product_mobarea").on("change", function () {
        console.log("select_product_mobarea");
        const total = $(this).val() != "" ? products_gral[$(this).val()] : "0.00";
        console.log(total);
        $(this).parent().parent().parent().parent().find(".preci_total_mobile").text("$" + total);

        const select_id = $(this).attr("id");
        const row_area = select_id.replace("select", "web");
        const select_area = $("#" + row_area).find(".select_product_area");

        if ($(select_area).val() != $(this).val()) {
            $(select_area).val($(this).val());
            $(select_area).trigger("change");
        } else {
            console.log("Mismo value en ambos selects, se detienen triggers. (MSG Mobile)");
        }
    });

    $(".select_product_extra").on("change", function () {
        let cant = $(this).val() != "" ? $(this).val() : "empty";
        const product_id = $(this).parent().parent().find(".extra_product_id").val();
        let product_price = products_gral[product_id];

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

        
        /*let select_idweb = $(this).attr("id");
        console.log("aiudaaaa: " + select_idweb);
        let select_mb_id = select_idweb.replace("webselect", "select");
        let select_mobile = $("#" + select_mb_id);

        if ($(select_mobile).val() != $(this).val()) {
            $(select_mobile).val($(this).val());
            $(select_mobile).trigger("change");
        } else {
            console.log("Mismo value en ambos selects, se detienen triggers. (MSG Web)");
        }*/
    });

    $(".select_product_mobextra").on("change", function () {
        console.log("select_product_mobextra");
        const cant = $(this).val() != "" ? $(this).val() : "empty";
        const product_id = $(this).parent().find(".extra_product_id").val();
        const product_price = products_gral[product_id];
        const product_price_total = +cant * +product_price;
        $(this).parent().parent().parent().parent().find(".preci_total_mobile").text(currencyFormat(product_price_total));
        
        const select_id = $(this).attr("id");
        const id_webselect = select_id.replace("select", "webselect");
        const select_area = $("#" + id_webselect);

        if ($(select_area).val() != $(this).val()) {
            $(select_area).val($(this).val());
            $(select_area).trigger("change");
        } else {
            console.log("Mismo value en ambos selects, se detienen triggers. (MSG Mobile)");
        }
    });


});

const calcular_totales = () => {
    let subtotal = 0,
        iva = 0,
        total = 0;
    $(".product_row").each(function () {
        let monto = $(this).find(".select_product_area").val() != "" ? products_gral[$(this).find(".select_product_area").val()] : 0;
        subtotal = +subtotal + +monto;
    });
    $(".extra-row").each(function () {
        //console.log("Extra row");
        let cant = $(this).find(".select_product_extra").val() != "" ? $(this).find(".select_product_extra").val() : 1;
        let price = products_gral[$(this).find(".extra_product_id").val()];
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
    let id_divctrl;
    if (motor_count > 0) {
        let index_ctrl;
        if (motor_count == 1) {
            //console.log("Hay que utilizar el div con class " + needed_prods['control_1']);
            index_ctrl = needed_prods['control_1'];
        } else if (motor_count > 1) {
            //console.log("Hay que utilizar el div con class " + needed_prods['control_5']);
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
                    $(div_control).removeClass("row-prodn-false").addClass("row-prodn-true");
                    $(div_control).find(".select_product_extra").val("1");
                    $(div_control).find(".select_product_extra").trigger("change");
                    let dctrl_id = $(div_control).attr("id");
                    $("#" + dctrl_id + " option[4='true']").prop("disabled", true);
                } else {
                    //console.log("Ya estamos mostrando esta fila, no la reinicies.")
                }
            } else {
                let other_div = $(zp_extras).find("#row-prodn-" + value);
                $(other_div).removeClass("row-prodn-true").addClass("row-prodn-false");
                $(other_div).find(".select_product_extra").val("0");
                $(other_div).find(".select_product_extra").trigger("change");
            }
        });
    } else {
        //console.log("Hay que esconder todos los divs.");
        $(zp_extras).find(".select_product_extra").val("0");
        $(zp_extras).find(".select_product_extra").trigger("change");
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
    const div_cargador = $("#row-prodn-" + needed_prods['cargador']);
    if (motor_exists) {
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
        } else {
            //console.log("Ya estamos mostrando esta fila, no la reinicies.")
        }
    } else {
        //console.log("Hay que esconder el div de cargador");
        $(div_cargador).find(".select_product_extra").val("0");
        $(div_cargador).find(".select_product_extra").trigger("change");
        $(div_cargador).removeClass("row-prodn-true").addClass("row-prodn-false");
    }
}

const currencyFormat = (num) => {
    return '$' + num.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
}
