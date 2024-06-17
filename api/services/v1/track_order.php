<?php
error_reporting(1);
require 'functions.php';



if  ($_SERVER['CONTENT_TYPE'] === 'application/json') {
    // Recibir los datos del formulario
    $json = file_get_contents('php://input');

    $data = json_decode($json, true);

    $usr = $data['_username'];
    $pws = $data['_password'];
    $tracking_id = $data['tracking_id'];

    // Valido Obteniendo un Token

            $iflow =  new iflow($usr,$pws);
            $api_token = $iflow->get_api_token();

            $resptoken = json_decode($api_token,true);

            $validacion = $resptoken['success'];

        
    
    }


    // Si token es true
    if ($validacion == true) {
        $token = $resptoken['token'];


        $ordenes = $iflow->get_status_order($token,$tracking_id);
        $track_data = json_encode($ordenes,true);

        file_put_contents("d:log_psd1.log", "17-06-2024 - " ."json: " .$track_data ."\n", FILE_APPEND | LOCK_EX);
                                        
        $track_json = json_decode($track_data, true);
         //var_dump($track_data); 
        if ($track_data !== null) {

            // Acceder a la parte específica del JSON que contiene los datos que quieres grabar
            $order_state_history = $track_json['results']['order_state_history'];
            $tracking_id = $track_json['results']['tracking_id'];
            $shipment_id = $track_json['results']['shipment_id'];
            $order_id = $track_json['results']['order_id'];


            foreach ($order_state_history as $estado) {
                // Aquí puedes insertar los datos en tu base de datos

                $nombre_estado = $estado['order_state']['name'];
                $descripcion_estado = $estado['order_state']['descripcion'];
                $createdAt_Date = $estado['createdAt']["date"];


                // Doy formato a las variables 
                $nombre_estado = eliminar_acentos($nombre_estado);
                $nombre_estado = strtr($nombre_estado, " ", "_");
                $nombre_estado = strtoupper($nombre_estado);

                $descripcion_estado = eliminar_acentos($descripcion_estado);
                $descripcion_estado = strtoupper($descripcion_estado);

                // Doy Formato a la Fecha
                $createdAt_Date = formato_psd ($createdAt_Date);


                
                $json = array(  "IdOrder"=>$order_id,
                                                                                "IdShip"=>$shipment_id,
                                                                                "IdTrack"=>$tracking_id,
                                                                                "Last_state"=>$nombre_estado,
                                                                                "Details"=>$descripcion_estado,
                                                                                "State_date"=>$createdAt_Date
                                                                                );

                                      
                                                                                
                file_put_contents("d:log_psd1.log", "17-06-2024 - " ."json de estados: " .json_encode($json,true) ."\n", FILE_APPEND | LOCK_EX); 
                
                 $Newsan =  new newsan($tracking_id, $tracking_id,$json_newsan);
                 $resp_post = $Newsan->post_status_newsan();

                        if (is_string($resp_post)) { 

                        $psd_data = json_decode($resp_post);
                        } 
                        else {
                        
                            $psd_data = json_encode($resp_post, true);
                        
                        }
                        
                        file_put_contents("d:log_psd1.log", "17-06-2024 - " ."Recib_json: " .$psd_data ."\n", FILE_APPEND | LOCK_EX); 

            }

        }

        // Mensaje y respuesta al servicio invocado.
        $response = [
            'status' => 'success',
            'code'=> 200,
            'message' => 'La solicitud de notificacion se proceso correctamente'
        ];

        header('Content-Type: application/json');
        echo json_encode($response);
        die();
    }
    else{
        $response = [
            'status' => 'error',
            'code'=> 500,
            'message' => 'Credenciales no validas'
        ];
                
        header('Content-Type: application/json');
        echo json_encode($response);
        die();

    }
    

    
    // aca deberia validar el usuario y clave recivida.








// Enviar la respuesta en formato JSON
header('Content-Type: application/json');
echo json_encode($response);

// especial