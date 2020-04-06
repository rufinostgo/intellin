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
            foreach($torre_departamentos as $index => $value){
                $departamentos_array[$value['id']] = $value['name'];
            }

            $data_view = array(
                'torre_name' => str_replace('"', '', json_encode($datos_torre['name'])),
                'torre_bg' => "data:image/png;base64," .str_replace('"', '', 
                        $datos_torre['background_picture']),
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
        if($numero_departamento != 'empty'){
            
            return view('front.purchase_information');
        }else{
            return Redirect::back()->with('alert', 'Favor de seleccionar un número de departamento.');
        }

        
    }
}
