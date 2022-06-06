<?php namespace App\Http\Controllers;

	use Session;
	use Request;
	use DB;
	use CRUDBooster;
	use PDF;
	use File;
	use Storage;
	use SimpleSoftwareIO\QrCode\Facades\QrCode;

	class AdminDataFarmKhususBreedingController extends \crocodicstudio\crudbooster\controllers\CBController {

	    public function cbInit() {

			# START CONFIGURATION DO NOT REMOVE THIS LINE
			$this->title_field = "nama";
			$this->limit = "20";
			$this->orderby = "id,desc";
			$this->global_privilege = false;
			$this->button_table_action = true;
			$this->button_bulk_action = true;
			$this->button_action_style = "button_icon";
			$this->button_add = false;
			$this->button_edit = true;
			$this->button_delete = true;
			$this->button_detail = true;
			$this->button_show = true;
			$this->button_filter = true;
			$this->button_import = false;
			$this->button_export = true;
			$this->table = "data_farm";
			# END CONFIGURATION DO NOT REMOVE THIS LINE

			# START COLUMNS DO NOT REMOVE THIS LINE
			$this->col = [];
			$this->col[] = ["label"=>"Kode","name"=>"kode"];
			$this->col[] = ["label"=>"Silahkan Scan Untuk Mengetahui Detail","name"=>"kode","callback"=>function($row){
			    $link=url('detail_ternak/'.$row->kode);
			    return QrCode::format('svg')->size(80)->generate($link);
			}];
			$this->col[] = ["label"=>"Nama Ternak","name"=>"nama"];
			$this->col[] = ["label"=>"Status","name"=>"posisi","callback"=>function($row){
			if ($row->posisi=='kandang') 
			{
				return '<div class="btn-group">
                  <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">
                    Kandang <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                  	<li>
                  		<a onclick="kandang('.$row->id.')" style="cursor:pointer;color:blue">Kandang</a>
                   	</li>
                   	<li>
                  		<a onclick="mati('.$row->id.')" style="cursor:pointer;color:red">Mati</a>
                   	</li>
                   	 <li>
                  		<a onclick="soldout('.$row->id.')" style="cursor:pointer;color:green">Terjual</a>
                   	</li>
                  </ul>
                </div>';
			}elseif($row->posisi=='terjual'){
				return '<div class="btn-group">
                  <button type="button" class="btn btn-warning btn-xs dropdown-toggle" data-toggle="dropdown">
                    Terjual <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li>
                  		<a onclick="kandang('.$row->id.')" style="cursor:pointer;color:blue">Kandang</a>
                   	</li>
                   	<li>
                  		<a onclick="mati('.$row->id.')" style="cursor:pointer;color:red">Mati</a>
                   	</li>
                   	 <li>
                  		<a onclick="soldout('.$row->id.')" style="cursor:pointer;color:green">Terjual</a>
                   	</li>
                  </ul>
                </div>';
            }elseif($row->posisi=='mati'){
				return '<div class="btn-group">
               	<button type="button" class="btn btn-danger btn-xs dropdown-toggle" data-toggle="dropdown">
                    Mati <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                  	<li>
                  		<a onclick="kandang('.$row->id.')" style="cursor:pointer;color:blue">Kandang</a>
                   	</li>
                   	<li>
                  		<a onclick="mati('.$row->id.')" style="cursor:pointer;color:red">Mati</a>
                   	</li>
                   	 <li>
                  		<a onclick="soldout('.$row->id.')" style="cursor:pointer;color:green">Terjual</a>
                   	</li>
                  </ul>
                </div>';
            }
        }];
        
        
        	$this->col[] = ["label"=>"Jenis Pemeliharaan","name"=>"jenis_pemeliharaan","callback"=>function($row){
			if ($row->jenis_pemeliharaan=='breeding') 
			{
				return '<div class="btn-group">
                  <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">
                    breeiding <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                  	<li>
                  		<a onclick="breeding('.$row->id.')" style="cursor:pointer;color:blue">breeding</a>
                   	</li>
                   	<li>
                  		<a onclick="penggemukan('.$row->id.')" style="cursor:pointer;color:red">penggemukan</a>
                   	</li>
                   	 <li>
                  		<a onclick="hobi('.$row->id.')" style="cursor:pointer;color:green">perawatan cempe</a>
                   	</li>
                   	 <li>
                  		<a onclick="perah('.$row->id.')" style="cursor:pointer;color:green">perah</a>
                   	</li>
                  </ul>
                </div>';
			}elseif($row->jenis_pemeliharaan=='penggemukan'){
				return '<div class="btn-group">
                  <button type="button" class="btn btn-warning btn-xs dropdown-toggle" data-toggle="dropdown">
                    penggemukan <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li>
                  		<a onclick="breeding('.$row->id.')" style="cursor:pointer;color:blue">breeding</a>
                   	</li>
                   	<li>
                  		<a onclick="penggemukan('.$row->id.')" style="cursor:pointer;color:red">penggemukan</a>
                   	</li>
                   	 <li>
                  		<a onclick="hobi('.$row->id.')" style="cursor:pointer;color:green">perawatan cempe</a>
                   	</li>
                   	 <li>
                  		<a onclick="perah('.$row->id.')" style="cursor:pointer;color:green">perah</a>
                   	</li>
                  </ul>
                </div>';
            }elseif($row->jenis_pemeliharaan=='perah'){
				return '<div class="btn-group">
               	<button type="button" class="btn btn-success btn-xs dropdown-toggle" data-toggle="dropdown">
                    perah <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                  	<li>
                  		<a onclick="breeding('.$row->id.')" style="cursor:pointer;color:blue">breeding</a>
                   	</li>
                   	<li>
                  		<a onclick="penggemukan('.$row->id.')" style="cursor:pointer;color:red">penggemukan</a>
                   	</li>
                   	 <li>
                  		<a onclick="hobi('.$row->id.')" style="cursor:pointer;color:green">perawatan cempe</a>
                   	</li>
                   	 <li>
                  		<a onclick="perah('.$row->id.')" style="cursor:pointer;color:green">perah</a>
                   	</li>
                  </ul>
                </div>';
            }elseif($row->jenis_pemeliharaan=='perawatan cempe'){
				return '<div class="btn-group">
               	<button type="button" class="btn btn-success btn-xs dropdown-toggle" data-toggle="dropdown">
                    perawatan cempe <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                  	<li>
                  		<a onclick="breeding('.$row->id.')" style="cursor:pointer;color:blue">breeding</a>
                   	</li>
                   	<li>
                  		<a onclick="penggemukan('.$row->id.')" style="cursor:pointer;color:red">penggemukan</a>
                   	</li>
                   	 <li>
                  		<a onclick="hobi('.$row->id.')" style="cursor:pointer;color:green">perawatan cempe</a>
                   	</li>
                   	 <li>
                  		<a onclick="perah('.$row->id.')" style="cursor:pointer;color:green">perah</a>
                   	</li>
                  </ul>
                </div>';
            }else{
				return '<div class="btn-group">
               	<button type="button" class="btn btn-danger btn-xs dropdown-toggle" data-toggle="dropdown">
                    pilih jenis pemeliharaan <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                  	<li>
                  		<a onclick="breeding('.$row->id.')" style="cursor:pointer;color:blue">breeding</a>
                   	</li>
                   	<li>
                  		<a onclick="penggemukan('.$row->id.')" style="cursor:pointer;color:red">penggemukan</a>
                   	</li>
                   	 <li>
                  		<a onclick="hobi('.$row->id.')" style="cursor:pointer;color:green">perawatan cempe</a>
                   	</li>
                   	 <li>
                  		<a onclick="perah('.$row->id.')" style="cursor:pointer;color:green">perah</a>
                   	</li>
                  </ul>
                </div>';
            }
        }];
        
        
		
			
			$this->col[] = ["label"=>"Pemelihara Ternak/mitra","name"=>"id_mitra","callback"=>function($row){
			if ($row->id_mitra==null) 
			{
			    return '<p>Peliahara Sendiri</p>';
			}else if($row->id_mitra!=null){
			    $cek=DB::table('cms_users')
			    ->where('cms_users.id',$row->id_mitra)->first();
		
			    return $cek->name;
			}
			    
			}];
			
			
			$this->col[] = ["label"=>"Foto","name"=>"foto","image"=>true];
			# END COLUMNS DO NOT REMOVE THIS LINE

			# START FORM DO NOT REMOVE THIS LINE
			$this->form = [];

			$this->form[] = ['label'=>'Nama Ternak','name'=>'nama','type'=>'text','validation'=>'required|string|min:1|max:5000','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Ttl','name'=>'ttl','type'=>'date','validation'=>'required|string|min:1|max:5000','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Jenis Kelamin','name'=>'jenis_kelamin','type'=>'select','validation'=>'required|string|min:1|max:5000','width'=>'col-sm-10','dataenum'=>'jantan;betina'];
			
			$this->form[] = ['label'=>'Jenis Pemeliharaan','readonly'=>true,'value'=>'breeding','name'=>'kode','type'=>'text','validation'=>'required|string|min:1|max:5000','width'=>'col-sm-10'];
			

            $this->form[] = ['label'=>'Jenis Ternak','name'=>'jenis','type'=>'select2','width'=>'col-sm-10','datatable'=>'jenis_kambing,jenis'];
			
			$this->form[] = ['label'=>'Kondisi','name'=>'kondisi','type'=>'textarea','validation'=>'required|string|min:1|max:5000','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Status','name'=>'posisi','type'=>'select','validation'=>'required|string|min:1|max:5000','width'=>'col-sm-10','dataenum'=>'kandang;terjual;mati'];
			
			$this->form[] = ['label'=>'Indukan Jantan','name'=>'id_jantan','type'=>'select2','width'=>'col-sm-10','datatable'=>'data_farm,nama','datatable_where'=>'id_users = '.CRUDBooster::myId()];
			
			$this->form[] = ['label'=>'Indukan Betina','name'=>'id_betina','type'=>'select2','width'=>'col-sm-10','datatable'=>'data_farm,nama','datatable_where'=>'id_users = '.CRUDBooster::myId()];
			
			
			$this->form[] = ['label'=>'Pemelihara Ternak Di Mitra','name'=>'id_mitra','type'=>'select2','width'=>'col-sm-10','datatable'=>'cms_users,name','datatable_where'=>'id_cms_privileges = 4 && id_created_by = '.CRUDBooster::myId()];
			
			$this->form[] = ['label'=>'Foto','name'=>'foto','type'=>'upload','validation'=>'image','width'=>'col-sm-10'];
			# END FORM DO NOT REMOVE THIS LINE

			# OLD START FORM
			//$this->form = [];
			//$this->form[] = ['label'=>'Kode','name'=>'kode','type'=>'text','validation'=>'required|string|min:1|max:5000','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Nama','name'=>'nama','type'=>'text','validation'=>'required|string|min:1|max:5000','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Ttl','name'=>'ttl','type'=>'date','validation'=>'required|string|min:1|max:5000','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Jenis Kelamin','name'=>'jenis_kelamin','type'=>'select','validation'=>'required|string|min:1|max:5000','width'=>'col-sm-10','dataenum'=>'jantan;betina'];
			//$this->form[] = ['label'=>'Jenis','name'=>'jenis','type'=>'select','validation'=>'required|string|min:1|max:5000','width'=>'col-sm-10','dataenum'=>'jawa randu;crossboer;merino'];
			//$this->form[] = ['label'=>'Kondisi','name'=>'kondisi','type'=>'textarea','validation'=>'required|string|min:1|max:5000','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Posisi','name'=>'posisi','type'=>'select','validation'=>'required|string|min:1|max:5000','width'=>'col-sm-10','dataenum'=>'kandang;sold out'];
			//$this->form[] = ['label'=>'Foto','name'=>'foto','type'=>'upload','validation'=>'image','width'=>'col-sm-10'];
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
	        
	           $this->addaction[]=['label'=>'Print','color'=>'danger','icon'=>'fa fa-print',
	          'url'=>CRUDBooster::mainpath('pdfexport/[id]'),'confirmation' => true];


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
	         $this->index_statistic[] = ['label'=>'Jumlah Ternak Breeding','count'=>DB::table('data_farm')
	         ->where('jenis_pemeliharaan','breeding')
	          ->where('id_users',CRUDBooster::myId())
	         ->count(),'icon'=>'fa fa-check','color'=>'success'];
	         
	       //  $this->index_statistic[] = ['label'=>'Jumlah Ternak Jantan','count'=>DB::table('data_farm')->where('jenis_kelamin','jantan')
	       //   ->where('id_users',CRUDBooster::myId())
	       //  ->count(),'icon'=>'fa fa-check','color'=>'success'];
	         
	       //  $this->index_statistic[] = ['label'=>'Jumlah Ternak Betina','count'=>DB::table('data_farm')->where('jenis_kelamin','betina')
	       //   ->where('id_users',CRUDBooster::myId())
	       //  ->count(),'icon'=>'fa fa-check','color'=>'success'];



	        /*
	        | ---------------------------------------------------------------------- 
	        | Add javascript at body 
	        | ---------------------------------------------------------------------- 
	        | javascript code in the variable 
	        | $this->script_js = "function() { ... }";
	        |
	        */
	        $this->script_js = NULL;
	        
	           $this->script_js="
	            $(document).ready(function() {
	    $('#btn_add_new_data').html('Tambah Data Ternak');
        $('#btn_show_data').html('Lihat Semua Ternak');
	            });
        
        
				function kandang(id){
			        swal({
			            title: 'Apakah posisi ternak ini di kandang ?',
			            type:'info',
			            showCancelButton:true,
			            allowOutsideClick:true,
			            confirmButtonColor: '#DD6B55',
			            confirmButtonText: 'Yes',
			            cancelButtonText: 'No',
			            closeOnConfirm: false
			        }, function(){
			            location.href = '".CRUDBooster::mainpath("kandang/")."'+id;

			        });
			    };

			    function soldout(id){
			        swal({
			            title: 'apakah ternak ini sudah terjual ?',
			            type:'info',
			            showCancelButton:true,
			            allowOutsideClick:true,
			            confirmButtonColor: '#DD6B55',
			            confirmButtonText: 'Yes',
			            cancelButtonText: 'No',
			            closeOnConfirm: false
			        }, function(){
			            location.href = '".CRUDBooster::mainpath("soldout/")."'+id;
			        });
			    };
			    
			    function mati(id){
			        swal({
			            title: 'apakah ternak ini sudah mati ?',
			            type:'info',
			            showCancelButton:true,
			            allowOutsideClick:true,
			            confirmButtonColor: '#DD6B55',
			            confirmButtonText: 'Yes',
			            cancelButtonText: 'No',
			            closeOnConfirm: false
			        }, function(){
			            location.href = '".CRUDBooster::mainpath("mati/")."'+id;
			        });
			    };
			    
			    function breeding(id){
			        swal({
			            title: 'Apakah jenis pemeliharaan breeding ?',
			            type:'info',
			            showCancelButton:true,
			            allowOutsideClick:true,
			            confirmButtonColor: '#DD6B55',
			            confirmButtonText: 'Yes',
			            cancelButtonText: 'No',
			            closeOnConfirm: false
			        }, function(){
			            location.href = '".CRUDBooster::mainpath("breeding/")."'+id;
			        });
			    };
			    
			    	    function hobi(id){
			        swal({
			            title: 'Apakah jenis pemeliharaan perawatan cempe ?',
			            type:'info',
			            showCancelButton:true,
			            allowOutsideClick:true,
			            confirmButtonColor: '#DD6B55',
			            confirmButtonText: 'Yes',
			            cancelButtonText: 'No',
			            closeOnConfirm: false
			        }, function(){
			            location.href = '".CRUDBooster::mainpath("hobi/")."'+id;
			        });
			    };
			    
			    	    function perah(id){
			        swal({
			            title: 'Apakah jenis pemeliharaan perah ?',
			            type:'info',
			            showCancelButton:true,
			            allowOutsideClick:true,
			            confirmButtonColor: '#DD6B55',
			            confirmButtonText: 'Yes',
			            cancelButtonText: 'No',
			            closeOnConfirm: false
			        }, function(){
			            location.href = '".CRUDBooster::mainpath("perah/")."'+id;
			        });
			    };
			    
			    	    function penggemukan(id){
			        swal({
			            title: 'Apakah jenis pemeliharaan penggemukan ?',
			            type:'info',
			            showCancelButton:true,
			            allowOutsideClick:true,
			            confirmButtonColor: '#DD6B55',
			            confirmButtonText: 'Yes',
			            cancelButtonText: 'No',
			            closeOnConfirm: false
			        }, function(){
			            location.href = '".CRUDBooster::mainpath("penggemukan/")."'+id;
			        });
			    };
			    
			    
			    
			    
			    
	        ";



            /*
	        | ---------------------------------------------------------------------- 
	        | Include HTML Code before index table 
	        | ---------------------------------------------------------------------- 
	        | html code to display it before index table
	        | $this->pre_index_html = "<p>test</p>";
	        |
	        */
	        $this->pre_index_html = '<div class="alert alert-info" role="alert">
  Ini adalah menu khusus untuk jenis pemelihaan breeding
</div>';
	        
	        
	        
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
	        
	       // $this->sub_module[] = ['label'=>'Jadwal','path'=>'jadwal_farm','parent_columns'=>'kode,nama','foreign_key'=>'id_kambing','button_color'=>'success','button_icon'=>'fa fa-bars'];
	     
	       
	       // $this->sub_module[] = ['label'=>'Catatan Kesehatan','path'=>'kesehatan_ternak','parent_columns'=>'kode,nama','foreign_key'=>'id_kambing','button_color'=>'warning','button_icon'=>'fa fa-bars'];
	        
	             $this->sub_module[] = ['label'=>'Riwayat Laktasi','path'=>'data_farm_riwayat_laktasi','parent_columns'=>'kode,nama','foreign_key'=>'id_betina','button_color'=>'success','button_icon'=>'fa fa-bars'];
	        
	        
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
	        $id=CRUDBooster::myId();
	         if(CRUDBooster::myPrivilegeName() == "mitra"){
                $query->where('data_farm.id_mitra',$id)
                ->where('jenis_pemeliharaan','breeding');
                
	          }else if(CRUDBooster::myPrivilegeName() == "peternak"){
	              $query->where('data_farm.id_users',$id)
	                ->where('jenis_pemeliharaan','breeding');
	          }
   
        
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
	        $postdata['id_users']=CRUDBooster::myId();

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
	        $cek=DB::table('data_farm')->where('id',$id)->first();
	        if($cek->jenis_kelamin=="jantan"){
	            $gender="J";
	        }else{
	            $gender="B";
	        }
	        $date=date('Ymd');
	        $data['kode']="F".$gender.$date.$id;
	        DB::table('data_farm')->where('id',$id)->update($data);

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
	        if($postdata['id_mitra']==null){
	            $postdata['id_mitra']=null;
	            DB::table('data_farm')->where('id',$id)->update($postdata);
	        }

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
	         $gambar =DB::table('data_farm')->where('id',$id)->first();
	        if($gambar->foto!=null){
            File::delete($gambar->foto);
	        }

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
	    
	    
	     public function getKandang($id){

	    	$status['posisi']="kandang";

	    	$cek=DB::table('data_farm')->where('id',$id)->update($status);

	    	 if($cek !=null) {				
		    $res = redirect()->back()->with(["message"=>"Succesfully change status",'message_type'=>'success'])->withInput();
		    }else{
		    $res = redirect()->back()->with(["message"=>"Error change status",'message_type'=>'warning'])->withInput();
		    	}
		    		\Session::driver()->save();
		    	$res->send();
		    	exit();

	    }
	    
	    	public function getSoldout($id){

	    	$status['posisi']="terjual";

	    	$cek=DB::table('data_farm')->where('id',$id)->update($status);

	    	 if($cek !=null) {				
		    $res = redirect()->back()->with(["message"=>"Succesfully change status",'message_type'=>'success'])->withInput();
		    }else{
		    $res = redirect()->back()->with(["message"=>"Error change status",'message_type'=>'warning'])->withInput();
		    	}
		    		\Session::driver()->save();
		    	$res->send();
		    	exit();

	    }
	    
	    public function getMati($id){

	    	$status['posisi']="mati";

	    	$cek=DB::table('data_farm')->where('id',$id)->update($status);

	    	 if($cek !=null) {				
		    $res = redirect()->back()->with(["message"=>"Succesfully change status",'message_type'=>'success'])->withInput();
		    }else{
		    $res = redirect()->back()->with(["message"=>"Error change status",'message_type'=>'warning'])->withInput();
		    	}
		    		\Session::driver()->save();
		    	$res->send();
		    	exit();

	    }
	    
	     public function getBreeding($id){

	    	$status['jenis_pemeliharaan']="breeding";

	    	$cek=DB::table('data_farm')->where('id',$id)->update($status);

	    	 if($cek !=null) {				
		    $res = redirect()->back()->with(["message"=>"Succesfully change status",'message_type'=>'success'])->withInput();
		    }else{
		    $res = redirect()->back()->with(["message"=>"Error change status",'message_type'=>'warning'])->withInput();
		    	}
		    		\Session::driver()->save();
		    	$res->send();
		    	exit();

	    }
	    
	     public function getPerah($id){

	    	$status['jenis_pemeliharaan']="perah";

	    	$cek=DB::table('data_farm')->where('id',$id)->update($status);

	    	 if($cek !=null) {				
		    $res = redirect()->back()->with(["message"=>"Succesfully change status",'message_type'=>'success'])->withInput();
		    }else{
		    $res = redirect()->back()->with(["message"=>"Error change status",'message_type'=>'warning'])->withInput();
		    	}
		    		\Session::driver()->save();
		    	$res->send();
		    	exit();

	    }
	    
	     public function getPenggemukan($id){

	    	$status['jenis_pemeliharaan']="penggemukan";

	    	$cek=DB::table('data_farm')->where('id',$id)->update($status);

	    	 if($cek !=null) {				
		    $res = redirect()->back()->with(["message"=>"Succesfully change status",'message_type'=>'success'])->withInput();
		    }else{
		    $res = redirect()->back()->with(["message"=>"Error change status",'message_type'=>'warning'])->withInput();
		    	}
		    		\Session::driver()->save();
		    	$res->send();
		    	exit();

	    }
	    
	     public function getHobi($id){

	    	$status['jenis_pemeliharaan']="perawatan cempe";

	    	$cek=DB::table('data_farm')->where('id',$id)->update($status);

	    	 if($cek !=null) {				
		    $res = redirect()->back()->with(["message"=>"Succesfully change status",'message_type'=>'success'])->withInput();
		    }else{
		    $res = redirect()->back()->with(["message"=>"Error change status",'message_type'=>'warning'])->withInput();
		    	}
		    		\Session::driver()->save();
		    	$res->send();
		    	exit();

	    }
	    
	     public function getPdfexport($id){

		 	$row=DB::table('data_farm')->where('id',$id)->get();
			  $pdf = PDF::loadView('export',compact('row'))
			  ->setPaper('a4','potret');
			  return $pdf->stream('Data Farm'.$row[0]->kode.'.pdf');
			 //return view('export',$row);
			  
			}
			
			public function getEdit($id) {
  //Create an Auth
  if(!CRUDBooster::isUpdate() && $this->global_privilege==FALSE || $this->button_edit==FALSE) {    
    CRUDBooster::redirect(CRUDBooster::adminPath(),trans("crudbooster.denied_access"));
  }
  
  $data = [];
  $data['page_title'] = 'Edit Data Ternak';
  $data['row'] = DB::table('data_farm')->where('id',$id)
  ->first();
  
  if($data['row']->id_mitra){
  $data['cek_mitra']=DB::table('cms_users')->where('id',$data['row']->id_mitra)->first();
  }
  
  $data['jenis_ternak']=DB::table('jenis_kambing')->where('id',$data['row']->jenis)->first();
  
    $data['jenis_kambing']=DB::table('jenis_kambing')->where('kategori',$data['jenis_ternak']->kategori)->get();
  
  $result_kambing=[];
  foreach($data['jenis_kambing'] as $key){
      $list=$key->id;
      array_push($result_kambing,$list);
  }

  
  $data['indukan_jantan']=DB::table('data_farm')
  ->join('jenis_kambing','data_farm.jenis','=','jenis_kambing.id')
  ->where('data_farm.id_users',CRUDBooster::myId())
  ->where('data_farm.jenis_kelamin','jantan')
  ->whereIn('jenis_kambing.id',$result_kambing)
  ->select('data_farm.*')
  ->get();
  
    $data['indukan_betina']=DB::table('data_farm')
  ->join('jenis_kambing','data_farm.jenis','=','jenis_kambing.id')
  ->where('data_farm.id_users',CRUDBooster::myId())
  ->where('data_farm.jenis_kelamin','betina')
  ->whereIn('jenis_kambing.id',$result_kambing)
  ->select('data_farm.*')
  ->get();
  
  
  $role=DB::table('cms_privileges')->where('name','mitra')->first();
  
  $data['mitra']=DB::table('cms_users')->where('id_cms_privileges',$role->id)
  ->where('id_created_by',CRUDBooster::myId())->get();
  
  
  //Please use view method instead view method from laravel
  return $this->view('admin.edit_datafarm',$data);
}

public function getDelete_image($id){
    
       $gambar =DB::table('data_farm')->where('id',$id)->first();
	        if($gambar->foto!=null){
            File::delete($gambar->foto);
	   }
	   $data['foto']=null;
	  $success=DB::table('data_farm')->where('id',$id)->update($data);
	   
	   if($success !=null) {				
		    $res = redirect()->back()->with(["message"=>"Succesfully Add Data",'message_type'=>'success'])->withInput();
		    }else{
		    $res = redirect()->back()->with(["message"=>"Error Add Data",'message_type'=>'warning'])->withInput();
		    	}
		    		\Session::driver()->save();
		    	$res->send();
		    	exit();
	   
    
}


public function postEditdata($id){
    
     $data['nama']=g('nama');
	       $data['ttl']=g('ttl');
	       $data['jenis']=g('jenis');
	       $data['jenis_kelamin']=g('jenis_kelamin');
	       $data['jenis_pemeliharaan']=g('jenis_pemeliharaan');
	       $data['posisi']=g('posisi');
	       $data['kondisi']=g('kondisi');
	       $data['id_jantan']=g('id_jantan');
	       $data['id_betina']=g('id_betina');
	       $data['indukan_jantan']=g('indukan_jantan');
	       $data['indukan_betina']=g('indukan_betina');
	       $data['id_mitra']=g('id_mitra');
	       $data['id_users']=CRUDBooster::myId();
	       $data['tgl_beli']=g('tgl_beli');
	       $data['nama_penjual']=g('nama_penjual');
	       $cek=DB::table('data_farm')->where('id',$id)->first();
	       if(g('foto')==$cek->foto){
	           $data['foto']=g('foto');
	       }else{
	       $foto=Request::file('foto');
	       $data['foto']=CRUDBooster::uploadFoto($foto);
	       }
	       

	       
	        $success=DB::table('data_farm')->where('id',$id)->update($data);
	        
	        if($success !=null) {				
		    $res = redirect(CRUDBooster::mainpath('/'))->with(["message"=>"Succesfully Edit Data",'message_type'=>'success'])->withInput();
		    }else{
		    $res = redirect(CRUDBooster::mainpath('/'))->with(["message"=>"Error Edit Data",'message_type'=>'warning'])->withInput();
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
  $data['page_title'] = 'Detail Data Ternak';
  $data['row'] = DB::table('data_farm')
  ->where('id',$id)
  ->first();
  
  $data['jenis_ternak']=DB::table('jenis_kambing')
  ->where('id',$data['row']->jenis)->first();
  
  $data['mitra']=DB::table('cms_users')
  ->where('id',$data['row']->id_mitra)->first();
  
  
  //Please use view method instead view method from laravel
  return $this->view('admin.detail_datafarm',$data);
}









	    //By the way, you can still create your own method in here... :) 


	}