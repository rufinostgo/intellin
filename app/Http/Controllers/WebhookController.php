<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class WebhookController extends Controller
{
    public function webhook_controller()
    {
        $body = @file_get_contents('php://input');
        $data = json_decode($body);
        http_response_code(200); // Return 200 OK 

        // $data_mail = array();
        // $data_mail['status'] = "nothing";
        // Mail::send('mail', $data_mail, function ($message) {
        //     $message->to('juan.camberos@estrasol.com.mx', 'Cliente')->subject('webhook controller');
        //     $message->from('pruebas@democrm7.estrasol.com.mx', 'INTELLI');
        // });

        if ($data->type == 'charge.paid') {
           
            
        }
    }
}
