<?php namespace App\Http\Controllers;

	use Session;
	use Request;
	use DB;
	use CRUDBooster;
	use PDF;
	use SimpleSoftwareIO\QrCode\Facades\QrCode;

	class AdminDataFarmInvestorController extends \crocodicstudio\crudbooster\controllers\CBController {

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
			$this->button_export = true;
			$this->table = "data_farm_investor";
			# END CONFIGURATION DO NOT REMOVE THIS LINE

			# START COLUMNS DO NOT REMOVE THIS LINE
			$this->col = [];
			$this->col[] = ["label"=>"Kode","name"=>"kode"];
			$this->col[] = ["label"=>"Silahkan Scan Untuk Mengetahui Detail","name"=>"kode","callback"=>function($row){
			    $link=url('detail_ternak_investor/'.$row->kode);
			    return QrCode::format('svg')->size(120)->generate($link);
			}];
			$this->col[] = ["label"=>"Nama Ternak","name"=>"nama"];
			$this->col[] = ["label"=>"Jenis Kelamin","name"=>"jenis_kelamin"];
// 			$this->col[] = ["label"=>"Jenis","name"=>"jenis"];

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
                  		<a onclick="terjual('.$row->id.')" style="cursor:pointer;color:green">Terjual</a>
                   	</li>
                  </ul>
                </div>';
            }
        }];

			
			
			
			
			
			
			
// 			$this->col[] = ["label"=>"Jantan","name"=>"id_jantan","join"=>"data_farm,kode"];
// 			$this->col[] = ["label"=>"Betina","name"=>"id_betina","join"=>"data_farm,kode"];
			$this->col[] = ["label"=>"Pemilik Ternak","name"=>"id_investor","join"=>"cms_users,name"];
			
			$this->col[] = ["label"=>"Pemelihara Ternak","name"=>"id_mitra","join"=>"cms_users,name"];
			
			
			$this->col[] = ["label"=>"Foto","name"=>"foto","image"=>true];
			# END COLUMNS DO NOT REMOVE THIS LINE

			# START FORM DO NOT REMOVE THIS LINE
			$this->form = [];
		
			$this->form[] = ['label'=>'Nama Ternak','name'=>'nama','type'=>'text','validation'=>'required|string|min:1|max:5000','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Ttl','name'=>'ttl','type'=>'date','validation'=>'required|string|min:1|max:5000','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Jenis Kelamin','name'=>'jenis_kelamin','type'=>'select','validation'=>'required|string|min:1|max:5000','width'=>'col-sm-10','dataenum'=>'jantan;betina'];
			
// 			$this->form[] = ['label'=>'Jenis','name'=>'jenis','type'=>'select','validation'=>'required|string|min:1|max:5000','width'=>'col-sm-10','dataenum'=>'jawa randu;crossboer;merino;Pe;sapera;anglo nubian;domba lokal'];

$this->form[] = ['label'=>'Jenis ternak','name'=>'jenis','type'=>'select2','width'=>'col-sm-10','datatable'=>'jenis_kambing,jenis'];
			
			
			$this->form[] = ['label'=>'Kondisi','name'=>'kondisi','type'=>'textarea','validation'=>'required|string|min:1|max:5000','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Status','name'=>'posisi','type'=>'select','validation'=>'required|string|min:1|max:5000','width'=>'col-sm-10','dataenum'=>'kandang;terjual;mati'];
			
			$this->form[] = ['label'=>'Indukan Jantan','name'=>'id_jantan','type'=>'select2','width'=>'col-sm-10','datatable'=>'data_farm_investor,kode','datatable_where'=>'created_by = '.CRUDBooster::myId()];
			
			$this->form[] = ['label'=>'Indukan Betina','name'=>'id_betina','type'=>'select2','width'=>'col-sm-10','datatable'=>'data_farm_investor,kode','datatable_where'=>'created_by ='.CRUDBooster::myId()];
			
			
