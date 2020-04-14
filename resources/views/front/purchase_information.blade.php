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

@section('data_plano_url') {{$map}} @endsection

@section('data_plano_title') {{$nombre_torre}} @endsection

@section('text_button2') Producto autorizado @endsection

@section('data_product_url') {{$imagen_torre}} @endsection

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
            <div class="area-box-tpl">
                <div class="row head_area mr-md-3 pt-2 pb-2">
                    <div class="col-6 col-md-4 border_area">
                        <span class="title_area">ÁREA </span>
                        <span class="subtitle_area">{{$area['area']}}</span>
                    </div>
                    <div class="col-6 col-md-4">
                        <span class="title_area">Estílo </span>
                        <span class="subtitle_area">{{$area['style']}}</span>
                    </div>
                </div>

                <div class="row sub_header_area mr-md-3 justify-content-center align-items-center">
                    <div class="d-none d-sm-block col-sm-3 col-md-3 zone mt-2 mb-2 pt-1 pb-1 ">Zona</div>
                    <div class="col-6 col-sm-4 col-md-4 zone mt-2 mb-2 pt-1 pb-1 ">Producto</div>
                    <div class="d-none d-sm-block col-sm-3 col-md-3 zone mt-2 mb-2 pt-1 pb-1 ">Imágenes</div>
                    <div class="col-6 col-sm-2 col-md-2 pt-3 pb-3 text-left text-sm-right total_area">Total</div>
                </div>
                <div class="zone_produt">
                    @foreach ($area['zones'] as $key_z => $zone)
                    <div class="row product_row justify-content-center align-items-center mr-md-3 pb-2 pt-2">
                        <div class="d-none d-sm-block col-sm-3 col-md-3 sucurasal">{{$zone['zone']}}</div>
                        <div class="col-6 col-sm-4 col-md-4">
                            <select class="form-control select_product select_product_area select2 select_2" data-toggle="select2">
                                <option value=""></option>
                                @foreach ($zone['products'] as $key_p => $product)
                                <option value="{{$product['product_id']}}"> {{$product['product']}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="d-none d-sm-block col-sm-3 col-md-3">
                            <button class="show-p show_product-dis  pt-1 pb-1 mt-1 mb-1" data-toggle="modal" href="#carouselModal" disabled>
                                Ver imágenes
                            </button>
                        </div>
                        <div class="col-6 col-sm-2 col-md-2 text-left text-sm-right price_total_area"> <span class="preci_total ">$0.00</span>
                            <button data-toggle="modal" data-target="#areaModal" class="float-right d-bloc d-sm-none" type="button" name="button">
                                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>
                    @endforeach

                </div>

                <div class="necesario_compra pt-4 pb-4">Productos necesarios en tu compra para el área: {{$area['area']}} </div>

                <div class="row sub_header_area mr-md-3 justify-content-center align-items-center">
                    <div class="col-6 col-sm-4 col-md-4 zone mt-2 mb-2 pt-1 pb-1 ">Producto</div>
                    <div class="d-none d-md-block col-4 col-sm-3 col-md-3 zone mt-2 mb-2 pt-1 pb-1 ">Cantidad</div>
                    <div class="d-block d-md-none col-2 col-sm-3 zone mt-2 mb-2 pt-1 pb-1 ">Cant.</div>
                    <div class="d-none d-sm-block col-sm-3 col-md-3 zone mt-2 mb-2 pt-1 pb-1 ">Imágenes</div>
                    <div class="col-4 col-sm-2 col-md-2 pt-3 pb-3 text-left text-sm-right total_area">Total</div>
                </div>

                <div class="zone_produt zone-product-extras sin_margen mb-5">
                    @foreach ($a_extraprods as $key_ex => $product)
                    <div class="row justify-content-center align-items-center mr-md-3 pb-2 pt-2 row-prodn row-prodn-false" id="row-prodn-{{$product['electronic_id']}}">
                        <div class="col-6 col-sm-4 col-md-4 sucurasal">
                            <input type="hidden" class="extra_product_id" value="{{$product['product_id']}}">
                            {{$product['product']}}
                        </div>
                        <div class="col-2 col-sm-3 col-md-3 p-0">
                            <select class="form-control select_product select_product_extra" data-live-search="true">
                                <option value=""></option>
                                <option value="0" selected>0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <div class="d-none d-sm-block col-sm-3 col-md-3">
                            <button class="show_product  pt-1 pb-1 mt-1 mb-1" data-toggle="modal" href="#carouselModal_{{$product['product_id']}}">
                                Ver imágenes
                            </button>
                        </div>
                        <div class="col-4 col-sm-2 col-md-2 text-left text-sm-right price_total_product"> <span class="preci_total "> $0.00</span>
                            <button data-toggle="modal" data-target="#productModal" class="float-right d-bloc d-sm-none" type="button" name="button">
                                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach
            <!-- FIN DE BOX TEMPLATE -->


            <div class="row head_area2 mr-md-3 pt-2 pb-2 mt-5">
                <div class="col-md-12 ">
                    <span class="subtitle_area">Otros productos: </span>
                </div>
            </div>

            <div class="row sub_header_area mr-md-3 justify-content-center align-items-center">
                <div class="col-6 col-sm-4 col-md-4 zone mt-2 mb-2 pt-1 pb-1 ">Producto</div>
                <div class="d-none d-md-block col-4 col-sm-3 col-md-3 zone mt-2 mb-2 pt-1 pb-1 ">Cantidad</div>
                <div class="d-block d-md-none col-2 col-sm-3 zone mt-2 mb-2 pt-1 pb-1 ">Cant.</div>
                <div class="d-none d-sm-block col-sm-3 col-md-3 zone mt-2 mb-2 pt-1 pb-1 ">Imágenes</div>
                <div class="col-4 col-sm-2 col-md-2 pt-3 pb-3 text-left text-sm-right total_area">Total</div>
            </div>

            <div class="zone_produt sin_margen">
                @foreach ($a_otherprods as $key_ex => $product)
                <div class="row extra-row justify-content-center align-items-center mr-md-3 pb-2 pt-2 row-prodn"  id="row-prodn-{{$product['electronic_id']}}">
                    <div class="col-6 col-sm-4 col-md-4 sucurasal">
                        <input type="hidden" class="extra_product_id" value="{{$product['product_id']}}">
                        {{$product['product']}}
                    </div>
                    <div class="col-2 col-sm-3 col-md-3 p-0">
                        <select class="form-control select_product select_product_extra" data-live-search="true">
                            <option value=""></option>
                            <option value="0" selected>0</option>
                            <option value="1"> 1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                    <div class="d-none d-sm-block col-sm-3 col-md-3">
                        <button class="show_product  pt-1 pb-1 mt-1 mb-1" data-toggle="modal" href="#carouselModal_{{$product['product_id']}}">
                            Ver imágenes
                        </button>
                    </div>
                    <div class="col-4 col-sm-2 col-md-2 text-left text-sm-right price_total_product"> <span class="preci_total "> $0.00</span>
                        <button data-toggle="modal" data-target="#productModal" class="float-right d-bloc d-sm-none" type="button" name="button">
                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="col-md-3 ">
            <div class="column_total pt-4 pb-3 ">
                <div class="row ml-1 mr-1 pl-2 pr-2  border_inf">
                    <div class="d-none d-md-block col-6 text-subtotal pb-3">Subtotal.</div>
                    <div class="d-none d-md-block col-6 text-subtotal monto-subtotal pb-3">$0.00</div>
                    <div class="d-none d-md-block col-6 text-subtotal pb-3">IVA.</div>
                    <div class="d-none d-md-block col-6 text-subtotal monto-iva pb-3">$0.00</div>
                    <div class="col-6 text-subtotal pb-3">Total.</div>
                    <div class="col-6 text-total pb-4 price_total_payment monto-total">$0.00
                        <button data-toggle="modal" data-target="#paymentModal" class="float-right d-bloc d-md-none" type="button" name="button">
                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
                <div class="text-center pt-3">
                    <button type="button" class="btn-comprar pt-2 pb-2" data-toggle="modal" data-target="#modalContinueBuy">
                        COMPRAR
                    </button>
                </div>
            </div>
            <div class="pt-3 d-none d-md-block">
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
        <!--End modal-->

        <!-- PRODUCTS IMAGE MODAL  -->
        @foreach ($products_info as $key => $product)
        <div class="modal fade carouselModal" id="carouselModal_{{$key}}" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <p class="title_view">Estas viendo</p>
                        <h3 class="title">{{ $product['name']}}</h3>
                        <button type="button" class="cerrar border-0" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="close">&times;</span>
                        </button>

                        <div id="indicators" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#indicators" data-slide-to="0" class="active">1</li>
                                <li data-target="#indicators" data-slide-to="1">2</li>
                                <li data-target="#indicators" data-slide-to="2">3</li>
                            </ol>
                            <p class="num"></p>
                            <div class="carousel-inner">
                                @foreach ($product['images'] as $key_i => $img)
                                <div class="carousel-item {{ $key_i == 0 ? 'active' : '' }}">
                                    <img class="d-block w-100" src="{{$img}}" alt="Third slide">
                                </div>
                                @endforeach
                            </div>
                            <a class="carousel-control-prev" href="#indicators" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#indicators" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>

                    </div><!-- /.modal-body -->
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div> <!-- /.modal -->
        @endforeach

        <div class="modal fade" id="paymentModal" data-keyboard="false" data-backdrop="static">
            @include('layouts.modalPayment', [
            'subtotal' => '500',
            'iva' => '2323',
            'total' => '23233'])
        </div><!-- /.modal -->

        <div class="modal fade" id="areaModal" data-keyboard="false" data-backdrop="static">
            @include('layouts.modalArea', [
            'area' => '500',
            'style' => '2323',
            'zone' => '23233',
            'product' => '23233'])
        </div><!-- /.modal -->

        <div class="modal fade" id="productModal" data-keyboard="false" data-backdrop="static">
            @include('layouts.modalProduct', [
            'area' => '500',
            'style' => '2323',
            'zone' => '23233',
            'quantity' => '23233'])
        </div><!-- /.modal -->
        @endsection