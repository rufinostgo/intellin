@extends('layouts.appw')


@section('title') INTELLI (WELCOME) @endsection

@section('description') BIÉNVENIDO @endsection

@section('mystyle') 
<link href="{{ asset('css/payment_succeed.css') }}" rel="stylesheet">
@endsection

@section('content')

<div class="container ">
    <div style="background-image:url('images/payment/fondo/bg_reticula.png');" class="left_bg">
        <div class="row">
            <div class="offset-md-4 col-md-7">
                <div class="row pb-5 payment_header">
                    <div class="d-none d-md-block max-select_depto ">
                        <a href="{{ url('/')}}" class="rever_play">
                            <i class="fa fa-chevron-left play" aria-hidden="true"></i>
                        </a>
                        &nbsp;&nbsp;&nbsp;Volver
                    </div>
                </div>
            </div>
            <div class="offset-md-4 col-md-7">
                <div class="row">
                    <div class="col-md-12 pt-5">
                        <img src="{{ asset('images/logos/logo_welcome.png')}}" class="img-fluid img_logo" alt="Responsive image">
                    </div>
                    <div class="col-md-12 title-thanks">
                        <p>Gracias por su compra </p>
                    </div>
                    <div class="col-md-12 main-info">
                        <p>Su compra ha sido realizada, a la brevedad recibirá de parte nuestra un
                            correo con los detalles de su compra, para cualquier duda o aclaración
                            comuníquese al teléfono <span class="info-contacto">33 33 33 33 33 </span>
                            o al correo <span class="info-contacto">correo@ejemplo.com.mx</span>
                        </p>
                    </div>
                </div>
            </div>

            <!-- PAGOS OXXO -->
            <div class="col-md-12 div-oxxopay">
                <div class="row">
                    <div class="offset-md-4 col-md-6">
                        <p>Referencia Oxxo </p>
                    </div>
                    <div class="col-md-12 div-referencia">
                        <div class="row ">
                            <div class="offset-md-4 col-md-6">
                                <p>1234 1234 1234 1234</p>
                            </div>
                        </div>
                    </div>
                    <div class="offset-md-4 col-md-6 ">
                        <p>Instrucciones de pago en Oxxo </p>
                        <div class="oxxo-instructions">
                            <ol>
                                <li> Acuda a su tienda Oxxo más cercana </li>
                                <li> Indique en caja que quiere relizar un pago </li>
                                <li> Proporcione el número de referencia y realice el pago en efectivo </li>
                                <li> Al confirmar su pago, el cajero le entregará un comprobante impreso. Conserve su comprobante. </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <!-- PAGOS SPEI -->
            <div class="col-md-12 div-spei">
                <div class="row">
                    <div class="offset-md-4 col-md-6">
                        <p>Información para el pago con SPEI </p>
                    </div>
                    <div class="col-md-12 div-referencia">
                        <div class="row ">
                            <div class="offset-md-4 col-md-6">
                                <p>Referencia: </p>
                                <p>ITXQGAWTR</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 div-referencia">
                        <div class="row ">
                            <div class="offset-md-4 col-md-6">
                                <p>Clabe: </p>
                                <p>45615312355313215</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 div-referencia">
                        <div class="row ">
                            <div class="offset-md-4 col-md-6">
                                <p>Monto: </p>
                                <p>$17,628.00</p>
                            </div>
                        </div>
                    </div>
                    <div class="offset-md-4 col-md-6 ">
                        <p>Instrucciones de pago con SPEI </p>
                        <div class="oxxo-instructions">
                            <ol>
                                <li> Acuda a su banco más cercano o use su app bancaria </li>
                                <li> Indique en ventanilla/app que quiere realizar una transferencia </li>
                                <li> Proporcione los datos de pago que se le proporcionan en esta pantalla </li>
                                <li> Al confirmar su pago, el cajero/app le entregará un comprobante impreso/digital. Conserve su comprobante.</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <div style="background-image: url({{$torre_bg}}) " class="right_bg">
    </div>
</div>
@endsection