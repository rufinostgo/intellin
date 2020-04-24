let estados_list;

$(document).ready(function () {
    $("#check_factura").on("change", function () {
        let is_checked = $(this).prop("checked");
        if (is_checked) {
            $(".tab-datos-facturacion").show();
            set_required_fact_elements(true);
        } else {
            $(".tab-datos-facturacion").hide();
            set_required_fact_elements(false);
        }
    });

    $("#check_terminos").on("change", function () {
        let is_checked = $(this).prop("checked");
        console.log("check_terminos: " + is_checked);
        if (is_checked) {
            console.log("Habilita comprar");
            $(".payment-proceed").removeClass("btn-comprar-unabled").addClass("btn-comprar");
            $(".payment-proceed").prop("disabled", false);
        } else {
            console.log("Deshabilita comprar");
            $(".payment-proceed").removeClass("btn-comprar").addClass("btn-comprar-unabled");
            $(".payment-proceed").prop("disabled", true);
        }
    });

    $(".payment-proceed").on("click", function () {
        console.log("Button comprar.");
        proceed_toPayment();
    });

    $("#form_pago_card_expmes").on("change", function () {
        $("#form_pago_card_expmes_input").val($(this).val());
    });
    $("#form_pago_card_expanio").on("change", function () {
        $("#form_pago_card_expanio_input").val($(this).val());
    });

    $("#delivery_choice_btn").on("click", function () {
        $("#delivery_choice_btn").removeClass("bt_enabled_no_background").addClass("bt_enabled");
        $("#instalation_choice_btn").removeClass("bt_enabled").addClass("bt_enabled_no_background");
        $(".extrapay_concept_label").text("Envío");
        $(".extrapay_concept_value").text(result_data['total_card'].delivery_price);
        $(".total_value").text(result_data['total_card'].total_delivery);
        $("#extrapay_concept").val("total_delivery");
    });

    $("#instalation_choice_btn").on("click", function () {
        $("#delivery_choice_btn").removeClass("bt_enabled").addClass("bt_enabled_no_background");
        $("#instalation_choice_btn").removeClass("bt_enabled_no_background").addClass("bt_enabled");
        $(".extrapay_concept_label").text("Instalación");
        $(".extrapay_concept_value").text(result_data['total_card'].instalation_price);
        $(".total_value").text(result_data['total_card'].total_instalation);
        $("#extrapay_concept").val("total_instalation");
    });

    $("#form_fact_estado,#form_envio_estado").on("change", function () {
        let id = $(this).attr("id");
        let munis_id = id.replace("estado", "municipio");
        let edo = $(this).val();
        let munis = estados_list[edo];

        $('#' + munis_id).empty();
        $.each(munis, function (index, value) {
            $("#" + munis_id).append(new Option(value, value, false, false));
        });

        console.log("Select estado " + $(this).attr("id") + " Value: " + edo);
        console.log(munis);
    });

    init_forms_placeholders();
    llenar_estadoslist()

    llenar_select_prueba();
    //introducir_datos_prueba();

    $("#check_factura").prop("checked", false);
    $("#check_factura").trigger("change");
    $(".div_policy").append(result_data['policy']);

});

const llenar_estadoslist = () => {
    console.log("llenar_selects_domicilio");
    estados_list = JSON.parse(return_text_estados());
    console.log("Estaditos List");
    console.log(estados_list);
    $.each(estados_list, function (index, value) {
        $("#form_fact_estado").append(new Option(index, index, false, false));
        $("#form_envio_estado").append(new Option(index, index, false, false));
    });

    /*fetch('/json/estados.json')
        .then(function (response) {
            return response.json();
        })
        .then(function (myJson) {
            estados_list = myJson;
            $.each(estados_list, function (index, value) {
                $("#form_fact_estado").append(new Option(index, index, false, false));
                $("#form_envio_estado").append(new Option(index, index, false, false));
            });
        });*/
}

const init_forms_placeholders = () => {
    let selects_array = {
        "cfdi": "Indique su CFDI",
        "fact_pais": "Indique su país",
        "fact_estado": "Indique su estado",
        "fact_municipio": "Indique su municipio",
        //"fact_localidad": "Indique su localidad",
        //"fact_colonia": "Indique su colonia",
        "envio_estado": "Indique su estado",
        "envio_municipio": "Indique su municipio",
        //"envio_colonia": "Indique su colonia",
        //"envio_localidad": "Indique su localidad",
        "pago_card_expmes": "Mes",
        "pago_card_expanio": "Año"
    }
    $.each(selects_array, function (index, value) {
        $("#form_" + index).select2({
            placeholder: value,
            allowClear: true
        });
    });
}

const set_required_fact_elements = (is_required) => {
    let fact_elements = [
        "form_rfc",
        "form_cfdi",
        "form_razonsocial",
        "form_fact_pais",
        "form_fact_calle",
        "form_fact_noext",
        "form_fact_noint",
        "form_fact_cp",
        "form_fact_estado",
        "form_fact_municipio",
        "form_fact_colonia",
        "form_fact_localidad",
    ];

    $.each(fact_elements, function (index, value) {
        if (is_required) {
            //console.log("Agrega requerido a #" + value);
            $("#" + value).addClass("form-required");
        } else {
            //console.log("Se remueve el requerido a #" + value);
            $("#" + value).removeClass("form-required");
        }

    });
}

const proceed_toPayment = () => {
    console.log("proceed_toPayment");
    let everything_correct = true;
    $(".form-required").each(function () {
        let elem_type = $(this).prop('nodeName').toLowerCase();
        let elem_val = "";
        if (elem_type == 'input') {
            elem_val = $(this).val();
        } else if (elem_type == 'select') {
            elem_val = $(this).children("option:selected").val();
        }

        if (elem_val == "") {
            $(this).addClass('is-invalid');
            everything_correct = false;
        } else {
            $(this).removeClass('is-invalid');
        }
    });


    if (everything_correct) {
        console.log("DATOS CORRECTOS..");
        trigger_payment_form(); //Hacer trigger a form de pagos para detonar pago Conekta.
    } else {
        console.log("DATOS INCORRECTOS, NO SE PUEDE PROCEDER AL PAGO!");
    }

}

const trigger_payment_form = () => {
    console.log("Trigger");
    $("#card-form").trigger("submit");
}

const introducir_datos_prueba = () => {

    $(".form-required").each(function () {
        if ($(this).prop('nodeName').toLowerCase() == 'input') {
            if ($(this).attr("id") == 'form_telefono') {
                $(this).val("6441784512");
            } else if ($(this).attr("id") == 'form_mail' || $(this).attr("id") == 'form_mail_confirm') {
                $(this).val("testing@mail.com");
            } else if ($(this).attr("id") == 'form_envio_cp') {
                $(this).val("85100");
            } else if ($(this).attr("id") == 'form_nombre') {
                $(this).val("Estrasol");
            } else if ($(this).attr("id") == 'form_apellido_paterno') {
                $(this).val("Prueba");
            } else {
                $(this).val("Testing value");
            }
        }
    });
    $("#form_apellido_materno").val("X");

    $("#form_pago_card_nombre").val("Shadow Jalcam Beroscar");
    $("#form_pago_card_tarjeta").val("4242424242424242");
    $("#form_pago_card_cvc").val("123");
    $("#form_pago_card_expmes").val("10").trigger("change");
    $("#form_pago_card_expanio").val("2022").trigger("change");
}

const llenar_select_prueba = () => {
    /*$(".steps_purchase").find("select").each(function () {
        if ($(this).attr("id") != 'form_pago_card_expmes' &&
            $(this).attr("id") != 'form_pago_card_expanio' &&
            $(this).attr("id") != 'form_pago_tipo') {
            let data = {
                id: 'testing',
                text: 'Testing value'
            };
            let newOption = new Option(data.text, data.id, true, true);
            $(this).append(newOption).trigger('change');
        }
    });*/


    $.each(['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio',
            'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
        ],
        function (index, value) {
            let newOption = new Option(value, (index + 1) + "", true, true);
            $("#form_pago_card_expmes").append(newOption);
        });
    $("#form_pago_card_expmes").val("1").trigger("change");

    for (i = 2021; i <= 2030; i++) {
        let newOption = new Option(i + "", i + "", true, true);
        $("#form_pago_card_expanio").append(newOption);
    }
    $("#form_pago_card_expanio").val("2021").trigger("change");
}

