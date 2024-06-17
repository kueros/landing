<?php


class  iflow {
    private $UsrApi;
    private $Psw_API;

    public function __construct($UsrApi, $Psw_API)
                {
                    $this->UsrApi = $UsrApi;
                    $this->Psw_API = $Psw_API;
                    
                }


    
    
    public  function get_api_token() {
      
       
          /**********************************************************************************/
          /*  Obtengo el token de la api */
          /**********************************************************************************/
                            
                            $URL = ("http://api.iflow21.com/api/login");
                            $curl0 = curl_init();
                            curl_setopt_array($curl0, array(
                            CURLOPT_URL => "$URL",
                            CURLOPT_RETURNTRANSFER => true,
                            CURLOPT_ENCODING => "",
                            CURLOPT_MAXREDIRS => 10,
                            CURLOPT_TIMEOUT => 0,
                            CURLOPT_FOLLOWLOCATION => true,
                            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                            CURLOPT_CUSTOMREQUEST => "POST",
                            CURLOPT_POSTFIELDS =>"{\"_username\":\"".$this -> UsrApi."\",\"_password\":\"".$this ->Psw_API."\"}",
                            CURLOPT_HTTPHEADER => array(
                                "Content-Type: application/json",
                                "Cookie: SERVERID=api_iflow21"
                            ),
                            ));

                            $response = curl_exec($curl0);
                            curl_close($curl0);

                   
                            

    return $response;
        	
    }

    public function get_status_order($tokeapi,$shipment_id) {
            
    
           // $URL = ("https://api.iflow21.com/api/order/state/".$trackid);
          $URL = ("https://api.iflow21.com/api/shipping/states/".$shipment_id."/".$tokeapi);
            
         
            $curl = curl_init();
                        curl_setopt_array($curl, array(
                            CURLOPT_URL => "$URL",
                            CURLOPT_RETURNTRANSFER => true,
                            CURLOPT_ENCODING => "",
                            CURLOPT_MAXREDIRS => 10,
                            CURLOPT_TIMEOUT => 0,
                            CURLOPT_FOLLOWLOCATION => true,
                            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                            CURLOPT_CUSTOMREQUEST => "GET",
                            CURLOPT_HTTPHEADER => array("Authorization: Bearer $tokeapi"),
                            ));
                        $response = curl_exec($curl);
                        curl_close($curl);
                        
                        
                        $order_status = json_decode($response,true);
						
						 
                return $order_status;


    }

    public  function get_seller_orders($api_token) {

                $curl1 = curl_init(); 

                curl_setopt_array($curl1, array(
                CURLOPT_URL => 'https://api.iflow21.com/api/v1/client/shipping/?limit=100',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json',
                    'Authorization: Bearer '.$api_token,
                    'Cookie: Cookie_1=value; SERVERID=api_iflow21_n2'
                ),
                ));

                $response = curl_exec($curl1);
                curl_close($curl1);

                $ordenes_seller = json_decode($response,true);
                
                return $ordenes_seller;

    }

}

class  Validar {

    private $ord_id;
    private $ship_id;

    public function __construct($ord_id, $ship_id)
                {
                    $this->ord_id = $ord_id;
                    $this->ship_id = $ship_id;
                    
                }

    public  function valid_order(){
        require 'cnx_sql.php';

        $count = 0;
        $sql = "Select `ship_id` FROM `ns_orders` WHERE `ship_id` = '$this->ship_id'; ";

            $statement = $pdo->prepare($sql);
            $statement->execute();
            $count = $statement->rowCount();

            $result  = ($count>0)?'SI':'NO';
            return $result;

    }

