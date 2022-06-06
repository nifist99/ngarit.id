<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use CRUDBooster;
use Hash;
use Validator;
use Illuminate\Support\MessageBag;

class PortofolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.main-view');
    }
    
     public function getMarkermitra(){
         
         $id=CRUDBooster::myId();
         $role=DB::table('cms_privileges')->where('name','mitra')->first();
         if(CRUDBooster::myPrivilegeName() == "peternak"){
            
        $mitra = DB::table('cms_users')
        ->where('id_created_by',$id)
        ->where('id_cms_privileges',$role->id)
        ->get();
         }else{
         $mitra = DB::table('cms_users')->where('id_cms_privileges',$role->id)
        ->get();
         }
        
        $result = array();
        $marker = asset('marker.jpg');
        foreach ($mitra as $item) {
            $result[] =  ['id'=>$item->id,'latitude'=>$item->lat,'longitude'=>$item->long,'name'=>$item->name,'marker'=>$marker];
        }
        return response()->json(['items'=>$result]);
        
     }
     
       public function getMarkerinvestor(){
           $id=CRUDBooster::myId();
           $role=DB::table('cms_privileges')
                ->where('name','investor')->first();
           if(CRUDBooster::myPrivilegeName() == "peternak"){
              
        $mitra = DB::table('cms_users')
        ->where('id_created_by',$id)
        ->where('id_cms_privileges',$role->id)
        ->get();
           }else{
        $mitra = DB::table('cms_users')
        ->where('id_cms_privileges',$role->id)
        ->get();
           }
        
        $result = array();
        $marker = asset('user.png');
        foreach ($mitra as $item) {
            $result[] =  ['id'=>$item->id,'latitude'=>$item->lat,'longitude'=>$item->long,'name'=>$item->name,'marker'=>$marker];
        }
        return response()->json(['items'=>$result]);
        
     }
    
    public function getMarkerhome(){
         $id=CRUDBooster::myId();
        $role_mitra=DB::table('cms_privileges')->where('name','mitra')->first();
        $role_investor=DB::table('cms_privileges')
        ->where('name','investor')->first();
         
         if(CRUDBooster::myPrivilegeName() == "peternak"){
        $mitra = DB::table('cms_users')
        ->where('id_created_by',$id)
        ->where('id_cms_privileges',$role_mitra->id)
        ->get();
        $investor = DB::table('cms_users')
        ->where('id_created_by',$id)
        ->where('id_cms_privileges',$role_investor->id)
        ->get();
         }else{
             $mitra = DB::table('cms_users')
             ->where('id_cms_privileges',$role_mitra->id)
        ->get();
        $investor =DB::table('cms_users')
        ->where('id_cms_privileges',$role_investor->id)
        ->get();
         }
        
        $data=[];
        
        foreach($mitra as $key){
            $list["id"]=$key->id;
            $list["lat"]=$key->lat;
            $list["long"]=$key->long;
            $list["name"]=$key->name;
            $list["tgl_join"]=$key->tgl_join;
            $list["image"]=asset('marker.jpg');
            $list["role"]="Mitra Ternak";
            array_push($data,$list);
        }
        
        foreach($investor as $to){
            $list1["id"]=$to->id;
            $list1["lat"]=$to->lat;
            $list1["long"]=$to->long;
            $list1["name"]=$to->name;
            $list1["role"]="Investor";
            $list1["tgl_join"]=$to->tgl_join;
            $list1["image"]=asset('user.png');
            array_push($data,$list1);
        }
        
  
        $result = array();
        foreach ($data as $item) {
            $result[] =  ['id'=>$item['id'],'latitude'=>$item['lat'],'longitude'=>$item['long'],'name'=>$item['name'],'marker'=>$item['image'],'role'=>$item['role']];
        }
        return response()->json(['items'=>$result]);
        
    }
    
    public function getMarker(){
         $id=CRUDBooster::myId();
           $role_investor=DB::table('cms_privileges')
        ->where('name','investor')->first();
        if(CRUDBooster::myPrivilegeName()=="investor"){
         
            $driver = DB::table('data_farm_investor')
           ->where('data_farm_investor.id_investor',$id)
        ->join('cms_users', 'data_farm_investor.id_mitra', '=', 'cms_users.id')
        ->select('data_farm_investor.*', 'cms_users.name')
        ->get(); 
         $marker = asset('marker.jpg');
        }else if(CRUDBooster::myPrivilegeName()=="peternak"){
            
              $driver = DB::table('cms_users')->where('id_created_by',$id)
              ->where('id_cms_privileges',$role_investor->id)
        ->get();
         $marker = asset('user.png');
        }else{
           
              $driver = DB::table('cms_users')
              ->where('id_cms_privileges',$role_investor->id)
        ->get();
         $marker = asset('user.png');
        }
   
        
        $result = array();
       
        foreach ($driver as $item) {
            if (!empty($item->tgl_join)) {
                $sinc = date('D, M Y H:i',strtotime($item->tgl_join));
            }else{
                $sinc = '-';
            }
            $result[] =  ['id'=>$item->id,'latitude'=>$item->lat,'longitude'=>$item->long,'name'=>$item->name,'marker'=>$marker];
        }
        return response()->json(['items'=>$result]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     
    public function destroy($id)
    {
        //
    }
    
    public function register(Request $request){
        
        $request->validate([
             'name' => 'required|string|min:3|max:255',
            'email' => 'required|min:3|max:255|email',
            'hp' => 'required|numeric|min:9',
            'farm' => 'required|string|min:3|max:255',
            'password' => 'required|min:3|max:255'
 
            ], [
 
            'required' => ':attribute wajib diisi cuy!!!',
            'email' => ':attribute wajib diisi email yang bener cuy!!!',
            'numeric' => ':attribute wajib diisi nomer hp yang bener cuy!!!',
            'min' => ':attribute harus diisi minimal :min karakter ya cuy!!!',
            'max' => ':attribute harus diisi maksimal :max karakter ya cuy!!!'
 
            ]);

        $role=DB::table('cms_privileges')->where('name','peternak')->first();
        
        $cek=DB::table('cms_users')->where('email',$request->email)->first();
        if($cek==null){
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['hp']=$request->hp;
        $data['farm']=$request->farm;
        $data['password']=Hash::make($request->password);
        $data['id_cms_privileges']=$role->id;
        $data['status']='not active';
        
        
        $id=DB::table('cms_users')->insertGetId($data);
        $data_send['url']   = url('activasi/'.$id);
       
        $send       = CRUDBooster::sendEmail(['to'=>$request->email,'data'=>$data_send,'template'=>'registrasi']);
        
       return view('frontend.confirmasi-view')->with('message', 'Selamat !!!');
        
        }else{
             return redirect()->back()->with('message','Email telah terdaftar, pakai email lain untuk melanjutkan registrasi');
        }
    


    }
    
    public function registrasiPage(){
        return view('frontend.register-view');
    }
    
      public function teamPage(){
          $data['data']=DB::table('our_teams')
           ->orderBy('id', 'desc')
          ->get();
        return view('frontend.main-our_team',$data);
    }
    
    public function approve($id){
        $data['status']="active";
        DB::table('cms_users')->where('id',$id)->update($data);
        return redirect('admin/login')->with('message', 'Selamat user anda telah active !!!');
    }
    
        public function detail_ternak($kode){
          $data['row']=DB::table('data_farm')->where('kode',$kode)->first();
          
        $data['kesehatan']=DB::table('kesehatan_ternak')
        ->where('id_kambing',$data['row']->id)->get();
        $data['adg']=DB::table('adg_ternak')
        ->where('id_kambing',$data['row']->id)->get();
        
        $data['jadwal']=DB::table('jadwal_farm')
        ->where('id_kambing',$data['row']->id)->get();
        
        $data['susu']=DB::table('susu_ternak')
        ->where('id_ternak',$data['row']->id)->get();
          
        return view('frontend.detail_ternak',$data);
    }
    
            public function detail_ternak_mitra($kode){
          $data['row']=DB::table('data_farm_mitra')->where('kode',$kode)->first();
          
        $data['kesehatan']=DB::table('kesehatan_ternak_mitra')
        ->where('id_kambing',$data['row']->id)->get();
        $data['adg']=DB::table('adg_ternak_mitra')
        ->where('id_kambing',$data['row']->id)->get();
        
        $data['jadwal']=DB::table('jadwal_farm_mitra')
        ->where('id_kambing',$data['row']->id)->get();
        
        $data['susu']=DB::table('susu_ternak_mitra')
        ->where('id_ternak',$data['row']->id)->get();
          
        return view('frontend.detail_ternak',$data);
    }
    
            public function detail_ternak_investor($kode){
          $data['row']=DB::table('data_farm_investor')->where('kode',$kode)->first();
          
        $data['kesehatan']=DB::table('kesehatan_ternak_investor')
        ->where('id_kambing',$data['row']->id)->get();
        $data['adg']=DB::table('adg_ternak_investor')
        ->where('id_kambing',$data['row']->id)->get();
        
        $data['jadwal']=DB::table('jadwal_farm_investor')
        ->where('id_kambing',$data['row']->id)->get();
        
        $data['susu']=DB::table('susu_ternak_investor')
        ->where('id_ternak',$data['row']->id)->get();
        
         $data['investor']=DB::table('cms_users')
         ->where('id',$data['row']->id_investor)
          ->first();
          
          $data['mitra']=DB::table('cms_users')
          ->where('id',$data['row']->id_mitra)
          ->first();
          
        return view('frontend.detail_ternak',$data);
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}
