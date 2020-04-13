console.log("|| PURCHASE VIEW ||");
$(document).ready(function () {

    $(".select_product").select2({
        placeholder: "Seleccione",
        allowClear: true
    });

    $(".select_product_area").on("change", function () {
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
        calcular_totales();
    });

    $(".select_product_extra").on("change", function () {
        let cant = $(this).val() != "" ? $(this).val() : "empty";
        const product_id = $(this).parent().parent().find(".extra_product_id").val();
        let product_price = products_gral[product_id];
        
        if (cant != 'empty') {
            console.log(cant + " del id ("+product_id+") a precio unitario de " + product_price);
            let product_price_total = +cant * +product_price;
            $(this).parent().parent().find(".preci_total").text(currencyFormat(product_price_total));
            calcular_totales();
        } else {
            console.log("empty for some reason");
            $(this).val("1");
            $(this).trigger("change");
        }
    });

    calcular_totales();
});

const calcular_totales = () => {
    let subtotal = 0,
        iva = 0,
        total = 0;
    $(".product_row").each(function () {
        let monto = $(this).find(".select_product_area").val() != "" ? products_gral[$(this).find(".select_product_area").val()] : 0;
        subtotal = +subtotal + +monto;
    });
    $(".extra-row").each(function(){ 
        console.log("Extra row");
        let cant = $(this).find(".select_product_extra").val() != "" ? $(this).find(".select_product_extra").val() : 1;
        let price = products_gral[$(this).find(".extra_product_id").val()];
        let monto = +cant * +price;
        console.log(cant + " * " + price + " = " + monto);
        subtotal = +subtotal + +monto;
    });
    iva = (subtotal * .16);
    total = +subtotal + +iva;
    $(".monto-subtotal").text(currencyFormat(subtotal));
    $(".monto-iva").text(currencyFormat(iva));
    $(".monto-total").text(currencyFormat(total));
}


const currencyFormat = (num) => {
    return '$' + num.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
}
