<?php namespace App\Http\Controllers;

	use Session;
	use Request;
	use DB;
	use CRUDBooster;

	class AdminDataFarm58Controller extends \crocodicstudio\crudbooster\controllers\CBController {

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
			$this->button_show = false;
			$this->button_filter = true;
			$this->button_import = false;
			$this->button_export = false;
			$this->table = "data_farm";
			# END CONFIGURATION DO NOT REMOVE THIS LINE

			# START COLUMNS DO NOT REMOVE THIS LINE
			$this->col = [];
			$this->col[] = ["label"=>"Kode","name"=>"kode"];
			$this->col[] = ["label"=>"Nama","name"=>"nama"];
			$this->col[] = ["label"=>"Ttl","name"=>"ttl"];
			$this->col[] = ["label"=>"Jenis Kelamin","name"=>"jenis_kelamin"];
			$this->col[] = ["label"=>"Jenis","name"=>"jenis"];
			$this->col[] = ["label"=>"Kondisi","name"=>"kondisi"];
			$this->col[] = ["label"=>"Posisi","name"=>"posisi"];
			# END COLUMNS DO NOT REMOVE THIS LINE

			# START FORM DO NOT REMOVE THIS LINE
			$this->form = [];
			$this->form[] = ['label'=>'Kode','name'=>'kode','type'=>'textarea','validation'=>'required|string|min:5|max:5000','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Nama','name'=>'nama','type'=>'textarea','validation'=>'required|string|min:5|max:5000','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Ttl','name'=>'ttl','type'=>'textarea','validation'=>'required|string|min:5|max:5000','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Jenis Kelamin','name'=>'jenis_kelamin','type'=>'textarea','validation'=>'required|string|min:5|max:5000','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Jenis','name'=>'jenis','type'=>'textarea','validation'=>'required|string|min:5|max:5000','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Kondisi','name'=>'kondisi','type'=>'textarea','validation'=>'required|string|min:5|max:5000','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Posisi','name'=>'posisi','type'=>'textarea','validation'=>'required|string|min:5|max:5000','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Foto','name'=>'foto','type'=>'upload','validation'=>'required|image|max:3000','width'=>'col-sm-10','help'=>'File types support : JPG, JPEG, PNG, GIF, BMP'];
			$this->form[] = ['label'=>'Jantan','name'=>'id_jantan','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'jantan,id'];
			$this->form[] = ['label'=>'Betina','name'=>'id_betina','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'betina,id'];
			$this->form[] = ['label'=>'Users','name'=>'id_users','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'users,name'];
			$this->form[] = ['label'=>'Mitra','name'=>'id_mitra','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'mitra,id'];
			# END FORM DO NOT REMOVE THIS LINE

			# OLD START FORM
			//$this->form = [];
			//$this->form[] = ["label"=>"Kode","name"=>"kode","type"=>"textarea","required"=>TRUE,"validation"=>"required|string|min:5|max:5000"];
			//$this->form[] = ["label"=>"Nama","name"=>"nama","type"=>"textarea","required"=>TRUE,"validation"=>"required|string|min:5|max:5000"];
			//$this->form[] = ["label"=>"Ttl","name"=>"ttl","type"=>"textarea","required"=>TRUE,"validation"=>"required|string|min:5|max:5000"];
			//$this->form[] = ["label"=>"Jenis Kelamin","name"=>"jenis_kelamin","type"=>"textarea","required"=>TRUE,"validation"=>"required|string|min:5|max:5000"];
			//$this->form[] = ["label"=>"Jenis","name"=>"jenis","type"=>"textarea","required"=>TRUE,"validation"=>"required|string|min:5|max:5000"];
			//$this->form[] = ["label"=>"Kondisi","name"=>"kondisi","type"=>"textarea","required"=>TRUE,"validation"=>"required|string|min:5|max:5000"];
			//$this->form[] = ["label"=>"Posisi","name"=>"posisi","type"=>"textarea","required"=>TRUE,"validation"=>"required|string|min:5|max:5000"];
			//$this->form[] = ["label"=>"Foto","name"=>"foto","type"=>"upload","required"=>TRUE,"validation"=>"required|image|max:3000","help"=>"File types support : JPG, JPEG, PNG, GIF, BMP"];
			//$this->form[] = ["label"=>"Jantan","name"=>"id_jantan","type"=>"select2","required"=>TRUE,"validation"=>"required|integer|min:0","datatable"=>"jantan,id"];
			//$this->form[] = ["label"=>"Betina","name"=>"id_betina","type"=>"select2","required"=>TRUE,"validation"=>"required|integer|min:0","datatable"=>"betina,id"];
			//$this->form[] = ["label"=>"Users","name"=>"id_users","type"=>"select2","required"=>TRUE,"validation"=>"required|integer|min:0","datatable"=>"users,name"];
			//$this->form[] = ["label"=>"Mitra","name"=>"id_mitra","type"=>"select2","required"=>TRUE,"validation"=>"required|integer|min:0","datatable"=>"mitra,id"];
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
	    
	     	    public function getIndex() {
  //First, Add an auth
//   if(!CRUDBooster::isView()) CRUDBooster::redirect(CRUDBooster::adminPath(),trans('crudbooster.denied_access'));
   
   //Create your own query 
   $data = [];
   $data['page_title'] = 'Dashboard Ternak';
    $id=CRUDBooster::myId();
    if(g('tahun')==null){
        $data['tahun']=date('Y');
    }else{
        $data['tahun']=g('tahun');
    }
    
    $ternak=DB::table('jenis_kambing')->get();
    $data['listtahun']=CRUDBooster::tahun();
    
        if(CRUDBooster::myPrivilegeName() == "peternak"){
            
             foreach(CRUDBooster::bulan() as $key){
           $nilai .=DB::table('pengeluaran_farm')
                ->whereMonth('tgl', $key['id'])
                ->whereYear('tgl',$data['tahun'])
                ->where('id_users',CRUDBooster::myId())
                ->sum('harga').",";
                
       }
       
         foreach(CRUDBooster::bulan() as $key){
           $nilai2 .=DB::table('pemasukan_farm')
                ->whereMonth('tgl', $key['id'])
                ->whereYear('tgl',$data['tahun'])
                ->where('id_users',CRUDBooster::myId())
                ->sum('harga').",";
                
       }
       
       foreach(CRUDBooster::jenis_pemeliharaan() as $key1){
           $nilai3 .=DB::table('data_farm')
                ->where('jenis_pemeliharaan', $key1['id'])
                ->where('id_users',CRUDBooster::myId())
                ->count().",";
       }
       
      
       foreach($ternak as $key2){
           $check=DB::table('data_farm')
                ->where('jenis', $key2->id)
                ->where('id_users',CRUDBooster::myId())
                ->count();
                if($check !=null){
                    $jumlah_ternak .=$check.",";
                    $jenis_ternak .="'".$key2->jenis."'".",";
                    $color .="'"."#".dechex(rand(0x000000, 0xFFFFFF))."'".",";
                }
       }
       
        foreach(CRUDBooster::bulan() as $key){
            foreach(CRUDBooster::kategori_pengeluaran() as $key4){
                $spesifik_jumlah =DB::table('pengeluaran_farm')
                ->whereMonth('tgl', $key['id'])
                ->whereYear('tgl',$data['tahun'])
                ->where('jenis_keperluan',$key4['id'])
                ->where('id_users',CRUDBooster::myId())
                ->sum('harga').",";
                
                if($key4['id']=="pakan ternak"){
                    $data['jumlah_pakan'] .=$spesifik_jumlah;
                    
                }else if($key4['id']=="hewan ternak"){
                    $data ['jumlah_hewan'] .=$spesifik_jumlah;
                    
                }else if($key4['id']=="obat ternak"){
                    $data['jumlah_obat'] .=$spesifik_jumlah;
                    
                }else if($key4['id']=="asset ternak"){
                    $data['jumlah_asset'] .=$spesifik_jumlah;
                    
                }else if($key4['id']=="operasional"){
                    $data['jumlah_operasional'] .=$spesifik_jumlah;
                    
                }else{
                    $data['jumlah_gaji'] .=$spesifik_jumlah;
                }
            }
        }
        
         foreach(CRUDBooster::bulan() as $key){
            foreach(CRUDBooster::kategori_pemasukan() as $key5){
                $spesifik_pemasukan =DB::table('pemasukan_farm')
                ->whereMonth('tgl', $key['id'])
                ->whereYear('tgl',$data['tahun'])
                ->where('jenis_pemasukan',$key5['id'])
                ->where('id_users',CRUDBooster::myId())
                ->sum('harga').",";
                 if($key5['id']=="jual pakan ternak"){
                    $data['jual_pakan'] .=$spesifik_pemasukan;
                    
                }else if($key5['id']=="jual hewan ternak"){
                    $data ['jual_hewan'] .=$spesifik_pemasukan;
                    
                }else if($key5['id']=="jual susu ternak"){
                    $data['jual_susu'] .=$spesifik_pemasukan;
                    
                }else if($key5['id']=="jual kotoran"){
                    $data['jual_kotoran'] .=$spesifik_pemasukan;
                    
                }
            }
         }
        
         $data['pengeluaran_bulanan']=$nilai;
         $data['pemasukan_bulanan']=$nilai2;
         $data['jenis_pemeliharaan']=$nilai3;
         $data['jumlah_ternak']=$jumlah_ternak;
         $data['jenis_ternak']=$jenis_ternak;
         $data['color']=$color;
            
            $data['total_pengeluaran'] = DB::table('pengeluaran_farm')
            ->where('id_users',$id)
        ->sum('harga');
        $data['pemasukan_farm'] = DB::table('pemasukan_farm')
        ->where('id_users',$id)
        ->sum('harga');
        
        $data['data'] = DB::table('data_farm')
        ->where('id_users',$id)
        ->count();
        
        $data['jadwal'] = DB::table('jadwal_farm')
         ->join('data_farm', 'jadwal_farm.id_kambing', '=', 'data_farm.id')
            ->select('jadwal_farm.*', 'data_farm.kode', 'data_farm.nama')
            ->paginate(5);
            
            $data['ternak_mati']=DB::table('data_farm')
            ->where('id_users',$id)
            ->where('posisi','mati')->count();
            
            $data['kandang']=DB::table('data_farm')
            ->where('id_users',$id)
            ->where('posisi','kandang')->count();
            
            $data['sold_out']=DB::table('data_farm')
            ->where('id_users',$id)
            ->where('posisi','terjual')->count();
            
            $data['jantan']=DB::table('data_farm')
            ->where('id_users',$id)
            ->where('jenis_kelamin','jantan')
             ->where('posisi','!=','mati')
            ->count();
            
            $data['betina']=DB::table('data_farm')
            ->where('id_users',$id)
            ->where('jenis_kelamin','betina')
            ->where('posisi','!=','mati')
            ->count();
        }
   
   
 
   return $this->view('dashboardTernak',$data);
}




	    //By the way, you can still create your own method in here... :) 


	}