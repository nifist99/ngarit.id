<?php namespace App\Http\Controllers;

	use Session;
	use Request;
	use DB;
	use CRUDBooster;

	class AdminDataAnalisisPakanVersi2Controller extends \crocodicstudio\crudbooster\controllers\CBController {

	    public function cbInit() {

			# START CONFIGURATION DO NOT REMOVE THIS LINE
			$this->title_field = "nama";
			$this->limit = "20";
			$this->orderby = "id,desc";
			$this->global_privilege = false;
			$this->button_table_action = true;
			$this->button_bulk_action = true;
			$this->button_action_style = "button_icon";
			$this->button_add = true;
			$this->button_edit = true;
			$this->button_delete = true;
			$this->button_detail = true;
			$this->button_show = true;
			$this->button_filter = true;
			$this->button_import = false;
			$this->button_export = false;
			$this->table = "data_analisis_pakan";
			# END CONFIGURATION DO NOT REMOVE THIS LINE

			# START COLUMNS DO NOT REMOVE THIS LINE
			$this->col = [];
			$this->col[] = ["label"=>"Nama","name"=>"nama"];
			$this->col[] = ["label"=>"Tgl","name"=>"tgl"];
			$this->col[] = ["label"=>"Total Ternak","name"=>"total_ternak"];
			$this->col[] = ["label"=>"Berat Badan","name"=>"berat_badan"];
			$this->col[] = ["label"=>"Kategori Nutrisi","name"=>"id_kategori_nutrisi","join"=>"kategori_nutrisi,id"];
			$this->col[] = ["label"=>"Users","name"=>"id_users","join"=>"users,name"];
			# END COLUMNS DO NOT REMOVE THIS LINE

			# START FORM DO NOT REMOVE THIS LINE
			$this->form = [];
			$this->form[] = ['label'=>'Nama','name'=>'nama','type'=>'textarea','validation'=>'required|string|min:5|max:5000','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Tgl','name'=>'tgl','type'=>'date','validation'=>'required|date','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Total Ternak','name'=>'total_ternak','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Berat Badan','name'=>'berat_badan','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Kategori Nutrisi','name'=>'id_kategori_nutrisi','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'kategori_nutrisi,id'];
			$this->form[] = ['label'=>'Users','name'=>'id_users','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'users,name'];
			# END FORM DO NOT REMOVE THIS LINE

			# OLD START FORM
			//$this->form = [];
			//$this->form[] = ['label'=>'Nama','name'=>'nama','type'=>'textarea','validation'=>'required|string|min:5|max:5000','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Tgl','name'=>'tgl','type'=>'date','validation'=>'required|date','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Total Ternak','name'=>'total_ternak','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Berat Badan','name'=>'berat_badan','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Kategori Nutrisi','name'=>'id_kategori_nutrisi','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'kategori_nutrisi,id'];
			//$this->form[] = ['label'=>'Users','name'=>'id_users','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'users,name'];
			# OLD END FORM

			/* 
	        | ---------------------------------------------------------------------- 
	        | Sub Module
	        | ----------------------------------------------------------------------     
			| @label          = Label of action 
			| @path           = Path of sub module
			| @foreign_key 	  = foreign key of sub table/module
			| @button_color   = Bootstrap Class (primary,success,warning,danger)
			| @button_icon    = Font Awesome Class  
			| @parent_columns = Sparate with comma, e.g : name,created_at
	        | 
	        */
	        $this->sub_module = array();


	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add More Action Button / Menu
	        | ----------------------------------------------------------------------     
	        | @label       = Label of action 
	        | @url         = Target URL, you can use field alias. e.g : [id], [name], [title], etc
	        | @icon        = Font awesome class icon. e.g : fa fa-bars
	        | @color 	   = Default is primary. (primary, warning, succecss, info)     
	        | @showIf 	   = If condition when action show. Use field alias. e.g : [id] == 1
	        | 
	        */
	        $this->addaction = array();


	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add More Button Selected
	        | ----------------------------------------------------------------------     
	        | @label       = Label of action 
	        | @icon 	   = Icon from fontawesome
	        | @name 	   = Name of button 
	        | Then about the action, you should code at actionButtonSelected method 
	        | 
	        */
	        $this->button_selected = array();

	                
	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add alert message to this module at overheader
	        | ----------------------------------------------------------------------     
	        | @message = Text of message 
	        | @type    = warning,success,danger,info        
	        | 
	        */
	        $this->alert        = array();
	                

	        
	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add more button to header button 
	        | ----------------------------------------------------------------------     
	        | @label = Name of button 
	        | @url   = URL Target
	        | @icon  = Icon from Awesome.
	        | 
	        */
	        $this->index_button = array();



	        /* 
	        | ---------------------------------------------------------------------- 
	        | Customize Table Row Color
	        | ----------------------------------------------------------------------     
	        | @condition = If condition. You may use field alias. E.g : [id] == 1
	        | @color = Default is none. You can use bootstrap success,info,warning,danger,primary.        
	        | 
	        */
	        $this->table_row_color = array();     	          

	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | You may use this bellow array to add statistic at dashboard 
	        | ---------------------------------------------------------------------- 
	        | @label, @count, @icon, @color 
	        |
	        */
	        $this->index_statistic = array();



	        /*
	        | ---------------------------------------------------------------------- 
	        | Add javascript at body 
	        | ---------------------------------------------------------------------- 
	        | javascript code in the variable 
	        | $this->script_js = "function() { ... }";
	        |
	        */
	        $this->script_js = NULL;


            /*
	        | ---------------------------------------------------------------------- 
	        | Include HTML Code before index table 
	        | ---------------------------------------------------------------------- 
	        | html code to display it before index table
	        | $this->pre_index_html = "<p>test</p>";
	        |
	        */
	        $this->pre_index_html = null;
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Include HTML Code after index table 
	        | ---------------------------------------------------------------------- 
	        | html code to display it after index table
	        | $this->post_index_html = "<p>test</p>";
	        |
	        */
	        $this->post_index_html = null;
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Include Javascript File 
	        | ---------------------------------------------------------------------- 
	        | URL of your javascript each array 
	        | $this->load_js[] = asset("myfile.js");
	        |
	        */
	        $this->load_js = array();
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Add css style at body 
	        | ---------------------------------------------------------------------- 
	        | css code in the variable 
	        | $this->style_css = ".style{....}";
	        |
	        */
	        $this->style_css = NULL;
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Include css File 
	        | ---------------------------------------------------------------------- 
	        | URL of your css each array 
	        | $this->load_css[] = asset("myfile.css");
	        |
	        */
	        $this->load_css = array();
	        
	        
	    }


	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for button selected
	    | ---------------------------------------------------------------------- 
	    | @id_selected = the id selected
	    | @button_name = the name of button
	    |
	    */
	    public function actionButtonSelected($id_selected,$button_name) {
	        //Your code here
	            
	    }


	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate query of index result 
	    | ---------------------------------------------------------------------- 
	    | @query = current sql query 
	    |
	    */
	    public function hook_query_index(&$query) {
	        //Your code here
	            
	    }

	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate row of index table html 
	    | ---------------------------------------------------------------------- 
	    |
	    */    
	    public function hook_row_index($column_index,&$column_value) {	        
	    	//Your code here
	    }

	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate data input before add data is execute
	    | ---------------------------------------------------------------------- 
	    | @arr
	    |
	    */
	    public function hook_before_add(&$postdata) {        
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after add public static function called 
	    | ---------------------------------------------------------------------- 
	    | @id = last insert id
	    | 
	    */
	    public function hook_after_add($id) {        
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate data input before update data is execute
	    | ---------------------------------------------------------------------- 
	    | @postdata = input post data 
	    | @id       = current id 
	    | 
	    */
	    public function hook_before_edit(&$postdata,$id) {        
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after edit public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_after_edit($id) {
	        //Your code here 

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command before delete public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_before_delete($id) {
	        //Your code here
	        DB::table('data_combine_bahan_ternak')->where('id_analis',$id)->delete();

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after delete public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_after_delete($id) {
	        //Your code here

	    }
	    
	     public function getDelete_sumber($id)
	     {
	      $cek=DB::table('data_combine_bahan_ternak')->where('id',$id)->delete();   
	         if($cek !=null) {				
		    $res = redirect()->back()->with(["message"=>"Succesfully Delete Data",'message_type'=>'success'])->withInput();
		    }else{
		    $res = redirect()->back()->with(["message"=>"Error Delete Data",'message_type'=>'warning'])->withInput();
		    	}
		    		\Session::driver()->save();
		    	$res->send();
		    	exit();
	     }
	    
	     public function getIndex() {
  //First, Add an auth
   if(!CRUDBooster::isView()) CRUDBooster::redirect(CRUDBooster::adminPath(),trans('crudbooster.denied_access'));
   
   //Create your own query 
   $data = [];
   $data['page_title'] = 'Analisis Pakan';
   $id=CRUDBooster::myId();
   $data['energi']=DB::table('bahan_pakan')
   ->where('sumber','sumber energi')
   ->get();
   
     $data['serat']=DB::table('bahan_pakan')
   ->where('sumber','sumber serat')
   ->get();
   
     $data['protein']=DB::table('bahan_pakan')
   ->where('sumber','sumber protein')
   ->get();
   
     $data['mineral']=DB::table('bahan_pakan')
   ->where('sumber','sumber mineral')
   ->get();
   
   $data['kebutuhan_nutrisi']=DB::table('kebutuhan_nutrisi')->get();
   $data['result']=DB::table('data_analisis_pakan')
   ->where('data_analisis_pakan.id_users',$id)
   ->where('data_analisis_pakan.versi','v2')
   ->join('kebutuhan_nutrisi','data_analisis_pakan.id_kategori_nutrisi','=','kebutuhan_nutrisi.id')
   ->select('data_analisis_pakan.*','kebutuhan_nutrisi.nama as kebutuhan_nutrisi','kebutuhan_nutrisi.berat_badan as bb')
   ->orderby('data_analisis_pakan.id','desc')->paginate(10);
    
   //Create a view. Please use `view` method instead of view method from laravel.
   return $this->view('admin.admin_analisis_pakanv2',$data);
}

public function postSimpan(){
    $data['nama']=g('nama');
    $data['tgl']=g('tgl');
    $data['versi']='v2';
    $data['berat_badan']=g('berat_badan');
    $data['total_ternak']=g('total_ternak');
    $data['id_kategori_nutrisi']=g('kebutuhan_nutrisi');
    $data['id_users']=CRUDBooster::myId();
    $data['created_at']=date('Y-m-d');
    $data['lama_perawatan']=g('lama_perawatan');
    $id=DB::table('data_analisis_pakan')->insertGetId($data);
  
     if($id !=null) {				
		    $res = redirect()->back()->with(["message"=>"Succesfully Add Data",'message_type'=>'success'])->withInput();
		    }else{
		    $res = redirect()->back()->with(["message"=>"Error add Data",'message_type'=>'warning'])->withInput();
		    	}
		    		\Session::driver()->save();
		    	$res->send();
		    	exit();
    
    
}

public function postSimpansumber(){
       $list['id_bahan']=g('sumber');
       $list['id_users']=CRUDBooster::myId();
       $list['created_at']=date('Y-m-d');
       $list['id_analis']=g('id_analis');
       $list['harga']=g('harga');
       $list['jumlah']=g('jumlah');
       $list['kondisi']=g('kondisi');
       $list['versi']="v2";
       $list['sumber']=g('name');
        $cek=DB::table('data_combine_bahan_ternak')->insert($list);
        if($cek !=null) {				
		    $res = redirect()->back()->with(["message"=>"Succesfully Add Data",'message_type'=>'success'])->withInput();
		    }else{
		    $res = redirect()->back()->with(["message"=>"Error add Data",'message_type'=>'warning'])->withInput();
		    	}
		    		\Session::driver()->save();
		    	$res->send();
		    	exit();
}

public function getDetail($id) {
  //Create an Auth
  if(!CRUDBooster::isRead() && $this->global_privilege==FALSE || $this->button_edit==FALSE) {    
    CRUDBooster::redirect(CRUDBooster::adminPath(),trans("crudbooster.denied_access"));
  }
  
  $data = [];
  $data['id_analis']=$id;
  $data['page_title'] = 'Detail Analisis Versi2';
    $id_users=CRUDBooster::myId();
    
   $data['energi']=DB::table('bahan_pakan')
   ->where('sumber','sumber energi')
   ->get();
   
     $data['serat']=DB::table('bahan_pakan')
   ->where('sumber','sumber serat')
   ->get();
   
     $data['protein']=DB::table('bahan_pakan')
   ->where('sumber','sumber protein')
   ->get();
   
     $data['mineral']=DB::table('bahan_pakan')
   ->where('sumber','sumber mineral')
   ->get();
   
    $data['tabel_protein']=DB::table('data_combine_bahan_ternak')
    ->where('id_analis',$id)
    ->where('sumber','sumber protein')
    ->get();
    
     $data['tabel_energi']=DB::table('data_combine_bahan_ternak')
    ->where('id_analis',$id)
    ->where('sumber','sumber energi')
    ->get();
    
     $data['tabel_mineral']=DB::table('data_combine_bahan_ternak')
    ->where('id_analis',$id)
    ->where('sumber','sumber mineral')
    ->get();
    
     $data['tabel_serat']=DB::table('data_combine_bahan_ternak')
    ->where('id_analis',$id)
    ->where('sumber','sumber serat')
    ->get();
    
//   detail data

  $data['parameter']=DB::table('data_analisis_pakan')->where('data_analisis_pakan.id',$id)
  ->join('kebutuhan_nutrisi','data_analisis_pakan.id_kategori_nutrisi','=','kebutuhan_nutrisi.id')
   ->select('data_analisis_pakan.*','kebutuhan_nutrisi.nama as kebutuhan','kebutuhan_nutrisi.berat_badan as bb')
  ->first();
  
  $data['kebutuhan_nutrisi']=DB::table('kebutuhan_nutrisi')
  ->where('id',$data['parameter']->id_kategori_nutrisi)->first();
  
  
//   tampilan pakan kering
  $bahan=DB::table('data_combine_bahan_ternak')->where('id_analis',$id)->get();

  $pakan=[];
  foreach($bahan as $key){
      $cek=DB::table('bahan_pakan')->where('id',$key->id_bahan)->first();
      $list['nama']=$cek->bahan;
      $list['bk']=$cek->bahan_kering;
      $list['sk']=$cek->serat_kasar;
      $list['pk']=$cek->protein_kasar;
      $list['tdn']=$cek->tdn;
      $list['sumber']=$cek->sumber;
      $list['c']=$cek->calcicum;
      $list['p']=$cek->pospor;
      $list['harga']=$key->harga;
      $list['jumlah']=$key->jumlah;
      $list['kondisi']=$key->kondisi;
      $list['sumber']=$key->sumber;
      
      array_push($pakan,$list);
  }
  
  $data['bahan_pakan']=$pakan;
  
  $data['total_row']=DB::table('data_combine_bahan_ternak')->where('id_analis',$id)->count();
   
 
  return $this->view('admin.admin_detail_analisisv2',$data);
}


public function getEdit($id) {
  //Create an Auth
  if(!CRUDBooster::isRead() && $this->global_privilege==FALSE || $this->button_edit==FALSE) {    
    CRUDBooster::redirect(CRUDBooster::adminPath(),trans("crudbooster.denied_access"));
  }
  
  $data = [];
  $data['id_analis']=$id;
  $data['page_title'] = 'Detail Analisis Versi2';
  $id_users=CRUDBooster::myId();
  
  $data['id']=$id;
     $data['kebutuhan_nutrisi']=DB::table('kebutuhan_nutrisi')->get();
   $data['parameter']=DB::table('data_analisis_pakan')->where('data_analisis_pakan.id',$id)
  ->join('kebutuhan_nutrisi','data_analisis_pakan.id_kategori_nutrisi','=','kebutuhan_nutrisi.id')
   ->select('data_analisis_pakan.*','kebutuhan_nutrisi.nama as kebutuhan','kebutuhan_nutrisi.berat_badan as bb')
  ->first();
 
  return $this->view('admin.admin_edit_analisisv2',$data);
}

public function postEditdata(){
    $data['nama']=g('nama');
    $data['tgl']=g('tgl');
    $data['id']=g('id');
    $data['versi']='v2';
    $data['berat_badan']=g('berat_badan');
    $data['total_ternak']=g('total_ternak');
    $data['id_kategori_nutrisi']=g('kebutuhan_nutrisi');
    $data['id_users']=CRUDBooster::myId();
    $data['created_at']=date('Y-m-d');
    $data['lama_perawatan']=g('lama_perawatan');
    $id=DB::table('data_analisis_pakan')->where('id',g('id'))
    ->update($data);
  
     if($id !=null) {				
		    $res = redirect()->back()->with(["message"=>"Succesfully Edit Data",'message_type'=>'success'])->withInput();
		    }else{
		    $res = redirect()->back()->with(["message"=>"Error add Edit",'message_type'=>'warning'])->withInput();
		    	}
		    		\Session::driver()->save();
		    	$res->send();
		    	exit();
    
    
}


	    //By the way, you can still create your own method in here... :) 


	}