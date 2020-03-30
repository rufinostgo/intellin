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

<div class="container-fluid ">


    <div class="container pt-4">
        <div class="row">
            <div class="col-md-8   mt-2" style="background:white; "  >
                        
                        
                        <div class="row">
                        
                            <div class="col-md-12">
                            <h2>Titulo</h2>
                            </div> 
                            <div class="col-md-6"> 
                                <button class="show_plano pt-2 pb-2  mt-1 mb-1 detonar_modal" style="width:100%;">
                                    z
                                </button></div>
                            <div class="col-md-6">
                            <button class="show_plano pt-2 pb-2  mt-1 mb-1 detonar_modal" style="width:100%;">
                                    z
                                </button>
                            </div>
                            <div class="col-md-12">
                                <p>Tezt</p>
                            </div> 
                        </div>

                        <div class="row no-gutters mt-2" >
                        <div class="col-md-12">
                            <h2>Titulo 2</h2>
                            </div> 
                            <div class="col-md-3">
                                <button class="show_plano pt-2 pb-2 pr-0 pl-0  mt-1 mb-1 detonar_modal" style="width:100%;">
                                    z
                                </button>
                            </div>
                            <div class="col-md-3">
                                <button class="show_plano pt-2 pb-2  mt-1 mb-1 detonar_modal" style="width:100%;">
                                    z
                                </button>
                            </div>
                            <div class="col-md-3">
                                <button class="show_plano pt-2 pb-2  mt-1 mb-1 detonar_modal" style="width:100%;">
                                    z
                                </button>
                            </div>
                            <div class="col-md-3">
                                <button class="show_plano pt-2 pb-2  mt-1 mb-1 detonar_modal" style="width:100%;">
                                    z
                                </button>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                            <form>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        
                                </div>
                            </form>
                            </div>

                            <div class="col-md-6">
                            <form>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        
                                </div>
                               
                            </form>
                            </div>

                        </div>
            </div>

            <div class="col-md-4 mt-2 " >
                
                <div class="row  align-items-center pr-2 pl-2 pt-3 pb-3 ml-1" style="max-height:250px; height:220px; background:gray;">
                    <div class="col-12 mt-1" >
                        <div class="row">
                            <div class="col-6">
                                Valor
                            </div>
                            <div class="col-6" >
                                <p class="text-right">10</p>
                            </div>
                        </div>   
                    </div>
                    <div class="col-12" >
                        <div class="row">
                            <div class="col-6">
                                Valor
                            </div>
                            <div class="col-6" >
                                <p class="text-right">10</p>
                            </div>
                        </div>   
                    </div>
                    <div class="col-12" >
                        <div class="row">
                            <div class="col-6">
                                Valor
                            </div>
                            <div class="col-6" >
                                <p class="text-right">10</p>
                            </div>
                        </div>   
                    </div>
                    <div class="col-12" >
                        <div class="row">
                            <div class="col-6">
                                Valor
                            </div>
                            <div class="col-6" >
                                <p class="text-right">10</p>
                            </div>
                        </div>   
                    </div>
                    <div class="col-12 mb-1" >
                        <div class="row ">
                            <div class="col-12 mx-auto text-center  ">
                                <button>s</button>
                            </div>
                           
                        </div>   
                    </div>
                    
                </div>   
                <div class="row  align-items-top mt-2  ml-1 " style="height:600px;  background:red;" >
                    <div class="col-12"  >
                    <table class="table table-striped table-dark">
                            <thead>
                                <tr>
                              
                                <th scope="col">First</th>
                                
                                </tr>
                            </thead>
                            <tbody>
                              
                                <tr>
                                <th scope="row">3</th>
                                    <td>Larry</td>
                                
                                </tr>
                                <tr>
                                <th scope="row">3</th>
                                    <td>Larry</td>
                                
                                </tr>
                                <tr>
                                <th scope="row">3</th>
                                    <td>Larry</td>
                                
                                </tr>
                                <tr>
                                <th scope="row">3</th>
                                    <td>Larry</td>
                                
                                </tr>
                                <tr>
                                <th scope="row">3</th>
                                    <td>Larry</td>
                                
                                </tr>
                                <tr>
                                <th scope="row">3</th>
                                    <td>Larry</td>
                                
                                </tr>
                            </tbody>
                            </table>
                    </div>
                   
                </div>     
            </div>     
        </div>
    </div>
</div>

<div id="outer-circle">
  <div id="inner-circle">
    4
  </div>
</div>
@endsection
