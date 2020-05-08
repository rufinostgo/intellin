<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Ripcord\Providers\Laravel\Ripcord;
use Mail;
use Conekta\Conekta;
use Conekta\Handler;
use Conekta\Order;
use Conekta\ParameterValidationError;
use Conekta\ProcessingError;
use DateTime;
use DateInterval;

class PagesController extends Controller
{
    public function home()
    {
        return view('front.home');
    }

    public function welcome(Request $request)
    {
        $num_contrato =  $_POST['numero_contrato'];

        $config =  array(
            'url' => "http://contratos.intelli.mx:8069/xmlrpc",
            'db' => "intelli",
            'user' => "admin",
            'password' => "admin"
        );
        $common = new Ripcord($config);
        $result = $common->client->execute_kw(
            $common->db,
            $common->uid,
            $common->password,
            'intelli.tower',
            'tower_departments',
            array('password', $num_contrato)
        );

        if ($result[0]['success'] == '200') {
            $datos_torre = $result[0]['data'];
            //print_r($datos_torre);
            $torre_name =  json_encode($datos_torre['name']);
            $torre_departamentos = $result[0]['data']['departments'];

            $departamentos_array =  array();
            foreach ($torre_departamentos as $index => $value) {
                $departamentos_array[$value['id']] = $value['name'];
            }

            $data_view = array(
                'torre_name' => str_replace('"', '', json_encode($datos_torre['name'])),
                'torre_bg' => "data:image/png;base64," . str_replace(
                    '"',
                    '',
                    $datos_torre['background_picture']
                ),
                'torre_deptos' => $departamentos_array,
                'torre_imagen' =>  $datos_torre['tower_picture']
            );
            echo "<script type='text/javascript'>const array_all = " . json_encode($datos_torre) . "</script>";
            return view('front.welcome', $data_view);
        } else {
            return Redirect::back()->withInput()
                ->withErrors(['numero_contrato' => 'El número ingresado no se encuentra, por favor intente de nuevo o bien reporte el error. (' . $num_contrato . ")"]);
        }
        //Prueba en caso de falla de Odoo |||
        //                                vvv
        //$departamentos_array = array( '01' => 'X1', '02' => 'X2', '03' => 'X3', ); $data_view = array( 'torre_name' => 'Central Perk', 'torre_bg' => "{{ asset('images/logos/central_park_example.png')}}", 'torre_deptos' => $departamentos_array ); return view('front.welcome', $data_view);
    }

