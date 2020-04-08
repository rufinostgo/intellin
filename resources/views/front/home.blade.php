@extends('layouts.appsu')

@section('title') INTELLI (BOOT) @endsection

@section('description') INICIO DE SESIÓN @endsection

@section('mystyle')
<link href="{{ asset('css/signup.css') }}" rel="stylesheet">
@endsection

@section('content')

<div class="container bg-div">
    <div class="row">
        <div class="col-xs-12 col-sm-4 offset-sm-4  text-center">
            <img src="{{ asset('images/logos/logo_signup.png')}}" class="img-fluid" alt="Responsive image">
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 offset-lg-2">
            <div id="signup_frame_row" class="row  ">
                <img class="reticula_top" src="{{asset('images/decoratives/reticula_top.png')}}" alt="">
                <img class="reticula_bottom" src="{{asset('images/decoratives/reticula_bottom.png')}}" alt="">
                <div class="signup_frame col-sm-12 col-md-10 offset-md-1  ">
                    <img class="triangle_signup" src="{{asset('images/decoratives/triangle_signup.png')}}" alt="">
                    <p class="signup-title "> <span class="signup-guion">_</span> Inicio de sesión </p>
                    <p class="signup-instructions">
                        Por favor introduzca el número de contrato que le proporcionamos para que
                        pueda ingresar al sistema
                    </p>


                    <form action="{{ url('welcome/') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label class="signup-instructions2" for="numero_contrato"> Número de contrato</label>
                            <input type="text" class="numero_contrato form-control{{ $errors->has('numero_contrato') ? ' is-invalid' : '' }}" id="numero_contrato" name="numero_contrato" placeholder="Introduzca su número de contrato aquí" value="AURA01" required />
                            @if ($errors->has('numero_contrato'))
                            <div class="invalid-feedback">
                                <p class="invalid-signup">
                                    {{ $errors->first('numero_contrato') }}
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
    <div class="row ">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 offset-lg-2 text-left">
            <div class="row ">
                <div class="col-sm-10 offset-sm-1  ">
                    <p class="info_lost text-left  ">
                        Si ha perdido su número de contrato, por favor comuníquese al teléfono
                        <span class="text-light"> 33 33 33 33 33 </span>
                        o al correo <span class=" text-light">correo@ejemplo.com.mx</span>
                    </p>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection


@section('myscripts')
<script src="{{ asset('js/signup.js') }}" defer></script>
@endsection