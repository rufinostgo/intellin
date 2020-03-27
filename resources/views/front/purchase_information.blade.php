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
                <div class="col-md-3 border_area">
                    <span class="title_area">ÁREA </span>
                    <span class="subtitle_area">1</span>
                </div>
                <div class="col-md-9">
                    <span class="title_area">Estílo </span>
                    <span class="subtitle_area">Translúcida</span>
                </div>
            </div>
        </div>

        <div class="col-md-3 pt-4 pb-3 column_total">
            <div class="row pl-3 pr-3 border_inf">
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

    </div>
</div>
@endsection
