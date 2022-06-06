<!-- First, extends to the CRUDBooster Layout -->
@extends('crudbooster::admin_template')
@section('content')
 <a href="{{CRUDBooster::mainpath($slug=NULL)}}"><i class="fa fa-chevron-circle-left">&nbsp;  Back To List Data</i></a>
  <!-- Your html goes here -->
@push('head')
  
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  
  @endpush
  
   <div class="row">

            <div class="col-md-6 col-sm-12">
            <div class='panel panel-success'>
    <div class='panel-heading'><b>Sumber Protein</b></div>
    <div class='panel-body'>
        
        
             <form class="form-horizontal" method="post" 
             action="{{CRUDBooster::mainpath('simpansumber')}}"}>
                 {{csrf_field()}}
              <div class="box-body">
                  <input type="hidden" value="{{$id_analis}}" name="id_analis">
                   <input type="hidden" value="sumber protein" name="name">
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-4 control-label">Pilih</label>
                <div class="col-sm-8">
                <select class="form-control select2" name="sumber" data-placeholder="Pilih Sumber Protein"
                        style="width: 100%;" required>
                    <option value="">--silahkan pilih sumber protein--</option>
                    @foreach($protein as $key)
                  <option value="{{$key->id}}">{{$key->bahan}}</option>
                  @endforeach
                </select>
              </div>
              
             </div>
             
                <div class="form-group">
                  <label class="col-sm-4 control-label">Kondisi Bahan</label>
                  <div class="col-sm-8">
                  <select class="form-control" name="kondisi" data-placeholder="Pilih Kondisi Bahan" required>
                    <option value="">--pilih kondisi bahan--</option>
                    <option value="kering">Kering</option>
                    <option value="basah">Biasa / Basah</option>
                  </select>
                </div>
                </div>
                  
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label">Jumlah Pakan /Kg</label>

                  <div class="col-sm-8">
                    <input type="number" required name="jumlah" step="any" class="form-control" id="inputEmail3" placeholder="Pakan/kg">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-4 control-label">Harga/kg</label>

                  <div class="col-sm-8">
                    <input type="number" name="harga" class="form-control" id="inputPassword3" placeholder="Harga pakan/ kg" required>
                  </div>
                </div>
       
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Tambah</button>
              </div>
              <!-- /.box-footer -->
            </form>
            
            <div class="box-footer">
                 <div class="box-body table-responsive no-padding">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th scope="col">Bahan</th>
                      <th scope="col">Kondisi</th>
                      <th scope="col">Jumlah</th>
                      <th scope="col">Harga / Kg</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($tabel_protein as $val)
                    <?php 
                    $bahan=DB::table('bahan_pakan')
                    ->where('id',$val->id_bahan)->first();
                    ?>
                    <tr>
                      <th scope="row">{{$bahan->bahan}}</th>
                       <td>{{$val->kondisi}}</td>
                      <td>{{$val->jumlah}} kg</td>
                      <td>Rp.{{number_format($val->harga)}}/kg</td>
                      <td>
                  <a class='btn btn-success btn-sm' href='{{CRUDBooster::mainpath("delete_sumber/$val->id")}}'><span class="fa fa-trash"></span></a>
                      </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
            </div>
            
             </div>
             </div>
      </div>
      
            <div class="col-md-6 col-sm-12">
            <div class='panel panel-info'>
    <div class='panel-heading'><b>Sumber Energi</b></div>
    <div class='panel-body'>
        
        
          <form class="form-horizontal" method="post" 
             action="{{CRUDBooster::mainpath('simpansumber')}}"}>
                 {{csrf_field()}}
              <div class="box-body">
                  <input type="hidden" value="{{$id_analis}}" name="id_analis">
                   <input type="hidden" value="sumber energi" name="name">
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-4 control-label">Pilih</label>
                <div class="col-sm-8">
                <select class="form-control select2" name="sumber" data-placeholder="Pilih Sumber Energi"
                        style="width: 100%;" required>
                    <option value="">--silahkan pilih sumber energi--</option>
                    @foreach($energi as $key1)
                  <option value="{{$key1->id}}">{{$key1->bahan}}</option>
                  @endforeach
                </select>
              </div>
              
             </div>
             
                             <div class="form-group">
                  <label class="col-sm-4 control-label">Kondisi Bahan</label>
                  <div class="col-sm-8">
                  <select class="form-control" name="kondisi" data-placeholder="Pilih Kondisi Bahan" required>
                    <option value="">--pilih kondisi bahan--</option>
                    <option value="kering">Kering</option>
                    <option value="basah">Biasa / Basah</option>
                  </select>
                </div>
                </div>
                  
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label">Jumlah Pakan /Kg</label>

                  <div class="col-sm-8">
                    <input type="number" name="jumlah" step="any" class="form-control" id="inputEmail3" placeholder="Pakan/kg" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-4 control-label">Harga/kg</label>

                  <div class="col-sm-8">
                    <input type="number" name="harga" class="form-control" id="inputPassword3" placeholder="Harga pakan/ kg" required>
                  </div>
                </div>
       
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Tambah</button>
              </div>
              <!-- /.box-footer -->
            </form>
            
            <div class="box-footer">
                 <div class="box-body table-responsive no-padding">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th scope="col">Bahan</th>
                      <th scope="col">Kondisi</th>
                      <th scope="col">Jumlah</th>
                      <th scope="col">Harga / Kg</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($tabel_energi as $val1)
                    <?php 
                    $bahan=DB::table('bahan_pakan')
                    ->where('id',$val1->id_bahan)->first();
                    ?>
                    <tr>
                      <th scope="row">{{$bahan->bahan}}</th>
                      <td>{{$val1->kondisi}}</td>
                      <td>{{$val1->jumlah}} kg</td>
                      <td>Rp.{{number_format($val1->harga)}}/kg</td>
                      <td>
                  <a class='btn btn-info btn-sm' href='{{CRUDBooster::mainpath("delete_sumber/$val1->id")}}'><span class="fa fa-trash"></span></a>
                      </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
            </div>
         
             </div>
             </div>
      </div>
      
  </div>
  
  <div class="row">
       <div class="col-md-6 col-sm-12">
            <div class='panel panel-warning'>
    <div class='panel-heading'><b>Sumber Mineral</b></div>
    <div class='panel-body'>
        
        
         <form class="form-horizontal" method="post" 
             action="{{CRUDBooster::mainpath('simpansumber')}}"}>
                 {{csrf_field()}}
              <div class="box-body">
                  <input type="hidden" value="{{$id_analis}}" name="id_analis">
                   <input type="hidden" value="sumber mineral" name="name">
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-4 control-label">Pilih</label>
                <div class="col-sm-8">
                <select class="form-control select2" name="sumber" data-placeholder="Pilih Sumber mineral"
                        style="width: 100%;" required>
                    <option value="">--silahkan pilih sumber mineral--</option>
                    @foreach($mineral as $key2)
                  <option value="{{$key2->id}}">{{$key2->bahan}}</option>
                  @endforeach
                </select>
              </div>
              
             </div>
             
                             <div class="form-group">
                  <label class="col-sm-4 control-label">Kondisi Bahan</label>
                  <div class="col-sm-8">
                  <select class="form-control" name="kondisi" data-placeholder="Pilih Kondisi Bahan" required>
                    <option value="">--pilih kondisi bahan--</option>
                    <option value="kering">Kering</option>
                    <option value="basah">Biasa / Basah</option>
                  </select>
                </div>
                </div>
                  
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label">Jumlah Pakan /Kg</label>

                  <div class="col-sm-8">
                    <input type="number" name="jumlah" step="any" class="form-control" id="inputEmail3" placeholder="Pakan/kg" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-4 control-label">Harga/kg</label>

                  <div class="col-sm-8">
                    <input type="number" name="harga" class="form-control" id="inputPassword3" placeholder="Harga pakan/ kg" required>
                  </div>
                </div>
       
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Tambah</button>
              </div>
              <!-- /.box-footer -->
            </form>
            
            <div class="box-footer">
                 <div class="box-body table-responsive no-padding">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th scope="col">Bahan</th>
                      <th scope="col">Kondisi</th>
                      <th scope="col">Jumlah</th>
                      <th scope="col">Harga / Kg</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($tabel_mineral as $val2)
                    <?php 
                    $bahan=DB::table('bahan_pakan')
                    ->where('id',$val2->id_bahan)->first();
                    ?>
                    <tr>
                      <th scope="row">{{$bahan->bahan}}</th>
                      <td>{{$val2->kondisi}}</td>
                      <td>{{$val2->jumlah}} kg</td>
                      <td>Rp.{{number_format($val2->harga)}}/kg</td>
                      <td>
                  <a class='btn btn-warning btn-sm' href='{{CRUDBooster::mainpath("delete_sumber/$val2->id")}}'><span class="fa fa-trash"></span></a>
                      </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
            </div>
             
             
             </div>
             </div>
      </div>
      
                  <div class="col-md-6 col-sm-12">
            <div class='panel panel-danger'>
    <div class='panel-heading'><b>Sumber Serat</b></div>
    <div class='panel-body'>
        
        
            <form class="form-horizontal" method="post" 
             action="{{CRUDBooster::mainpath('simpansumber')}}"}>
                 {{csrf_field()}}
              <div class="box-body">
                  <input type="hidden" value="{{$id_analis}}" name="id_analis">
                   <input type="hidden" value="sumber serat" name="name">
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-4 control-label">Pilih</label>
                <div class="col-sm-8">
                <select class="form-control select2" name="sumber" data-placeholder="Pilih Sumber Serat"
                        style="width: 100%;" required>
                    <option value="">--silahkan pilih sumber serat--</option>
                    @foreach($serat as $key3)
                  <option value="{{$key3->id}}">{{$key3->bahan}}</option>
                  @endforeach
                </select>
              </div>
              
             </div>
             
                             <div class="form-group">
                  <label class="col-sm-4 control-label">Kondisi Bahan</label>
                  <div class="col-sm-8">
                  <select class="form-control" name="kondisi" data-placeholder="Pilih Kondisi Bahan" required>
                    <option value="">--pilih kondisi bahan--</option>
                    <option value="kering">Kering</option>
                    <option value="basah">Biasa / Basah</option>
                  </select>
                </div>
                </div>
                  
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label">Jumlah Pakan /Kg</label>

                  <div class="col-sm-8">
                    <input type="number" name="jumlah" step="any" class="form-control" id="inputEmail3" placeholder="Pakan/kg" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-4 control-label">Harga/kg</label>

                  <div class="col-sm-8">
                    <input type="number" name="harga" class="form-control" id="inputPassword3" placeholder="Harga pakan/ kg" required>
                  </div>
                </div>
       
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Tambah</button>
              </div>
              <!-- /.box-footer -->
            </form>
            
            <div class="box-footer">
                 <div class="box-body table-responsive no-padding">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th scope="col">Bahan</th>
                      <th scope="col">Kondisi</th>
                      <th scope="col">Jumlah</th>
                      <th scope="col">Harga / Kg</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($tabel_serat as $val3)
                    <?php 
                    $bahan=DB::table('bahan_pakan')
                    ->where('id',$val3->id_bahan)->first();
                    ?>
                    <tr>
                      <th scope="row">{{$bahan->bahan}}</th>
                      <td>{{$val3->kondisi}}</td>
                      <td>{{$val3->jumlah}} kg</td>
                      <td>Rp.{{number_format($val3->harga)}}/kg</td>
                      <td>
                  <a class='btn btn-danger btn-sm' href='{{CRUDBooster::mainpath("delete_sumber/$val3->id")}}'><span class="fa fa-trash"></span></a>
                      </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
            </div>
        
             
             
             </div>
             </div>
      </div>
      
  </div>
  
  
  <div class='panel panel-default'>
    <div class='panel-heading'><h3>Detail Analisis Pakan ini adalah parameter utama untuk perhitungan nutrisi pakan</h3></div>
    <div class='panel-body'>      
        
         
        <div class="row">
        
        <div class="col-md-6 col-sm-12">
        <div class="box box-success">
            <div class="box-header with-border">
              <p class="box-title">Data Parameter Analisa</p>
            </div>
            <div class="box-body">
                
        <div class='form-group'>
          <label>Nama</label>
          <p>{{$parameter->nama}}</p>
        </div>
        
                <div class='form-group'>
          <label>Berat rata-rata Ternak</label>
          <p>{{$parameter->berat_badan}} Kg</p>
        </div>
        
                <div class='form-group'>
          <label>Total ternak</label>
          <p>{{$parameter->total_ternak}} Ekor</p>
        </div>
        
                  <div class='form-group'>
          <label>Kebutuhan Nutrisi Untuk</label>
          <p>{{$parameter->kebutuhan}} Untuk Berat rata-rata {{$parameter->bb}} Kg</p>
        </div>
                
            </div>
        </div>
        </div>
        
         <div class="col-md-6 col-sm-12">
        <div class="box box-warning">
            <div class="box-header with-border">
              <p class="box-title">Data Bahan Pakan Yang di Pilih Sesui Jurnal setelah bahan dikeringkan ini kandunganya</p>
            </div>
            <div class="box-body">
                 <div class="box-body table-responsive no-padding">
                     @if($bahan_pakan!=null)
                <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">nama</th>
      <th scope="col">bk</th>
      <th scope="col">pk</th>
      <th scope="col">sk</th>
      <th scope="col">tdn</th>
      <th scope="col">p</th>
      <th scope="col">c</th>
      <th scope="col">sumber</th>
      <th scope="col">Total Kg</th>
    </tr>
  </thead>

  <tbody>
      @foreach($bahan_pakan as $row)
    <tr>
      <th scope="row">{{$row['nama']}}</th>
      <td>{{$row['bk']}}</td>
      <td>{{$row['pk']}}</td>
      <td>{{$row['sk']}}</td>
      <td>{{$row['tdn']}}</td>
      <td>{{$row['p']}}</td>
      <td>{{$row['c']}}</td>
      <td>{{$row['sumber']}}</td>
      <td><?php 
      $kebutuhan_dalam_pakan_kering=($row['bk']*1000)/100;
      echo $kebutuhan_dalam_pakan_kering."gram";
      ?></td>
      <?php 
      $pkt +=$row['pk'];
      $skt +=$row['sk'];
      $tdnt +=$row['tdn'];
      $pt +=$row['p'];
      $ct +=$row['c'];
      if($row['tdn']){
      $i +=1;
      }
      $total_kering +=$kebutuhan_dalam_pakan_kering;
      ?>
    </tr>
    @endforeach
    <tr>
    <th scope="row">Total Nutrisi</th>
    <td></td>
    <td>{{$pkt}} %</td>
    <td>{{$skt}} %</td>
    <td><?php $r=$tdnt/$i; echo $r; ?>%</td>
    <td>{{$pt}} %</td>
    <td>{{$ct}} %</td>
    <td><b style="color:blue">-</b></td>
    <td>Total Bahan Kering : 
    {{$total_kering}}  gram
    </td>
    </tr>
    </tbody>
    </table>
    </div>
    <p>Total Masing masing bahan di atas adalah pengeringan dari 1 kg bahan basah penyusutan % dilihat dari BK</p>
    <p><b>Penjelasan :</b></p>
    <ul>
        <li>bk = Bahan Kering</li>
        <li>pk = Protein Kasar</li>
        <li>sk = Serat Kasar</li>
        <li>tdn = Daya Serap Pakan Ketubuh Ternak</li>
        <li>p = Pospor</li>
        <li>c = Calcium</li>
        <li>Sumber = Adalah Golongan Pakan Masuk Dalam Kategori Jenis Nutrisi</li>
    </ul>
    
     @else
    <h3>Silahkan Tambahkan Bahan Pakan Ternak</h3>
    @endif
                
            </div>
        </div>
        </div>
        
         </div>
        
    </div>
  </div>
  
     <div class='panel panel-info'>
    <div class='panel-heading'>Kebutuhan Pakan ternak</div>
    <div class='panel-body'> 
     <div class="row">
         <div class="col-sm-12">
              <div class='form-group'>
          <label>kebutuhan nutrisi untuk {{$parameter->total_ternak}} ekor kambing dalam sehari dengan kriteria:</label>
          <p>{{$kebutuhan_nutrisi->nama}} dengan berat rata rata {{$kebutuhan_nutrisi->berat_badan}}Kg</p>
        </div>
        
