<?php namespace App\Http\Controllers;

	use Session;
	use Request;
	use DB;
	use CRUDBooster;
	use PDF;
	use File;

	class AdminPengeluaranFarmInvestorController extends \crocodicstudio\crudbooster\controllers\CBController {

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
			$this->button_export = true;
			$this->table = "pengeluaran_farm_investor";
			# END CONFIGURATION DO NOT REMOVE THIS LINE

			# START COLUMNS DO NOT REMOVE THIS LINE
			$this->col = [];
			$this->col[] = ["label"=>"Keperluan","name"=>"keperluan"];
			$this->col[] = ["label"=>"Jenis Keperluan","name"=>"jenis_keperluan"];
			$this->col[] = ["label"=>"Harga","name"=>"harga"];
			$this->col[] = ["label"=>"Tgl","name"=>"tgl"];
			$this->col[] = ["label"=>"Foto","name"=>"foto","image"=>true];
			$this->col[] = ["label"=>"Users","name"=>"id_users","join"=>"cms_users,name"];
			# END COLUMNS DO NOT REMOVE THIS LINE

			# START FORM DO NOT REMOVE THIS LINE
			$this->form = [];
			$this->form[] = ['label'=>'Keperluan','name'=>'keperluan','type'=>'textarea','validation'=>'required|string|min:5|max:5000','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Jenis Keperluan','name'=>'jenis_keperluan','type'=>'select','validation'=>'required|string','width'=>'col-sm-10','dataenum'=>'pakan ternak;asset peternakan;obat ternak;operasional;hewan ternak'];
			$this->form[] = ['label'=>'Harga','name'=>'harga','type'=>'money','validation'=>'required','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Tgl','name'=>'tgl','type'=>'date','validation'=>'required|date','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Foto','name'=>'foto','type'=>'upload','validation'=>'image|max:3000','width'=>'col-sm-10','help'=>'File types support : JPG, JPEG, PNG, GIF, BMP'];
// 			$this->form[] = ['label'=>'Users','name'=>'id_users','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'users,name'];
			# END FORM DO NOT REMOVE THIS LINE

			# OLD START FORM
			//$this->form = [];
			//$this->form[] = ["label"=>"Keperluan","name"=>"keperluan","type"=>"textarea","required"=>TRUE,"validation"=>"required|string|min:5|max:5000"];
			//$this->form[] = ["label"=>"Harga","name"=>"harga","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Tgl","name"=>"tgl","type"=>"date","required"=>TRUE,"validation"=>"required|date"];
			//$this->form[] = ["label"=>"Foto","name"=>"foto","type"=>"upload","required"=>TRUE,"validation"=>"required|image|max:3000","help"=>"File types support : JPG, JPEG, PNG, GIF, BMP"];
			//$this->form[] = ["label"=>"Users","name"=>"id_users","type"=>"select2","required"=>TRUE,"validation"=>"required|integer|min:0","datatable"=>"users,name"];
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
	         $this->index_button[] = ['label'=>'pdf','icon'=>'fa fa-print','color'=>'danger','confirmation' => true];



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
	              if($_GET['parent_id']==null){
	            $id_pengeluaran_admin=CRUDBooster::myId();
	        }else{
	            $id_pengeluaran_admin=$_GET['parent_id'];
	        }
	        
	        $this->index_statistic = array();
	        $this->index_statistic[] = ['label'=>'Pengeluaran Pakan Ternak','count'=>'Rp.'.number_format(DB::table('pengeluaran_farm_investor')->where('jenis_keperluan','pakan ternak')
	         ->where('id_users',$id_pengeluaran_admin)
	        ->sum('harga')),'icon'=>'fa fa-check','color'=>'info'];
	        
	        $this->index_statistic[] = ['label'=>'Pengeluaran Beli Hewan','count'=>'Rp.'.number_format(DB::table('pengeluaran_farm_investor')
	        ->where('jenis_keperluan','hewan ternak')
	        ->where('id_users',$id_pengeluaran_admin)->sum('harga')),'icon'=>'fa fa-check','color'=>'info'];
	        
	        $this->index_statistic[] = ['label'=>'Pengeluaran Obat Ternak','count'=>'Rp.'.number_format(DB::table('pengeluaran_farm_investor')->where('jenis_keperluan','obat ternak')
	         ->where('id_users',$id_pengeluaran_admin)
	        ->sum('harga')),'icon'=>'fa fa-check','color'=>'info'];
	        
	         $this->index_statistic[] = ['label'=>'Pengeluaran Asset Peternakan','count'=>'Rp.'.number_format(DB::table('pengeluaran_farm_investor')->where('jenis_keperluan','asset peternakan')
	          ->where('id_users',$id_pengeluaran_admin)
	         ->sum('harga')),'icon'=>'fa fa-check','color'=>'info'];
	         
	         $this->index_statistic[] = ['label'=>'Operasional Peternakan','count'=>'Rp.'.number_format(DB::table('pengeluaran_farm_investor')->where('jenis_keperluan','operasional')
	          ->where('id_users',$id_pengeluaran_admin)
	         ->sum('harga')),'icon'=>'fa fa-check','color'=>'info'];



	        /*
	        | ---------------------------------------------------------------------- 
	        | Add javascript at body 
	        | ---------------------------------------------------------------------- 
	        | javascript code in the variable 
	        | $this->script_js = "function() { ... }";
	        |
	        */
	        $this->script_js = "
	        
	          $(function() {
			     $('.button_action .btn-danger').attr('target','blank');
			     $('#pdf').attr('data-toggle','modal');
			     $('#pdf').attr('data-target','#myModal');
			  });

			  function modalclose(){
			  	$('#myModal').modal('toggle');
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
  <b>Silahkan isi pengeluaran keuangan investor, menu ini hanya investor yang bisa mengelolanya</b>.
</div>';


 $this->pre_index_html = '<div class="alert alert-info" role="alert">
  Silahkan isi data pengeluaran keuangan peternakan anda disini, agar tercatat rapi.
</div>';


  $this->pre_index_html ='<div class="modal fade" id="myModal" role="dialog">
							    <div class="modal-dialog">
							      <div class="modal-content">
							        <div class="modal-header">
							          <button type="button" class="close" data-dismiss="modal">&times;</button>
							          <h4 class="modal-title">Export PDF</h4>
							        </div>
							        <div class="modal-body">
							        <form method="get" action="'.CRUDBooster::mainpath("export").'">
							        <div class="form-group">
							        <label>Nama File</label>
							         <input type="text" name="nama" class="form-control" placeholder="Masukan Nama Export Pdf">
							         </div>

							         <div class="form-group">
							         <label>Kategori Pengeluaran</label>
							         <select class="form-control" name="status">
							          <option >-- Please select kategori</option>
							          <option value="">Print Semua data</option>
							         <option value="pakan ternak">pakan ternak</option>
							         <option value="asset peternakan">asset peternakan</option>
							         <option value="hewan ternak">hewan ternak</option>
							         <option value="obat ternak">obat ternak</option>
							         <option value="Gaji Karyawan">Gaji Karyawan</option>
							         <option value="operasional">operasional</option>
							         </select>
							         </div>

							         <div class="form-group">
							         <label>Start Date Save</label>
							         <input type="Date" name="start" class="form-control" placeholder="Date Start">
									</div>

									<div class="form-group">
									<label>Last Date Save</label>
							         <input type="Date" name="last" class="form-control" placeholder="Date Last">
							         </div>
							        </div>
							        <div class="modal-footer">
							          <button type="submit" id="submit" onclick="modalclose()" class="btn btn-primary">Print</button>
							          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							        </div>
							        </form>
							      </div>
							      
							    </div>
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
	        if(CRUDBooster::myPrivilegeName()=="investor"){
	        $query->where('id_users',$id)->get();
	            
	        }else if(CRUDBooster::myPrivilegeName() == "peternak"){
	            $role=DB::table('cms_privileges')->where('name','investor')->first();
	            
                  $cek=DB::table('cms_users')
                  ->where('id_created_by',$id)
                  ->where('id_cms_privileges',$role->id)->get();
                  
                    $data=[];
                   foreach($cek as $key){
                    $list=$key->id;
                    array_push($data,$list);
                    
                }
                
            $query->whereIn('id_users',$data);
                
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
	           $gambar =DB::table('pengeluaran_farm_investor')->where('id',$id)->first();
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
	    
	       public function getPdfexport($id){

		 	$row=DB::table('pengeluaran_farm_investor')->where('id',$id)->get();
			  $pdf = PDF::loadView('laporan_pengeluaran',compact('row'))
			  ->setPaper('a4','potret');
			  return $pdf->stream('Laporan Keuangan'.$row[0]->jenis_keperluan.'.pdf');
			  
			}
			
			
			
		public function getExport(){
		$start=g('start');
		$last=g('last');
		$status=g('status');
		$filename=g('nama');
		$date=date('Y-m-d');
		$id=CRUDBooster::myId();
		$user=DB::table('cms_users')->where('id',$id)->first();
		$data['name']=$user->name;
	   if($status)
		{$data['kategori']=$status;
		    
		}else
		{ $data['kategori']="Print Semua Data";
		    
		}
	
	if(!isset($start)){
	    if(!isset($status)){
	     $row=DB::table('pengeluaran_farm_investor')
		->where('id_users',$id)
		->get();
	    }else{
		$row=DB::table('pengeluaran_farm_investor')
		->where('jenis_keperluan',$status)
		->where('id_users',$id)
		->get();
	    }
		
		$data['file']=$filename;
		$data['last']=$last;
		$data['start']=$start;
		$data['row']=$row;
		
		
		$pdf = PDF::loadView('laporan_pengeluaran_all',compact('data'))
			  ->setPaper('a4','potret');
			  return $pdf->stream($filename.'.pdf');

	}else if(isset($start)){
	     if(!isset($status)){
	     $row=DB::table('pengeluaran_farm_investor')
		->whereBetween('tgl',[$start,$last])
		->where('id_users',$id)
		->get();
	     }else{
		$row=DB::table('pengeluaran_farm_investor')
		->where('jenis_keperluan',$status)
		->whereBetween('tgl',[$start,$last])
		->where('id_users',$id)
		->get();
		
	     }

		$data['file']=$filename;
		$data['last']=$last;
		$data['start']=$start;
		$data['row']=$row;
		
		$pdf = PDF::loadView('laporan_pengeluaran_all',compact('data'))
			  ->setPaper('a4','potret');
	    return $pdf->stream($filename.'.pdf');

	}
	
}



	    //By the way, you can still create your own method in here... :) 


	}