    public function purchase_info(Request $request)
    {
        $nombre_torre =  $_POST['name_torre'];
        $img_torre = $_POST['img_torre'];
        $numero_departamento =  $_POST['numero_departamento'];
        $num_depto_name =  $_POST['num_depto_name'];
        $torre_bg = $_POST['torre_bg'];

        if ($numero_departamento != 'empty') {
            $config =  array(
                'url' => "http://contratos.intelli.mx:8069/xmlrpc",
            'db' => "intelli",
            'user' => "admin",
            'password' => "admin"
            );
            $common = new Ripcord($config);
            $result = $common->client->execute_kw(
                $common->db,
                $common->uid,
                $common->password,
                'intelli.department.area',
                'product_areas',
                array('id', $numero_departamento)
            );
            //print_r($result);
            //$test_json = '{ "areas": [ { "area": "1", "style": "Translúcida", "zones": [ { "zone": "IZQ", "products": [ { "product_id": 129, "product": "SOWAK WHITE MOTOR", "price": 300 } ] }, { "zone": "a", "products": [ { "product_id": 129, "product": "SOWAK WHITE MOTOR", "price": 300 } ] } ] }, { "area": "2", "style": "Translúcida", "zones": [ { "zone": "DER", "products": [ { "product_id": 129, "product": "SOWAK WHITE MOTOR", "price": 300 } ] } ] }, { "area": "2", "style": "Electrónica", "zones": [ { "zone": "IZQ", "products": [ { "product_id": 130, "product": "CONTROL REMOTO 1 CANAL", "price": 800 }, { "product_id": 131, "product": "CONTROL REMOTO 5 CANALES", "price": 1000 } ] } ] }, { "area": "3", "style": "Translúcida", "zones": [ { "zone": "DER", "products": [ { "product_id": 129, "product": "SOWAK WHITE MOTOR", "price": 300 } ] } ] } ], "extra_products": [] }'; $areas_array = json_decode($test_json, true); print_r($test_array); 
            if ($result[0]['success'] == '200') {
                $areas_array = $result[0]['data'];
                $products_gral = array();
                $products_act = array();
                $products_info = array();
                $area_extraprods = array();
                $area_otherprods = array();

                $control1 = "Control 1 Canal";              // Nombre del producto de "Controles" a verificar 
                $control5 = "Control 5 Canales";            // Nombre del producto de "Controles" a verificar 
                $cargador1 = "Cargador";                    // Nombre del producto de "Cargadores" a verificar 
                $interfase1 = "Interfase";                  // Nombre del producto de "Interfase" a verificar 
                $needed_prods = array(
                    'control_1' => '',
                    'control_5' => '',
                );
                $other_prods = array(
                    'cargador' => '',
                    'interfase' => '',
                );

                foreach ($areas_array['areas'] as $area) {
                    $zones = $area['zones'];
                    foreach ($zones as $zone) {
                        $products = $zone['products'];
                        foreach ($products as $prod) {
                            $products_gral[$prod['product_id']] = $prod['price'];
                            $products_act[$prod['product_id']] = $prod['actuation'];
                            $product_imgs = array();
                            foreach ($prod['images'] as $img) {
                                array_push($product_imgs, "data:image/png;base64," . str_replace(
                                    '"',
                                    '',
                                    $img
                                ));
                            }

                            $products_info[$prod['product_id']] = array(
                                'name' => $prod['product'],
                                'image' => "data:image/png;base64," . str_replace(
                                    '"',
                                    '',
                                    $prod['image']
                                ),
                                'images' => $product_imgs,
                                'actuation' => $prod['actuation']
                            );
                        }
                    }
                }


                foreach ($areas_array['extra_products'] as $prod) {
                    $products_gral[$prod['product_id']] = $prod['price'];
                    $products_act[$prod['product_id']] = 'no_aplica';
                    $product_imgs = array();
                    foreach ($prod['images'] as $img) {
                        array_push($product_imgs, "data:image/png;base64," . str_replace(
                            '"',
                            '',
                            $img
                        ));
                    }
                    $products_info[$prod['product_id']] = array(
                        'name' => $prod['product'],
                        'image' => "data:image/png;base64," . str_replace(
                            '"',
                            '',
                            $prod['image']
                        ),
                        'images' => $product_imgs,
                        'actuation' => 'no_aplica'
                    );

                    if ($prod['electronic'] == $control1) {
                        $needed_prods['control_1'] = $prod['electronic_id'];
                        array_push($area_extraprods, $prod);
                    } else if ($prod['electronic'] == $control5) {
                        $needed_prods['control_5'] = $prod['electronic_id'];
                        array_push($area_extraprods, $prod);
                    } else if ($prod['electronic'] == $cargador1) {
                        $other_prods['cargador'] = $prod['electronic_id'];
                        array_push($area_otherprods, $prod);
                    } else if ($prod['electronic'] == $interfase1) {
                        $other_prods['interfase'] = $prod['electronic_id'];
                        array_push($area_otherprods, $prod);
                    }
                }

                $areas_array['nombre_torre'] = $nombre_torre;
                $areas_array['imagen_torre'] = "data:image/png;base64," . str_replace('"', '', $img_torre);
                $areas_array['map'] = "data:image/png;base64," . str_replace('"', '', $areas_array['map']);
                $areas_array['num_depto'] = $num_depto_name;
                $areas_array['products_info'] = $products_info;
                $areas_array['a_extraprods'] = $area_extraprods;
                $areas_array['a_otherprods'] = $area_otherprods;
                $areas_array['torre_bg'] = $torre_bg;

                //echo "<script type='text/javascript'>const area_extraprods = " . json_encode($area_extraprods) . "</script>";
                //echo "<script type='text/javascript'>const area_otherprods = " . json_encode($area_otherprods) . "</script>";

                echo "<script type='text/javascript'>const array_all = " . json_encode($result[0]) . "</script>";
                echo "<script type='text/javascript'>const products_act = " . json_encode($products_act) . "</script>";
                echo "<script type='text/javascript'>const products_gral = " . json_encode($products_gral) . "</script>";
                echo "<script type='text/javascript'>const needed_prods = " . json_encode($needed_prods) . "</script>";
                echo "<script type='text/javascript'>const other_prods = " . json_encode($other_prods) . "</script>";
                return view('front.purchase_information', $areas_array);
            }
        } else {
            return Redirect::back()->with('alert', 'Favor de seleccionar un número de departamento.');
        }
    }