<table class="table table-borderless">
  <tbody>
    <tr>
      <th scope="row">Bahan Kering</th>
      <td>{{$kebutuhan_nutrisi->bk_bb}} % dari berat badan ternak</td>
    </tr>
    
    <tr>
     <th scope="row">Bahan Basah</th>
      <td>{{$kebutuhan_nutrisi->bs_bb}} % dari berat badan ternak</td>
    </tr>
    
     <tr>
      <th scope="row">Berat Badan</th>
      <td>{{$kebutuhan_nutrisi->berat_badan}} Kg</td>
    </tr>
    
    <tr>
        <th scope="row">Protein Kasar</th>
      <td>{{$kebutuhan_nutrisi->pk}} %</td>
    </tr>
       <tr>
        <th scope="row">Calcium</th>
      <td>{{$kebutuhan_nutrisi->ca}} %</td>
    </tr>
    
       <tr>
        <th scope="row">Pospor</th>
      <td>{{$kebutuhan_nutrisi->p}} %</td>
    </tr>
    
       <tr>
        <th scope="row">Tdn</th>
      <td>{{$kebutuhan_nutrisi->tdn}} %</td>
    </tr>
    
    <tr>
        <th scope="row">Kebutuhan Pakan / hari : Berat Badan x 
        <b style="color:red">Bahan Kering</b> / 100 % </th>
      <td><?php $hasil =(($kebutuhan_nutrisi->berat_badan * $kebutuhan_nutrisi->bk_bb)/100)*$parameter->total_ternak; 
      
      echo "= <b>".$hasil."kg </b> / hari /".$parameter->total_ternak." ekor";
      
      ?></td>
    </tr>
    
        <tr>
        <th scope="row">Kebutuhan Pakan / hari : Berat Badan x 
        <b style="color:blue">Bahan Basah</b> / 100 % </th>
      <td><?php $hasil1 =(($kebutuhan_nutrisi->berat_badan * $kebutuhan_nutrisi->bs_bb)/100)*$parameter->total_ternak; 
      
      echo "= <b>".$hasil1."kg </b> / hari /".$parameter->total_ternak." ekor";
      
      ?></td>
    </tr>


    
    </tbody>
    </table>
    
    </div>
    </div>
    </div>
    </div>
    
     <div class='panel panel-danger'>
    <div class='panel-heading'><h3>Result Analisis Nutrisi Pakan Ternak</h3></div>
    <div class='panel-body'>      
        <div class="row">
            @if($bahan_pakan!=null)
             <div class="box-body table-responsive no-padding">
            <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">nama</th>
      <th scope="col">bahan kering</th>
      <th scope="col">protein kasar</th>
      <th scope="col">serat kasar</th>
      <th scope="col">tdn</th>
      <th scope="col">pospor</th>
      <th scope="col">calcium</th>
      <th scope="col">Kondisi</th>
      <th scope="col">sumber</th>
      <th scope="col">Berat/Kg</th>
      <th scope="col">Harga/Kg</th>
      <th scope="col">Total Harga</th>
    </tr>
  </thead>

  <tbody>
      @foreach($bahan_pakan as $row)
    <tr>
      <th scope="row">{{$row['nama']}}</th>
      <td>{{$row['bk']}}%</td>
      <td>{{CRUDBooster::nilai_giziv2($row['pk'],$row['bk'],$row['jumlah'],$row['kondisi'])}}%</td>
      <td>{{CRUDBooster::nilai_giziv2($row['sk'],$row['bk'],$row['jumlah'],$row['kondisi'])}}%</td>
      <td>{{$row['tdn']}}%</td>
      <td>{{CRUDBooster::nilai_giziv2($row['p'],$row['bk'],$row['jumlah'],$row['kondisi'])}}%</td>
      <td>{{CRUDBooster::nilai_giziv2($row['c'],$row['bk'],$row['jumlah'],$row['kondisi'])}}%</td>
      <td>{{$row['kondisi']}}</td>
      <td>{{$row['sumber']}}</td>
      <td>{{$row['jumlah']}} kg</td>
      <td>Rp.{{number_format($row['harga'])}}</td>
      <td><?php $total_harga=$row['jumlah']*$row['harga'];
      echo "Rp".number_format($total_harga);
      ?></td>
      
       <?php 
      $pktn +=CRUDBooster::nilai_giziv2($row['pk'],$row['bk'],$row['jumlah'],$row['kondisi']);
      $sktn +=CRUDBooster::nilai_giziv2($row['sk'],$row['bk'],$row['jumlah'],$row['kondisi']);
      $tdntn +=$row['tdn'];
      $ptn +=CRUDBooster::nilai_giziv2($row['p'],$row['bk'],$row['jumlah'],$row['kondisi']);
      $ctn +=CRUDBooster::nilai_giziv2($row['c'],$row['bk'],$row['jumlah'],$row['kondisi']);
      $total_jumlah +=$row['jumlah'];
      $harga_keseluruhan +=$total_harga;
      
      if($row['tdn']){
      $n +=1;
      }
     
      ?>
    </tr>
    @endforeach
    <tr>
    <th scope="row">Total Nutrisi</th>
    <td></td>
    <td><b style="color:blue">{{$pktn}} %</b></td>
    <td><b style="color:blue">{{$sktn}} %</b></td>
    <td><?php $r2=$tdntn/$n; echo $r2; ?>%</td>
    <td><b style="color:blue">{{$ptn}} %</b></td>
    <td><b style="color:blue">{{$ctn}} %</b></td>
    <td></td>
    <td></td>
    <td><b style="color:blue">{{$total_jumlah}} kg</b></td>
    <td></td>
    <td><b style="color:blue">Rp.{{number_format($harga_keseluruhan)}}</b></td>
    </tr>
    </tbody>
    </table>
    </div>
            @else
            <h3>Silahkan Tambahkan Bahan Pakan Ternak</h3>
            @endif
                  </div>
             </div>
      </div>
      
      @if($bahan_pakan!=null) 
      <div class='panel panel-success'>
    <div class='panel-heading'><h3>Perbandingan kebutuhan nutrisi harian dan racikan pakan Untuk 1 Ekor Ternak</h3></div>
    <div class='panel-body'> 
     <div class="row">
          <div class="box-body table-responsive no-padding">
         <table class="table table-borderless">
  <thead>
    <tr>
      <th scope="col">Parameter</th>
      <th scope="col">Kebutuhan Harian</th>
      <th scope="col">Hasil Racikan</th>
      <th scope="col">Kesimpulan</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Protein Kasar / Pk</th>
      <td>{{$kebutuhan_nutrisi->pk}}%</td>
      <td>{{$pktn/$parameter->total_ternak}} %</td>
      <td>
          <?php
          
          if($kebutuhan_nutrisi->pk >= $pktn/$parameter->total_ternak){
              echo "Nutrisi Protein Kasar Belum Terpenuhi Silahkan Tambahkan Lebih Banyak Bahan Yang Mengandung PK Tinggi";
          }else{
              echo "Nutrisi Protein Kasar Sudah Terpenuhi";
          }
          
          
          ?>
          
          
      </td>
      
    
     
    </tr>
    <tr>
        <td scope="row">Daya Serap Pakan / Tdn</td>
        <td>{{$kebutuhan_nutrisi->tdn}}%</td>
        <td><?php $r3=$tdntn/$n; echo round($r3,1); ?>%</td>
        <td>
                     <?php
          
          if($kebutuhan_nutrisi->tdn >= round($r3,1) ){
              echo "Nutrisi TDN Belum Terpenuhi Silahkan Tambahkan Lebih Banyak Bahan Yang Mengandung TDN Tinggi";
          }else{
               echo "Nutrisi TDN Sudah Terpenuhi";
          }
          
          
          ?>
        </td>
        
    </tr>
        <tr>
              <td scope="row">Pospor / p</td>
                      <td>{{$kebutuhan_nutrisi->p}}%</td>
        <td>{{$ptn/$parameter->total_ternak}} %</td>
        <td>
                     <?php
          
          if($kebutuhan_nutrisi->p>=$ptn/$parameter->total_ternak){
               echo "Nutrisi Pospor Belum Terpenuhi Silahkan Tambahkan Lebih Banyak Bahan Yang Mengandung Pospor Tinggi";
          }else{
              echo "Nutrisi Pospor Sudah Terpenuhi";
          }
          
          
          ?>
        </td>
        
    </tr>
        <tr>
             <td scope="row">Calcium / c</td>
                     <td>{{$kebutuhan_nutrisi->ca}}%</td>
        <td>{{$ctn/$parameter->total_ternak}} %</td>
        <td>
                     <?php
          
          if($kebutuhan_nutrisi->ca>=$ctn/$parameter->total_ternak){
               echo "Nutrisi Calcium Belum Terpenuhi Silahkan Tambahkan Lebih Banyak Bahan Yang Mengandung Calcium Tinggi";
          }else{
              echo "Nutrisi Calcium Sudah Terpenuhi";
          }
          
          
          ?>
        </td>
        
    </tr>

    </tbody>
    </table>
    </div>
         
                </div>
                
                <div class="row">
                    <?php
                    
                    $hasilpk=$pktn/$parameter->total_ternak;
                    $hasilp=$ptn/$parameter->total_ternak;
                    $hasilc=$ctn/$parameter->total_ternak;
                    $hasiltdn=$tdntn/$n;
                    
                    ?>
                    <canvas id="myChart" width="100%"></canvas>
                </div>
                
    </div>
      
  </div>
  
  
   <div class='panel panel-info'>
    <div class='panel-heading'><h3>Informasi Tambahan</h3></div>
    <div class='panel-body'>      
        <div class="row">
             <div class="box-body table-responsive no-padding">
              <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Nama</th>
      <th scope="col">Kondisi</th>
      <th scope="col">Total Pakan</th>
      <th scope="col">Total pakan / 1 ekor</th>
 
    </tr>
  </thead>
      <tbody>
        <tr>
        <td scope="row">Total Pakan yang dibuat</td>
        <td>Perhatikan Yang Kamu Buat Di atas Pakan Kering atau Basah</td>
        <td>{{$total_jumlah}} Kg</td>
        <td>{{$total_jumlah/$parameter->total_ternak}} Kg</td>
         
    </tr>
     </tbody>
    </table>
    </div>
    <br>
    <h4><b>Kebutuhan Pakan Harian Untuk Ternak Yang Harus di Penuhi Sesui Kondisi Pakan Kering / Basah / Kebutuhan Per ekor</b></h4>
    <br>
     <div class="box-body table-responsive no-padding">
     <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Nama</th>
      <th scope="col">Kondisi Bahan</th>
      <th scope="col">Total Kebutuhan Pakan</th>
      <th scope="col">Total Kebutuhan pakan / 1 ekor</th>
 
    </tr>
  </thead>
      <tbody>
          <tr>
        <th scope="row">Kebutuhan Pakan  
        <b style="color:red">Bahan Kering</b></th>
        <td>Kering</td>
      <td><?php $hasil =(($kebutuhan_nutrisi->berat_badan * $kebutuhan_nutrisi->bk_bb)/100)*$parameter->total_ternak; 
      
      echo "<b>".$hasil."kg </b> / hari /".$parameter->total_ternak." ekor";
      
      ?></td>
      <td>{{$hasil/$parameter->total_ternak}}Kg</td>
    </tr>
         <tr>
        <th scope="row">Kebutuhan Pakan
        <b style="color:blue">Bahan Basah</b></th>
        <td>Basah</td>
      <td><?php $hasil1 =(($kebutuhan_nutrisi->berat_badan * $kebutuhan_nutrisi->bs_bb)/100)*$parameter->total_ternak; 
      
      echo "<b>".$hasil1."kg </b> / hari /".$parameter->total_ternak." ekor";
      
      ?></td>
      <td>{{$hasil1/$parameter->total_ternak}}Kg</td>
    </tr>
         </tbody>
    </table>  
    </div>
    
    </div>
    </div>
    </div>
    
       <div class='panel panel-success'>
    <div class='panel-heading'><h3>Kesimpulan</h3></div>
    <div class='panel-body'>      
        <div class="row">
            
            <center><p>Total Harga Pakan Perhari Sesuai Parameter Total Ternak , Berat Ternak dan Pemilihan Pakan Serta Jumlah Pakan Adalah</p></center> 
            
           <center><h1>RP.{{number_format($harga_keseluruhan)}} / Hari</h1></center> 
           
           <hr>
           
           
           <?php $hari_jumlah= $harga_keseluruhan*$parameter->lama_perawatan;
                 $biaya_perekor=$harga_keseluruhan/$parameter->total_ternak;
                 
                 $biaya_final=$hari_jumlah/$parameter->total_ternak;
           
           
           ?>
           
           <center>Biaya Perekor / hari</center>
           <center> <h1>RP.{{number_format($harga_keseluruhan)}} / {{$parameter->total_ternak}} Ekor = Rp.{{number_format($biaya_perekor)}}</h1></center>
           <hr>
             <center><p>Jika dikalikan lamanya perawatan maka hasilnya</p></center>
           
          <center> <h1>RP.{{number_format($harga_keseluruhan)}} x {{$parameter->lama_perawatan}} Hari = Rp.{{number_format($hari_jumlah)}}</h1></center>
          <hr>
            <center><p>Total Biaya / Ekor Selama {{$parameter->lama_perawatan}} Hari</p></center>
             <center> <h1>RP.{{number_format($hari_jumlah)}} / {{$parameter->total_ternak}} Ekor = Rp.{{number_format($biaya_final)}}</h1></center>
            
          <hr>
          <center><h3>Jika Hasil Tidak Sesuai Dengan Yang Di Harapkan Sialahkan Ganti Sesuka Anda Parameternya Sampai Komposisi Pakan Sempurna Dan Harga Terjangkau</h3></center>
          
    </div>
    </div>
    </div> 
    
    @else
    <h3>Silahkan Isi Bahan Makanan Yang Akan di Analisis</h3>
    @endif
  
    
   @push('bottom')
   
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    
 <script>

        $(function () {
                    $('.select2').select2();
                })
 </script>
 <script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.0/dist/chart.min.js"></script>
<script>
    var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['protein kasar','Tdn','Pospor','Calcium'],
        datasets: [{
            label: '#Nutrisi Harian Ternak',
            data: [<?php echo $kebutuhan_nutrisi->pk.','.$kebutuhan_nutrisi->tdn.','.$kebutuhan_nutrisi->p.','.$kebutuhan_nutrisi->ca; ?>],
            backgroundColor:
                'rgba(255, 99, 132, 0.2)',
            borderColor:
                'rgba(255, 99, 132, 1)',
            borderWidth: 1
        },{
            label: '#Nutrisi Pakan Racikan',
            data: [<?php echo $hasilpk.','.$hasiltdn.','.$hasilp.','.$hasilc; ?>],
            backgroundColor:
                'rgba(54, 162, 235, 0.2)',
            borderColor:
                'rgba(54, 162, 235, 1)',
            borderWidth: 1
        }
        
        ],
        
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>

 
  @endpush
@endsection
