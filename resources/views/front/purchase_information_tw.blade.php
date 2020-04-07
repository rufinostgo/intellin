@extends('layouts.app')

@section('title') INFORMACIÓN DE COMPRA @endsection

@section('description') INFORMACIÓN DE COMPRA @endsection

@section('mystyle')
<link href="{{ asset('css/purchase_information.css') }}" rel="stylesheet">
@endsection

@section('myscripts')
<script src="{{ asset('js/purchase.js') }}" defer></script>
@endsection

<!-- header menu -->
@section('name_tower') {{$nombre_torre}} @endsection

@section('name_department') Departamento: {{$num_depto}} @endsection

@section('text_button1') Ver plano @endsection

@section('data_plano_url') https://demo7.estrasol.com.mx/casaboceto/wp-content/uploads/2019/06/mueble-galería-1.jpg @endsection

@section('data_plano_title') Torre con nombre de ejemplo largo @endsection

@section('text_button2') Producto autorizado @endsection

@section('data_product_url') https://demo7.estrasol.com.mx/casaboceto/wp-content/uploads/2019/06/mueble-galería-1.jpg @endsection

@section('data_product_title') Producto autorizado @endsection

@section('url') # @endsection

<!-- end header menu -->

@section('content')

<div class="container-fluid purchase_header">
    <div class="container pt-4">
        <div class="d-none d-md-block select_depart">
            <a href="{{ url('/')}}" class="rever_play">
                <i class="fa fa-chevron-left play" aria-hidden="true"></i>
            </a>
            &nbsp;&nbsp;&nbsp;Seleccionar otro departamento
        </div>
    </div>
</div>

