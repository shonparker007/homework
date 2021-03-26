<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class BarCodeController extends Controller
{
    
    public function index()
    {
      return view('barcode');
    }


    public function array_loop($var_search,$arr,$arr_data){
        foreach ($arr_data as $key => $val) {
            if ($val[$arr] === $var_search) {
                return $var_search;
            }
        }
        return null;
    }

public function barcodeSearch(Request $request){


$barC=explode("-",$request->barco);


$ba=$barC[0];

   if(substr(trim($barC[1]),-5)>1){   

   
    $data=[
        [        
        'Brands' => 'CX01',
        'category' =>  'G01',
        'Lot' => 'L1',           
        'total' =>  str_pad(1,3,0,STR_PAD_LEFT) 
        ],[
     
        'Brands' => 'CX02',
        'category' =>  'G02',
        'Lot' => 'L2',           
        'total' =>  str_pad(2,3,0,STR_PAD_LEFT) 
        ],[       
        'Brands' => 'CX03',
        'category' =>  'G03',
        'Lot' => 'L1',           
        'total' => str_pad(4,3,0,STR_PAD_LEFT) 
        ]];


        $ab=$this->array_loop($ba,'Brands',$data);
        $b=$this->array_loop(substr(trim($barC[1]),0,3),'category',$data);
        $c=$this->array_loop(substr(trim($barC[1]),3,2),'Lot',$data);       


        $code=(isset($ab) and isset($b) and isset($c))?$ab."-".$b.$c.substr(trim($barC[1]),-5):"";
     
  
        

 $data=['statusCode'=>'error','message'=>$code];
        $codeStatus=200;

   }else{

    $data=['statusCode'=>'error','message'=>'ไม่พบข้อมูล'];
    $codeStatus=404;
   }

    return view('barcode',['code'=>$code,$data]);
}


    public function barcode(Request $request){



        $data=[
            [
            'Brands' => 'CX01',
            'category' =>  'G01',
            'Lot' => 'L1',           
            'total' => 1 ,
            ],[
            'Brands' => 'CX02',
            'category' =>  'G02',
            'Lot' => 'L2',           
            'total' => 1,
            ],[
            'Brands' => 'CX03',
            'category' =>  'G03',
            'Lot' => 'L1',           
            'total' => 3,
            ]];


            $code=$request->Brands."-".$request->category.$request->Lot.$request->total;
    
         return view('barcode',['code'=>$code,'data'=>json_encode($data)]);
       
    }
    
}
