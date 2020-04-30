$(document).ready(function(){
    console.log("payment-succeed");

    if(request_data.metodo_pago == 'pago_oxxo'){
        $(".div-oxxopay").show();
        $(".referencia_oxxo").text(request_data.referencia_oxxo);
    }if(request_data.metodo_pago == 'pago_spei'){
        $(".div-spei").show();
        $(".spei_referencia").text(request_data.banco_spei);
        $(".spei_clabe").text(request_data.clabe_spei);
        $(".spei_monto").text("$"+request_data.monto_apagar);
    }
}); 