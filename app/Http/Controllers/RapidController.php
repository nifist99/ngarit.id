<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class RapidController extends Controller
{
    public function rapid($id){
        
        $data['data']=DB::table('corona')->where('nik',$id)->first();
        return view('rapid',$data);
    }
    
      public function rapid2($id){
        
        $data['data']=DB::table('corona')->where('nik',$id)->first();
        $data['logo']=DB::table('logo')->where('nama','melina')->first();
        return view('rapid2',$data);
    }
}
