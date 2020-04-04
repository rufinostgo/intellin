<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ripcord\Providers\Laravel\Ripcord;

class RipcordController extends Ripcord
{
    public function ripcord_connect()
    {
        $config =  array(
            'url' => "https://novias-temp-intelli-2-995132.dev.odoo.com/xmlrpc",
            'db' => "novias-temp-intelli-2-995132",
            'user' => "admin",
            'password' => "adminadmin"
        );

        $odoo = new Ripcord;
        $result = $odoo->client->execute_kw(
            $odoo->db,
            $odoo->uid,
            $odoo->password,
            'intelli.tower',
            'tower_departments',
            'search',
            array('password', "AURA012")
        );
        echo json_encode($result[0]['data']);
    }
}