    public function purchase_infov2(Request $request)
    {
        $product_list =  $request['products_list'];


        if ($product_list != "") {
            $product_list_jd = json_decode($product_list);
            $config =  array(
                'url' => "http://contratos.intelli.mx:8069/xmlrpc",
                'db' => "intelli",
                'user' => "admin",
                'password' => "admin"
            );
            $common = new Ripcord($config);
            $result = $common->client->execute_kw(
                $common->db,
                $common->uid,
                $common->password,
                'intelli.blind',
                'products_total',
                array('self', $product_list_jd)
            );
            //print_r($result); 
            if ($result[0]['success'] == 200) {
                $result_data = $result[0]['data'];
                echo "<script type='text/javascript'>const product_list = " . json_encode($product_list) . "</script>";
                echo "<script type='text/javascript'>const result_data = " . json_encode($result_data) . "</script>";

                $result_data['name_torre'] =  $_POST['name_torre'];
                $result_data['num_depto'] =  $_POST['num_depto'];
                $result_data['img_torre'] =  $_POST['img_torre'];
                $result_data['img_plano'] =  $_POST['img_plano'];
                $result_data['torre_bg'] = $_POST['torre_bg'];
                $result_data['products_list'] = $_POST['products_list'];
                //$result_data['video'] = $result_data['video'] . "&enablejsapi=1";

                //print_r($result_data); die();
                return view('front.purchase_information_v2', $result_data);
            }
        }
    }

    public function try_payment()
    {
        $array_tosend = array('success' => '', 'referencia_oxxo' => '');
        Conekta::setApiKey("key_4s5xH2S3BG44nFa5y9smWg");    // Pruebas
        //\Conekta\Conekta::setApiKey("key_nhZNh6mFkjEAyAtu79P7WQ");    // Producción
        Conekta::setApiVersion("2.0.0");

        $comisiones_porc = array(
            '1' => 0,
            '3' => 5.5,
            '6' => 9,
            '9' => 11,
            '12' => 15,
        );

        $product_list_jd = json_decode($_POST['products_list']);
        $config =  array(
            'url' => "http://contratos.intelli.mx:8069/xmlrpc",
            'db' => "intelli",
            'user' => "admin",
            'password' => "admin"
        );
        $common = new Ripcord($config);
        $result = $common->client->execute_kw(
            $common->db,
            $common->uid,
            $common->password,
            'intelli.blind',
            'products_total',
            array('self', $product_list_jd)
        );

        if ($result[0]['success'] == 200) {
            $result_data = $result[0]['data'];
            $full_name = $_POST['form_nombre']; // . " " . $_POST['form_apellido_paterno'] . " " . $_POST['form_apellido_materno'];

            /** TIPO DE PAGO */
            if ($_POST['form_pago_tipo'] == 'pago_tarjeta') {
                $paymenth_method = array(
                    "type" => "card",
                    "token_id" => $_POST['conektaTokenId']
                );
            } else if ($_POST['form_pago_tipo'] == 'pago_tarjeta_credito') {
                $paymenth_method = array(
                    "type" => "card",
                    "token_id" => $_POST['conektaTokenId'],
                    "monthly_installments" => $_POST['num_pagos']
                );
            } else if ($_POST['form_pago_tipo'] == 'pago_oxxo') {
                $thirty_days_from_now = (new DateTime())->add(new DateInterval('P30D'))->getTimestamp();
                $paymenth_method = array(
                    "type" => "oxxo_cash",
                    "expires_at" => $thirty_days_from_now
                );
            } else if ($_POST['form_pago_tipo'] == 'pago_spei') {
                $thirty_days_from_now = (new DateTime())->add(new DateInterval('P30D'))->getTimestamp();
                $paymenth_method = array(
                    "type" => "spei",
                    "expires_at" => $thirty_days_from_now
                );
            }

            /** ESPECIFICACIÓN DE ENVÍO */
            $delivery_array = array();
            $total_topay = 0;
            $total_topay_str = "";
            if ($_POST['extrapay_concept'] == 'total_delivery') {
                $total_topay = str_replace(",", "", $result_data['total_card']['total']);
                $total_topay_str = $result_data['total_card']['total'];
                $delivery_array = array(
                    "amount" => +$result_data['total_card']['delivery_price'] * 100,
                    "carrier" => "Paquetexpress"
                );

                if ($_POST['form_pago_tipo'] == 'pago_tarjeta_credito') {
                    $deliv_price = $result_data['total_card']['delivery_price'];
                    $comision_toadd = $comisiones_porc[$_POST['num_pagos']];
                    $comision_toadd_amount = (($deliv_price * $comision_toadd) / 100);
                    $deliv_price = $deliv_price + $comision_toadd_amount;
                    $delivery_array['amount'] = round($deliv_price, 2) * 100;
                }
            } else {
                $total_topay = str_replace(",", "", $result_data['total_card'][$_POST['extrapay_concept']]);
                $total_topay_str = $result_data['total_card'][$_POST['extrapay_concept']];
                $delivery_array = array(
                    "amount" => 0,
                    "carrier" => "SINENVIO"
                );
            }

            if ($_POST['form_pago_tipo'] == 'pago_tarjeta_credito') {
                $comision_toadd = $comisiones_porc[$_POST['num_pagos']];
                $comision_toadd_amount = (($total_topay * $comision_toadd) / 100);
                $total_topay = $total_topay + $comision_toadd_amount;
                $total_topay_str = $total_topay . "";
            }

            $total_topay_conektav = round($total_topay, 2) * 100;

            // $toreturn = array(
            //     $_POST['num_pagos'],
            //     $comisiones_porc[$_POST['num_pagos']],
            //     $total_topay,
            //     $total_topay_conektav
            // );
            //return json_encode($toreturn);
            //die();

            try {
                $order = Order::create(
                    array(
                        "line_items" => [
                            [
                                "name" => "Compra en " . $_POST['depto_info'],
                                "unit_price" =>  $total_topay_conektav,
                                "quantity" => 1
                            ]
                        ],
                        "shipping_lines" =>  [$delivery_array],
                        "currency" => "MXN",
                        "customer_info" => array(
                            "name" => $full_name,
                            "email" => $_POST['form_mail'],
                            "phone" =>  $_POST['form_telefono']
                        ),
                        "shipping_contact" => array(
                            "address" => array(
                                "street1" => $_POST['form_envio_municipio'] . "," .
                                    $_POST['form_envio_estado'] . " " . $_POST['form_envio_calle'] .
                                    " int " . $_POST['form_envio_noint'],
                                "postal_code" => $_POST['form_envio_cp'],
                                "country" => "MX"
                            )
                        ),
                        "charges" => array(
                            array(
                                "payment_method" => $paymenth_method
                            )
                        )
                    )
                );

                $array_tosend['monto_apagar'] = $total_topay_str;

                if ($_POST['form_pago_tipo'] == 'pago_oxxo') {
                    $array_tosend['referencia_oxxo'] = $order->charges[0]->payment_method->reference;
                } else if ($_POST['form_pago_tipo'] == 'pago_spei') {
                    $array_tosend['banco_spei'] = $order->charges[0]->payment_method->receiving_account_bank;
                    $array_tosend['clabe_spei'] = $order->charges[0]->payment_method->receiving_account_number;
                }
            } catch (ProcessingError $error) {
                $array_tosend['success'] = 'error';
                $array_tosend['error'] = $error;
                $array_tosend['error_msg'] = $error->getMessage();
                return json_encode($array_tosend);
                //echo json_encode($error->getMessage() . " 1");
                exit();
            } catch (ParameterValidationError $error) {
                $array_tosend['success'] = 'error';
                $array_tosend['error'] = $error->getMessage();
                return json_encode($array_tosend);
                //echo json_encode($error->getMessage() . " 2");
                exit();
            } catch (Handler $error) {
                $array_tosend['success'] = 'error';
                $array_tosend['error'] = $error->getMessage();
                return json_encode($array_tosend);
                //echo json_encode($error->getMessage() . " 3");
                exit();
            }
        }
        $array_tosend['success'] = 'success';
        return json_encode($array_tosend);
    }


