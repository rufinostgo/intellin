$(document).ready(function(){
    console.log("payment-succeed");

    if(request_data.metodo_pago == 'pago_oxxo'){
        $(".div-oxxopay").show();
        $(".referencia_oxxo").text(request_data.referencia_oxxo);
    }

}); 