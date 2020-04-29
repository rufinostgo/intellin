<?php
​
namespace App\Http\Controllers\Admin\Webhook;
​
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\OrderOxxoWebhookMail;
use App\Mail\StatusOrderMail;
use App\Models\Conekta;
use App\Models\Configuration;
use App\Models\Orders;
use App\Models\Status_order;
use App\Models\Stock;
use App\Models\StockMoves;
use Exception;
use Illuminate\Support\Facades\Mail;
​
class WebhookController extends Controller
{
    public function conekta_oxxo()
    {
        $body = @file_get_contents('php://input');
        $data = json_decode($body);
        http_response_code(200); // Return 200 OK
​
        if ($data->type == 'charge.paid') {
​
            \Log::debug('webhoook tipo: ' . $data->type);
            if($data->data->object->payment_method->type == 'oxxo'){
                \Log::debug('webhoook tipo: ' . $data->type);
                $conekta = Conekta::where('conekta_id', $data->data->object->order_id)->first();
                \Log::debug('Id de orden de conekta: ' . $conekta->order_id);
​
                if($conekta){                    
                    $order = Orders::where('id', $conekta->order_id)->first();
                    \Log::debug('Id de orden: ' . $order->id);
                    if($order){  
                        $order->process_id = 2;
                        if ($order->update()) {
                            \Log::debug('Se actualizo el process id de la orden');
                            $status_order = new Status_order();
                            $status_order->order_id = $order->id;
                            $status_order->message = 'La orden a sido pagada con éxito';
                            $status_order->status = 2;
                            \Log::debug('Se creo el objeto de la tabla status_order');
​
                            if($order->details){
                                foreach($order->details as $details){
                                    $data = (object) [
                                        "product_id" => $details->product_id,
                                        "quantity" => $details->quantity,
                                        "order_folio" => $order->get_folio()
                                    ];
                
                                    $this->remove_stock($data);
                                }
                            }
            
                            if ($status_order->save()) {
                                Mail::to($order->email)->send(new StatusOrderMail($order, $status_order));
                                \Log::debug('Se guardo el status de la orden');
                            }else{
                                \Log::debug('No es posible actualizar el estatus de la orden en la tabla status_order');
                            }
                        }else{
                            \Log::debug('No es posible actualizar el process_id de la orden con id: ' . $order->id);
                        }
                    }else{
                        \Log::debug('No se encontro la orden de TallerDOCE con el id: ' . $conekta->order_id);
                    }
​
                }else{
                    \Log::debug('No se encontro la orden de conekta con el order_id: ' . $data->data->object->order_id);
                }
            }
        }
    }
    
    public function text_webhook()
    {
        $body = @file_get_contents('php://input');
        $data = json_decode($body);
        http_response_code(200); // Return 200 OK
​
        Mail::to('ctenorio@estrasol.com.mx')->send(new OrderOxxoWebhookMail($data));
​
        \Log::debug('webhoook: ' . print_r($data));
​
        $configuracion = Configuration::where('alias', 'webhook')->first();
        $configuracion->value = print_r($data);
        $configuracion->save();
    }
​
​
​
    public function remove_stock($data)
    {
        $sotck = Stock::where('product_id', $data->product_id)->first();
​
        $moves = new StockMoves();
        $moves->description = 'Compra de la orden #' . $data->order_folio;
        $moves->type_move = 'Salida';
        $moves->product_id = $data->product_id;
        $moves->stock_old = $sotck->quantity;
        $moves->stock_add = $data->quantity;
        $moves->stock_new = $sotck->quantity - $data->quantity;
        $moves->user = 0;
        $moves->save();
​
        $sotck->quantity = $sotck->quantity - $data->quantity;
​
        try{
            $sotck->update();
        }catch(Exception $e){
            StockMoves::where('id', $moves->id)->delete();
        }
    }
}