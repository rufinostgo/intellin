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
                        <button class="bt_enabled_no_background general_text pt-2 pb-2  mt-1 mb-1 detonar_modal"
                            style="width:100%;">
                            AYUDAME CON LA INSTALACION
                        </button>
                    </div>
                    <div class="col-md-12">
                        <p class="general_text">
                            Ver video de instalacion
                            <i class="fa fa-caret-right triangle_right " aria-hidden="true"></i>
                        </p>
                    </div>
                </div>
                <div class="row mt-md-5 pt-2">
                    <div class="col-md-12">
                        <h2>Titulo 2</h2>
                    </div>
                </div>
                <div class="row no-gutters mt-0 pt-0  mb-5 steps_purchase ">
                    <div class="col-md-12 pl-0 pr-0   d-none d-xl-block d-lg-block">
                        <div class="row pl-0 pr-0 mr-0 ml-0 ctr_option">
                            <div class="col-3 pl-0 pr-0 ">
                                <button class="bt_enabled_steps   " data="1" style="width:100%;">
                                    DATOS PERSONALES
                                </button>
                            </div>
                            <div class="col-3 pl-0 pr-0">
                                <button class="bt_enabled    " data="2" style="width:100%;">
                                    DATOS DE FACTURACIÓN
                                </button>
                            </div>
                            <div class="col-3 pl-0 pr-0">
                                <button class="bt_enabled   " data="3" style="width:100%;">
                                    z
                                </button>
                            </div>
                            <div class="col-3 pl-0 pr-0">
                                <button class="bt_enabled    " data="4" style="width:100%;">
                                    z
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12  control_iformation">
                        <button class="bt_enabled_steps general_text pt-2 pb-2 pr-0 pl-0  mt-1  d-block d-sm-none  "
                            style="width:100%; ">
                            DATOS PERSONALES
                        </button>
                      
                        <div class="row ml-0 mr-0 mt-md-4">
                            <div class="col-12  pl-5 pr-5 pb-4 mt-2" style=" padding:0; margin:0px;">
                                <div class="parent_line">
                                    <div class="line">

                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row ml-0 mr-0 ">
                            <div class="col-md-5 ml-md-5" style="height:400px;">
                                <div class="pr-1 h-25 mt-3  ">
                                    <label for="exampleInputEmail1">Nombre*</label>
                                    <input type="email" class=" fix_input general_text" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Indique nombre completo">

                                </div>
                                <div class="pr-1 h-25 mt-3 ">
                                    <label for="exampleInputEmail1">Apellido materno</label>
                                    <input type="email" class=" fix_input general_text" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Indique el apellido materno">

                                </div>
                                <div class="pr-1  h-25 mt-3">
                                    <label for="exampleInputEmail1">Correo electrónico*</label>
                                    <input type="email" class=" fix_input general_text" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Indique su correo electrónico">

                                </div>
                            </div>
                            <div class="col-md-5 ml-md-4" style="height:400px;">
                                <div class="pr-1 h-25 mt-3  ">
                                    <label for="exampleInputEmail1">Apellido paterno*</label>
                                    <input type="email" class=" fix_input general_text" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Indique el apellido paterno">

                                </div>
                                <div class="pr-1 h-25 mt-3 ">
                                    <label for="exampleInputEmail1">Telefono*</label>
                                    <input type="email" class=" fix_input general_text" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Indique su numero telefónico">

                                </div>
                                <div class="pr-1  h-25 mt-3">
                                    <label for="exampleInputEmail1">Confirmacion de correo electónico</label>
                                    <input type="email" class=" fix_input general_text" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Confirme su correo electrónico">

                                </div>
                            </div>




                            <div class="col-12  invoice pt-3 pb-3 pl-5 mt-4 ">
                                <label class="is_check d-inline">
                                    <input type="checkbox" checked="checked">
                                    <span class="checkmark"></span>
                                </label>
                                <div class="general_text d-inline " style="color:white;">
                                    ¿ Desea incluir factura ?
                                </div>
                            </div>

                        </div>






                    </div>
                    <div class="col-md-12  control_iformation">
                        <button class="bt_enabled general_text pt-2 pb-2 pr-0 pl-0  mt-1  d-block d-sm-none  "
                            style="width:100%; ">
                            DATOS DE FACTURACIÓN
                        </button>
                        <!--aqui-->
                        <div class="row ml-0 mr-0 mt-md-4 d-none">
                            <div class="col-12  pl-5 pr-5 pb-4 mt-2" style=" padding:0; margin:0px;">
                                <div class="parent_line">
                                    <div class="line">

                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row ml-0 mr-0  d-none">
                            <div class="col-md-5 ml-md-5 pb-5" style="height:400px;">
                                <div class="pr-1 h-25 mt-3  ">
                                    <label for="exampleInputEmail1">R.F.C*</label>
                                    <input type="email" class=" fix_input general_text" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Indique su RFC">

                                </div>
                                <div class="pr-1 h-25 mt-3 ">
                                    <label for="exampleInputEmail1">USO de CFDI*</label>
                                    <input type="email" class=" fix_input general_text " id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Indique el uso de CFDI">

                                </div>
                                <div class="pr-1  h-25 mt-3">
                                    <label for="title_fiscal" >DIR FISCAL</label><br/><br/>
                                    <label for="exampleInputEmail1" id="title_fiscal">País*</label>
                                    <input type="email" class=" fix_input general_text" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Enter email">

                                </div>
                            </div>
                            <div class="col-md-5 " style="height:400px;">
                                <div class="pr-1 h-25 mt-3  ">
                                    <label for="exampleInputEmail1">Razón social*</label>
                                    <input type="email" class=" fix_input general_text" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="indique su razón social">

                                </div>
                                <div class="pr-1 h-25 mt-3 ">
                                  

                                </div>
                                <div class="pr-1  h-25 mt-3">
                                   
                                </div>
                            </div>




                           

                        </div>


                    </div>
                    <div class="col-md-12  control_iformation">
                        <button class="bt_enabled general_text pt-2 pb-2 pr-0 pl-0  mt-1  d-block d-sm-none  "
                            style="width:100%; ">
                            z
                        </button>
                        <!--aqui-->
                        <div class="row ml-0 mr-0 mt-md-4 d-none d-none">
                            <div class="col-12  pl-5 pr-5 pb-4 mt-2" style=" padding:0; margin:0px;">
                                <div class="parent_line">
                                    <div class="line">

                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row ml-0 mr-0  d-none d-none">
                            <div class="col-md-5 ml-md-5" style="height:600px;" >
                                <div class="pr-1 h-25 mt-3  ">
                                    <label for="exampleInputEmail1">Calle*</label>
                                    <select class="form-control select_product select_2" data-live-search="true">
                                        <option>Sowaks, white motor</option>
                                    </select>

                                </div>
                                <div class="pr-1  mt-3 ">
                                    <label for="exampleInputEmail1">Numero interior</label>
                                    <input type="email" class=" fix_input general_text" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Indique numero interior">

                                </div>
                                <div class="pr-1   mt-3">
                                    <label for="exampleInputEmail1">Estado*</label>
                                    <input type="email" class=" fix_input general_text" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Seleccione su estado">

                                </div>
                                <div class="pr-1   mt-3">
                                    <label for="exampleInputEmail1">Localidad*</label>
                                    <input type="email" class=" fix_input general_text" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Seleccione su localidad">

                                </div>
                                <div class="pr-1   mt-3">
                                  

                                </div>
                                <div class="pr-1   mt-3">
                                    

                                </div>
                            </div>
                            <div class="col-md-5 ml-md-4 mb-5 " >
                                <div class="pr-1  mt-3  ">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class=" fix_input general_text" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Enter email">

                                </div>
                                <div class="pr-1  mt-3 ">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class=" fix_input general_text" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Enter email">

                                </div>
                                <div class="pr-1   mt-3 mb-5">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class=" fix_input general_text" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Enter email">

                                </div>
                            </div>





                        </div>






                    </div>
                    <div class="col-md-12  control_iformation">
                        <button class="bt_enabled general_text pt-2 pb-2 pr-0 pl-0  mt-1  d-block d-sm-none  "
                            style="width:100%; ">
                            z
                        </button>
                        <!--aqui-->
                        <div class="row ml-0 mr-0 mt-md-4 d-none d-none">
                            <div class="col-12  pl-5 pr-5 pb-4 mt-2" style=" padding:0; margin:0px;">
                                <div class="parent_line">
                                    <div class="line">

                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row ml-0 mr-0  d-none d-none">
                            <div class="col-md-5 ml-md-5" style="height:300px;">
                                <div class="pr-1 h-25 mt-3  ">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class=" fix_input general_text" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Enter email">

                                </div>
                                <div class="pr-1 h-25 mt-3 ">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class=" fix_input general_text" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Enter email">

                                </div>
                                <div class="pr-1  h-25 mt-3">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class=" fix_input general_text" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Enter email">

                                </div>
                            </div>
                            <div class="col-md-5 " style="height:300px;">
                                <div class="pr-1 h-25 mt-3  ">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class=" fix_input general_text" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Enter email">

                                </div>
                                <div class="pr-1 h-25 mt-3 ">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class=" fix_input general_text" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Enter email">

                                </div>
                                <div class="pr-1  h-25 mt-3">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class=" fix_input general_text" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Enter email">

                                </div>
                            </div>




                            <div class="col-12  invoice pt-3 pb-3 pl-5 mt-4 ">
                                <label class="is_check d-inline">
                                    <input type="checkbox" checked="checked">
                                    <span class="checkmark"></span>
                                </label>
                                <div class="general_text d-inline " style="color:white;">
                                    ¿ Desea incluir factura ?
                                </div>
                            </div>

                        </div>






                    </div>
                </div>


            </div>

            <div class="col-md-4  mobile_card  d_none_special  ">

                <div class="row align-items-center pr-2 pl-2 pt-3 pb-3 ml-1 total_card">
                    <div class="col-12 mt-2 ">
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
                                <button class="btn-comprar pt-2 pb-2  ">
                                    COMPRAR
                                </button>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="row   align-items-top mt-2 ml-1 pl-0 pr-0   total_products">
                    <div class="col-12 pl-0 pr-0 pt-4">
                        <p class="text-left dato_imp_car pl-3" style="color:white;">Productos</p>
                        <div class="container">
                            <div class="row fake_table general_text" style="color:white; ">
                                <div class="col-8 mb-0 mb-0 text-left pt-2 pb-2">Sowarks white motor</div>
                                <div class="col-4 mb-0 mb-0 text-center pt-2 pb-2">$21130</div>
                            </div>

                            <div class="row fake_table general_text" style="color:white; ">
                                <div class="col-8 mb-0 mb-0 text-left pt-2 pb-2">Sowarks white motor</div>
                                <div class="col-4 mb-0 mb-0 text-center pt-2 pb-2">$21130</div>
                            </div>
                            <div class="row fake_table general_text" style="color:white; ">
                                <div class="col-8 mb-0 mb-0 text-left pt-2 pb-2">Sowarks white motor</div>
                                <div class="col-4 mb-0 mb-0 text-center pt-2 pb-2">$21130</div>
                            </div>


                        </div>
                        <p class="text-left dato_imp_car pl-3 mt-3" style="color:white;">Incluidos</p>
                        <div class="container">
                            <div class="row fake_table general_text" style="color:white; ">
                                <div class="col-8 mb-0 mb-0 text-left pt-2 pb-2">Control remoto 5 canles x1</div>
                                <div class="col-4 mb-0 mb-0 text-center pt-2 pb-2">$21130</div>
                            </div>

                            <div class="row fake_table general_text" style="color:white; ">
                                <div class="col-8 mb-0 mb-0 text-left pt-2 pb-2">Sowarks white motor</div>
                                <div class="col-4 mb-0 mb-0 text-center pt-2 pb-2">$21130</div>
                            </div>



                        </div>

                    </div>

                </div>


                <div class="row  mt-2 ml-0 pl-0 pr-0">
                    <div class="col-12 pl-0 pr-0 pt-4 general_text">

                        ' ¿Alguna duda o pregunta ? comunicate al telefono
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="container-fluid total_products pb-4 pt-4 pl-1 pr-1 d-block d-sm-none">
    <div class="row pb-3">
        <div class="col-2 text-right general_text" style="color:white;">
            Total
        </div>
        <div class="col-8 text-center general_text" style="color:white;">
            $14,00000
        </div>
        <div class="col-2 text-left fa fa-ellipsis-v ellipsis-v open_products_total"
            style="font-size:25px; color:white;">

        </div>
    </div>
    <div class="row ">
        <div class="col-12">
            <div class="col-12 mx-auto text-center  ">
                <button class="btn-comprar pt-2 pb-2  ">
                    COMPRAR
                </button>
            </div>
        </div>
    </div>
</div>

@endsection

<!--Mobile-->
<div>
	<div id="modal_imagen" class="modal d-none products_modal  pt-5 pl-2 pr-2 pb-5 overflow-auto">
	  <div class="row">
		  <div class="col-md-3"></div>
		  <div class="col-md-6 pl-md-5 pr-md-5">
		  	<div class="pl-md-5 pr-md-5 pr-2" >
		  		<div class="sub_title_modal"></div>
		  		<p class="title_modal"></p>
			    <div class="cerrar"><span class="close mb-2 mr-2">×</span></div>
			   
		    	</div>

		  </div>
          
          <div class="container copy_card mr-3  " >
                   
          </div>
		  
	  </div>
	</div>
</div>


