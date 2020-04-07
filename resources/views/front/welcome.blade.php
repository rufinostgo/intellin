@extends('layouts.appsu')


@section('title') INTELLI (WELCOME) @endsection

@section('description') BIÉNVENIDO @endsection

@section('mystyle')
<link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
@endsection

@section('content')

<div class="container wc-container">
    <div class="left_bg"></div>
    <div style="background-image: url({{$torre_bg}}) " class="right_bg"></div>
    <div class="row pb-5 welcome_header">
        <div class="d-none d-md-block max-select_depto">
            <a href="{{ url('/')}}" class="rever_play">
                <i class="fa fa-chevron-left play" aria-hidden="true"></i>
            </a>
            &nbsp;&nbsp;&nbsp;Seleccionar otra torre
        </div>
    </div>
    <div class="row ">
        <div class="col-xs-6 col-md-6 offset-md-6  ">
            <img src="{{ asset('images/logos/logo_welcome.png')}}" class="img-fluid img_logo" alt="Responsive image">
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="row nombre_torre ">
                <div class="min-return-btn ">
                    <div class="d-md-block select_depto">
                        <a href="{{ url('/')}}" class="rever_play">
                            <i class="fa fa-chevron-left play" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
                <div class="min-torre-name ">
                    <p>
                        {{ $torre_name }}
                    </p>
                </div>
            </div>
            <div class="row h-50 pt-5 row-logotransp">
                <p class="">
                    <img src="{{ asset('images/logos/logo_transparent.png')}}" class="img-fluid" alt="Responsive image">
                </p>
            </div>
            <div class="row pb-4 max-info ">
                <p class="info_lost text-left  ">
                    Si tu departamento no aparece en el listado, por favor comuníquese al teléfono
                    <span class="text-light"> 33 33 33 33 33 </span>
                    o al correo <span class=" text-light">correo@ejemplo.com.mx</span>
                </p>
            </div>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-6  ">
            <div id="welcome_frame_row" class="row ">
                <img class="reticula_bottom" src="{{asset('images/decoratives/reticula_bottom.png')}}" alt="">
                <div class="welcome_frame col-sm-12 col-md-12   ">
                    <img class="triangle_welcome" src="{{asset('images/decoratives/triangle_signup.png')}}" alt="">
                    <p class="welcome-title "> <span class="welcome-guion">_</span> Biénvenido </p>
                    <p class="welcome-instructions">
                        Por favor seleccione su número de departamento
                    </p>

                    <form id="form_welcome" action="{{ url('purchase-info/') }}" method="POST">
                         @csrf
                        <div class="form-group">
                            <input type="text" class="form-control d-none" name="name_torre" id="name_torre" value="{{ $torre_name }}">
                            <label class="welcome-instructions2" for="numero_departamento"> Número de departamento</label>
                            <select class="form-control numero_departamento" name="numero_departamento" id="numero_departamento" placeholder="Seleccione su número de departamento aquí" required>
                                <option hidden selected value="empty"> Selecciona su número de departamento aquí </option>
                                @foreach ($torre_deptos as $key => $depto)
                                <option value="{{$key}}"> {{$depto}}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                <p class="invalid-welcome">
                                    Favor de seleccionar un número de departamento.
                                </p>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="button" id="aceptar_welcome" class="btn btn_aceptar">ACEPTAR</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row min-info ">
                <p class="info_lost text-left  ">
                    Si tu departamento no aparece en el listado, por favor comuníquese al teléfono
                    <span class="text-light"> 33 33 33 33 33 </span>
                    o al correo <span class=" text-light">correo@ejemplo.com.mx</span>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection

@section('myscripts')
<script src="{{ asset('js/welcome.js') }}" defer></script>
@endsection