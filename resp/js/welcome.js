$(document).ready(function () {
    console.log("Welcome");
});

$("#aceptar_welcome").on("click",function(){
    let num_depto = $("#numero_departamento").val();
    if(num_depto != "empty"){
        $("#form_welcome").submit();
    }else{
        $('#numero_departamento').addClass('is-invalid');
    }
});

$("#numero_departamento").on("change",function(){
    $(this).removeClass('is-invalid');
});