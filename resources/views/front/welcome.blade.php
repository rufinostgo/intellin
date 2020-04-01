@extends('layouts.appsu')


@section('title') INTELLI (WELCOME) @endsection

@section('description') BIÉNVENIDO @endsection

@section('mystyle')
<link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
@endsection

@section('content')

<div class="container">
    <div class="row border border-light">
        <div class="col-xs-12 col-sm-12 col-md-6 offset-md-6 border border-warning">
            <img src="{{ asset('images/logos/logo_welcome.png')}}" class="img-fluid img_logo" alt="Responsive image">
        </div>
    </div>
    <div class="row row border border-light">
        <div class="col-md-6 border border-danger">
            <div class="row pt-1 border border-info"> 
                <p class="nombre_torre">
                    TORRE CON NOMBRE DE EJEMPLO LARGO
                </p>
            </div>
            <div  class="row h-50 pt-5 border border-warning">
                <p class="">
                    <img src="{{ asset('images/logos/logo_transparent.png')}}" class="img-fluid" alt="Responsive image">
                </p>
            </div>
            <div  class="row pb-4 border border-primary">
                <p class="info_lost text-left  ">
                    Si tu departamento no aparece en el listado, por favor comuníquese al teléfono
                    <span class="text-light"> 33 33 33 33 33 </span>
                    o al correo <span class=" text-light">correo@ejemplo.com.mx</span>
                </p>
            </div>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 border border-warning">
            <div id="welcome_frame_row" class="row">
                <img class="reticula_bottom" src="{{asset('images/decoratives/reticula_bottom.png')}}" alt="">
                <div class="welcome_frame col-sm-12 col-md-12  border border-danger">
                    <img class="triangle_welcome" src="{{asset('images/decoratives/triangle_signup.png')}}" alt="">
                    <p class="welcome-title "> <span class="welcome-guion">_</span> Biénvenido </p>
                    <p class="welcome-instructions">
                        Por favor seleccione su número de departamento
                    </p>
                    <form class="needs-validation" novalidate>
                        <div class="form-group">
                            <label class="welcome-instructions2" for="numero_departamento"> Número de departamento
                            </label>

                            <select class="form-control numero_departamento" name="" id="" placeholder="Seleccione su número de departamento aquí">
                                <option hidden selected> Selecciona su número de departamento aquí </option>
                                <option value="2">Option2</option>
                                <option value="3">Option3</option>
                            </select>

                            <div class="invalid-feedback ">
                                <div class="invalid-welcome">
                                    .
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn_aceptar" onclick="search_code(this);">ACEPTAR</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

</div>


@endsection