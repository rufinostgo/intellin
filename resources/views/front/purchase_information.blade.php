@extends('layouts.app')

@section('title') INFORMACIÓN DE COMPRA @endsection

@section('description')  INFORMACIÓN DE COMPRA  @endsection

@section('mystyle') 
<link href="{{ asset('css/purchase_information.css') }}" rel="stylesheet">
@endsection

<!-- header menu -->
@section('name_tower') Torre con nombre de ejemplo largo @endsection

@section('name_department') Departamento: A1 @endsection

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
            <a href="{{ url('/')}}" class="rever_play" >
                <i class="fa fa-chevron-left play" aria-hidden="true"></i>
            </a>
            &nbsp;&nbsp;&nbsp;Seleccionar otro departamento
        </div>
    </div>
</div>

<div class="container areas">
    <div class="row">

        <div class="col-md-9">

            <div class="row head_area mr-md-3 pt-2 pb-2">
                <div class="col-md-4 border_area">
                    <span class="title_area">ÁREA </span>
                    <span class="subtitle_area">1</span>
                </div>
                <div class="col-md">
                    <span class="title_area">Estílo </span>
                    <span class="subtitle_area">Translúcida</span>
                </div>
            </div>

            <div class="row sub_header_area mr-md-3 justify-content-center align-items-center">
                 <div class="col-md-3 zone mt-2 mb-2 pt-1 pb-1 ">Zona</div>
                 <div class="col-md-4 zone mt-2 mb-2 pt-1 pb-1 ">Producto</div>
                 <div class="col-md-3 zone mt-2 mb-2 pt-1 pb-1 ">Imágenes</div>
                 <div class="col-md-2   pt-3 pb-3 text-right total_area">Total</div>
            </div>
            <div class="zone_produt">

                <div class="row justify-content-center align-items-center mr-md-3 pb-2 pt-2">
                     <div class="col-md-3 sucurasal">Sala Norte</div>
                     <div class="col-md-4">
                        <select class="form-control select_product" data-live-search="true">
                            <option>Sowaks, white motor</option>
                        </select>
                 </div>
                     <div class="col-md-3">
                        <button   class="show_product  pt-1 pb-1 mt-1 mb-1">
                            Ver imágenes
                        </button>
                     </div>
                     <div class="col-md-2 text-right preci_total">$2,100.00</div>
                </div>

                <div class="row justify-content-center align-items-center mr-md-3 pb-2 pt-2">
                     <div class="col-md-3 sucurasal">Sala Norte</div>
                     <div class="col-md-4">
                        <select class="form-control select_product" data-live-search="true">
                            <option>Sowaks, white motor</option>
                        </select>
                 </div>
                     <div class="col-md-3">
                        <button   class="show_product  pt-1 pb-1 mt-1 mb-1">
                            Ver imágenes
                        </button>
                     </div>
                     <div class="col-md-2 text-right preci_total">$2,100.00</div>
                </div>

                <div class="row justify-content-center align-items-center mr-md-3 pb-2 pt-2">
                     <div class="col-md-3 sucurasal">Sala Norte</div>
                     <div class="col-md-4">
                        <select class="form-control select_product" data-live-search="true">
                            <option>Sowaks, white motor</option>
                        </select>
                 </div>
                     <div class="col-md-3">
                        <button   class="show_product  pt-1 pb-1 mt-1 mb-1">
                            Ver imágenes
                        </button>
                     </div>
                     <div class="col-md-2 text-right preci_total">$2,100.00</div>
                </div>

                <div class="row justify-content-center align-items-center mr-md-3 pb-2 pt-2">
                     <div class="col-md-3 sucurasal">Sala Norte</div>
                     <div class="col-md-4">
                        <select class="form-control select_product" data-live-search="true">
                            <option>Sowaks, white motor</option>
                        </select>
                 </div>
                     <div class="col-md-3">
                        <button   class="show_product  pt-1 pb-1 mt-1 mb-1">
                            Ver imágenes
                        </button>
                     </div>
                     <div class="col-md-2 text-right preci_total">$2,100.00</div>
                </div>
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
                     <div class="col-md-4 sucurasal">Control remoto de 5 canales</div>
                     <div class="col-md-3">
                        <select class="form-control select_product" data-live-search="true">
                            <option>1</option>
                        </select>
                 </div>
                     <div class="col-md-3">
                        <button   class="show_product  pt-1 pb-1 mt-1 mb-1">
                            Ver imágenes
                        </button>
                     </div>
                     <div class="col-md-2 text-right preci_total">$500.00</div>
                </div>
            </div>


            <div class="row head_area2 mr-md-3 pt-2 pb-2 mt-5">
                <div class="col-md-4 border_area">
                    <span class="title_area">ÁREA </span>
                    <span class="subtitle_area">2</span>
                </div>
                <div class="col-md">
                    <span class="title_area">Estílo </span>
                    <span class="subtitle_area">Blackout</span>
                </div>
            </div>

            <div class="row sub_header_area mr-md-3 justify-content-center align-items-center">
                 <div class="col-md-3 zone mt-2 mb-2 pt-1 pb-1 ">Zona</div>
                 <div class="col-md-4 zone mt-2 mb-2 pt-1 pb-1 ">Producto</div>
                 <div class="col-md-3 zone mt-2 mb-2 pt-1 pb-1 ">Imágenes</div>
                 <div class="col-md-2   pt-3 pb-3 text-right total_area">Total</div>
            </div>

             <div class="zone_produt">

                <div class="row justify-content-center align-items-center mr-md-3 pb-2 pt-2">
                     <div class="col-md-3 sucurasal">Sala Norte</div>
                     <div class="col-md-4">
                        <select class="form-control select_product" data-live-search="true">
                            <option>Sowaks, white motor</option>
                        </select>
                 </div>
                     <div class="col-md-3">
                        <button   class="show_product  pt-1 pb-1 mt-1 mb-1">
                            Ver imágenes
                        </button>
                     </div>
                     <div class="col-md-2 text-right preci_total">$2,100.00</div>
                </div>

                <div class="row justify-content-center align-items-center mr-md-3 pb-2 pt-2">
                     <div class="col-md-3 sucurasal">Sala Norte</div>
                     <div class="col-md-4">
                        <select class="form-control select_product" data-live-search="true">
                            <option>Sowaks, white motor</option>
                        </select>
                 </div>
                     <div class="col-md-3">
                        <button   class="show_product  pt-1 pb-1 mt-1 mb-1">
                            Ver imágenes
                        </button>
                     </div>
                     <div class="col-md-2 text-right preci_total">$2,100.00</div>
                </div>

                <div class="row justify-content-center align-items-center mr-md-3 pb-2 pt-2">
                     <div class="col-md-3 sucurasal">Sala Norte</div>
                     <div class="col-md-4">
                        <select class="form-control select_product" data-live-search="true">
                            <option>Sowaks, white motor</option>
                        </select>
                 </div>
                     <div class="col-md-3">
                        <button   class="show_product  pt-1 pb-1 mt-1 mb-1">
                            Ver imágenes
                        </button>
                     </div>
                     <div class="col-md-2 text-right preci_total">$2,100.00</div>
                </div>

                <div class="row justify-content-center align-items-center mr-md-3 pb-2 pt-2">
                     <div class="col-md-3 sucurasal">Sala Norte</div>
                     <div class="col-md-4">
                        <select class="form-control select_product" data-live-search="true">
                            <option>Sowaks, white motor</option>
                        </select>
                 </div>
                     <div class="col-md-3">
                        <button   class="show_product  pt-1 pb-1 mt-1 mb-1">
                            Ver imágenes
                        </button>
                     </div>
                     <div class="col-md-2 text-right preci_total">$2,100.00</div>
                </div>
            </div>

            <div class="necesario_compra pt-4 pb-4">Productos necesarios en tu compra para el área: 2</div>

            <div class="row sub_header_area mr-md-3 justify-content-center align-items-center">
                 <div class="col-md-4 zone mt-2 mb-2 pt-1 pb-1 ">Producto</div>
                 <div class="col-md-3 zone mt-2 mb-2 pt-1 pb-1 ">Cantidad</div>
                 <div class="col-md-3 zone mt-2 mb-2 pt-1 pb-1 ">Imágenes</div>
                 <div class="col-md-2 pt-3 pb-3 text-right total_area">Total</div>
            </div>
            <div class="zone_produt sin_margen mb-5">
                <div class="row justify-content-center align-items-center mr-md-3 pb-2 pt-2">
                     <div class="col-md-4 sucurasal">Control remoto de 2 canales</div>
                     <div class="col-md-3">
                        <select class="form-control select_product" data-live-search="true">
                            <option>1</option>
                        </select>
                 </div>
                     <div class="col-md-3">
                        <button   class="show_product  pt-1 pb-1 mt-1 mb-1">
                            Ver imágenes
                        </button>
                     </div>
                     <div class="col-md-2 text-right preci_total">$500.00</div>
                </div>
            </div>

            <div class="row head_area2 mr-md-3 pt-2 pb-2 mt-5">
                <div class="col-md-12 ">
                    <span class="subtitle_area">Otros productos: </span>
                </div>
            </div>

            <div class="row sub_header_area mr-md-3 justify-content-center align-items-center">
                 <div class="col-md-3 zone mt-2 mb-2 pt-1 pb-1 ">Zona</div>
                 <div class="col-md-4 zone mt-2 mb-2 pt-1 pb-1 ">Producto</div>
                 <div class="col-md-3 zone mt-2 mb-2 pt-1 pb-1 ">Imágenes</div>
                 <div class="col-md-2   pt-3 pb-3 text-right total_area">Total</div>
            </div>

            <div class="zone_produt sin_margen">

                <div class="row justify-content-center align-items-center mr-md-3 pb-2 pt-2">
                     <div class="col-md-3 sucurasal">Sala Norte</div>
                     <div class="col-md-4">
                        <select class="form-control select_product" data-live-search="true">
                            <option>Sowaks, white motor</option>
                        </select>
                 </div>
                     <div class="col-md-3">
                        <button   class="show_product  pt-1 pb-1 mt-1 mb-1">
                            Ver imágenes
                        </button>
                     </div>
                     <div class="col-md-2 text-right preci_total">$2,100.00</div>
                </div>

                <div class="row justify-content-center align-items-center mr-md-3 pb-2 pt-2">
                     <div class="col-md-3 sucurasal">Sala Norte</div>
                     <div class="col-md-4">
                        <select class="form-control select_product" data-live-search="true">
                            <option>Sowaks, white motor</option>
                        </select>
                 </div>
                     <div class="col-md-3">
                        <button   class="show_product  pt-1 pb-1 mt-1 mb-1">
                            Ver imágenes
                        </button>
                     </div>
                     <div class="col-md-2 text-right preci_total">$2,100.00</div>
                </div>
            </div>

        </div>

        <div class="col-md-3 ">
            <div class="column_total pt-4 pb-3 ">
                <div class="row ml-1 mr-1 pl-2 pr-2  border_inf">
                    <div class="col-6 text-subtotal pb-3">Subtotal.</div>
                    <div class="col-6 text-subtotal pb-3">$14,800.00</div>
                    <div class="col-6 text-subtotal pb-3">IVA.</div>
                    <div class="col-6 text-subtotal pb-3">$2,368.00</div>
                    <div class="col-6 text-subtotal pb-3">Total.</div>
                    <div class="col-6 text-total pb-4">$17,168.00</div>
                </div>
                <div class="text-center pt-3">
                    <button  class="btn-comprar pt-2 pb-2 ">
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
@endsection