    public function payment_done(Request $request)
    {
        $array_tosend['torre_bg'] = $request['torre_bg'];
        $data = array();
        $data['metodo_pago'] = $request['form_pago_tipo'];
        if ($request['form_pago_tipo'] == 'pago_oxxo') {
            $data['referencia_oxxo'] = $request['referencia_oxxo'];
        } else if ($request['form_pago_tipo'] == 'pago_spei') {
            $data['clabe_spei'] = $request['clabe_spei'];
            $data['banco_spei'] = $request['banco_spei'];
        }
        $data['monto_apagar'] = $request['monto_apagar'];

        if ($request['form_pago_tipo'] == 'pago_tarjeta' || $request['form_pago_tipo'] == 'pago_tarjeta_credito') {
            Mail::send('mails.payment_succeed_card', $data, function ($message) {
                $message->to($_POST['form_mail'], 'Cliente')->subject('Compra realizada con éxito');
                $message->from('pruebas@democrm7.estrasol.com.mx', 'INTELLI');
            });
        } else if ($request['form_pago_tipo'] == 'pago_oxxo') {
            Mail::send('mails.payment_succeed_oxxo', $data, function ($message) {
                $message->to($_POST['form_mail'], 'Cliente')->subject('Compra realizada con éxito');
                $message->from('pruebas@democrm7.estrasol.com.mx', 'INTELLI');
            });
        } else if ($request['form_pago_tipo'] == 'pago_spei') {
            Mail::send('mails.payment_succeed_spei', $data, function ($message) {
                $message->to($_POST['form_mail'], 'Cliente')->subject('Compra realizada con éxito');
                $message->from('pruebas@democrm7.estrasol.com.mx', 'INTELLI');
            });
        }

        echo "<script type='text/javascript'>const request_data = " . json_encode($data) . "</script>";
        return view('front.payment_succeed', $array_tosend);
    }
}