<div class="container areas">
    <div class="row">

        <div class="col-md-9">

            <!-- INICIO DE BOX TEMPLATE -->
            @foreach ($areas as $key_a => $area)
            <div class="area-box-tpl mb-5">
                <div class="row head_area mr-md-3 pt-2 pb-2">
                    <div class="col-md-4 border_area">
                        <span class="title_area">ÁREA </span>
                        <span class="subtitle_area">{{$area['area']}}</span>
                    </div>
                    <div class="col-md">
                        <span class="title_area">Estílo </span>
                        <span class="subtitle_area">{{$area['style']}}</span>
                    </div>
                </div>

                <div class="row sub_header_area mr-md-3 justify-content-center align-items-center">
                    <div class="col-md-3 zone mt-2 mb-2 pt-1 pb-1 ">Zona</div>
                    <div class="col-md-4 zone mt-2 mb-2 pt-1 pb-1 ">Producto</div>
                    <div class="col-md-3 zone mt-2 mb-2 pt-1 pb-1 ">Imágenes</div>
                    <div class="col-md-2   pt-3 pb-3 text-right total_area">Total</div>
                </div>
                <div class="zone_produt">
                    @foreach ($area['zones'] as $key_z => $zone)
                    <div class="row product_row justify-content-center align-items-center mr-md-3 pb-2 pt-2">
                        <div class="col-md-3 sucurasal"> {{$zone['zone']}}</div>
                        <div class="col-md-4">
                            <select class="form-control select_product select_product_area select2 select_2" data-toggle="select2">
                                <option value=""></option>
                                @foreach ($zone['products'] as $key_p => $product)
                                <option value="{{$product['product_id']}}"> {{$product['product']}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <button class="show_product  pt-1 pb-1 mt-1 mb-1" data-toggle="modal" href="#carouselModal">
                                Ver imágenes
                            </button>
                        </div>
                        <div class="col-md-2 text-right preci_total"> $0.00</div>
                    </div>
                    @endforeach
                </div>

                <div class="necesario_compra pt-4 pb-4">Productos necesarios en tu compra para el área: 1</div>

                <div class="row sub_header_area mr-md-3 justify-content-center align-items-center">
                    <div class="col-md-4 zone mt-2 mb-2 pt-1 pb-1 ">Producto</div>
                    <div class="col-md-3 zone mt-2 mb-2 pt-1 pb-1 ">Cantidad</div>
                    <div class="col-md-3 zone mt-2 mb-2 pt-1 pb-1 ">Imágenes</div>
                    <div class="col-md-2 pt-3 pb-3 text-right total_area">Total</div>
                </div>
                <div class="zone_produt  sin_margen mb-5">
                    <div class="row justify-content-center align-items-center mr-md-3 pb-2 pt-2">
                        <div class="col-md-4 sucurasal"> SECCIÓN POR DEFINIR </div>
                        <div class="col-md-3">
                            <select class="form-control select_product" data-live-search="true">
                                <option>1</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <button class="show_product  pt-1 pb-1 mt-1 mb-1">
                                Ver imágenes
                            </button>
                        </div>
                        <div class="col-md-2 text-right preci_total">$0.00</div>
                    </div>
                </div>
            </div>
            @endforeach
            <!-- FIN DE BOX TEMPLATE -->

            <hr>

            <div class="row head_area2 mr-md-3 pt-2 pb-2 mt-5">
                <div class="col-md-12 ">
                    <span class="subtitle_area">Otros productos: </span>
                </div>
            </div>

            <div class="row sub_header_area mr-md-3 justify-content-center align-items-center">
                <div class="col-md-4 zone mt-2 mb-2 pt-1 pb-1 ">Producto</div>
                <div class="col-md-3 zone mt-2 mb-2 pt-1 pb-1 ">Cantidad</div>
                <div class="col-md-3 zone mt-2 mb-2 pt-1 pb-1 ">Imágenes</div>
                <div class="col-md-2 pt-3 pb-3 text-right total_area">Total</div>
            </div>
            <div class="zone_produt  sin_margen mb-5">
                @foreach ($extra_products as $key_ex => $product)
                <div class="row justify-content-center align-items-center mr-md-3 pb-2 pt-2">
                    <div class="col-md-4 sucurasal"> {{$product['product']}} </div>
                    <div class="col-md-3">
                        <select class="form-control select_product" data-live-search="true">
                            <option>1</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <button class="show_product  pt-1 pb-1 mt-1 mb-1">
                            Ver imágenes
                        </button>
                    </div>
                    <div class="col-md-2 text-right preci_total">${{$product['price']}}</div>
                </div>
                @endforeach
            </div>

        </div>

        <div class="col-md-3 ">
            <div class="column_total pt-4 pb-3 ">
                <div class="row ml-1 mr-1 pl-2 pr-2  border_inf">
                    <div class="col-6 text-subtotal pb-3">Subtotal.</div>
                    <div class="col-6 text-subtotal monto-subtotal pb-3">$0.00</div>
                    <div class="col-6 text-subtotal pb-3">IVA.</div>
                    <div class="col-6 text-subtotal monto-iva pb-3">$0.00</div>
                    <div class="col-6 text-subtotal pb-3">Total.</div>
                    <div class="col-6 text-total monto-total pb-4">$0.00</div>
                </div>
                <div class="text-center pt-3">
                    <button type="button" class="btn-comprar pt-2 pb-2" data-toggle="modal" data-target="#modalContinueBuy">
                        COMPRAR
                    </button>
                </div>
            </div>
            <div class="pt-3">
                <div class="info_contacto">¿Alguna duda o pregunta?<div>
                        <div class="info_contacto">comuníquese al teléfono 3333333333 o al correo correo@ejemplo.com.mx</div>
                    </div>

                </div>

            </div>
        </div>

        <!-- confirmation modal of different products -->
        <div class="modal fade" id="modalContinueBuy" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <button type="button" class="cerrar border-0" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="close">&times;</span>
                    </button>
                    <div class="modal-header pl-4 pr-5 pb-1 pt-2 mt-4 pl-md-5">
                        <h5 class="modal-title"><i class="fa fa-exclamation-triangle mr-2" aria-hidden="true"></i> Aviso</h5>
                    </div>
                    <div class="modal-body mt-2">
                        Algunos de sus productos son distintos para cada una de las zonas, ¿Seguro que desea proceder a la compra?
                    </div>
                    <div class="modal-footer mt-2">
                        <div class="row w-100 text-center">
                            <div class="col-md-6 order-md-1 mt-3 mt-md-0">
                                <button class="btn_back pt-1 pb-1 mt-1 mb-1">
                                    REGRESAR
                                </button>
                            </div>
                            <div class="col-md-6 order-first order-md-2">
                                <button class="btn_continue pt-1 pb-1 mt-1 mb-1">
                                    CONTINUAR
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End modal-->

    <div class="modal fade" id="carouselModal" data-keyboard="false" data-backdrop="static">
        @include('layouts.modalCarousel', [
        'title' => 'Sowaks, white motor',
        'description' => 'Descripción dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
        'images' => 'https://demo7.estrasol.com.mx/casaboceto/wp-content/uploads/2019/06/mueble-galería-1.jpg'])
    </div><!-- /.modal -->
</div>
@endsection