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
        calcular_totales();
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
    iva = (subtotal * .16);
    total = +subtotal + +iva;

    //var total = text.replace("$", ''); var total = total.replace(",", '');

    $(".monto-subtotal").text(currencyFormat(subtotal));
    $(".monto-iva").text(currencyFormat(iva));
    $(".monto-total").text(currencyFormat(total));
}


const currencyFormat = (num) => {
    return '$' + num.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
}
