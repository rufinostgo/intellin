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
            'url' => "https://novias-temp-intelli-2-995132.dev.odoo.com/xmlrpc",
            'db' => "novias-temp-intelli-2-995132",
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
    }

    public function purchase_info(Request $request)
    {
        $numero_departamento =  $_POST['numero_departamento'];
        if ($numero_departamento != 'empty') {
            $config =  array(
                'url' => "https://novias-temp-intelli-2-995132.dev.odoo.com/xmlrpc",
                'db' => "novias-temp-intelli-2-995132",
                'user' => "admin",
                'password' => "adminadmin"
            );
            $common = new Ripcord($config);
            /*$result = $common->client->execute_kw(
                $common->db,
                $common->uid,
                $common->password,
                'intelli.department.area',
                'product_areas',
                array('id',"1") 
            );*/
            $test_json = '{ "areas": [ { "area": "1", "style": "Translúcida", "zones": [ { "zone": "IZQ", "products": [ { "product_id": 129, "product": "SOWAK WHITE MOTOR", "price": 300 } ] }, { "zone": "a", "products": [ { "product_id": 129, "product": "SOWAK WHITE MOTOR", "price": 300 } ] } ] }, { "area": "2", "style": "Translúcida", "zones": [ { "zone": "DER", "products": [ { "product_id": 129, "product": "SOWAK WHITE MOTOR", "price": 300 } ] } ] }, { "area": "2", "style": "Electrónica", "zones": [ { "zone": "IZQ", "products": [ { "product_id": 130, "product": "CONTROL REMOTO 1 CANAL", "price": 800 }, { "product_id": 131, "product": "CONTROL REMOTO 5 CANALES", "price": 1000 } ] } ] }, { "area": "3", "style": "Translúcida", "zones": [ { "zone": "DER", "products": [ { "product_id": 129, "product": "SOWAK WHITE MOTOR", "price": 300 } ] } ] } ], "extra_products": [] }';
            $areas_array = json_decode($test_json, true);
            //print_r($test_array);
            //print_r($result);
            //if ($result[0]['success'] == '200') {
                //$areas_array = $result[0]['data'];
                return view('front.purchase_information', $areas_array);
                //echo "<script type='text/javascript'>var test_array = " . json_encode($test_array) . "</script>";
            //}
        } else {
            return Redirect::back()->with('alert', 'Favor de seleccionar un número de departamento.');
        }
    }
}
