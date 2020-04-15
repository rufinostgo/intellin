<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Ripcord\Providers\Laravel\Ripcord;

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
            'url' => "https://novias-novias-t-1-pruebas-1012178.dev.odoo.com/xmlrpc",
            'db' => "novias-novias-t-1-pruebas-1012178",
            'user' => "admin",
            'password' => "adminadmin"
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

        if ($numero_departamento != 'empty') {
            $config =  array(
                'url' => "https://novias-novias-t-1-pruebas-1012178.dev.odoo.com/xmlrpc",
                'db' => "novias-novias-t-1-pruebas-1012178",
                'user' => "admin",
                'password' => "adminadmin"
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
                        $needed_prods['cargador'] = $prod['electronic_id'];
                        array_push($area_otherprods, $prod);
                    } else if ($prod['electronic'] == $interfase1) {
                        $needed_prods['interfase'] = $prod['electronic_id'];
                        array_push($area_otherprods, $prod);
                    }
                } 

                $areas_array['nombre_torre'] = $nombre_torre;
                $areas_array['imagen_torre'] = "data:image/png;base64," . str_replace('"', '', $img_torre);
                $areas_array['map'] = "data:image/png;base64," . str_replace('"', '', $areas_array['map']);
                $areas_array['num_depto'] = $numero_departamento;
                $areas_array['products_info'] = $products_info;
                $areas_array['a_extraprods'] = $area_extraprods;
                $areas_array['a_otherprods'] = $area_otherprods;

                echo "<script type='text/javascript'>const array_all = " . json_encode($result[0]) . "</script>";
                echo "<script type='text/javascript'>const products_act = " . json_encode($products_act) . "</script>";
                echo "<script type='text/javascript'>const products_gral = " . json_encode($products_gral) . "</script>";
                echo "<script type='text/javascript'>const needed_prods = " . json_encode($needed_prods) . "</script>";
                return view('front.purchase_information', $areas_array);
            }
        } else {
            return Redirect::back()->with('alert', 'Favor de seleccionar un número de departamento.');
        }
    }
}
