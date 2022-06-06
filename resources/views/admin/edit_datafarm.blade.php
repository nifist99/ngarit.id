<!-- First, extends to the CRUDBooster Layout -->
@extends('crudbooster::admin_template')
@section('content')
  <!-- Your html goes here -->
  @push('head')
  
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  
  @endpush
   <p><a title="Return" href="{{CRUDBooster::mainpath('')}}"><i class="fa fa-chevron-circle-left "></i>
  &nbsp; Back To List Data Ternak</a></p>

  <div class='panel panel-default'>
      
      
        <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Data Ternak</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
             <form class='form-horizontal' method='post' id="form" enctype="multipart/form-data" action="{{CRUDBooster::mainpath('editdata/'.$row->id)}}">
        {{csrf_field()}}

              <div class="box-body">
                <div class="form-group" style="padding-top: 10px;">
                  <label for="nama"class="col-sm-2 control-label">Nama Ternak</label>

                  <div class="col-sm-10">
                    <input type="text" required name="nama" class="form-control" id="nama"
                    value="{{$row->nama}}" placeholder="nama ternak">
                  </div>
                </div>
                        
            <div class="form-group" style="padding-top: 10px;">
                <label class="col-sm-2 control-label">Tanggal Lahir Ternak</label>
                <div class="col-sm-10">

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" required name="ttl" value="{{$row->ttl}}"  class="form-control pull-right" id="datepicker">
                </div>
                </div>
                <!-- /.input group -->
              </div>
              
                 <div class="form-group" style="padding-top: 10px;">
                  <label class="col-sm-2 control-label">Jenis Kelamin Ternak</label>
                  <div class="col-sm-10">
                  <select required name="jenis_kelamin" class="form-control">
                      <option value="{{$row->jenis_kelamin}}" selected="">{{$row->jenis_kelamin}}</option>
                     <option value="">--pilih Jenis Kelamin ternak--</option>
                    <option value="jantan">Jantan</option>
                    <option value="betina">Betina</option>
                  </select>
                  </div>
                </div>
                
                  <div class="form-group" style="padding-top: 10px;">
                  <label required class="col-sm-2 control-label">Jenis Pemeliharaan Ternak</label>
                  <div class="col-sm-10">
                  <select name="jenis_pemeliharaan" class="form-control">
                      
                      <option value="{{$row->jenis_pemeliharaan}}" selected="">{{$row->jenis_pemeliharaan}}</option>
                      <option value="">--pilih Jenis Pemeliharaan ternak--</option>
                    <option value="breeding">breeding</option>
                    <option value="penggemukan">penggemukan</option>
                    <option value="perah">perah</option>
                    <option value="perawatan cempe">perawatan cempe</option>
                  </select>
                  </div>
                </div>
                
            <div class="form-group" style="padding-top: 10px;">
                <label class="col-sm-2 control-label">Jenis Ternak</label>
                 <div class="col-sm-10">
                <select class="form-control select2" name="jenis" id="sel" style="width: 100%;">
                    
                    <option value="{{$jenis_ternak->id}}" selected="">{{$jenis_ternak->jenis}}</option>
                    <option value="">--Pilih Jenis Ternak--</option>
                @foreach($jenis_kambing as $key)
                  <option value="{{$key->id}}">{{$key->jenis}}</option>
                 @endforeach
                </select>
              </div>
              </div>
              
                <div class="form-group" style="padding-top: 10px;">
                  <label class="col-sm-2 control-label">Kondisi Ternak</label>
                  <div class="col-sm-10">
                  <textarea required class="form-control" name="kondisi" rows="4" placeholder="Enter ...">{{$row->kondisi}}</textarea>
                </div>
                </div>
                
                <div class="form-group" style="padding-top: 10px;">
                  <label class="col-sm-2 control-label">Status Ternak</label>
                  <div class="col-sm-10">
                  <select required name="posisi" class="form-control">
                    
                     <option value="{{$row->posisi}}" selected="">{{$row->kondisi}}</option>
                     <option value="">--pilih status ternak--</option>
                    <option value="kandang">kandang</option>
                    <option value="mati">mati</option>
                    <option value="terjual">terjual</option>
                  </select>
                  </div>
                </div>

                <?php $jantan=DB::table('data_farm')->where('id',$row->id_jantan)->first();
                $betina=DB::table('data_farm')->where('id',$row->id_betina)->first();

                 ?>
                
                                
              <div class="form-group" style="padding-top: 10px;">
                <label class="col-sm-2 control-label">Indukan Jantan</label>
                 <div class="col-sm-10">
                <select class="form-control select2" name="id_jantan" id="jantan" style="width: 100%;">
                    
                    <option value="{{$row->id_jantan}}" selected="">{{$jantan->nama}}</option>
                    <option value="">--Pilih Indukan Jantan--</option>
                @foreach($indukan_jantan as $key1)
                  <option value="{{$key1->id}}">{{$key1->nama}} , {{$key1->kode}}</option>
                 @endforeach
  
                </select>
              </div>
              </div>
              
                              <div class="form-group" style="padding-top: 10px;">
                <label class="col-sm-2 control-label">Indukan Betina</label>
                 <div class="col-sm-10">
                <select class="form-control select2" name="id_betina" id="betina" style="width: 100%;">
                  
                    <option value="{{$row->id_betina}}" selected="">{{$betina->nama}}</option>
                      <option value="">--Pilih Indukan Betina--</option>
                @foreach($indukan_betina as $key2)
                  <option value="{{$key2->id}}">{{$key2->nama}} 
                  , {{$key2->kode}}</option>
                 @endforeach
  
                </select>
              </div>
              </div>
                
        <div class="box box-success" style="margin-top: 20px;">
            <div class="box-header with-border">
              <h3 class="box-title"><b>
                  Isi Disini Jika Indukan Tidak Ada Di Kandang
                  </b></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Induka Jantan</label>
                    <div class="col-sm-10">
                  <input type="text" name="indukan_jantan" value="{{$row->indukan_jantan}}" class="form-control" placeholder="Indukan Jantan ...">
                   </div>
                </div>
                
                <div class="form-group">
                  <label class="col-sm-2 control-label">Indukan Betina</label>
                    <div class="col-sm-10">
                  <input type="text" name="indukan_betina" value="{{$row->indukan_betina}}"  class="form-control" placeholder="Indukan Betina ...">
                   </div>
                </div>
                
                
                  </div>
                </div>
                
                       <div class="box box-warning" style="margin-top: 20px;">
            <div class="box-header with-border">
              <h3 class="box-title"><b>
                  Isi Disini Jika Ternak Beli dari Penjual/pasar
                  </b></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Beli Dari</label>
                    <div class="col-sm-10">
                  <input type="text" name="nama_penjual" value="{{$row->nama_penjual}}" class="form-control" placeholder="Nama Penjual ..">
                   </div>
                </div>
                
                      <div class="form-group" style="padding-top: 10px;">
                <label class="col-sm-2 control-label">Tanggal Beli Ternak</label>
                <div class="col-sm-10">

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" name="tgl_beli" value="{{$row->tgl_beli}}" class="form-control pull-right" id="datepicker2">
                </div>
                </div>
                <!-- /.input group -->
              </div>
                
                
                  </div>
                </div>
                
              
                
        
              <div class="box box-danger" style="margin-top: 20px;">
            <div class="box-header with-border">
              <h3 class="box-title"><b>
                  Isi Disini Jika Ternak Di Rawat Karyawan Atau Mitra
                  </b></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                 
                
            <div class="form-group">
                <label class="col-sm-2 control-label">Pilih Karyawan atau Mitra</label>
                 <div class="col-sm-10">
                <select class="form-control select2" name="id_mitra" id="mitra" style="width: 100%;">
                 @if($cek_mitra->id!=null)
                   <option value="{{$cek_mitra->id}}" selected="">{{$cek_mitra->name}}</option>
                   @else
                    <option value="">Pelihara di Kandang Sendiri</option>
                   @endif
                    <option value="">--Pilih Mitra atau Karyawan--</option>
                  @foreach($mitra as $key3)
                  <option value="{{$key3->id}}">{{$key3->name}}</option>
                  @endforeach
                </select>
              </div>
              </div>
              </div>
              </div>

              @if($row->foto)

               <div class="form-group">
                  <label class="col-sm-2 control-label" for="exampleInputFile">Foto ternak</label>
                  <div class="col-sm-10">
                  
                  <img width="200px" height="200px" src="{{url($row->foto)}}">
                  <br>
                  <input type="hidden" name="foto" value="{{$row->foto}}" id="exampleInputFile">

                  <p><a class="btn btn-danger" href="{{CRUDBooster::mainpath('delete_image/'.$row->id)}}">Delete Image</a></p>

                  <p class="help-block">foto ternak.</p>
                  </div>
                </div>
                @else


              
         
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="exampleInputFile">Foto ternak</label>
                  <div class="col-sm-10">
                  <input type="file" name="foto" id="exampleInputFile">
                  

                  <p class="help-block">foto boleh di kosongi.</p>
                  </div>
                </div>
                @endif
             
                
                
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="{{CRUDBooster::mainpath('/')}}" class="btn btn-success">Kembali Ke Menu Ternak</a>
                <button type="submit" class="btn btn-primary">Edit Data</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
  </div>
  
  @push('bottom')
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
 <script>
        $(function () {
                    $('#sel').select2();
                    $('#jantan').select2();
                    $('#betina').select2();
                    $('#mitra').select2();
                })
                
     
 </script>
  @endpush
  
  
@endsection