const return_text_estados = () => {
    return '{"Aguascalientes":["Aguascalientes","Asientos","Calvillo","Cosío","Jesús María","Pabellón de Arteaga","Rincón de Romos","San José de Gracia","Tepezalá","El Llano","San Francisco de los Romo"],"Baja California":["Ensenada","Mexicali","Tecate","Tijuana","Playas de Rosarito"],"Baja California Sur":["Comondú","Mulegé","La Paz","Los Cabos","Loreto"],"Campeche":["Calkiní","Campeche","Carmen","Champotón","Hecelchakán","Hopelchén","Palizada","Tenabo","Escárcega","Calakmul","Candelaria"],"Coahuila de Zaragoza":["Abasolo","Acuña","Allende","Arteaga","Candela","Castaños","Cuatro Ciénegas","Escobedo","Francisco I. Madero","Frontera","General Cepeda","Guerrero","Hidalgo","Jiménez","Juárez","Lamadrid","Matamoros","Monclova","Morelos","Múzquiz","Nadadores","Nava","Ocampo","Parras","Piedras Negras","Progreso","Ramos Arizpe","Sabinas","Sacramento","Saltillo","San Buenaventura","San Juan de Sabinas","San Pedro","Sierra Mojada","Torreón","Viesca","Villa Unión","Zaragoza"],"Colima":["Armería","Colima","Comala","Coquimatlán","Cuauhtémoc","Ixtlahuacán","Manzanillo","Minatitlán","Tecomán","Villa de Álvarez"],"Chiapas":["Acacoyagua","Acala","Acapetahua","Altamirano","Amatán","Amatenango de la Frontera","Amatenango del Valle","Angel Albino Corzo","Arriaga","Bejucal de Ocampo","Bella Vista","Berriozábal","Bochil","El Bosque","Cacahoatán","Catazajá","Cintalapa","Coapilla","Comitán de Domínguez","La Concordia","Copainalá","Chalchihuitán","Chamula","Chanal","Chapultenango","Chenalhó","Chiapa de Corzo","Chiapilla","Chicoasén","Chicomuselo","Chilón","Escuintla","Francisco León","Frontera Comalapa","Frontera Hidalgo","La Grandeza","Huehuetán","Huixtán","Huitiupán","Huixtla","La Independencia","Ixhuatán","Ixtacomitán","Ixtapa","Ixtapangajoya","Jiquipilas","Jitotol","Juárez","Larráinzar","La Libertad","Mapastepec","Las Margaritas","Mazapa de Madero","Mazatán","Metapa","Mitontic","Motozintla","Nicolás Ruíz","Ocosingo","Ocotepec","Ocozocoautla de Espinosa","Ostuacán","Osumacinta","Oxchuc","Palenque","Pantelhó","Pantepec","Pichucalco","Pijijiapan","El Porvenir","Villa Comaltitlán","Pueblo Nuevo Solistahuacán","Rayón","Reforma","Las Rosas","Sabanilla","Salto de Agua","San Cristóbal de las Casas","San Fernando","Siltepec","Simojovel","Sitalá","Socoltenango","Solosuchiapa","Soyaló","Suchiapa","Suchiate","Sunuapa","Tapachula","Tapalapa","Tapilula","Tecpatán","Tenejapa","Teopisca","Tila","Tonalá","Totolapa","La Trinitaria","Tumbalá","Tuxtla Gutiérrez","Tuxtla Chico","Tuzantán","Tzimol","Unión Juárez","Venustiano Carranza","Villa Corzo","Villaflores","Yajalón","San Lucas","Zinacantán","San Juan Cancuc","Aldama","Benemérito de las Américas","Maravilla Tenejapa","Marqués de Comillas","Montecristo de Guerrero","San Andrés Duraznal","Santiago el Pinar","Capitán Luis Ángel Vidal","Rincón Chamula San Pedro","El Parral","Emiliano Zapata","Mezcalapa"],"Chihuahua":["Ahumada","Aldama","Allende","Aquiles Serdán","Ascensión","Bachíniva","Balleza","Batopilas de Manuel Gómez Morín","Bocoyna","Buenaventura","Camargo","Carichí","Casas Grandes","Coronado","Coyame del Sotol","La Cruz","Cuauhtémoc","Cusihuiriachi","Chihuahua","Chínipas","Delicias","Dr. Belisario Domínguez","Galeana","Santa Isabel","Gómez Farías","Gran Morelos","Guachochi","Guadalupe","Guadalupe y Calvo","Guazapares","Guerrero","Hidalgo del Parral","Huejotitán","Ignacio Zaragoza","Janos","Jiménez","Juárez","Julimes","López","Madera","Maguarichi","Manuel Benavides","Matachí","Matamoros","Meoqui","Morelos","Moris","Namiquipa","Nonoava","Nuevo Casas Grandes","Ocampo","Ojinaga","Praxedis G. Guerrero","Riva Palacio","Rosales","Rosario","San Francisco de Borja","San Francisco de Conchos","San Francisco del Oro","Santa Bárbara","Satevó","Saucillo","Temósachic","El Tule","Urique","Uruachi","Valle de Zaragoza"],"Ciudad de México":["Azcapotzalco","Coyoacán","Cuajimalpa de Morelos","Gustavo A. Madero","Iztacalco","Iztapalapa","La Magdalena Contreras","Milpa Alta","Álvaro Obregón","Tláhuac","Tlalpan","Xochimilco","Benito Juárez","Cuauhtémoc","Miguel Hidalgo","Venustiano Carranza"],"Durango":["Canatlán","Canelas","Coneto de Comonfort","Cuencamé","Durango","General Simón Bolívar","Gómez Palacio","Guadalupe Victoria","Guanaceví","Hidalgo","Indé","Lerdo","Mapimí","Mezquital","Nazas","Nombre de Dios","Ocampo","El Oro","Otáez","Pánuco de Coronado","Peñón Blanco","Poanas","Pueblo Nuevo","Rodeo","San Bernardo","San Dimas","San Juan de Guadalupe","San Juan del Río","San Luis del Cordero","San Pedro del Gallo","Santa Clara","Santiago Papasquiaro","Súchil","Tamazula","Tepehuanes","Tlahualilo","Topia","Vicente Guerrero","Nuevo Ideal"],"Guanajuato":["Abasolo","Acámbaro","San Miguel de Allende","Apaseo el Alto","Apaseo el Grande","Atarjea","Celaya","Manuel Doblado","Comonfort","Coroneo","Cortazar","Cuerámaro","Doctor Mora","Dolores Hidalgo Cuna de la Independencia Nacional","Guanajuato","Huanímaro","Irapuato","Jaral del Progreso","Jerécuaro","León","Moroleón","Ocampo","Pénjamo","Pueblo Nuevo","Purísima del Rincón","Romita","Salamanca","Salvatierra","San Diego de la Unión","San Felipe","San Francisco del Rincón","San José Iturbide","San Luis de la Paz","Santa Catarina","Santa Cruz de Juventino Rosas","Santiago Maravatío","Silao de la Victoria","Tarandacuao","Tarimoro","Tierra Blanca","Uriangato","Valle de Santiago","Victoria","Villagrán","Xichú","Yuriria"],"Guerrero":["Acapulco de Juárez","Ahuacuotzingo","Ajuchitlán del Progreso","Alcozauca de Guerrero","Alpoyeca","Apaxtla","Arcelia","Atenango del Río","Atlamajalcingo del Monte","Atlixtac","Atoyac de Álvarez","Ayutla de los Libres","Azoyú","Benito Juárez","Buenavista de Cuéllar","Coahuayutla de José María Izazaga","Cocula","Copala","Copalillo","Copanatoyac","Coyuca de Benítez","Coyuca de Catalán","Cuajinicuilapa","Cualác","Cuautepec","Cuetzala del Progreso","Cutzamala de Pinzón","Chilapa de Álvarez","Chilpancingo de los Bravo","Florencio Villarreal","General Canuto A. Neri","General Heliodoro Castillo","Huamuxtitlán","Huitzuco de los Figueroa","Iguala de la Independencia","Igualapa","Ixcateopan de Cuauhtémoc","Zihuatanejo de Azueta","Juan R. Escudero","Leonardo Bravo","Malinaltepec","Mártir de Cuilapan","Metlatónoc","Mochitlán","Olinalá","Ometepec","Pedro Ascencio Alquisiras","Petatlán","Pilcaya","Pungarabato","Quechultenango","San Luis Acatlán","San Marcos","San Miguel Totolapan","Taxco de Alarcón","Tecoanapa","Técpan de Galeana","Teloloapan","Tepecoacuilco de Trujano","Tetipac","Tixtla de Guerrero","Tlacoachistlahuaca","Tlacoapa","Tlalchapa","Tlalixtaquilla de Maldonado","Tlapa de Comonfort","Tlapehuala","La Unión de Isidoro Montes de Oca","Xalpatláhuac","Xochihuehuetlán","Xochistlahuaca","Zapotitlán Tablas","Zirándaro","Zitlala","Eduardo Neri","Acatepec","Marquelia","Cochoapa el Grande","José Joaquín de Herrera","Juchitán","Iliatenco"],"Hidalgo":["Acatlán","Acaxochitlán","Actopan","Agua Blanca de Iturbide","Ajacuba","Alfajayucan","Almoloya","Apan","El Arenal","Atitalaquia","Atlapexco","Atotonilco el Grande","Atotonilco de Tula","Calnali","Cardonal","Cuautepec de Hinojosa","Chapantongo","Chapulhuacán","Chilcuautla","Eloxochitlán","Emiliano Zapata","Epazoyucan","Francisco I. Madero","Huasca de Ocampo","Huautla","Huazalingo","Huehuetla","Huejutla de Reyes","Huichapan","Ixmiquilpan","Jacala de Ledezma","Jaltocán","Juárez Hidalgo","Lolotla","Metepec","San Agustín Metzquititlán","Metztitlán","Mineral del Chico","Mineral del Monte","La Misión","Mixquiahuala de Juárez","Molango de Escamilla","Nicolás Flores","Nopala de Villagrán","Omitlán de Juárez","San Felipe Orizatlán","Pacula","Pachuca de Soto","Pisaflores","Progreso de Obregón","Mineral de la Reforma","San Agustín Tlaxiaca","San Bartolo Tutotepec","San Salvador","Santiago de Anaya","Santiago Tulantepec de Lugo Guerrero","Singuilucan","Tasquillo","Tecozautla","Tenango de Doria","Tepeapulco","Tepehuacán de Guerrero","Tepeji del Río de Ocampo","Tepetitlán","Tetepango","Villa de Tezontepec","Tezontepec de Aldama","Tianguistengo","Tizayuca","Tlahuelilpan","Tlahuiltepa","Tlanalapa","Tlanchinol","Tlaxcoapan","Tolcayuca","Tula de Allende","Tulancingo de Bravo","Xochiatipan","Xochicoatlán","Yahualica","Zacualtipán de Ángeles","Zapotlán de Juárez","Zempoala","Zimapán"],"Jalisco":["Acatic","Acatlán de Juárez","Ahualulco de Mercado","Amacueca","Amatitán","Ameca","San Juanito de Escobedo","Arandas","El Arenal","Atemajac de Brizuela","Atengo","Atenguillo","Atotonilco el Alto","Atoyac","Autlán de Navarro","Ayotlán","Ayutla","La Barca","Bolaños","Cabo Corrientes","Casimiro Castillo","Cihuatlán","Zapotlán el Grande","Cocula","Colotlán","Concepción de Buenos Aires","Cuautitlán de García Barragán","Cuautla","Cuquío","Chapala","Chimaltitán","Chiquilistlán","Degollado","Ejutla","Encarnación de Díaz","Etzatlán","El Grullo","Guachinango","Guadalajara","Hostotipaquillo","Huejúcar","Huejuquilla el Alto","La Huerta","Ixtlahuacán de los Membrillos","Ixtlahuacán del Río","Jalostotitlán","Jamay","Jesús María","Jilotlán de los Dolores","Jocotepec","Juanacatlán","Juchitlán","Lagos de Moreno","El Limón","Magdalena","Santa María del Oro","La Manzanilla de la Paz","Mascota","Mazamitla","Mexticacán","Mezquitic","Mixtlán","Ocotlán","Ojuelos de Jalisco","Pihuamo","Poncitlán","Puerto Vallarta","Villa Purificación","Quitupan","El Salto","San Cristóbal de la Barranca","San Diego de Alejandría","San Juan de los Lagos","San Julián","San Marcos","San Martín de Bolaños","San Martín Hidalgo","San Miguel el Alto","Gómez Farías","San Sebastián del Oeste","Santa María de los Ángeles","Sayula","Tala","Talpa de Allende","Tamazula de Gordiano","Tapalpa","Tecalitlán","Tecolotlán","Techaluta de Montenegro","Tenamaxtlán","Teocaltiche","Teocuitatlán de Corona","Tepatitlán de Morelos","Tequila","Teuchitlán","Tizapán el Alto","Tlajomulco de Zúñiga","San Pedro Tlaquepaque","Tolimán","Tomatlán","Tonalá","Tonaya","Tonila","Totatiche","Tototlán","Tuxcacuesco","Tuxcueca","Tuxpan","Unión de San Antonio","Unión de Tula","Valle de Guadalupe","Valle de Juárez","San Gabriel","Villa Corona","Villa Guerrero","Villa Hidalgo","Cañadas de Obregón","Yahualica de González Gallo","Zacoalco de Torres","Zapopan","Zapotiltic","Zapotitlán de Vadillo","Zapotlán del Rey","Zapotlanejo","San Ignacio Cerro Gordo"],"México":["Acambay de Ruíz Castañeda","Acolman","Aculco","Almoloya de Alquisiras","Almoloya de Juárez","Almoloya del Río","Amanalco","Amatepec","Amecameca","Apaxco","Atenco","Atizapán","Atizapán de Zaragoza","Atlacomulco","Atlautla","Axapusco","Ayapango","Calimaya","Capulhuac","Coacalco de Berriozábal","Coatepec Harinas","Cocotitlán","Coyotepec","Cuautitlán","Chalco","Chapa de Mota","Chapultepec","Chiautla","Chicoloapan","Chiconcuac","Chimalhuacán","Donato Guerra","Ecatepec de Morelos","Ecatzingo","Huehuetoca","Hueypoxtla","Huixquilucan","Isidro Fabela","Ixtapaluca","Ixtapan de la Sal","Ixtapan del Oro","Ixtlahuaca","Xalatlaco","Jaltenco","Jilotepec","Jilotzingo","Jiquipilco","Jocotitlán","Joquicingo","Juchitepec","Lerma","Malinalco","Melchor Ocampo","Metepec","Mexicaltzingo","Morelos","Naucalpan de Juárez","Nezahualcóyotl","Nextlalpan","Nicolás Romero","Nopaltepec","Ocoyoacac","Ocuilan","El Oro","Otumba","Otzoloapan","Otzolotepec","Ozumba","Papalotla","La Paz","Polotitlán","Rayón","San Antonio la Isla","San Felipe del Progreso","San Martín de las Pirámides","San Mateo Atenco","San Simón de Guerrero","Santo Tomás","Soyaniquilpan de Juárez","Sultepec","Tecámac","Tejupilco","Temamatla","Temascalapa","Temascalcingo","Temascaltepec","Temoaya","Tenancingo","Tenango del Aire","Tenango del Valle","Teoloyucan","Teotihuacán","Tepetlaoxtoc","Tepetlixpa","Tepotzotlán","Tequixquiac","Texcaltitlán","Texcalyacac","Texcoco","Tezoyuca","Tianguistenco","Timilpan","Tlalmanalco","Tlalnepantla de Baz","Tlatlaya","Toluca","Tonatico","Tultepec","Tultitlán","Valle de Bravo","Villa de Allende","Villa del Carbón","Villa Guerrero","Villa Victoria","Xonacatlán","Zacazonapan","Zacualpan","Zinacantepec","Zumpahuacán","Zumpango","Cuautitlán Izcalli","Valle de Chalco Solidaridad","Luvianos","San José del Rincón","Tonanitla"],"Michoacán de Ocampo":["Acuitzio","Aguililla","Álvaro Obregón","Angamacutiro","Angangueo","Apatzingán","Aporo","Aquila","Ario","Arteaga","Briseñas","Buenavista","Carácuaro","Coahuayana","Coalcomán de Vázquez Pallares","Coeneo","Contepec","Copándaro","Cotija","Cuitzeo","Charapan","Charo","Chavinda","Cherán","Chilchota","Chinicuila","Chucándiro","Churintzio","Churumuco","Ecuandureo","Epitacio Huerta","Erongarícuaro","Gabriel Zamora","Hidalgo","La Huacana","Huandacareo","Huaniqueo","Huetamo","Huiramba","Indaparapeo","Irimbo","Ixtlán","Jacona","Jiménez","Jiquilpan","Juárez","Jungapeo","Lagunillas","Madero","Maravatío","Marcos Castellanos","Lázaro Cárdenas","Morelia","Morelos","Múgica","Nahuatzen","Nocupétaro","Nuevo Parangaricutiro","Nuevo Urecho","Numarán","Ocampo","Pajacuarán","Panindícuaro","Parácuaro","Paracho","Pátzcuaro","Penjamillo","Peribán","La Piedad","Purépero","Puruándiro","Queréndaro","Quiroga","Cojumatlán de Régules","Los Reyes","Sahuayo","San Lucas","Santa Ana Maya","Salvador Escalante","Senguio","Susupuato","Tacámbaro","Tancítaro","Tangamandapio","Tangancícuaro","Tanhuato","Taretan","Tarímbaro","Tepalcatepec","Tingambato","Tingüindín","Tiquicheo de Nicolás Romero","Tlalpujahua","Tlazazalca","Tocumbo","Tumbiscatío","Turicato","Tuxpan","Tuzantla","Tzintzuntzan","Tzitzio","Uruapan","Venustiano Carranza","Villamar","Vista Hermosa","Yurécuaro","Zacapu","Zamora","Zináparo","Zinapécuaro","Ziracuaretiro","Zitácuaro","José Sixto Verduzco"],"Morelos":["Amacuzac","Atlatlahucan","Axochiapan","Ayala","Coatlán del Río","Cuautla","Cuernavaca","Emiliano Zapata","Huitzilac","Jantetelco","Jiutepec","Jojutla","Jonacatepec de Leandro Valle","Mazatepec","Miacatlán","Ocuituco","Puente de Ixtla","Temixco","Tepalcingo","Tepoztlán","Tetecala","Tetela del Volcán","Tlalnepantla","Tlaltizapán de Zapata","Tlaquiltenango","Tlayacapan","Totolapan","Xochitepec","Yautepec","Yecapixtla","Zacatepec","Zacualpan de Amilpas","Temoac"],"Nayarit":["Acaponeta","Ahuacatlán","Amatlán de Cañas","Compostela","Huajicori","Ixtlán del Río","Jala","Xalisco","Del Nayar","Rosamorada","Ruíz","San Blas","San Pedro Lagunillas","Santa María del Oro","Santiago Ixcuintla","Tecuala","Tepic","Tuxpan","La Yesca","Bahía de Banderas"],"Nuevo León":["Abasolo","Agualeguas","Los Aldamas","Allende","Anáhuac","Apodaca","Aramberri","Bustamante","Cadereyta Jiménez","El Carmen","Cerralvo","Ciénega de Flores","China","Doctor Arroyo","Doctor Coss","Doctor González","Galeana","García","San Pedro Garza García","General Bravo","General Escobedo","General Terán","General Treviño","General Zaragoza","General Zuazua","Guadalupe","Los Herreras","Higueras","Hualahuises","Iturbide","Juárez","Lampazos de Naranjo","Linares","Marín","Melchor Ocampo","Mier y Noriega","Mina","Montemorelos","Monterrey","Parás","Pesquería","Los Ramones","Rayones","Sabinas Hidalgo","Salinas Victoria","San Nicolás de los Garza","Hidalgo","Santa Catarina","Santiago","Vallecillo","Villaldama"],"Oaxaca":["Abejones","Acatlán de Pérez Figueroa","Asunción Cacalotepec","Asunción Cuyotepeji","Asunción Ixtaltepec","Asunción Nochixtlán","Asunción Ocotlán","Asunción Tlacolulita","Ayotzintepec","El Barrio de la Soledad","Calihualá","Candelaria Loxicha","Ciénega de Zimatlán","Ciudad Ixtepec","Coatecas Altas","Coicoyán de las Flores","La Compañía","Concepción Buenavista","Concepción Pápalo","Constancia del Rosario","Cosolapa","Cosoltepec","Cuilápam de Guerrero","Cuyamecalco Villa de Zaragoza","Chahuites","Chalcatongo de Hidalgo","Chiquihuitlán de Benito Juárez","Heroica Ciudad de Ejutla de Crespo","Eloxochitlán de Flores Magón","El Espinal","Tamazulápam del Espíritu Santo","Fresnillo de Trujano","Guadalupe Etla","Guadalupe de Ramírez","Guelatao de Juárez","Guevea de Humboldt","Mesones Hidalgo","Villa Hidalgo","Heroica Ciudad de Huajuapan de León","Huautepec","Huautla de Jiménez","Ixtlán de Juárez","Heroica Ciudad de Juchitán de Zaragoza","Loma Bonita","Magdalena Apasco","Magdalena Jaltepec","Santa Magdalena Jicotlán","Magdalena Mixtepec","Magdalena Ocotlán","Magdalena Peñasco","Magdalena Teitipac","Magdalena Tequisistlán","Magdalena Tlacotepec","Magdalena Zahuatlán","Mariscala de Juárez","Mártires de Tacubaya","Matías Romero Avendaño","Mazatlán Villa de Flores","Miahuatlán de Porfirio Díaz","Mixistlán de la Reforma","Monjas","Natividad","Nazareno Etla","Nejapa de Madero","Ixpantepec Nieves","Santiago Niltepec","Oaxaca de Juárez","Ocotlán de Morelos","La Pe","Pinotepa de Don Luis","Pluma Hidalgo","San José del Progreso","Putla Villa de Guerrero","Santa Catarina Quioquitani","Reforma de Pineda","La Reforma","Reyes Etla","Rojas de Cuauhtémoc","Salina Cruz","San Agustín Amatengo","San Agustín Atenango","San Agustín Chayuco","San Agustín de las Juntas","San Agustín Etla","San Agustín Loxicha","San Agustín Tlacotepec","San Agustín Yatareni","San Andrés Cabecera Nueva","San Andrés Dinicuiti","San Andrés Huaxpaltepec","San Andrés Huayápam","San Andrés Ixtlahuaca","San Andrés Lagunas","San Andrés Nuxiño","San Andrés Paxtlán","San Andrés Sinaxtla","San Andrés Solaga","San Andrés Teotilálpam","San Andrés Tepetlapa","San Andrés Yaá","San Andrés Zabache","San Andrés Zautla","San Antonino Castillo Velasco","San Antonino el Alto","San Antonino Monte Verde","San Antonio Acutla","San Antonio de la Cal","San Antonio Huitepec","San Antonio Nanahuatípam","San Antonio Sinicahua","San Antonio Tepetlapa","San Baltazar Chichicápam","San Baltazar Loxicha","San Baltazar Yatzachi el Bajo","San Bartolo Coyotepec","San Bartolomé Ayautla","San Bartolomé Loxicha","San Bartolomé Quialana","San Bartolomé Yucuañe","San Bartolomé Zoogocho","San Bartolo Soyaltepec","San Bartolo Yautepec","San Bernardo Mixtepec","San Blas Atempa","San Carlos Yautepec","San Cristóbal Amatlán","San Cristóbal Amoltepec","San Cristóbal Lachirioag","San Cristóbal Suchixtlahuaca","San Dionisio del Mar","San Dionisio Ocotepec","San Dionisio Ocotlán","San Esteban Atatlahuca","San Felipe Jalapa de Díaz","San Felipe Tejalápam","San Felipe Usila","San Francisco Cahuacuá","San Francisco Cajonos","San Francisco Chapulapa","San Francisco Chindúa","San Francisco del Mar","San Francisco Huehuetlán","San Francisco Ixhuatán","San Francisco Jaltepetongo","San Francisco Lachigoló","San Francisco Logueche","San Francisco Nuxaño","San Francisco Ozolotepec","San Francisco Sola","San Francisco Telixtlahuaca","San Francisco Teopan","San Francisco Tlapancingo","San Gabriel Mixtepec","San Ildefonso Amatlán","San Ildefonso Sola","San Ildefonso Villa Alta","San Jacinto Amilpas","San Jacinto Tlacotepec","San Jerónimo Coatlán","San Jerónimo Silacayoapilla","San Jerónimo Sosola","San Jerónimo Taviche","San Jerónimo Tecóatl","San Jorge Nuchita","San José Ayuquila","San José Chiltepec","San José del Peñasco","San José Estancia Grande","San José Independencia","San José Lachiguiri","San José Tenango","San Juan Achiutla","San Juan Atepec","Ánimas Trujano","San Juan Bautista Atatlahuca","San Juan Bautista Coixtlahuaca","San Juan Bautista Cuicatlán","San Juan Bautista Guelache","San Juan Bautista Jayacatlán","San Juan Bautista Lo de Soto","San Juan Bautista Suchitepec","San Juan Bautista Tlacoatzintepec","San Juan Bautista Tlachichilco","San Juan Bautista Tuxtepec","San Juan Cacahuatepec","San Juan Cieneguilla","San Juan Coatzóspam","San Juan Colorado","San Juan Comaltepec","San Juan Cotzocón","San Juan Chicomezúchil","San Juan Chilateca","San Juan del Estado","San Juan del Río","San Juan Diuxi","San Juan Evangelista Analco","San Juan Guelavía","San Juan Guichicovi","San Juan Ihualtepec","San Juan Juquila Mixes","San Juan Juquila Vijanos","San Juan Lachao","San Juan Lachigalla","San Juan Lajarcia","San Juan Lalana","San Juan de los Cués","San Juan Mazatlán","San Juan Mixtepec","San Juan Mixtepec","San Juan Ñumí","San Juan Ozolotepec","San Juan Petlapa","San Juan Quiahije","San Juan Quiotepec","San Juan Sayultepec","San Juan Tabaá","San Juan Tamazola","San Juan Teita","San Juan Teitipac","San Juan Tepeuxila","San Juan Teposcolula","San Juan Yaeé","San Juan Yatzona","San Juan Yucuita","San Lorenzo","San Lorenzo Albarradas","San Lorenzo Cacaotepec","San Lorenzo Cuaunecuiltitla","San Lorenzo Texmelúcan","San Lorenzo Victoria","San Lucas Camotlán","San Lucas Ojitlán","San Lucas Quiaviní","San Lucas Zoquiápam","San Luis Amatlán","San Marcial Ozolotepec","San Marcos Arteaga","San Martín de los Cansecos","San Martín Huamelúlpam","San Martín Itunyoso","San Martín Lachilá","San Martín Peras","San Martín Tilcajete","San Martín Toxpalan","San Martín Zacatepec","San Mateo Cajonos","Capulálpam de Méndez","San Mateo del Mar","San Mateo Yoloxochitlán","San Mateo Etlatongo","San Mateo Nejápam","San Mateo Peñasco","San Mateo Piñas","San Mateo Río Hondo","San Mateo Sindihui","San Mateo Tlapiltepec","San Melchor Betaza","San Miguel Achiutla","San Miguel Ahuehuetitlán","San Miguel Aloápam","San Miguel Amatitlán","San Miguel Amatlán","San Miguel Coatlán","San Miguel Chicahua","San Miguel Chimalapa","San Miguel del Puerto","San Miguel del Río","San Miguel Ejutla","San Miguel el Grande","San Miguel Huautla","San Miguel Mixtepec","San Miguel Panixtlahuaca","San Miguel Peras","San Miguel Piedras","San Miguel Quetzaltepec","San Miguel Santa Flor","Villa Sola de Vega","San Miguel Soyaltepec","San Miguel Suchixtepec","Villa Talea de Castro","San Miguel Tecomatlán","San Miguel Tenango","San Miguel Tequixtepec","San Miguel Tilquiápam","San Miguel Tlacamama","San Miguel Tlacotepec","San Miguel Tulancingo","San Miguel Yotao","San Nicolás","San Nicolás Hidalgo","San Pablo Coatlán","San Pablo Cuatro Venados","San Pablo Etla","San Pablo Huitzo","San Pablo Huixtepec","San Pablo Macuiltianguis","San Pablo Tijaltepec","San Pablo Villa de Mitla","San Pablo Yaganiza","San Pedro Amuzgos","San Pedro Apóstol","San Pedro Atoyac","San Pedro Cajonos","San Pedro Coxcaltepec Cántaros","San Pedro Comitancillo","San Pedro el Alto","San Pedro Huamelula","San Pedro Huilotepec","San Pedro Ixcatlán","San Pedro Ixtlahuaca","San Pedro Jaltepetongo","San Pedro Jicayán","San Pedro Jocotipac","San Pedro Juchatengo","San Pedro Mártir","San Pedro Mártir Quiechapa","San Pedro Mártir Yucuxaco","San Pedro Mixtepec","San Pedro Mixtepec","San Pedro Molinos","San Pedro Nopala","San Pedro Ocopetatillo","San Pedro Ocotepec","San Pedro Pochutla","San Pedro Quiatoni","San Pedro Sochiápam","San Pedro Tapanatepec","San Pedro Taviche","San Pedro Teozacoalco","San Pedro Teutila","San Pedro Tidaá","San Pedro Topiltepec","San Pedro Totolápam","Villa de Tututepec","San Pedro Yaneri","San Pedro Yólox","San Pedro y San Pablo Ayutla","Villa de Etla","San Pedro y San Pablo Teposcolula","San Pedro y San Pablo Tequixtepec","San Pedro Yucunama","San Raymundo Jalpan","San Sebastián Abasolo","San Sebastián Coatlán","San Sebastián Ixcapa","San Sebastián Nicananduta","San Sebastián Río Hondo","San Sebastián Tecomaxtlahuaca","San Sebastián Teitipac","San Sebastián Tutla","San Simón Almolongas","San Simón Zahuatlán","Santa Ana","Santa Ana Ateixtlahuaca","Santa Ana Cuauhtémoc","Santa Ana del Valle","Santa Ana Tavela","Santa Ana Tlapacoyan","Santa Ana Yareni","Santa Ana Zegache","Santa Catalina Quierí","Santa Catarina Cuixtla","Santa Catarina Ixtepeji","Santa Catarina Juquila","Santa Catarina Lachatao","Santa Catarina Loxicha","Santa Catarina Mechoacán","Santa Catarina Minas","Santa Catarina Quiané","Santa Catarina Tayata","Santa Catarina Ticuá","Santa Catarina Yosonotú","Santa Catarina Zapoquila","Santa Cruz Acatepec","Santa Cruz Amilpas","Santa Cruz de Bravo","Santa Cruz Itundujia","Santa Cruz Mixtepec","Santa Cruz Nundaco","Santa Cruz Papalutla","Santa Cruz Tacache de Mina","Santa Cruz Tacahua","Santa Cruz Tayata","Santa Cruz Xitla","Santa Cruz Xoxocotlán","Santa Cruz Zenzontepec","Santa Gertrudis","Santa Inés del Monte","Santa Inés Yatzeche","Santa Lucía del Camino","Santa Lucía Miahuatlán","Santa Lucía Monteverde","Santa Lucía Ocotlán","Santa María Alotepec","Santa María Apazco","Santa María la Asunción","Heroica Ciudad de Tlaxiaco","Ayoquezco de Aldama","Santa María Atzompa","Santa María Camotlán","Santa María Colotepec","Santa María Cortijo","Santa María Coyotepec","Santa María Chachoápam","Villa de Chilapa de Díaz","Santa María Chilchotla","Santa María Chimalapa","Santa María del Rosario","Santa María del Tule","Santa María Ecatepec","Santa María Guelacé","Santa María Guienagati","Santa María Huatulco","Santa María Huazolotitlán","Santa María Ipalapa","Santa María Ixcatlán","Santa María Jacatepec","Santa María Jalapa del Marqués","Santa María Jaltianguis","Santa María Lachixío","Santa María Mixtequilla","Santa María Nativitas","Santa María Nduayaco","Santa María Ozolotepec","Santa María Pápalo","Santa María Peñoles","Santa María Petapa","Santa María Quiegolani","Santa María Sola","Santa María Tataltepec","Santa María Tecomavaca","Santa María Temaxcalapa","Santa María Temaxcaltepec","Santa María Teopoxco","Santa María Tepantlali","Santa María Texcatitlán","Santa María Tlahuitoltepec","Santa María Tlalixtac","Santa María Tonameca","Santa María Totolapilla","Santa María Xadani","Santa María Yalina","Santa María Yavesía","Santa María Yolotepec","Santa María Yosoyúa","Santa María Yucuhiti","Santa María Zacatepec","Santa María Zaniza","Santa María Zoquitlán","Santiago Amoltepec","Santiago Apoala","Santiago Apóstol","Santiago Astata","Santiago Atitlán","Santiago Ayuquililla","Santiago Cacaloxtepec","Santiago Camotlán","Santiago Comaltepec","Santiago Chazumba","Santiago Choápam","Santiago del Río","Santiago Huajolotitlán","Santiago Huauclilla","Santiago Ihuitlán Plumas","Santiago Ixcuintepec","Santiago Ixtayutla","Santiago Jamiltepec","Santiago Jocotepec","Santiago Juxtlahuaca","Santiago Lachiguiri","Santiago Lalopa","Santiago Laollaga","Santiago Laxopa","Santiago Llano Grande","Santiago Matatlán","Santiago Miltepec","Santiago Minas","Santiago Nacaltepec","Santiago Nejapilla","Santiago Nundiche","Santiago Nuyoó","Santiago Pinotepa Nacional","Santiago Suchilquitongo","Santiago Tamazola","Santiago Tapextla","Villa Tejúpam de la Unión","Santiago Tenango","Santiago Tepetlapa","Santiago Tetepec","Santiago Texcalcingo","Santiago Textitlán","Santiago Tilantongo","Santiago Tillo","Santiago Tlazoyaltepec","Santiago Xanica","Santiago Xiacuí","Santiago Yaitepec","Santiago Yaveo","Santiago Yolomécatl","Santiago Yosondúa","Santiago Yucuyachi","Santiago Zacatepec","Santiago Zoochila","Nuevo Zoquiápam","Santo Domingo Ingenio","Santo Domingo Albarradas","Santo Domingo Armenta","Santo Domingo Chihuitán","Santo Domingo de Morelos","Santo Domingo Ixcatlán","Santo Domingo Nuxaá","Santo Domingo Ozolotepec","Santo Domingo Petapa","Santo Domingo Roayaga","Santo Domingo Tehuantepec","Santo Domingo Teojomulco","Santo Domingo Tepuxtepec","Santo Domingo Tlatayápam","Santo Domingo Tomaltepec","Santo Domingo Tonalá","Santo Domingo Tonaltepec","Santo Domingo Xagacía","Santo Domingo Yanhuitlán","Santo Domingo Yodohino","Santo Domingo Zanatepec","Santos Reyes Nopala","Santos Reyes Pápalo","Santos Reyes Tepejillo","Santos Reyes Yucuná","Santo Tomás Jalieza","Santo Tomás Mazaltepec","Santo Tomás Ocotepec","Santo Tomás Tamazulapan","San Vicente Coatlán","San Vicente Lachixío","San Vicente Nuñú","Silacayoápam","Sitio de Xitlapehua","Soledad Etla","Villa de Tamazulápam del Progreso","Tanetze de Zaragoza","Taniche","Tataltepec de Valdés","Teococuilco de Marcos Pérez","Teotitlán de Flores Magón","Teotitlán del Valle","Teotongo","Tepelmeme Villa de Morelos","Heroica Villa Tezoatlán de Segura y Luna, Cuna de la Independencia de Oaxaca","San Jerónimo Tlacochahuaya","Tlacolula de Matamoros","Tlacotepec Plumas","Tlalixtac de Cabrera","Totontepec Villa de Morelos","Trinidad Zaachila","La Trinidad Vista Hermosa","Unión Hidalgo","Valerio Trujano","San Juan Bautista Valle Nacional","Villa Díaz Ordaz","Yaxe","Magdalena Yodocono de Porfirio Díaz","Yogana","Yutanduchi de Guerrero","Villa de Zaachila","San Mateo Yucutindoo","Zapotitlán Lagunas","Zapotitlán Palmas","Santa Inés de Zaragoza","Zimatlán de Álvarez"],"Puebla":["Acajete","Acateno","Acatlán","Acatzingo","Acteopan","Ahuacatlán","Ahuatlán","Ahuazotepec","Ahuehuetitla","Ajalpan","Albino Zertuche","Aljojuca","Altepexi","Amixtlán","Amozoc","Aquixtla","Atempan","Atexcal","Atlixco","Atoyatempan","Atzala","Atzitzihuacán","Atzitzintla","Axutla","Ayotoxco de Guerrero","Calpan","Caltepec","Camocuautla","Caxhuacan","Coatepec","Coatzingo","Cohetzala","Cohuecan","Coronango","Coxcatlán","Coyomeapan","Coyotepec","Cuapiaxtla de Madero","Cuautempan","Cuautinchán","Cuautlancingo","Cuayuca de Andrade","Cuetzalan del Progreso","Cuyoaco","Chalchicomula de Sesma","Chapulco","Chiautla","Chiautzingo","Chiconcuautla","Chichiquila","Chietla","Chigmecatitlán","Chignahuapan","Chignautla","Chila","Chila de la Sal","Honey","Chilchotla","Chinantla","Domingo Arenas","Eloxochitlán","Epatlán","Esperanza","Francisco Z. Mena","General Felipe Ángeles","Guadalupe","Guadalupe Victoria","Hermenegildo Galeana","Huaquechula","Huatlatlauca","Huauchinango","Huehuetla","Huehuetlán el Chico","Huejotzingo","Hueyapan","Hueytamalco","Hueytlalpan","Huitzilan de Serdán","Huitziltepec","Atlequizayan","Ixcamilpa de Guerrero","Ixcaquixtla","Ixtacamaxtitlán","Ixtepec","Izúcar de Matamoros","Jalpan","Jolalpan","Jonotla","Jopala","Juan C. Bonilla","Juan Galindo","Juan N. Méndez","Lafragua","Libres","La Magdalena Tlatlauquitepec","Mazapiltepec de Juárez","Mixtla","Molcaxac","Cañada Morelos","Naupan","Nauzontla","Nealtican","Nicolás Bravo","Nopalucan","Ocotepec","Ocoyucan","Olintla","Oriental","Pahuatlán","Palmar de Bravo","Pantepec","Petlalcingo","Piaxtla","Puebla","Quecholac","Quimixtlán","Rafael Lara Grajales","Los Reyes de Juárez","San Andrés Cholula","San Antonio Cañada","San Diego la Mesa Tochimiltzingo","San Felipe Teotlalcingo","San Felipe Tepatlán","San Gabriel Chilac","San Gregorio Atzompa","San Jerónimo Tecuanipan","San Jerónimo Xayacatlán","San José Chiapa","San José Miahuatlán","San Juan Atenco","San Juan Atzompa","San Martín Texmelucan","San Martín Totoltepec","San Matías Tlalancaleca","San Miguel Ixitlán","San Miguel Xoxtla","San Nicolás Buenos Aires","San Nicolás de los Ranchos","San Pablo Anicano","San Pedro Cholula","San Pedro Yeloixtlahuaca","San Salvador el Seco","San Salvador el Verde","San Salvador Huixcolotla","San Sebastián Tlacotepec","Santa Catarina Tlaltempan","Santa Inés Ahuatempan","Santa Isabel Cholula","Santiago Miahuatlán","Huehuetlán el Grande","Santo Tomás Hueyotlipan","Soltepec","Tecali de Herrera","Tecamachalco","Tecomatlán","Tehuacán","Tehuitzingo","Tenampulco","Teopantlán","Teotlalco","Tepanco de López","Tepango de Rodríguez","Tepatlaxco de Hidalgo","Tepeaca","Tepemaxalco","Tepeojuma","Tepetzintla","Tepexco","Tepexi de Rodríguez","Tepeyahualco","Tepeyahualco de Cuauhtémoc","Tetela de Ocampo","Teteles de Avila Castillo","Teziutlán","Tianguismanalco","Tilapa","Tlacotepec de Benito Juárez","Tlacuilotepec","Tlachichuca","Tlahuapan","Tlaltenango","Tlanepantla","Tlaola","Tlapacoya","Tlapanalá","Tlatlauquitepec","Tlaxco","Tochimilco","Tochtepec","Totoltepec de Guerrero","Tulcingo","Tuzamapan de Galeana","Tzicatlacoyan","Venustiano Carranza","Vicente Guerrero","Xayacatlán de Bravo","Xicotepec","Xicotlán","Xiutetelco","Xochiapulco","Xochiltepec","Xochitlán de Vicente Suárez","Xochitlán Todos Santos","Yaonáhuac","Yehualtepec","Zacapala","Zacapoaxtla","Zacatlán","Zapotitlán","Zapotitlán de Méndez","Zaragoza","Zautla","Zihuateutla","Zinacatepec","Zongozotla","Zoquiapan","Zoquitlán"],"Querétaro":["Amealco de Bonfil","Pinal de Amoles","Arroyo Seco","Cadereyta de Montes","Colón","Corregidora","Ezequiel Montes","Huimilpan","Jalpan de Serra","Landa de Matamoros","El Marqués","Pedro Escobedo","Peñamiller","Querétaro","San Joaquín","San Juan del Río","Tequisquiapan","Tolimán"],"Quintana Roo":["Cozumel","Felipe Carrillo Puerto","Isla Mujeres","Othón P. Blanco","Benito Juárez","José María Morelos","Lázaro Cárdenas","Solidaridad","Tulum","Bacalar","Puerto Morelos"],"San Luis Potosí":["Ahualulco","Alaquines","Aquismón","Armadillo de los Infante","Cárdenas","Catorce","Cedral","Cerritos","Cerro de San Pedro","Ciudad del Maíz","Ciudad Fernández","Tancanhuitz","Ciudad Valles","Coxcatlán","Charcas","Ebano","Guadalcázar","Huehuetlán","Lagunillas","Matehuala","Mexquitic de Carmona","Moctezuma","Rayón","Rioverde","Salinas","San Antonio","San Ciro de Acosta","San Luis Potosí","San Martín Chalchicuautla","San Nicolás Tolentino","Santa Catarina","Santa María del Río","Santo Domingo","San Vicente Tancuayalab","Soledad de Graciano Sánchez","Tamasopo","Tamazunchale","Tampacán","Tampamolón Corona","Tamuín","Tanlajás","Tanquián de Escobedo","Tierra Nueva","Vanegas","Venado","Villa de Arriaga","Villa de Guadalupe","Villa de la Paz","Villa de Ramos","Villa de Reyes","Villa Hidalgo","Villa Juárez","Axtla de Terrazas","Xilitla","Zaragoza","Villa de Arista","Matlapa","El Naranjo"],"Sinaloa":["Ahome","Angostura","Badiraguato","Concordia","Cosalá","Culiacán","Choix","Elota","Escuinapa","El Fuerte","Guasave","Mazatlán","Mocorito","Rosario","Salvador Alvarado","San Ignacio","Sinaloa","Navolato"],"Sonora":["Aconchi","Agua Prieta","Alamos","Altar","Arivechi","Arizpe","Atil","Bacadéhuachi","Bacanora","Bacerac","Bacoachi","Bácum","Banámichi","Baviácora","Bavispe","Benjamín Hill","Caborca","Cajeme","Cananea","Carbó","La Colorada","Cucurpe","Cumpas","Divisaderos","Empalme","Etchojoa","Fronteras","Granados","Guaymas","Hermosillo","Huachinera","Huásabas","Huatabampo","Huépac","Imuris","Magdalena","Mazatán","Moctezuma","Naco","Nácori Chico","Nacozari de García","Navojoa","Nogales","Onavas","Opodepe","Oquitoa","Pitiquito","Puerto Peñasco","Quiriego","Rayón","Rosario","Sahuaripa","San Felipe de Jesús","San Javier","San Luis Río Colorado","San Miguel de Horcasitas","San Pedro de la Cueva","Santa Ana","Santa Cruz","Sáric","Soyopa","Suaqui Grande","Tepache","Trincheras","Tubutama","Ures","Villa Hidalgo","Villa Pesqueira","Yécora","General Plutarco Elías Calles","Benito Juárez","San Ignacio Río Muerto"],"Tabasco":["Balancán","Cárdenas","Centla","Centro","Comalcalco","Cunduacán","Emiliano Zapata","Huimanguillo","Jalapa","Jalpa de Méndez","Jonuta","Macuspana","Nacajuca","Paraíso","Tacotalpa","Teapa","Tenosique"],"Tamaulipas":["Abasolo","Aldama","Altamira","Antiguo Morelos","Burgos","Bustamante","Camargo","Casas","Ciudad Madero","Cruillas","Gómez Farías","González","Güémez","Guerrero","Gustavo Díaz Ordaz","Hidalgo","Jaumave","Jiménez","Llera","Mainero","El Mante","Matamoros","Méndez","Mier","Miguel Alemán","Miquihuana","Nuevo Laredo","Nuevo Morelos","Ocampo","Padilla","Palmillas","Reynosa","Río Bravo","San Carlos","San Fernando","San Nicolás","Soto la Marina","Tampico","Tula","Valle Hermoso","Victoria","Villagrán","Xicoténcatl"],"Tlaxcala":["Amaxac de Guerrero","Apetatitlán de Antonio Carvajal","Atlangatepec","Atltzayanca","Apizaco","Calpulalpan","El Carmen Tequexquitla","Cuapiaxtla","Cuaxomulco","Chiautempan","Muñoz de Domingo Arenas","Españita","Huamantla","Hueyotlipan","Ixtacuixtla de Mariano Matamoros","Ixtenco","Mazatecochco de José María Morelos","Contla de Juan Cuamatzi","Tepetitla de Lardizábal","Sanctórum de Lázaro Cárdenas","Nanacamilpa de Mariano Arista","Acuamanala de Miguel Hidalgo","Natívitas","Panotla","San Pablo del Monte","Santa Cruz Tlaxcala","Tenancingo","Teolocholco","Tepeyanco","Terrenate","Tetla de la Solidaridad","Tetlatlahuca","Tlaxcala","Tlaxco","Tocatlán","Totolac","Ziltlaltépec de Trinidad Sánchez Santos","Tzompantepec","Xaloztoc","Xaltocan","Papalotla de Xicohténcatl","Xicohtzinco","Yauhquemehcan","Zacatelco","Benito Juárez","Emiliano Zapata","Lázaro Cárdenas","La Magdalena Tlaltelulco","San Damián Texóloc","San Francisco Tetlanohcan","San Jerónimo Zacualpan","San José Teacalco","San Juan Huactzinco","San Lorenzo Axocomanitla","San Lucas Tecopilco","Santa Ana Nopalucan","Santa Apolonia Teacalco","Santa Catarina Ayometla","Santa Cruz Quilehtla","Santa Isabel Xiloxoxtla"],"Veracruz de Ignacio de la Llave":["Acajete","Acatlán","Acayucan","Actopan","Acula","Acultzingo","Camarón de Tejeda","Alpatláhuac","Alto Lucero de Gutiérrez Barrios","Altotonga","Alvarado","Amatitlán","Naranjos Amatlán","Amatlán de los Reyes","Angel R. Cabada","La Antigua","Apazapan","Aquila","Astacinga","Atlahuilco","Atoyac","Atzacan","Atzalan","Tlaltetela","Ayahualulco","Banderilla","Benito Juárez","Boca del Río","Calcahualco","Camerino Z. Mendoza","Carrillo Puerto","Catemaco","Cazones de Herrera","Cerro Azul","Citlaltépetl","Coacoatzintla","Coahuitlán","Coatepec","Coatzacoalcos","Coatzintla","Coetzala","Colipa","Comapa","Córdoba","Cosamaloapan de Carpio","Cosautlán de Carvajal","Coscomatepec","Cosoleacaque","Cotaxtla","Coxquihui","Coyutla","Cuichapa","Cuitláhuac","Chacaltianguis","Chalma","Chiconamel","Chiconquiaco","Chicontepec","Chinameca","Chinampa de Gorostiza","Las Choapas","Chocamán","Chontla","Chumatlán","Emiliano Zapata","Espinal","Filomeno Mata","Fortín","Gutiérrez Zamora","Hidalgotitlán","Huatusco","Huayacocotla","Hueyapan de Ocampo","Huiloapan de Cuauhtémoc","Ignacio de la Llave","Ilamatlán","Isla","Ixcatepec","Ixhuacán de los Reyes","Ixhuatlán del Café","Ixhuatlancillo","Ixhuatlán del Sureste","Ixhuatlán de Madero","Ixmatlahuacan","Ixtaczoquitlán","Jalacingo","Xalapa","Jalcomulco","Jáltipan","Jamapa","Jesús Carranza","Xico","Jilotepec","Juan Rodríguez Clara","Juchique de Ferrer","Landero y Coss","Lerdo de Tejada","Magdalena","Maltrata","Manlio Fabio Altamirano","Mariano Escobedo","Martínez de la Torre","Mecatlán","Mecayapan","Medellín de Bravo","Miahuatlán","Las Minas","Minatitlán","Misantla","Mixtla de Altamirano","Moloacán","Naolinco","Naranjal","Nautla","Nogales","Oluta","Omealca","Orizaba","Otatitlán","Oteapan","Ozuluama de Mascareñas","Pajapan","Pánuco","Papantla","Paso del Macho","Paso de Ovejas","La Perla","Perote","Platón Sánchez","Playa Vicente","Poza Rica de Hidalgo","Las Vigas de Ramírez","Pueblo Viejo","Puente Nacional","Rafael Delgado","Rafael Lucio","Los Reyes","Río Blanco","Saltabarranca","San Andrés Tenejapan","San Andrés Tuxtla","San Juan Evangelista","Santiago Tuxtla","Sayula de Alemán","Soconusco","Sochiapa","Soledad Atzompa","Soledad de Doblado","Soteapan","Tamalín","Tamiahua","Tampico Alto","Tancoco","Tantima","Tantoyuca","Tatatila","Castillo de Teayo","Tecolutla","Tehuipango","Álamo Temapache","Tempoal","Tenampa","Tenochtitlán","Teocelo","Tepatlaxco","Tepetlán","Tepetzintla","Tequila","José Azueta","Texcatepec","Texhuacán","Texistepec","Tezonapa","Tierra Blanca","Tihuatlán","Tlacojalpan","Tlacolulan","Tlacotalpan","Tlacotepec de Mejía","Tlachichilco","Tlalixcoyan","Tlalnelhuayocan","Tlapacoyan","Tlaquilpa","Tlilapan","Tomatlán","Tonayán","Totutla","Tuxpan","Tuxtilla","Ursulo Galván","Vega de Alatorre","Veracruz","Villa Aldama","Xoxocotla","Yanga","Yecuatla","Zacualpan","Zaragoza","Zentla","Zongolica","Zontecomatlán de López y Fuentes","Zozocolco de Hidalgo","Agua Dulce","El Higo","Nanchital de Lázaro Cárdenas del Río","Tres Valles","Carlos A. Carrillo","Tatahuicapan de Juárez","Uxpanapa","San Rafael","Santiago Sochiapan"],"Yucatán":["Abalá","Acanceh","Akil","Baca","Bokobá","Buctzotz","Cacalchén","Calotmul","Cansahcab","Cantamayec","Celestún","Cenotillo","Conkal","Cuncunul","Cuzamá","Chacsinkín","Chankom","Chapab","Chemax","Chicxulub Pueblo","Chichimilá","Chikindzonot","Chocholá","Chumayel","Dzán","Dzemul","Dzidzantún","Dzilam de Bravo","Dzilam González","Dzitás","Dzoncauich","Espita","Halachó","Hocabá","Hoctún","Homún","Huhí","Hunucmá","Ixil","Izamal","Kanasín","Kantunil","Kaua","Kinchil","Kopomá","Mama","Maní","Maxcanú","Mayapán","Mérida","Mocochá","Motul","Muna","Muxupip","Opichén","Oxkutzcab","Panabá","Peto","Progreso","Quintana Roo","Río Lagartos","Sacalum","Samahil","Sanahcat","San Felipe","Santa Elena","Seyé","Sinanché","Sotuta","Sucilá","Sudzal","Suma","Tahdziú","Tahmek","Teabo","Tecoh","Tekal de Venegas","Tekantó","Tekax","Tekit","Tekom","Telchac Pueblo","Telchac Puerto","Temax","Temozón","Tepakán","Tetiz","Teya","Ticul","Timucuy","Tinum","Tixcacalcupul","Tixkokob","Tixmehuac","Tixpéhual","Tizimín","Tunkás","Tzucacab","Uayma","Ucú","Umán","Valladolid","Xocchel","Yaxcabá","Yaxkukul","Yobaín"],"Zacatecas":["Apozol","Apulco","Atolinga","Benito Juárez","Calera","Cañitas de Felipe Pescador","Concepción del Oro","Cuauhtémoc","Chalchihuites","Fresnillo","Trinidad García de la Cadena","Genaro Codina","General Enrique Estrada","General Francisco R. Murguía","El Plateado de Joaquín Amaro","General Pánfilo Natera","Guadalupe","Huanusco","Jalpa","Jerez","Jiménez del Teul","Juan Aldama","Juchipila","Loreto","Luis Moya","Mazapil","Melchor Ocampo","Mezquital del Oro","Miguel Auza","Momax","Monte Escobedo","Morelos","Moyahua de Estrada","Nochistlán de Mejía","Noria de Ángeles","Ojocaliente","Pánuco","Pinos","Río Grande","Sain Alto","El Salvador","Sombrerete","Susticacán","Tabasco","Tepechitlán","Tepetongo","Teúl de González Ortega","Tlaltenango de Sánchez Román","Valparaíso","Vetagrande","Villa de Cos","Villa García","Villa González Ortega","Villa Hidalgo","Villanueva","Zacatecas","Trancoso","Santa María de la Paz"]}';
}
