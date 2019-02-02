<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    //
    private $seller_payme_id = "MPL14985-68544Z1G-SPV5WK2K-0WJWHC7N";
    protected  $externalurl =    "https://preprod.paymeservice.com/api/generate-sale";
    const INSTALLMENTS = "1"; // Constant value
    const LANGUAGE  =  "en"; // Constant value
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    protected $table = 'sales';
    protected $fillable = ['product_name', 'sale_price','currency', 'datetime', 'payme_sale_code', ' sale_url'];
    public $timestamps = false;
   
    public function __construct() {
        
    }
    
   
    
    public function paymysent($param = array()) {
        $response['data'] = array();
        $response['error'] ="";
       $arr = array(
            "seller_payme_id" => $this->seller_payme_id, // Use this static ID
            "installments" => self::INSTALLMENTS, // Constant value
            "language" => self::LANGUAGE // Constant value
        );
        $arr =  array_merge($arr, $param);
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->externalurl,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30000,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($arr),
            CURLOPT_HTTPHEADER => array(
                // Set here requred headers
                "accept: */*",
                "accept-language: en-US,en;q=0.8",
                "content-type: application/json",
            ),
        ));
        
        $response_data = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
        
        if ($err) {
            $response['error'] = "cURL Error #:" . $err;
           
        } else {
            $response['data'] = json_decode($response_data);
          
        }
        return $response;
    }
    
    
}
