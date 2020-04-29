@extends('layouts.app')

@section('title') INFORMACIÓN DE COMPRA @endsection

@section('description') INFORMACIÓN DE COMPRA @endsection

@section('mystyle')
<link href="{{ asset('css/purchase_information.css') }}" rel="stylesheet">
<link href="{{ asset('css/purchase_information_v2.css') }}" rel="stylesheet">
@endsection

@section('myscripts') 
<script src="{{ asset('js/purchasev2.js') }}" defer></script>
<script src="{{ asset('js/conektav2.js') }}" defer></script>
<script type="text/javascript" src="https://cdn.conekta.io/js/latest/conekta.js" ></script>
@endsection

<!-- header menu -->
@section('name_tower') {{$name_torre}} @endsection

@section('name_department') Departamento: {{$num_depto}} @endsection

@section('text_button1') Ver plano @endsection

@section('data_plano_url') {{$img_plano}} @endsection

@section('data_plano_title') {{$name_torre}} @endsection

@section('text_button2') Producto autorizado @endsection

@section('data_product_url') {{$img_torre}} @endsection

@section('data_product_title') Producto autorizado @endsection

@section('url') # @endsection

<!-- end header menu -->

@section('content')
<div class="sub_head">

</div>
<!--Principal-->
<div class="container-fluid ">
    <div class="container pt-4">
        <div class="row ">
            <!--Primer bloque inform general y formularios -->
            <div class="col-md-8  mt-2 pt-4">
                <!--Desea instalar productos -->
                <div class="row">
                    <div class="col-md-12 mb-2">
                        <h2 class="titulo_1">¿ Desea que instalemos sus productos ?</h2>
                    </div>
                    <div class="col-md-5">
                        <button class="bt_enabled pt-2 pb-2 mt-1 mb-1" id="delivery_choice_btn" style="width:100%;">
                            PUEDO INSTALARLOS YO MISMO
                        </button>
                    </div>
                    <div class="col-md-5">
                        <button class="bt_enabled_no_background pt-2 pb-2 mt-1 mb-1" id="instalation_choice_btn" style="width:100%;">
                            AYÚDENME CON LA INSTALACIÓN
                        </button>
                    </div>
                    <div class="col-md-12 ">
                        <div class="row no-gutters">
                            <div class="col-7 col-md-3  general_text mt-3 open_video_modal">Ver video de instalación
                            </div>
                            <div class="col-4 col-md-8   pt-1 pr-1">
                                <p class="fa fa-caret-right triangle_right open_video_modal  pr-1 text-left" aria-hidden="true"></p>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="row mt-3 mt-md-3 pt-4">
                    <div class="col-md-12">
                        <p class="general_text">Por favor indíquenos la informacion que le pedimos a continuación para
                            continuar con su compra los datos con * son obligatorios </p>
                    </div>
                </div>
                <!--FORMULARIOS -->
                <!-- <form id="form_payment" > -->
                <div class="row no-gutters mt-md-3 pt-0  mb-5 steps_purchase ">
                    <!--BOTONES PARA VISTA WEB -->
                    <div class="col-md-12 pl-0 pr-0  d-none d-xl-block d-lg-block">
                        <div class="row pl-0 pr-0 mr-0 ml-0 ctr_option">
                            <div class="col-3 pl-0 pr-0 ">
                                <button class="bt_enabled_steps   " data="1" style="width:100%;">
                                    DATOS PERSONALES
                                </button>
                            </div>
                            <div class="col-3 pl-0 pr-0 tab-datos-facturacion">
                                <button class="bt_enabled    " data="2" style="width:100%;">
                                    DATOS DE FACTURACIÓN
                                </button>
                            </div>
                            <div class="col-3 pl-0 pr-0">
                                <button class="bt_enabled   tab-delivery-choice" data="3" style="width:100%;">
                                    DATOS DE ENVÍO
                                </button>
                            </div>
                            <div class="col-3 pl-0 pr-0">
                                <button class="bt_enabled    tab-metodo-pago" data="4" style="width:100%;">
                                    MÉTODO DE PAGO
                                </button>
                            </div>
                        </div>
                    </div>
                    <!--FORMULARIOS INCLUYEN BOTON PARA MOBILE -->
                    <div class="col-md-12  control_iformation  ">
                        <button class="bt_enabled_steps general_text pt-2 pb-2 pr-0 pl-0  mt-1  d-block d-sm-none  " style="width:100%; height:40px; ">
                            DATOS PERSONALES
                        </button>

                        <div class="row ml-0 mr-0 mt-md-4">
                            <div class="col-12  pl-5 pr-5 pb-4 mt-2" style=" padding:0; margin:0px;">
                                <div class="parent_line">
                                    <div class="line">

                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row ml-0 mr-0 ">
                            <div class="col-md-12 ml-md-5 pb-5 general_text">
                                <div class="row ">
                                    <div class="col-md-5">
                                        <div class="pr-1  mt-2   mt-sm-3  item_form">
                                            <label for="form_nombre general_text">Nombre*</label>
                                            <input type="text" class="fix_input form-required" id="form_nombre" aria-describedby="emailHelp" placeholder="Indique su nombre">
                                            <span class="invalid-feedback" role="alert"> Campo obligatorio </span>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="pr-1  mt-2   mt-sm-3  item_form">
                                            <label for="form_apellido_paterno">Apellido paterno*</label>
                                            <input type="text" class="fix_input general_text form-required" id="form_apellido_paterno" aria-describedby="emailHelp" placeholder="Indique su apellido paterno">
                                            <span class="invalid-feedback" role="alert"> Campo obligatorio </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="pr-1  mt-2   mt-sm-3  item_form">
                                            <label for="form_apellido_materno">Apellido materno</label>
                                            <input type="text" class="fix_input general_text" id="form_apellido_materno" aria-describedby="emailHelp" placeholder="Indique su apellido materno">
                                            <span class="invalid-feedback" role="alert"> Campo obligatorio </span>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="pr-1  mt-2   mt-sm-3  item_form">
                                            <label for="form_telefono">Teléfono*</label>
                                            <input type="text" class="fix_input general_text form-required" id="form_telefono" maxlength="10" aria-describedby="emailHelp" placeholder="Indique su número telefónico">
                                            <span class="invalid-feedback" role="alert"> Campo obligatorio </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-md-5 ">
                                        <div class="pr-1  mt-2   mt-sm-3  item_form">
                                            <label for="form_mail">Correo electrónico*</label>
                                            <input type="email" class="fix_input general_text form-required" id="form_mail" aria-describedby="emailHelp" placeholder="Indique su correo electrónico">
                                            <span id="invalid-mail" class="invalid-feedback" role="alert"> Campo obligatorio </span>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="pr-1  mt-2   mt-sm-3  item_form">
                                            <label for="form_mail_confirm">Confirmacion de correo electrónico*</label>
                                            <input type="email" class="fix_input general_text form-required" id="form_mail_confirm" aria-describedby="emailHelp" placeholder="Confirme su correo electrónico">
                                            <span id="invalid-mail-confirm" class="invalid-feedback" role="alert"> Campo obligatorio </span>
                                        </div>
                                    </div>
                                </div>
                            </div>




                            <div class="col-12  invoice pt-3 pb-3 pl-5 mt-4 ">
                                <label class="is_check d-inline">
                                    <input type="checkbox" id="check_factura" checked="checked">
                                    <span class="checkmark"></span>
                                </label>
                                <div class="general_text d-inline " style="color:white;">
                                    ¿ Desea incluir factura ?
                                </div>
                            </div>

                        </div>






                    </div>
                    <div class="col-md-12  control_iformation">
                        <button class="bt_enabled general_text pt-2 pb-2 pr-0 pl-0  mt-1  d-block d-sm-none  " style="width:100%; height:40px; ">
                            DATOS DE FACTURACIÓN
                        </button>
                        <!--aqui-->
                        <div class="row ml-0 mr-0 mt-md-4 d-none">
                            <div class="col-12  pl-5 pr-5 pb-4 mt-2" style=" padding:0; margin:0px;">
                                <div class="parent_line">
                                    <div class="line">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row ml-0 mr-0  d-none general_text">
                            <div class="col-md-5 ml-md-5 pb-md-3">
                                <div class="pr-1  mt-2   mt-sm-3  item_form">
                                    <label for="form_rfc">R.F.C*</label>
                                    <input type="text" class="fix_input general_text form-required" id="form_rfc" aria-describedby="emailHelp" placeholder="Indique su RFC">
                                    <span class="invalid-feedback" role="alert"> Campo obligatorio </span>
                                </div>
                                <div class="pr-1  mt-2   mt-sm-3  item_form">
                                    <label for="form_cfdi">USO de CFDI*</label>
                                    <div class="row">
                                        <div class="col-12 ml-2 mr-2 pl-0 pr-3">
                                            <select id="form_cfdi" class="form-control select_product select_2 ml-0 mr-0 form-required" data-live-search="true" style="width:100%">
                                                <option value=""></option>
                                            </select>
                                            <span class="invalid-feedback" role="alert"> Campo obligatorio </span>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="col-md-5 ">
                                <div class="pr-1  mt-2   mt-sm-3  item_form  ">
                                    <label for="form_razonsocial">Razón social*</label>
                                    <input type="text" class="fix_input general_text form-required" id="form_razonsocial" aria-describedby="emailHelp" placeholder="indique su razón social">
                                    <span class="invalid-feedback" role="alert"> Campo obligatorio </span>
                                </div>

                            </div>
                            <div class="col-md-5 ml-md-5 titulo_2">
                                Dirección fiscal

                            </div>
                            <div class="col-md-12 ml-md-5 pb-5">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="pr-1  mt-2   mt-sm-3  item_form">
                                            <label for="form_fact_pais">País*</label>
                                            <div class="row">
                                                <div class="col-12 ml-2 mr-2 pl-0 pr-3 pb-0 pt-0">
                                                    <select id="form_fact_pais" class="form-control select_product select_2 ml-0 mr-0 form-required" data-live-search="true" style="width:100%">
                                                        <option value=""></option>
                                                    </select>
                                                    <span class="invalid-feedback" role="alert"> Campo obligatorio </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="pr-1  mt-2   mt-sm-3  item_form">
                                            <label for="form_fact_calle">Calle*</label>
                                            <input type="text" class="fix_input general_text form-required" id="form_fact_calle" aria-describedby="emailHelp" placeholder="Indique su calle">
                                            <span class="invalid-feedback" role="alert"> Campo obligatorio </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="pr-1  mt-2   mt-sm-3  item_form">
                                            <label for="form_fact_noext">Numero exterior*</label>
                                            <input type="text" class="fix_input general_text form-required" id="form_fact_noext" aria-describedby="emailHelp" placeholder="Indique su numero exterior">
                                            <span class="invalid-feedback" role="alert"> Campo obligatorio </span>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="pr-1  mt-2   mt-sm-3  item_form">
                                            <label for="form_fact_noint">Numero interior</label>
                                            <input type="text" class="fix_input general_text form-required" id="form_fact_noint" aria-describedby="emailHelp" placeholder="Indique su numero interior">
                                            <span class="invalid-feedback" role="alert"> Campo obligatorio </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="pr-1  mt-2   mt-sm-3  item_form">
                                            <label for="form_fact_cp">Codigo Postal*</label>
                                            <input type="text" class="fix_input general_text form-required" maxlength="5" id="form_fact_cp" aria-describedby="emailHelp" placeholder="Indique su codigo postal">
                                            <span class="invalid-feedback" role="alert"> Campo obligatorio </span>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="pr-1  mt-2   mt-sm-3  item_form">
                                            <label for="form_fact_estado">Indique su estado*</label>
                                            <div class="row">
                                                <div class="col-12 ml-2 mr-2 pl-0 pr-3 pb-0 pt-0">
                                                    <select id="form_fact_estado" class="form-control select_product select_2 ml-0 mr-0 form-required" data-live-search="true" style="width:100%">
                                                        <option value=""></option>
                                                    </select>
                                                    <span class="invalid-feedback" role="alert"> Campo obligatorio </span>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="pr-1  mt-2   mt-sm-3  item_form">
                                            <label for="form_fact_municipio">Municipio*</label>
                                            <div class="row">
                                                <div class="col-12 ml-2 mr-2 pl-0 pr-3 pb-0 pt-0">
                                                    <select id="form_fact_municipio" class="form-control select_product select_2 ml-0 mr-0 form-required" data-live-search="true" style="width:100%">
                                                        <option value=""></option>
                                                    </select>
                                                    <span class="invalid-feedback" role="alert"> Campo obligatorio </span>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="pr-1  mt-2   mt-sm-3  item_form">
                                            <label for="form_fact_localidad">Localidad*</label>
                                            <input type="text" class="fix_input general_text form-required" id="form_fact_localidad" aria-describedby="emailHelp" placeholder="Indique su localidad">
                                            <span class="invalid-feedback" role="alert"> Campo obligatorio </span>

                                            <!-- <div class="row">
                                                <div class="col-12 ml-2 mr-2 pl-0 pr-3 pb-0 pt-0">
                                                    <select id="form_fact_localidad" class="form-control select_product select_2 ml-0 mr-0 form-required" data-live-search="true" style="width:100%">
                                                        <option value=""></option>
                                                    </select>
                                                    <span class="invalid-feedback" role="alert"> Campo obligatorio </span>
                                                </div>
                                            </div> -->

                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="pr-1  mt-2   mt-sm-3  item_form">
                                            <label for="form_fact_colonia">Colonia*</label>
                                            <input type="text" class="fix_input general_text form-required" id="form_fact_colonia" aria-describedby="emailHelp" placeholder="Indique su colonia">
                                            <span class="invalid-feedback" role="alert"> Campo obligatorio </span>

                                            <!-- <div class="row">
                                                <div class="col-12 ml-2 mr-2 pl-0 pr-3 pb-0 pt-0">
                                                    <select id="form_fact_colonia" class="form-control select_product select_2 ml-0 mr-0 form-required" data-live-search="true" style="width:100%">
                                                        <option value=""></option>
                                                    </select>
                                                    <span class="invalid-feedback" role="alert"> Campo obligatorio </span>
                                                </div>
                                            </div> -->

                                        </div>
                                    </div>

                                </div>


                            </div>
                        </div>


                    </div>
                    <div class="col-md-12  control_iformation">
                        <button class="bt_enabled general_text pt-2 pb-2 pr-0 pl-0  mt-1  d-block d-sm-none  " style="width:100%; height:40px;">
                            DATOS DE ENVÍO
                        </button>
                        <!--aqui-->
                        <div class="row ml-0 mr-0 mt-md-4 d-none d-none">
                            <div class="col-12  pl-5 pr-5 pb-4 mt-2" style=" padding:0; margin:0px;">
                                <div class="parent_line">
                                    <div class="line">

                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row ml-0 mr-0  d-none d-none">

                            <div class="col-md-12 ml-md-5 pb-5 general_text">
                                <div class="row ">
                                    <div class="col-md-5">
                                        <div class="pr-1  mt-2   mt-sm-3  item_form">
                                            <label for="form_envio_calle general_text">Calle*</label>
                                            <input type="text" class="fix_input form-required" id="form_envio_calle" aria-describedby="emailHelp" placeholder="Indique su calle">
                                            <span class="invalid-feedback" role="alert"> Campo obligatorio </span>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="pr-1  mt-2   mt-sm-3  item_form">
                                            <label for="form_envio_noext">No exterior*</label>
                                            <input type="text" class="fix_input general_text form-required" id="form_envio_noext" aria-describedby="emailHelp" placeholder="Indique su numero exterior">
                                            <span class="invalid-feedback" role="alert"> Campo obligatorio </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="pr-1  mt-2   mt-sm-3  item_form">
                                            <label for="form_envio_noint">Numero interior</label>
                                            <input type="text" class="fix_input general_text form-required" id="form_envio_noint" aria-describedby="emailHelp" placeholder="Indique su numero interior">
                                            <span class="invalid-feedback" role="alert"> Campo obligatorio </span>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="pr-1  mt-2   mt-sm-3  item_form">
                                            <label for="form_envio_cp">Código postal*</label>
                                            <input type="text" class="fix_input general_text form-required" id="form_envio_cp" maxlength="5" aria-describedby="emailHelp" placeholder="Indique su número telefónico">
                                            <span class="invalid-feedback" role="alert"> Campo obligatorio </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-md-5 ">
                                        <div class="pr-1  mt-2   mt-sm-3  item_form">
                                            <label for="form_envio_estado">Estado*</label>
                                            <div class="row">
                                                <div class="col-12 ml-2 mr-2 pl-0 pr-3 pb-0 pt-0">
                                                    <select id="form_envio_estado" class="form-control select_product select_2 ml-0 mr-0 form-required" data-live-search="true" style="width:100%">
                                                        <option value=""></option>
                                                    </select>
                                                    <span class="invalid-feedback" role="alert"> Campo obligatorio </span>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                    <div class="col-md-5 ">
                                        <div class="pr-1  mt-2   mt-sm-3  item_form">
                                            <label for="form_envio_municipio">Municipio*</label>
                                            <div class="row">
                                                <div class="col-12 ml-2 mr-2 pl-0 pr-3 pb-0 pt-0">
                                                    <select id="form_envio_municipio" class="form-control select_product select_2 ml-0 mr-0 form-required" data-live-search="true" style="width:100%">
                                                        <option value=""></option>
                                                    </select>
                                                    <span class="invalid-feedback" role="alert"> Campo obligatorio </span>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-md-5 ">
                                        <div class="pr-1  mt-2   mt-sm-3  item_form">
                                            <label for="form_envio_localidad">Localidad*</label>
                                            <input type="text" class="fix_input general_text form-required" id="form_envio_localidad" aria-describedby="emailHelp" placeholder="Indique su localidad">
                                            <span class="invalid-feedback" role="alert"> Campo obligatorio </span>

                                            <!-- <div class="row">
                                                <div class="col-12 ml-2 mr-2 pl-0 pr-3 pb-0 pt-0">
                                                    <select id="form_envio_localidad" class="form-control select_product select_2 ml-0 mr-0 form-required" data-live-search="true" style="width:100%">
                                                        <option value=""></option>
                                                    </select>
                                                    <span class="invalid-feedback" role="alert"> Campo obligatorio </span>
                                                </div>
                                            </div> -->


                                        </div>
                                    </div>
                                    <div class="col-md-5 ">
                                        <div class="pr-1  mt-2   mt-sm-3  item_form">
                                            <label for="form_envio_colonia">Colonia*</label>
                                            <input type="text" class="fix_input general_text form-required" id="form_envio_colonia" aria-describedby="emailHelp" placeholder="Indique su colonia">
                                            <span class="invalid-feedback" role="alert"> Campo obligatorio </span>

                                            <!-- <div class="row">
                                                <div class="col-12 ml-2 mr-2 pl-0 pr-3 pb-0 pt-0">
                                                    <select id="form_envio_colonia" class="form-control select_product select_2 ml-0 mr-0 form-required" data-live-search="true" style="width:100%">
                                                        <option value=""></option>
                                                    </select>
                                                    <span class="invalid-feedback" role="alert"> Campo obligatorio </span>
                                                </div>
                                            </div> -->


                                        </div>
                                    </div>
                                </div>

                            </div>





                        </div>

                    </div>
                    <div class="col-md-12  control_iformation  ">
                        <button class="bt_enabled general_text pt-2 pb-2 pr-0 pl-0  mt-1  d-block d-sm-none  " style="width:100%; height:40px; ">
                            MÉTODO DE PAGO
                        </button>

                        <div class="row ml-0 mr-0 mt-md-4 d-none d-none">
                            <div class="col-12  pl-5 pr-5 pb-4 mt-2" style=" padding:0; margin:0px;">
                                <div class="parent_line">
                                    <div class="line">

                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row ml-0 mr-0 d-none d-none ">
                            <div class="col-md-5 ml-md-5 titulo_2">
                                Método de pago

                            </div>
                            <div class="col-md-12 ml-md-5 pb-5 general_text">
                                <div class="row ">
                                    <div class="col-md-5">
                                        <div class="pr-1  mt-2   mt-sm-3  item_form">
                                            <label for="form_pago_tipo">Método de pago*</label>
                                            <div class="row">
                                                <div class="col-12 ml-2 mr-2 pl-0 pr-3 pb-0 pt-0">
                                                    <select id="form_pago_tipo" class="form-control select_product select_2 ml-0 mr-0 " data-live-search="true" style="width:100%">
                                                        <option value="pago_tarjeta" selected>Pago tarjeta crédito / Débito</option>
                                                        <option value="pago_oxxo">Pago en Oxxo</option>
                                                        <option value="pago_spei" disabled>Pago con SPEI</option>
                                                    </select>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="pr-1  mt-2   mt-sm-3  item_form">
                                            <label for=" invisible">.</label>
                                            <div class="row">
                                                <div class="col-12 ml-2 mr-2 pl-0 pr-3 pb-0 pt-0">
                                                    <img src="{{ asset('images/payment/Mastercard/mastercard.png')}}" class="img-fluid mr-3" alt="Responsive image">
                                                    <img src="{{ asset('images/payment/Visa/Visa.png')}}" class="img-fluid mr-3" alt="Responsive image">
                                                    <img src="{{ asset('images/payment/AmericanExpress/AmericanExpress.png')}}" class="img-fluid " alt="Responsive image">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <form action="{{ url('payment_done/') }}" method="POST" id="card-form">
                                    @csrf
                                    <input type="hidden" class="form-control" name="extrapay_concept" id="extrapay_concept" value="total_delivery">
                                    <input type="hidden" class="form-control" name="torre_bg" id="torre_bg" value="{{$torre_bg}}">
                                    <input type="hidden" class="form-control" name="products_list" id="products_list" value="{{$products_list}}">
                                    <input type="hidden" class="form-control" name="depto_info" id="depto_info" value="{{$name_torre}}, Departamento {{$num_depto}}">
                                    <div class="metodo_tarjeta_data">
                                        <div class="row">
                                            <div class="col-md-10">
                                                <div class="pr-1  mt-2   mt-sm-3  item_form">
                                                    <label for="form_pago_card_nombre">Nombre*</label>
                                                    <input type="text" data-conekta="card[name]" class="fix_input general_text form_metodo_pago " id="form_pago_card_nombre" aria-describedby="emailHelp" placeholder="Indique su nombre como aparece en su tarjeta">
                                                    <span class="invalid-feedback" role="alert"> Campo obligatorio </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row ">
                                            <div class="col-md-5 ">
                                                <div class="pr-1  mt-2   mt-sm-3  item_form">
                                                    <label for="form_pago_card_tarjeta">Número de tarjeta*</label>
                                                    <input type="tel" data-conekta="card[number]" class="fix_input general_text credit_card form_metodo_pago" maxlength="19" id="form_pago_card_tarjeta" aria-describedby="emailHelp" placeholder="Indique su numero de tarjeta">
                                                    <span class="invalid-feedback" role="alert"> Campo obligatorio </span>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="pr-1   mt-2   mt-sm-3  item_form">
                                                    <label for="row_t pt-1">Fecha de expiración*</label>
                                                    <div class="row row_t">
                                                        <div class="col-5 mt-1">
                                                            <div class="row">
                                                                <div class="col-12 ml-2 mr-2 pl-0 pr-3 ">
                                                                    <select id="form_pago_card_expmes" class="form-control select_product select_2 ml-0 mr-0  form_metodo_pago" data-live-search="true" style="width:100%">
                                                                        <option value=""></option>
                                                                    </select>
                                                                    <input id="form_pago_card_expmes_input" type="hidden" size="2" data-conekta="card[exp_month]">
                                                                    <span class="invalid-feedback" role="alert"> Campo obligatorio </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-5 mt-1">
                                                            <div class="row">
                                                                <div class="col-12 ml-2 mr-2 pl-0 pr-3 ">
                                                                    <select id="form_pago_card_expanio" class="form-control select_product select_2 ml-0 mr-0 form_metodo_pago " data-live-search="true" style="width:100%">
                                                                        <option value=""></option>
                                                                    </select>
                                                                    <input id="form_pago_card_expanio_input" type="hidden" size="4" data-conekta="card[exp_year]">
                                                                    <span class="invalid-feedback" role="alert"> Campo obligatorio </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="row ">
                                            <div class="col-md-5 ">
                                                <div class="pr-1  mt-2   mt-sm-3  item_form">
                                                    <label for="form_pago_card_cvc">Código de seguridad*</label>
                                                    <input type="password" data-conekta="card[cvc]" class="fix_input general_text form_metodo_pago" id="form_pago_card_cvc" aria-describedby="emailHelp" placeholder="Indique su numero de tarjeta">
                                                    <span class="invalid-feedback" role="alert"> Campo obligatorio </span>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="pr-1   mt-2   mt-sm-3  item_form">
                                                    <div class="row ">
                                                        <div class="col-6 ">

                                                            <div class="row">
                                                                <div class="col-12 ml-2 mr-2 pl-0 pr-3 ">

                                                                    <img src="{{ asset('images/payment/ReversoVisa/ReversoVisa.png')}}" class="img-fluid mr-3" alt="Responsive image">
                                                                    <p class="mt-1">Reverso Visa y Master card</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-6 mt-1">

                                                            <div class="row">
                                                                <div class="col-12 ml-2 mr-2 pl-0 pr-3 ">

                                                                    <img src="{{ asset('images/payment/FrenteAmericanExpress/FrenteAmericanExpress.png')}}" class="img-fluid mr-3" alt="Responsive image">
                                                                    <p class="mt-1">Frente American Express</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- <button type="submit" class="token d-none">Crear token</button> -->
                                </form>
                            </div>
                            <div class="col-md-11 ml-3 pl-5 div-conekta-answer">
                                <div class="alert alert-danger" role="alert">
                                    <span class="conekta-answer">

                                    </span>
                                </div>
                            </div>
                            <div class="col-12  invoice pt-3 pb-3 pl-5 mt-4 ">
                                <label class="is_check d-inline">
                                    <input type="checkbox" id="check_terminos">
                                    <span class="checkmark"></span>
                                </label>
                                <div class="general_text d-inline " style="color:white;">
                                    Acepto
                                </div>
                                <div class="general_text d-inline show_terms_cond"> términos y condiciones </div>
                                <div class="general_text d-inline " style="color:white;">
                                    del servicio*
                                </div>
                            </div>

                        </div>






                    </div>
                </div>
                <!-- </form> -->

            </div>
            <!--Primer bloque productos y total -->
            <div class="col-md-4  mobile_card  d_none_special  ">

                <div class="row align-items-center pr-2 pl-2 pt-3 pb-3 ml-1 total_card">
                    <div class="col-12 mt-2 ">
                        <div class="row">
                            <div class="col-6 general_text" style="color:white">
                                Subtotal
                            </div>
                            <div class="col-6">
                                <p class="text-right general_text" style="color:white"> ${{$total_card['subtotal']}} </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-1">
                        <div class="row">
                            <div class="col-6 general_text" style="color:white">
                                <span class="extrapay_concept_label"> Envío </span>
                            </div>
                            <div class="col-6">
                                <p class="text-right general_text" style="color:white">$<span class="extrapay_concept_value">{{$total_card['delivery_price']}}</span> </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-1">
                        <div class="row">
                            <div class="col-6 general_text" style="color:white">
                                IVA
                            </div>
                            <div class="col-6">
                                <p class="text-right general_text" style="color:white"> ${{$total_card['iva']}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-1">
                        <div class="row">
                            <div class="col-6 general_text" style="color:white">
                                Total
                            </div>
                            <div class="col-6">
                                <p class="text-right general_text" style="color:white">$<span class="total_value">{{$total_card['total_delivery']}}</span></p>
                            </div>
                        </div>
                    </div>


                    <div class="col-12 mb-1">
                        <div class="separator_total"></div>
                        <div class="row mt-3 mb-4">
                            <div class="col-12 mx-auto text-center  ">
                                <button id="btn_comprar" class="pt-2 pb-2 payment-proceed btn-comprar-unabled" disabled>
                                    PAGAR
                                </button>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="row   align-items-top mt-4 ml-1 pl-0 pr-0   total_products">
                    <div class="col-12 pl-0 pr-0 pt-4">
                        <p class="text-left dato_imp_car pl-3" style="color:white;">Productos</p>
                        <div class="container">
                            @foreach ($products as $key_ex => $product)
                            <div class="row fake_table general_text" style="color:white; ">
                                <div class="col-8 mb-0 mb-0 text-left pt-2 pb-2"> {{$product['product']}} <br> x{{$product['quantity']}} </div>
                                <div class="col-4 mb-0 mb-0 text-center pt-2 pb-2">${{$product['price']}}</div>
                            </div>
                            @endforeach
                        </div>
                        <p class="text-left dato_imp_car pl-3 mt-3" style="color:white;">Incluidos</p>
                        <div class="container">
                            @foreach ($extra_products as $key_ex => $product)
                            <div class="row fake_table general_text" style="color:white; ">
                                <div class="col-8 mb-0 mb-0 text-left pt-2 pb-2"> {{$product['product']}} <br> x{{$product['quantity']}}</div>
                                <div class="col-4 mb-0 mb-0 text-center pt-2 pb-2">${{$product['price']}}</div>
                            </div>
                            @endforeach
                        </div>

                    </div>

                </div>


                <div class="row  mt-2 ml-0 pl-0 pr-0">
                    <div class="col-12 pl-0 pr-0 pt-4 general_text">
                        ¿Alguna duda o pregunta ? comunicate al telefono
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!--Total para mobile  -->
<div class="container-fluid total_products pb-4 pt-4 pl-1 pr-1 d-block d-sm-none">
    <div class="row pb-3">
        <div class="col-2 text-right general_text" style="color:white;">
            Total
        </div>
        <div class="col-8 text-center general_text" style="color:white;">
            $14,00000
        </div>
        <div class="col-2 text-left fa fa-ellipsis-v ellipsis-v open_products_total" style="font-size:25px; color:white;">
        </div>
    </div>
    <div class="row ">
        <div class="col-12">
            <div class="col-12 mx-auto text-center  ">
                <button class="btn-comprar pt-2 pb-2  ">
                    COMPRAR
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

<!--Mobile-->
<div>
    <div id="modal_products" class="modal d-none products_modal  pt-5 pl-2 pr-2 pb-5 overflow-auto">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 pl-md-5 pr-md-5">
                <div class="pl-md-5 pr-md-5 pr-2">
                    <div class="sub_title_modal"></div>
                    <p class="title_modal"></p>
                    <div class=" cerrar_products cerrar"><span class="close mb-2 mr-2">X</span></div>

                </div>

            </div>

            <div class="container copy_card mr-3  ">

            </div>

        </div>
    </div>
</div>

<!--Modal video-->
<div>
    <div id="modal_video" class="modal d-none video_tuto  pt-5 pl-2 pr-2 pb-5 ">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-12 pl-md-5 pr-md-5">
                <div class="pl-md-5 pr-md-5 pr-2">
                    <div class="sub_title_modal"></div>

                    <div class="cerrar_video cerrar"><span class="close mb-2 mr-2">X</span></div>

                </div>

            </div>

            <div class="container video_card justify-content-md-center   ">

                <div class="row  pl-5 pr-5 pt-5 pt-md-0">
                    <div class="col-sm-12 col-md-8  ml-md-3 ">
                        <p class="title_modal text-center  w-100">Aprenda a instalar productos</p>
                    </div>

                </div>
                <div class="row  pl-5 pr-5  pt-md-0 justify-content-md-center ">

                    <div class="col-sm-12 col-md-8 mt-3  ">
                        <div class="embed-responsive embed-responsive-16by9 iframe_video ">
                            <iframe class="embed-responsive-item" src="{{$video}}" allowfullscreen></iframe>

                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

<!--Modal Terminos y condiciones-->
<div>
    <div id="modal_condiciones" class="modal d-none   pt-5 pl-2 pr-2 pb-5 overflow-auto ">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-12 pl-md-5 pr-md-5">
                <div class="pl-md-5 pr-md-5 pr-2">
                    <div class="sub_title_modal"></div>

                    <div class="cerrar_terminos cerrar"><span class="close mb-2 mr-2">X</span></div>

                </div>

            </div>

            <div class="container video_card justify-content-md-center   ">


                <div class="row  pl-5 pr-5  pt-md-0 justify-content-md-center  ">

                    <div class="col-sm-12 col-md-6 mt-3  condition_card ">
                        <div class="row title_condition pl-3 mt-3">
                            <div class="col-12 pt-2 pb-2">
                                <h2 class="title_condition ">Términos y condiciones </h2>
                            </div>
                        </div>
                        <div class="row condition_text p3 mt-4 ">
                            <div class="col-12 text-break div_policy">

                            </div>
                        </div>


                    </div>

                </div>

            </div>

        </div>
    </div>
</div>