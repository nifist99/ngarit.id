<!-- First, extends to the CRUDBooster Layout -->
@extends('crudbooster::admin_template')
@section('content')
 <p><a title="Return" href="{{CRUDBooster::mainpath('')}}"><i class="fa fa-chevron-circle-left "></i>
  &nbsp; Back To List Data Ternak</a></p>
  <!-- Your html goes here -->
  <div class='panel panel-default'>
    <div class='panel-heading'>Detail Data ternak</div>
    <div class='panel-body'> 
    
    <div class="row">
    
        <div class='form-group'>
          <label class="col-sm-3">Name</label>
          <div class="col-sm-9">
              <p>:{{$row->nama}}</p>
          </div>
        </div>
        
        <div class='form-group'>
          <label class="col-sm-3">Tanggal Lahir Ternak</label>
          <div class="col-sm-9">
              <p>:{{$row->ttl}}</p>
          </div>
        </div>
        
        <div class='form-group'>
          <label class="col-sm-3">Jenis Kelamin Ternak</label>
          <div class="col-sm-9">
              <p>:{{$row->jenis_kelamin}}</p>
          </div>
        </div>
        
        <div class='form-group'>
          <label class="col-sm-3">Metode Pemeliharaan Ternak</label>
          <div class="col-sm-9">
              <p>:{{$row->jenis_pemeliharaan}}</p>
          </div>
        </div>
        
        <div class='form-group'>
          <label class="col-sm-3">Jenis Ternak {{$jenis_ternak->kategori}}</label>
          <div class="col-sm-9">
              <p>:{{$jenis_ternak->jenis}}</p>
          </div>
        </div>
        
           <div class='form-group'>
          <label class="col-sm-3">Kondisi Ternak</label>
          <div class="col-sm-9">
              <p>:{{$row->kondisi}}</p>
          </div>
        </div>
        
        <div class='form-group'>
          <label class="col-sm-3">Posisi Ternak</label>
          <div class="col-sm-9">
              <p>:{{$row->posisi}}</p>
          </div>
        </div>
        
        <?php $jantan=DB::table('data_farm')
        ->where('id',$row->id_jantan)->first();
        
        $betina=DB::table('data_farm')
        ->where('id',$row->id_betina)->first();
        
        ?>
        
         
        <div class='form-group'>
          <label class="col-sm-3">Indukan Jantan</label>
          <div class="col-sm-9">
              <p>:{{$jantan->nama}}</p>
          </div>
        </div>
        
         
        <div class='form-group'>
          <label class="col-sm-3">Indukan Betina</label>
          <div class="col-sm-9">
              <p>:{{$betina->nama}}</p>
          </div>
        </div>
        
        </div>
        
        <div class="row">
        
    <div class="box box-warning" style="margin-top: 20px;">
            <div class="box-header with-border">
              <h3 class="box-title"><b>
                  Indukan dan Jantan Milik Orang Lain / Tidak Ada Di Kandang
                  </b></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                
        <div class='form-group'>
          <label class="col-sm-3">Indukan Betina</label>
          <div class="col-sm-9">
              <p>:{{$row->indukan_betina}}</p>
          </div>
        </div>
        
          <div class='form-group'>
          <label class="col-sm-3">Indukan Jantan</label>
          <div class="col-sm-9">
              <p>:{{$row->indukan_jantan}}</p>
          </div>
        </div>
                
                </div>
        </div>
        
           <div class="box box-warning" style="margin-top: 20px;">
            <div class="box-header with-border">
              <h3 class="box-title"><b>
                  Informasi Jika Ternak Di Beli Dari Pasar/Peternak Lainya
                  </b></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                       <div class='form-group'>
          <label class="col-sm-3">Nama Penjual / Farm</label>
          <div class="col-sm-9">
              <p>:{{$row->nama_penjual}}</p>
          </div>
        </div>
        
                      <div class='form-group'>
          <label class="col-sm-3">Tanggal Beli Ternak</label>
          <div class="col-sm-9">
              <p>:{{$row->tgl_beli}}</p>
          </div>
        </div>
                
          </div>
          </div>
          
                               <div class='form-group'>
          <label class="col-sm-3">Ternak Di Urus Mitra/Karyawan</label>
          <div class="col-sm-9">
              @if($mitra)
              <p>:{{$mitra->name}}</p>
              @else
              <p>:Pelihara di kandang sendiri</p>
              @endif
          </div>
        </div>
        
              <div class="form-group">
                  <label class="col-sm-3" for="exampleInputFile">Foto ternak</label>
                  <div class="col-sm-9">
                  
                  <img width="200px" height="200px" src="{{url($row->foto)}}">
                  <br>

                  <p class="help-block">foto ternak.</p>
                  </div>
                </div>
                
                      <div class="form-group">
                  <label class="col-sm-3" for="exampleInputFile">QRCODE</label>
                  <div class="col-sm-9">
                      <?php $link = url('detail_ternak/'.$row->kode); ?>
                      <img src="data:image/png;base64,{!! base64_encode(QrCode::format('png')->size(300)->generate($link)) !!} ">
                      <p class="help-block">Silahkan Download Qrcode</p>
                      <p class="help-block"><b>Dengan Cara Klik Tombol di Bawah</b></p>
                      <a href="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(300)->generate($link)) !!}" download="{{$row->nama}}{{$row->jenis_kelamin}}{{$row->kode}}" class="btn btn-sm btn-success">
                          download QRcode
                         </a>
                      </div>
                </div>
    
         
        
      </div>
    </div>
  </div>
@endsection