@extends('layouts.app')

@section('title') INFORMACIÓN DE COMPRA @endsection

@section('description')  INFORMACIÓN DE COMPRA  @endsection

@section('mystyle') 
<link href="{{ asset('css/purchase_information.css') }}" rel="stylesheet">
<link href="{{ asset('css/purchase_information_v2.css') }}" rel="stylesheet">
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
<div class="sub_head">

</div>
<div class="container-fluid ">


    <div class="container pt-4">
        <div class="row ">
            <div class="col-md-8  mt-2 pt-4">


                <div class="row">

                    <div class="col-md-12 mb-2">
                        <h2 class="titulo_1">¿ Desea que instalemos sus productos ?</h2>
                    </div>
                    <div class="col-md-5">
                        <button class="bt_enabled general_text pt-2 pb-2  mt-1 mb-1 detonar_modal" style="width:100%;">
                            PUEDO INSTALARLOS YO MISMO
                        </button></div>
                    <div class="col-md-5">
                        <button class="bt_enabled_no_background general_text pt-2 pb-2  mt-1 mb-1 detonar_modal" style="width:100%;">
                            AYUDAME CON LA INSTALACION
                        </button>
                    </div>
                    <div class="col-md-12">
                    <p  class="general_text" >
                        Ver video de instalacion
                        <i class="fa fa-caret-right triangle_right " aria-hidden="true"></i>
                    </p>
                    </div>
                </div>
                <div class="row mt-5 pt-2">
                    <div class="col-md-12">
                    <h2>Titulo 2</h2>
                    </div>
                </div>
                <div class="row no-gutters mt-2 steps_purchase " >
                    
                    <div class="col-md-3 "  >
                        <button class="bt_enabled_steps general_text pt-2 pb-2 pr-0 pl-0  mt-1  detonar_modal" style="width:100%; ">
                            z
                        </button>
                       <!--aqui-->
                        <div class="row ml-0  mt-5 justify-content-center mb-0 option_inf" >
                            
                        <div class="col-12  pl-5 pr-5 pb-4 mt-2" style=" padding:0; margin:0px;">
                            <div class="parent_line">
                                    <div class="line">
                                    
                                    </div>
                            </div>
                        </div>   
                        <div class="col-md-5 mr-5 pt-3 minh_inf_op"  >
                                
                                <div class="  pr-1 ">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class=" fix_input general_text" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Enter email">

                                </div>
                                <div class=" mt-4">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class=" fix_input general_text" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Enter email">

                                </div>
                                <div class=" mt-4">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class=" fix_input general_text" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Enter email">

                                </div>
                            </div>
                            <div class="col-md-5  pt-3">
                                <div class="  ">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class=" fix_input general_text" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Enter email">

                                </div>
                                <div class=" mt-4">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class=" fix_input general_text" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Enter email">

                                </div>
                                <div class=" mt-4">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class=" fix_input general_text" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Enter email">

                                </div>
                            </div>
                           
                                <div class="align-text-bottom mt-4 invoice"  >
                                             <div class="row pl-5 pt-3">
                                                 <div class="col-6 ml-1 ">
                                                    <label class="is_check d-inline">
                                                        <input type="checkbox" checked="checked">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                   <div class="general_text d-inline " style="color:white;"  >
                                                       ¿ Desea incluir factura ?
                                                   </div>
                                                 </div>
                                                 
                                                 
                                             </div>
                               </div>
                            
                        </div>
                           
                      
                    </div>
                    <div class="col-md-3" >
                        <button class="bt_enabled general_text pt-2 pb-2  mt-1 mb-1 detonar_modal" style="width:100%;">
                            z
                        </button>
                    </div>
                    <div class="col-md-3" >
                        <button class="bt_enabled general_text pt-2 pb-2  mt-1 mb-1 detonar_modal" style="width:100%;">
                            z
                        </button>
                    </div>
                    <div class="col-md-3" >
                        <button class="bt_enabled general_text pt-2 pb-2  mt-1 mb-1 detonar_modal" style="width:100%;">
                            z
                        </button>
                    </div>

                </div>

               
            </div>

            <div class="col-md-4 mt-5 pt-5 ">

                <div class="row align-items-center pr-2 pl-2 pt-3 pb-3 ml-1 total_card"
                   >
                    <div class="col-12 mt-2">
                        <div class="row">
                            <div class="col-6 general_text" style="color:white">
                                Subtotal.
                            </div>
                            <div class="col-6">
                                <p class="text-right general_text" style="color:white">10</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-2">
                        <div class="row">
                            <div class="col-6 general_text" style="color:white">
                                Envio
                            </div>
                            <div class="col-6">
                                <p class="text-right general_text" style="color:white">10</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-2">
                        <div class="row">
                            <div class="col-6 general_text" style="color:white">
                                IVA
                            </div>
                            <div class="col-6">
                                <p class="text-right general_text" style="color:white">10</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-2">
                        <div class="row">
                            <div class="col-6 general_text" style="color:white">
                                Total.
                            </div>
                            <div class="col-6">
                                <p class="text-right general_text" style="color:white">10</p>
                            </div>
                        </div>
                    </div>
                  
                    
                    <div class="col-12 mb-1">
                        <div class="separator_total"></div>
                    <div class="row mt-3 mb-4">
                            <div class="col-12 mx-auto text-center  ">
                                <button  class="btn-comprar pt-2 pb-2  ">
                                    COMPRAR
                                </button>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="row   align-items-top mt-2 ml-1 pl-0 pr-0   total_products" >
                    <div class="col-12 pl-0 pr-0 pt-4">
                        <p class="text-left dato_imp_car pl-3"style="color:white;">Productos</p>      
                        <div class="container">
                            <div class="row fake_table general_text" style="color:white; " >
                                <div class="col-8 mb-0 mb-0 text-left pt-2 pb-2" >Sowarks white motor</div>
                                <div class="col-4 mb-0 mb-0 text-center pt-2 pb-2" >$21130</div>
                            </div> 
                             
                            <div class="row fake_table general_text" style="color:white; " >
                                <div class="col-8 mb-0 mb-0 text-left pt-2 pb-2" >Sowarks white motor</div>
                                <div class="col-4 mb-0 mb-0 text-center pt-2 pb-2" >$21130</div>
                            </div> 
                            <div class="row fake_table general_text" style="color:white; " >
                                <div class="col-8 mb-0 mb-0 text-left pt-2 pb-2" >Sowarks white motor</div>
                                <div class="col-4 mb-0 mb-0 text-center pt-2 pb-2" >$21130</div>
                            </div> 
                            

                        </div>
                        <p class="text-left dato_imp_car pl-3 mt-3"style="color:white;">Incluidos</p>      
                        <div class="container">
                            <div class="row fake_table general_text" style="color:white; " >
                                <div class="col-8 mb-0 mb-0 text-left pt-2 pb-2" >Control remoto 5 canles x1</div>
                                <div class="col-4 mb-0 mb-0 text-center pt-2 pb-2" >$21130</div>
                            </div> 
                             
                            <div class="row fake_table general_text" style="color:white; " >
                                <div class="col-8 mb-0 mb-0 text-left pt-2 pb-2" >Sowarks white motor</div>
                                <div class="col-4 mb-0 mb-0 text-center pt-2 pb-2" >$21130</div>
                            </div> 
                            
                            

                        </div>     
                    
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
