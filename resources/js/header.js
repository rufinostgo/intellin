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
$(".detonar_modal").click(function(){
	$("#modal_imagen").removeClass('d-none');
	$("#modal_imagen").addClass('d-block');
	$(".title_modal").text($(this).data('title'))
	$("#img_modal").attr("src", $(this).data('url'));
});
$(".cerrar").click(function(){
	$("#modal_imagen").removeClass('d-block');
	$("#modal_imagen").addClass('d-none');
});