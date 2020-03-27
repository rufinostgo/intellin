$("#show_button").click(function(){
	if($( "#show_button" ).hasClass( "fa-chevron-down" )){
		$("#show_button").removeClass('fa-chevron-down');
		$("#show_button").addClass('fa-chevron-up');
  		$(".show_plano_movil").removeClass('d-none');
		$(".show_plano_movil").addClass('d-block');
	}else{
		$("#show_button").removeClass('fa-chevron-up');
  		$("#show_button").addClass('fa-chevron-down');
  		$(".show_plano_movil").addClass('d-none');
		$(".show_plano_movil").removeClass('d-block');
	} 	
});