    public  function valid_order_status($status){

        require 'cnx_sql.php';

            $sql0 = "Select `ship_id` FROM `cs_orders` WHERE `ship_id` = '$this->ship_id' and `new_state` = '$status' ;";

            $statement = $pdo->prepare($sql0);
            $statement->execute();
            $count = $statement->rowCount();

            $result  = ($count > 0) ? 'SI':'NO';

            return $result;
	
    }
            
            }

            class  newsan {
                private $ord_id;
                private $ship_id;
                private $json;
                
                public function __construct($ord_id, $ship_id,$json )
                            {
                                $this->ord_id = $ord_id;
                                $this->ship_id = $ship_id;
                                $this->json = $json;
                                
                            }
                public function post_status_newsan() {
                  

                    $fechalog = gmDate("Y-m-d\TH:i:s");
                    $key_post = 'feff20170bdab3b5496bbe626dc8bbb1';
                    $usr_post = 'IFLOW'; 
					                    
                    //$url_post = 'https://apitest.newsan.com.ar/api/notifications/'.$usr_post;
					$url_post = 'https://api.newsan.com.ar/api/notifications/'.$usr_post;

                    
                            $curl = curl_init();
                            curl_setopt_array($curl, array(
                            CURLOPT_URL => $url_post,
                            CURLOPT_RETURNTRANSFER => true,
                            CURLOPT_MAXREDIRS => 10,
                            CURLOPT_TIMEOUT => 0,
                            CURLOPT_FOLLOWLOCATION => true,
                            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                            CURLOPT_CUSTOMREQUEST => 'POST',
                            CURLOPT_POSTFIELDS =>$this->json,
                            CURLOPT_HTTPHEADER => array(
                                'auth-key: '.$key_post ,
                                '\'Content-Type: application/json',
                                'Content-Type: text/plain'
                            ),
                            ));
                                                        
                            $response = curl_exec($curl);
                            curl_close($curl);

                            
                    $result = json_decode($response,true);
                    return $result ;
                }
                        }

function eliminar_acentos($cadena){
		
    //Reemplazamos la A y a
    $cadena = str_replace(
    array('Á', 'À', 'Â', 'Ä', 'á', 'à', 'ä', 'â', 'ª'),
    array('A', 'A', 'A', 'A', 'a', 'a', 'a', 'a', 'a'),
    $cadena
    );

    //Reemplazamos la E y e
    $cadena = str_replace(
    array('É', 'È', 'Ê', 'Ë', 'é', 'è', 'ë', 'ê'),
    array('E', 'E', 'E', 'E', 'e', 'e', 'e', 'e'),
    $cadena );

    //Reemplazamos la I y i
    $cadena = str_replace(
    array('Í', 'Ì', 'Ï', 'Î', 'í', 'ì', 'ï', 'î'),
    array('I', 'I', 'I', 'I', 'i', 'i', 'i', 'i'),
    $cadena );

    //Reemplazamos la O y o
    $cadena = str_replace(
    array('Ó', 'Ò', 'Ö', 'Ô', 'ó', 'ò', 'ö', 'ô'),
    array('O', 'O', 'O', 'O', 'o', 'o', 'o', 'o'),
    $cadena );

    //Reemplazamos la U y u
    $cadena = str_replace(
    array('Ú', 'Ù', 'Û', 'Ü', 'ú', 'ù', 'ü', 'û'),
    array('U', 'U', 'U', 'U', 'u', 'u', 'u', 'u'),
    $cadena );

    //Reemplazamos la N, n, C y c
    $cadena = str_replace(
    array('Ñ', 'ñ', 'Ç', 'ç'),
    array('N', 'n', 'C', 'c'),
    $cadena
    );
    
    return $cadena;
}


function formato_psd($fecha) {
    // Crear un objeto DateTime a partir de la cadena de fecha y hora
    $date = DateTime::createFromFormat('Y-m-d H:i:s.u', $fecha);
    // Verificar si la fecha es válida
    if ($date === false) {
        return "Formato de entrada incorrecto";
    }
    // Formatear la fecha al nuevo formato deseado
    return $date->format('Y-m-d H:i');
}




?>