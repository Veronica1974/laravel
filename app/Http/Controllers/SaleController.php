<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;
use App\Sale;

class SaleController extends Controller
{
  protected $sale;
    
    public function __construct(){
        $this->sale = new Sale();
    }
    
    public function index(){
       $data =  $this->sale->all();
       return view('sale', ['saledata' => $data]);
    }
    
    public function store(Request $request) {
        $arr_param = array();
        $this->sale->product_name = $arr_param['product_name'] = $request['product_name'];
        $this->sale->sale_price = $arr_param['sale_price'] = $request['sale_price']; 
        $this->sale->currency = $arr_param['currency'] = $request['currency'];
        $this->sale->datetime = Carbon::now()->toDateTimeString();
        $response_data = $this->sale->paymysent($arr_param);
        if(empty($response_data['error']) && !$response_data['data']->status_code){
            $this->sale->payme_sale_code  = $response_data['data']->payme_sale_code;
            $this->sale->sale_url  = $response_data['data']->sale_url;
           
            $this->sale->save(); 
            return redirect('/');
            
        }else if(!empty($response_data['error'])){
            $data = $response_data['error'];
            return view('sale', ['errors' => $data]);
         }else if (!empty($response_data['data'])){
             $data = $response_data['data']->status_error_details;
             return view('sale', ['errors' => $data]);
         }
      
    }
    
}
