<nav>
	<div class="container-fluid" id="nav">
		<div class="row pt-2 pb-2 justify-content-center align-items-center">
			<div class="col-12 col-md-3 pr-3 text-center text-md-right  pt-2 pb-2 h-100 ">
				<div class="row">
					<div class="col col-md-12">
							<img class="w-md-100" src="{{ asset('images/logo_header.png')}}">
					</div>
					<div class="col-3 d-block d-md-none borde_logo"></div>
				</div>
			</div>
			<div class="col-md-4 d-none d-md-block pr-2 pt-2 pb-2 my-auto border_header"> 
				<div class="tower">@yield('name_tower')</div>
				<div class="department">@yield('name_department')</div>
			</div>
			<div class="col-md-5 d-none  d-md-block pl-3 pt-2 pb-2 my-auto">
				<button data-url="@yield('data_plano_url')" data-title="@yield('data_plano_title')" class="show_plano pt-2 pb-2 mr-3 mt-1 mb-1 detonar_modal">
					@yield('text_button1')
				</button>
				<button  data-url="@yield('data_product_url')" data-title="@yield('data_product_title')" class="show_product  pt-2 pb-2 mt-1 mb-1 detonar_modal">
					@yield('text_button2')
				</button>
			</div>
		</div>
	
	</div>

	<div class="container-fluid fondo_heder_movil">
		<div class="container d-block d-md-none ">
			<div class="pt-3 pb-4">
				<div class="row justify-content-center align-items-center">
					<div class="col-2">
						<a href="@yield('url')" class="rever_play">
							<i class="fa fa-chevron-left play" aria-hidden="true"></i>
						</a>
					</div>
					<div class="col-10">
						<div class="row">
							<div class="col">
								<div class="tower">@yield('name_tower')</div>
							</div>
							<div class="col-1 pl-0 ml-0 pt-1">
								<i class="fa fa-chevron-down show_button" aria-hidden="true" id="show_button"></i>
							</div>
							<div class="department col-12">@yield('name_department')</div>
						</div>
					</div>
				</div>	
				<div class="show_plano_movil d-none text-center pt-3 pb-3 ">
					<button data-url="@yield('data_plano_url')" data-title="@yield('data_plano_title')" class="show_plano pt-2 pb-2 detonar_modal">@yield('text_button1')</button>
				</div>	
				<div class="show_plano_movil d-none text-center ">
					<button data-url="@yield('data_product_url')" data-title="@yield('data_product_title')" class="show_product  pt-2 pb-2 detonar_modal">@yield('text_button2')</button>
				</div>	
			</div>
		</div>
	</div>
</nav>
<div>
	<div id="modal_imagen" class="modal active d-none pt-5 pl-2 pr-2">
	  <div class="row">
		  <div class="col-md-3"></div>
		  <div class="col-md-6 pl-md-5 pr-md-5">
		  	<div class="pl-md-5 pr-md-5">
		  		<div class="sub_title_modal">Está viendo</div>
		  		<p class="title_modal"></p>
			    <div class="cerrar"><span class="close mb-2">×</span></div>
			    <img class="modal-content mt-2" id="img_modal" src="">
		  	</div>
		  </div>
		  <div class="col-md-3">
		  </div>
	  </div>
	</div>
</div>
<!--
<div class="div" style="position:absolute; padding:0 0; width:100%; margin:0 0;   height:200px; background:red; ">
				
		</div>
-->