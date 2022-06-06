<?php namespace App\Http\Controllers;

	use Session;
	use Request;
	use DB;
	use CRUDBooster;

	class AdminCmsUsers57Controller extends \crocodicstudio\crudbooster\controllers\CBController {

	    public function cbInit() {

			# START CONFIGURATION DO NOT REMOVE THIS LINE
			$this->title_field = "name";
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
			$this->table = "cms_users";
			# END CONFIGURATION DO NOT REMOVE THIS LINE

			# START COLUMNS DO NOT REMOVE THIS LINE
			$this->col = [];
			$this->col[] = ["label"=>"Name","name"=>"name"];
			$this->col[] = ["label"=>"Photo","name"=>"photo","image"=>true];
			$this->col[] = ["label"=>"Email","name"=>"email"];
			$this->col[] = ["label"=>"Hp","name"=>"hp"];
			
		  $this->col[] = ["label"=>"Total Ternak","name"=>"id","callback"=>function($row){
			if ($row->id) 
			{
			
			    $cek=DB::table('data_farm')
			    ->where('id_users',$row->id)->count();
		
			    return $cek;
			}
			    
			}];
			
			
			$this->col[] = ["label"=>"Peternakan","name"=>"farm"];
			$this->col[] = ["label"=>"Privileges","name"=>"id_cms_privileges","join"=>"cms_privileges,name"];
			
				$this->col[] = ["label"=>"Status","name"=>"status","callback"=>function($row){
			if ($row->status=='active') 
			{
				return '<div class="btn-group">
                  <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">
                    active <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                  	<li>
                  		<a onclick="active('.$row->id.')" style="cursor:pointer;color:blue">active</a>
                   	</li>
                   	<li>
                  		<a onclick="notactive('.$row->id.')" style="cursor:pointer;color:red">not active</a>
                   	</li>
                  </ul>
                </div>';
			}elseif($row->status=='not active'){
				return '<div class="btn-group">
                  <button type="button" class="btn btn-warning btn-xs dropdown-toggle" data-toggle="dropdown">
                    not active <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li>
                  		<a onclick="active('.$row->id.')" style="cursor:pointer;color:blue">active</a>
                   	</li>
                   	 <li>
                  		<a onclick="soldout('.$row->id.')" style="cursor:pointer;color:green">notactive</a>
                   	</li>
                  </ul>
                </div>';
            }}];
			# END COLUMNS DO NOT REMOVE THIS LINE

			# START FORM DO NOT REMOVE THIS LINE
			$this->form = [];
			$this->form[] = ['label'=>'Name','name'=>'name','type'=>'text','validation'=>'required|string|min:3|max:70','width'=>'col-sm-10','placeholder'=>'You can only enter the letter only'];
			$this->form[] = ['label'=>'Photo','name'=>'photo','type'=>'upload','validation'=>'required|image|max:3000','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Email','name'=>'email','type'=>'email','validation'=>'required|min:1|max:255|email|unique:cms_users','width'=>'col-sm-10','help'=>'File types support : JPG, JPEG, PNG, GIF, BMP'];
			$this->form[] = ['label'=>'Password','name'=>'password','type'=>'password','validation'=>'min:3|max:32','width'=>'col-sm-10','placeholder'=>'Please enter a valid email address'];

$this->form[] = ['label'=>'Cms Privileges','name'=>'id_cms_privileges','type'=>'select2','datatable'=>'cms_privileges,name',
'datatable_where'=>'id = 3'];

			$this->form[] = ['label'=>'Status','name'=>'status','type'=>'select','validation'=>'required|string|min:1|max:5000','width'=>'col-sm-10','dataenum'=>'active;not active'];
			# END FORM DO NOT REMOVE THIS LINE

			# OLD START FORM
			//$this->form = [];
			//$this->form[] = ["label"=>"Name","name"=>"name","type"=>"text","required"=>TRUE,"validation"=>"required|string|min:3|max:70","placeholder"=>"You can only enter the letter only"];
			//$this->form[] = ["label"=>"Created By","name"=>"id_created_by","type"=>"select2","required"=>TRUE,"validation"=>"required|integer|min:0","datatable"=>"created_by,id"];
			//$this->form[] = ["label"=>"Photo","name"=>"photo","type"=>"upload","required"=>TRUE,"validation"=>"required|image|max:3000","help"=>"File types support : JPG, JPEG, PNG, GIF, BMP"];
			//$this->form[] = ["label"=>"Email","name"=>"email","type"=>"email","required"=>TRUE,"validation"=>"required|min:1|max:255|email|unique:cms_users","placeholder"=>"Please enter a valid email address"];
			//$this->form[] = ["label"=>"Password","name"=>"password","type"=>"password","required"=>TRUE,"validation"=>"min:3|max:32","help"=>"Minimum 5 characters. Please leave empty if you did not change the password."];
			//$this->form[] = ["label"=>"Cms Privileges","name"=>"id_cms_privileges","type"=>"select2","required"=>TRUE,"validation"=>"required|integer|min:0","datatable"=>"cms_privileges,name"];
			//$this->form[] = ["label"=>"Status","name"=>"status","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
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
	        
	        $this->sub_module[] = ['label'=>'Data Farm','path'=>'data_farm','parent_columns'=>'name','foreign_key'=>'id_users','button_color'=>'success','button_icon'=>'fa fa-bars'];
	        
	        $this->sub_module[] = ['label'=>'Pengeluaran Farm','path'=>'pengeluaran_farm','parent_columns'=>'name','foreign_key'=>'id_users','button_color'=>'success','button_icon'=>'fa fa-bars'];
	        
	        $this->sub_module[] = ['label'=>'Pemasukan Farm','path'=>'pemasukan_farm','parent_columns'=>'name','foreign_key'=>'id_users','button_color'=>'success','button_icon'=>'fa fa-bars'];
	        
	        


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
	        $role=DB::table('cms_privileges')->where('name','peternak')->first();
	        $role_investor=DB::table('cms_privileges')->where('name','investor')->first();
	        $role_mitra=DB::table('cms_privileges')->where('name','mitra')->first();
	        $this->index_statistic = array();
	        $this->index_statistic[] = ['label'=>'Total Peternak'
	        ,'count'=>DB::table('cms_users')
	          ->where('id_cms_privileges',$role->id)
	         ->count(),'icon'=>'fa fa-check','color'=>'success'];
	         
	         $this->index_statistic[] = ['label'=>'Total Investor'
	        ,'count'=>DB::table('cms_users')
	          ->where('id_cms_privileges',$role_investor->id)
	         ->count(),'icon'=>'fa fa-check','color'=>'success'];
	         
	         $this->index_statistic[] = ['label'=>'Total Mitra'
	        ,'count'=>DB::table('cms_users')
	          ->where('id_cms_privileges',$role_mitra->id)
	         ->count(),'icon'=>'fa fa-check','color'=>'success'];
	         
	         $this->index_statistic[] = ['label'=>'Total Hewan Ternak'
	        ,'count'=>DB::table('data_farm')
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
				function active(id){
			        swal({
			            title: 'Apakah user ini active ?',
			            type:'info',
			            showCancelButton:true,
			            allowOutsideClick:true,
			            confirmButtonColor: '#DD6B55',
			            confirmButtonText: 'Yes',
			            cancelButtonText: 'No',
			            closeOnConfirm: false
			        }, function(){
			            location.href = '".CRUDBooster::mainpath("active/")."'+id;

			        });
			    };

			    function notactive(id){
			        swal({
			            title: 'apakah user ini tidak active ?',
			            type:'info',
			            showCancelButton:true,
			            allowOutsideClick:true,
			            confirmButtonColor: '#DD6B55',
			            confirmButtonText: 'Yes',
			            cancelButtonText: 'No',
			            closeOnConfirm: false
			        }, function(){
			            location.href = '".CRUDBooster::mainpath("notactive/")."'+id;
			        });
			    }; ";


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
	        $role=DB::table('cms_privileges')->where('name','peternak')->first();
	        if(CRUDBooster::myPrivilegeName()=="admin"){
	            $query->where('id_cms_privileges',$role->id);
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
	        $postdata['id_created_by']=CRUDBooster::myId();

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

            
              public function getActive($id){

	    	$status['status']="active";

	    	$cek=DB::table('cms_users')->where('id',$id)->update($status);

	    	 if($cek !=null) {				
		    $res = redirect()->back()->with(["message"=>"Succesfully change status",'message_type'=>'success'])->withInput();
		    }else{
		    $res = redirect()->back()->with(["message"=>"Error change status",'message_type'=>'warning'])->withInput();
		    	}
		    		\Session::driver()->save();
		    	$res->send();
		    	exit();

	    }
	    
	                public function getNotactive($id){

	    	$status['status']="not active";

	    	$cek=DB::table('cms_users')->where('id',$id)->update($status);

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