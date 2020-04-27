<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MailController extends Controller
{
    public function basic_email()
    {
        $data = array('name' => "Virat Gandhi");

        Mail::send(['text' => 'mail'], $data, function ($message) {
            $message->to('juan.camberos@estrasol.com.mx', 'Tutorials Point')->subject('Laravel Basic Testing Mail');
            $message->from('pruebas@democrm7.estrasol.com.mx', 'Virat Gandhi');
        });
        echo "Basic Email Sent. Check your inbox.";
    }
    public function html_email()
    {
        $data = array('name' => "ShadowPiva", "fondo" => 'images/central_park_example.png');
        Mail::send('mail', $data, function ($message) {
            $message->to('juan.camberos@estrasol.com.mx', 'Tutorials Point')->subject('Laravel HTML Testing Mail');
            $message->from('pruebas@democrm7.estrasol.com.mx', 'Testing Shadow');
        });
        echo "HTML Email Sent. Check your inbox.";
    }
    public function attachment_email()
    {
        /*
        $data = array('name' => "Virat Gandhi");
        Mail::send('mail', $data, function ($message) {
            $message->to('juan.camberos@estrasol.com.mx', 'Tutorials Point')->subject('Laravel Testing Mail with Attachment');
            $message->attach('C:\laravel-master\laravel\public\uploads\image.png');
            $message->attach('C:\laravel-master\laravel\public\uploads\test.txt');
            $message->from('pruebas@democrm7.estrasol.com.mx', 'Virat Gandhi');
        });
        echo "Email Sent with attachment. Check your inbox.";*/
    }
}
