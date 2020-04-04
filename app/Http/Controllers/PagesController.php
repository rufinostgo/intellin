<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\RipcordController;
use Ripcord\Providers\Laravel\Ripcord;

class PagesController extends Controller
{
    public function home()
    {
        return view('front.home');
    }

    public function welcome(Request $request)
    {
        $num_contrato =  $_POST['numero_contrato'];;

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
            //echo json_encode($result[0]['data']["id"]);
            //print_r($result[0]['data']['departments']);
            
            $datos_torre = $result[0]['data'];

            $torre_name =  json_encode($datos_torre['name']);
            $torre_departamentos = $result[0]['data']['departments'];
            
            $departamentos_array =  array();
            foreach($torre_departamentos as $index => $value){
                $departamentos_array[$value['id']] = $value['name'];
            }

            
            $data_view = array(
                'torre_name' => str_replace('"', '', json_encode($datos_torre['name'])),
                'torre_bg' => "data:image/png;base64," .str_replace('"', '', 
                        $datos_torre['background_picture']),
                'torre_deptos' => $departamentos_array
            );

            //print_r($data_view['torre_bg']);
            //die(); 
            return view('front.welcome', $data_view);
        } else {
            return redirect()->back()->with('alert', 'El número ingresado no se encuentra, por favor intente de nuevo o bien reporte el error. (' . $num_contrato . ")");
        }
    }
}