// 			$this->form[] = ['label'=>'Jantan','name'=>'id_jantan','type'=>'select2','width'=>'col-sm-10','datatable'=>'data_farm,kode'];
// 			$this->form[] = ['label'=>'Betina','name'=>'id_betina','type'=>'select2','width'=>'col-sm-10','datatable'=>'data_farm,kode'];
			
			$this->form[] = ['label'=>'Pemilik ternak','name'=>'id_investor','type'=>'select2','width'=>'col-sm-10','datatable'=>'cms_users,name','datatable_where'=>'id_cms_privileges = 2 && id_created_by = '.CRUDBooster::myId()];
			
			$this->form[] = ['label'=>'Mitra Pemelihara','name'=>'id_mitra','type'=>'select2','width'=>'col-sm-10','datatable'=>'cms_users,name','datatable_where'=>'id_cms_privileges = 4 && id_created_by = '.CRUDBooster::myId()];
			
			$this->form[] = ['label'=>'Lokasi Ternak','readonly'=>true,'name'=>'alamat','type'=>'googlemaps','validation'=>'required','width'=>'col-sm-10','latitude'=>'lat','longitude'=>'long'];
			
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
	        
	           $this->addaction[]=['label'=>'print','color'=>'danger','icon'=>'fa fa-print',
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
	       if(CRUDBooster::myPrivilegeName()=="peternak"){
	            $whereby="created_by";
	        }else if(CRUDBooster::myPrivilegeName()=="investor"){
	            $whereby="id_investor";
	        }else if(CRUDBooster::myPrivilegeName()=="mitra"){
	            $whereby="id_mitra";
	        }
	        
	         if($_GET['parent_id']==null){
	            $id_datafarm_admin=CRUDBooster::myId();
	        }else{
	            $id_datafarm_admin=$_GET['parent_id'];
	            $whereby="id_investor";
	        }
	        
	   
	        
	         $this->index_statistic[] = ['label'=>'Jumlah Ternak Investor','count'=>DB::table('data_farm_investor')
	          ->where($whereby,$id_datafarm_admin)
	         ->count(),'icon'=>'fa fa-check','color'=>'success'];
	         
	         $this->index_statistic[] = ['label'=>'Jumlah Ternak Investor Jantan','count'=>DB::table('data_farm_investor')->where('jenis_kelamin','jantan')
	          ->where($whereby,$id_datafarm_admin)
	         ->count(),'icon'=>'fa fa-check','color'=>'success'];
	         
	         $this->index_statistic[] = ['label'=>'Jumlah Ternak Investor Betina','count'=>DB::table('data_farm_investor')->where('jenis_kelamin','betina')
	          ->where($whereby,$id_datafarm_admin)
	         ->count(),'icon'=>'fa fa-check','color'=>'success'];




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
	        ";



            /*
	        | ---------------------------------------------------------------------- 
	        | Include HTML Code before index table 
	        | ---------------------------------------------------------------------- 
	        | html code to display it before index table
	        | $this->pre_index_html = "<p>test</p>";
	        |
	        */
	        $this->pre_index_html = null;
	        
	        $this->pre_index_html = '<div class="alert alert-info" role="alert">
  Ini adalah menu ternak investor, <b>silahkan peternak mengisikan menu ini, sesuai dengan jumlah ternak invistor yang di titipkan, dan pilihkan mitra jika mitra peternakan anda yang merawat ternak investor</b>.
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
	        
	        $this->sub_module[] = ['label'=>'Jadwal','path'=>'jadwal_farm_investor','parent_columns'=>'kode,nama','foreign_key'=>'id_kambing','button_color'=>'success','button_icon'=>'fa fa-bars'];
	        
	        $this->sub_module[] = ['label'=>'ADg Ternak','path'=>'adg_ternak_investor','parent_columns'=>'kode,nama','foreign_key'=>'id_kambing','button_color'=>'danger','button_icon'=>'fa fa-bars'];
	        
	          $this->sub_module[] = ['label'=>'Catatan Kesehatan','path'=>'kesehatan_ternak_investor49','parent_columns'=>'kode,nama','foreign_key'=>'id_kambing','button_color'=>'warning','button_icon'=>'fa fa-bars'];
	        
	        $this->sub_module[] = ['label'=>'Susu Ternak','path'=>'susu_ternak_investor','parent_columns'=>'kode,nama','foreign_key'=>'id_ternak','button_color'=>'warning','button_icon'=>'fa fa-bars'];
	        
	        
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
	          if(CRUDBooster::myPrivilegeName() == "investor"){
                $query->where('data_farm_investor.id_investor',$id);
              }else if(CRUDBooster::myPrivilegeName() == "mitra"){
                $query->where('data_farm_investor.id_mitra',$id);
                
              }else if(CRUDBooster::myPrivilegeName() == "peternak"){
                   if($_GET['parent_id'] !=null){
                    $query->where('id_investor',$_GET['parent_id']);
                    
                    }else{
                $role=DB::table('cms_privileges')->where('name','investor')->first();
                  
                  $cek=DB::table('cms_users')
                  ->where('id_created_by',$id)
                  ->where('id_cms_privileges',$role->id)->get();
                    $data=[];
                   foreach($cek as $key){
                    $list=$key->id;
                    array_push($data,$list);
                    $query->whereIn('data_farm_investor.id_investor',$data);
                   }
                     
                        
                    }
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
	        $postdata['created_by']=CRUDBooster::myId();

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
	        $cek=DB::table('data_farm_investor')->where('id',$id)->first();
	        if($cek->jenis_kelamin=="jantan"){
	            $gender="J";
	        }else{
	            $gender="B";
	        }
	        $date=date('Ymd');
	        $data['kode']="I".$gender.$date.$id;
	        DB::table('data_farm_investor')->where('id',$id)->update($data);

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
	    
	    
	     public function getKandang($id){

	    	$status['posisi']="kandang";

	    	$cek=DB::table('data_farm_investor')->where('id',$id)->update($status);

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

	    	$cek=DB::table('data_farm_investor')->where('id',$id)->update($status);

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

	    	$cek=DB::table('data_farm_investor')->where('id',$id)->update($status);

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

		 	$row=DB::table('data_farm_investor')->where('id',$id)->get();
			  $pdf = PDF::loadView('invoicepdf',compact('row'))
			  ->setPaper('a4','potret');
			  return $pdf->stream('Data Farm'.$row[0]->kode.'.pdf');
			  
			}


	}