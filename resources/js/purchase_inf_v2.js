
sale_information = $('.mobile_card').clone()
sale_information.addClass('overflow-auto');
sale_information.css('color',"white");

copy = $('.copy_card')
copy.append(sale_information)
sale_information = copy.find('.mobile_card')
sale_information.removeClass('pt-5');
sale_information.removeClass('mt-5');
sale_information.removeClass('d_none_special');

$(".cerrar_products").click(function( ev){
    exept = $(ev.target).closest('#modal_products');
    exept.toggleClass( "d-none");
    exept.toggleClass( "d-block"); 
   
});
//Events 
//Normal form menus
$(".ctr_option button ").click(function( ev){
    exept = $(ev.target).attr('data').toString()
    
    buttons = $(".ctr_option button ")
    buttons.map(( index,item ) => {
        value =  parseInt( exept ) - 1
       
        $(item).removeClass('bt_enabled_steps')
        $(item).removeClass('bt_enabled')
        if(value == index){
            $(item).addClass('bt_enabled_steps')
        }
        else{
            $(item).addClass('bt_enabled')
        }
    })
    
    controls = $(' .control_iformation')
    controls.map(( index,item ) => {
        value =  parseInt( exept ) - 1
        rows = $(item).find('.row')
        rows.map( (index_1,item_1 ) => { $(item_1).addClass('d-none') } )
        rows.map( (index_1,item_1 ) => {  if( index == value)   $(item_1).removeClass('d-none')   } )
    })
    
   
});
//Mobile form menus
$(".open_products_total").click(function( ev){
  
    $(".products_modal").addClass('d-block');
   
});
$(".control_iformation button ").click(function( ev){
    rows = $(ev.target).siblings()
    btn = $(ev.target)
    console.log($(btn))
    if ($(btn).hasClass( "bt_enabled_steps" )){
        $(btn).removeClass('bt_enabled_steps')
        $(btn).addClass('bt_enabled')
    }
    else{
        $(btn).removeClass('bt_enabled')
        $(btn).addClass('bt_enabled_steps')
    } 

    rows.map((index,item ) => { if ($(item).hasClass( "d-none" )){
                                    $(item).removeClass('d-none')
                                }
                                else{
                                    $(item).addClass('d-none')
                                }    
                                
                                } )
    
   
});


//Modal video
//cerrar_video
$(".cerrar_video").click(function( ev){
    exept = $(ev.target).closest('#modal_video');
    exept.toggleClass( "d-none");
    exept.toggleClass( "d-block"); 
   
});

//open
$(".open_video_modal").click(function( ev){
   
    exept = $("#modal_video")
    exept.toggleClass( "d-none");
    exept.toggleClass( "d-block"); 
   
});

$(".cerrar_terminos").click(function( ev){
    exept = $(ev.target).closest('#modal_condiciones');
    exept.toggleClass( "d-none");
    exept.toggleClass( "d-block"); 
    document.documentElement.style.overflowY = ''; 
   
});
//open
$(".show_terms_cond").click(function( ev){

    exept = $("#modal_condiciones")
    exept.toggleClass( "d-none");
    exept.toggleClass( "d-block"); 
    document.documentElement.style.overflowY = 'hidden'; 
   
});
d

Payment.formatCardNumber($('.credit_card'), 16);