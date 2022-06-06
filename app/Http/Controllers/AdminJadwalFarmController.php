<?php namespace App\Http\Controllers;

	use Session;
	use Request;
	use DB;
	use CRUDBooster;

	class AdminJadwalFarmController extends \crocodicstudio\crudbooster\controllers\CBController {

	    public function cbInit() {

			# START CONFIGURATION DO NOT REMOVE THIS LINE
			$this->title_field = "id";
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
			$this->table = "jadwal_farm";
			# END CONFIGURATION DO NOT REMOVE THIS LINE

			# START COLUMNS DO NOT REMOVE THIS LINE
			$this->col = [];
			$this->col[] = ["label"=>"Kambing","name"=>"id_kambing","join"=>"data_farm,kode"];
			$this->col[] = ["label"=>"Kambing","name"=>"id_kambing","join"=>"data_farm,nama"];
			$this->col[] = ["label"=>"Foto","name"=>"id_kambing","join"=>"data_farm,foto","image"=>true];
			$this->col[] = ["label"=>"Jadwal","name"=>"jadwal"];
			
			$this->col[] = ["label"=>"Kategori","name"=>"kategori"];
			
			$this->col[] = ["label"=>"Tanggal Pelaksaan","name"=>"tgl_pelaksanaan"];
			
			
			
				$this->col[] = ["label"=>"Status","name"=>"kondisi_pelaksanaan","callback"=>function($row){
			if ($row->kondisi_pelaksanaan=='terlaksana') 
			{
				return '<div class="btn-group">
                  <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">
                    Terlaksana <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                  	<li>
                  		<a onclick="approve('.$row->id.')" style="cursor:pointer;color:blue">Terlaksana</a>
                   	</li>
                   	<li>
                  		<a onclick="reject('.$row->id.')" style="cursor:pointer;color:red">Belum Terlaksana</a>
                   	</li>
                  </ul>
                </div>';
			}elseif($row->kondisi_pelaksanaan=='belum terlaksana'){
				return '<div class="btn-group">
                  <button type="button" class="btn btn-warning btn-xs dropdown-toggle" data-toggle="dropdown">
                    Belum Terlaksana <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li>
                  		<a onclick="approve('.$row->id.')" style="cursor:pointer;color:blue">Terlaksana</a>
                   	</li>
                   	<li>
                  		<a onclick="reject('.$row->id.')" style="cursor:pointer;color:red">Belum Terlaksana</a>
                   	</li>
                  </ul>
                </div>';
            }
        }];

			
			
			# END COLUMNS DO NOT REMOVE THIS LINE

			# START FORM DO NOT REMOVE THIS LINE
			$this->form = [];
				$this->form[] = ['label'=>'Ternak','readonly'=>true,'name'=>'id_kambing','type'=>'text','width'=>'col-sm-10'];

			$this->form[] = ['label'=>'Jadwal','name'=>'jadwal','type'=>'textarea','validation'=>'required|string|min:5|max:5000','width'=>'col-sm-10'];
			
			$this->form[] = ['label'=>'Kategori','name'=>'kategori','type'=>'select','validation'=>'required|string|min:1|max:5000','width'=>'col-sm-10','dataenum'=>'Pemberian Obat Cacing;Kawin Ternak;Lepas Sapih;Pemberian Vitamin;Potong Kuku'];
			
			$this->form[] = ['label'=>'Rencana Tanggal Pelaksaan','name'=>'ttl','type'=>'date','validation'=>'required','width'=>'col-sm-10'];
			
			
			$this->form[] = ['label'=>'Kondisi Pelaksanaan','name'=>'kondisi_pelaksanaan','type'=>'select','validation'=>'required|string|min:5|max:5000','width'=>'col-sm-10','dataenum'=>'terlaksana;belum terlaksana'];
			# END FORM DO NOT REMOVE THIS LINE

			# OLD START FORM
			//$this->form = [];
			//$this->form[] = ["label"=>"Kambing","name"=>"id_kambing","type"=>"select2","required"=>TRUE,"validation"=>"required|integer|min:0","datatable"=>"kambing,id"];
			//$this->form[] = ["label"=>"Jadwal","name"=>"jadwal","type"=>"textarea","required"=>TRUE,"validation"=>"required|string|min:5|max:5000"];
			//$this->form[] = ["label"=>"Kondisi Pelaksanaan","name"=>"kondisi_pelaksanaan","type"=>"textarea","required"=>TRUE,"validation"=>"required|string|min:5|max:5000"];
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
	        
	          $this->table_row_color = array();
            $this->table_row_color[] = ['condition'=>"[kondisi_pelaksanaan]=='belum terlaksana'","color"=>"danger"];
            $this->table_row_color[] = ['condition'=>"[kondisi_pelaksanaan]=='terlaksana'","color"=>"success"];


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
	        
	       // $this->index_statistic[] = ['label'=>'Jadwal Terlaksana','count'=>DB::table('jadwal_farm')
	       //  ->where('kondisi_pelaksanaan','terlaksana')
	       //   ->where('id_kambing',g('parent_id'))
	       //  ->count(),'icon'=>'fa fa-check','color'=>'success'];
	         
	       //  	        $this->index_statistic[] = ['label'=>'Jadwal Belum Terlaksana','count'=>DB::table('jadwal_farm')
	       //  ->where('kondisi_pelaksanaan','belum terlaksana')
	       //   ->where('id_kambing',g('parent_id'))
	       //  ->count(),'icon'=>'fa fa-check','color'=>'success'];

	                
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
	        
	        	         $this->script_js="
				function approve(id){
			        swal({
			            title: 'Apakah Rencana Ini Sudah Terlaksana ?',
			            type:'info',
			            showCancelButton:true,
			            allowOutsideClick:true,
			            confirmButtonColor: '#DD6B55',
			            confirmButtonText: 'Yes',
			            cancelButtonText: 'No',
			            closeOnConfirm: false
			        }, function(){
			            location.href = '".CRUDBooster::mainpath("approve/")."'+id;

			        });
			    };

			    function reject(id){
			        swal({
			            title: 'Apakah Rencana Ini Belum Terlaksana ?',
			            type:'info',
			            showCancelButton:true,
			            allowOutsideClick:true,
			            confirmButtonColor: '#DD6B55',
			            confirmButtonText: 'Yes',
			            cancelButtonText: 'No',
			            closeOnConfirm: false
			        }, function(){
			            location.href = '".CRUDBooster::mainpath("reject/")."'+id;
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
	        $bel=DB::table('jadwal_farm')
	         ->where('kondisi_pelaksanaan','belum terlaksana')
	          ->where('id_kambing',g('parent_id'))
	         ->count();
	         $ter=DB::table('jadwal_farm')
	         ->where('kondisi_pelaksanaan','terlaksana')
	          ->where('id_kambing',g('parent_id'))
	         ->count();
	         
	        $this->pre_index_html = '
	        
	        <div class="row">
	        
	        <div class="col-sm-3">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>'.$ter.'</h3>
                            <p>Jadwal Terlaksana</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-check"></i>
                        </div>
                    </div>
                </div>
                
                <div class="col-sm-3">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>'.$bel.'</h3>
                            <p>Jadwal Belum Terlaksana</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-check"></i>
                        </div>
                    </div>
                </div>
                
                </div>
	        
	        
	        ';
	        
	        
	        
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

	      public function getApprove($id){

	    	$status['kondisi_pelaksanaan']="terlaksana";

	    	$cek=DB::table('jadwal_farm')->where('id',$id)->update($status);

	    	 if($cek !=null) {				
		    $res = redirect()->back()->with(["message"=>"Succesfully change status",'message_type'=>'success'])->withInput();
		    }else{
		    $res = redirect()->back()->with(["message"=>"Error change status",'message_type'=>'warning'])->withInput();
		    	}
		    		\Session::driver()->save();
		    	$res->send();
		    	exit();

	    }
	    
	    	public function getReject($id){

	    	$status['kondisi_pelaksanaan']="belum terlaksana";

	    	$cek=DB::table('jadwal_farm')->where('id',$id)->update($status);

	    	 if($cek !=null) {				
		    $res = redirect()->back()->with(["message"=>"Succesfully change status",'message_type'=>'success'])->withInput();
		    }else{
		    $res = redirect()->back()->with(["message"=>"Error change status",'message_type'=>'warning'])->withInput();
		    	}
		    		\Session::driver()->save();
		    	$res->send();
		    	exit();

	    }




	    //By the way, you can still create your own method in here... :) 


	}