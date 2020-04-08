<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\RipcordController;
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
                'torre_deptos' => $departamentos_array
            );
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
                $products_info = array();

                foreach ($areas_array['areas'] as $area) {
                    $zones = $area['zones'];
                    foreach ($zones as $zone) {
                        $products = $zone['products'];
                        foreach ($products as $prod) {
                            $products_gral[$prod['product_id']] = $prod['price'];
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
                                'images' => $product_imgs
                            );
                        }
                    }
                }

                foreach ($areas_array['extra_products'] as $prod) {
                    $products_gral[$prod['product_id']] = $prod['price'];
                    $products_info[$prod['product_id']] = array(
                        'name' => $prod['product'],
                        'image' => "data:image/png;base64," . str_replace(
                            '"',
                            '',
                            $prod['image']
                        ),
                        'images' => $product_imgs
                    );
                }

                $areas_array['nombre_torre'] = $nombre_torre;
                $areas_array['num_depto'] = $numero_departamento;
                $areas_array['products_info'] = $products_info;

                echo "<script type='text/javascript'>const array_all = " . json_encode($result[0]) . "</script>";
                echo "<script type='text/javascript'>const products_gral = " . json_encode($products_gral) . "</script>";
                return view('front.purchase_information_tw', $areas_array);
            }
        } else {
            return Redirect::back()->with('alert', 'Favor de seleccionar un número de departamento.');
        }
    }
}
