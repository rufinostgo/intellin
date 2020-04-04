@extends('layouts.appsu')

@section('title') INTELLI (BOOTS) @endsection

@section('description') INICIO DE SESIÓN @endsection

@section('mystyle') 
<link href="{{ asset('css/signup.css') }}" rel="stylesheet">
@endsection

@section('content')

<div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-4 offset-sm-4  text-center">
                <img src="{{ asset('images/logos/logo_signup.png')}}" class="img-fluid" alt="Responsive image">
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 offset-lg-2 ">
                <div id="signup_frame_row" class="row  ">
                    <div class="signup_frame col-sm-12 col-md-10 offset-md-1 ">
                        <p class="signup-title "> <span class="signup-guion">_</span> Inicio de sesión </p>
                        <p class="signup-instructions">
                            Por favor introduzca el número de contrato que le proporcionamos para que
                            pueda ingresar al sistema
                        </p>
                        <form
                            action="file:///home/ESTRASOL/juan.camberos/Documentos/PROYECTOS/Intelli/intelli_design/welcome.html">
                            <div class="form-group">
                                <label class="signup-instructions2" for="numero_contrato"> Número de contrato
                                </label>
                                <input type="text" name="numero_contrato" class="form-control numero_contrato"
                                    id="numero_contrato" placeholder="Introduzca su número de contrato aquí" />
                            </div>
                            <button type="submit" class="btn btn_aceptar ">ACEPTAR</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row ">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 offset-lg-2 text-left">
                <div class="row ">
                    <div class="col-sm-10 offset-sm-1">
                        <p class="info_lost">
                            Si ha perdido su número de contrato, por favor comuníquese al teléfono
                            <span class="font-weight-bold"> 33 33 33 33 33 </span>
                            o al correo <span class="font-weight-bold">correo@ejemplo.com.mx</span>
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection