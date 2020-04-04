@extends('layouts.appsu')


@section('title') INTELLI (WELCOME) @endsection

@section('description') BIÉNVENIDO @endsection

@section('mystyle')
<link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
@endsection

@section('content')

<div class="container wc-container">
    <div class="left_bg"></div>
    <div style="background: url({{$torre_bg}})" class="right_bg"></div>
    <div class="row pb-5 welcome_header">
        <div class="d-none d-md-block select_torre">
            <a href="{{ url('/')}}" class="rever_play">
                <i class="fa fa-chevron-left play" aria-hidden="true"></i>
            </a>
            &nbsp;&nbsp;&nbsp;Seleccionar otra torre
        </div>
    </div>
    <div class="row  ">
        <div class="col-xs-12 col-sm-12 col-md-6 offset-md-6  ">
            <img src="{{ asset('images/logos/logo_welcome.png')}}" class="img-fluid img_logo" alt="Responsive image">
        </div>
    </div>
    <div class="row  ">
        <div class="col-md-6  ">
            <div class="row pt-1  ">
                <p class="nombre_torre">
                    {{ $torre_name }}
                </p>
            </div>
            <div class="row h-50 pt-5  ">
                <p class="">
                    <img src="{{ asset('images/logos/logo_transparent.png')}}" class="img-fluid" alt="Responsive image">
                </p>
            </div>
            <div class="row pb-4  ">
                <p class="info_lost text-left  ">
                    Si tu departamento no aparece en el listado, por favor comuníquese al teléfono
                    <span class="text-light"> 33 33 33 33 33 </span>
                    o al correo <span class=" text-light">correo@ejemplo.com.mx</span>
                </p>
            </div>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-6  ">
            <div id="welcome_frame_row" class="row">
                <img class="reticula_bottom" src="{{asset('images/decoratives/reticula_bottom.png')}}" alt="">
                <div class="welcome_frame col-sm-12 col-md-12   ">
                    <img class="triangle_welcome" src="asset('images/decoratives/triangle_signup.png')}}" alt="">
                    <p class="welcome-title "> <span class="welcome-guion">_</span> Biénvenido </p>
                    <p class="welcome-instructions">
                        Por favor seleccione su número de departamento
                    </p>

                    <form action="{{ url('purchase-information/') }}" method="POST">
                        <div class="form-group">
                            <label class="welcome-instructions2" for="numero_departamento"> Número de departamento</label>
                            <select class="form-control numero_departamento" 
                                name="numero_departamento" id="numero_departamento" 
                                placeholder="Seleccione su número de departamento aquí" required>
                                <option hidden selected> Selecciona su número de departamento aquí </option>
                                    @foreach ($torre_deptos as $key => $depto)
                                    <option value="{{$key}}"> {{$depto}}</option>
                                    @endforeach
                            </select>
                            @if (session('alert'))
                            <div class="">
                                <p style="padding: 2px; padding-top:6px; color: darkred">
                                {{ session('alert') }}
                                </p>
                            </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn_aceptar">ACEPTAR</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>


@endsection