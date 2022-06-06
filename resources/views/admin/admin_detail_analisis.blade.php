<!-- First, extends to the CRUDBooster Layout -->
@extends('crudbooster::admin_template')
@section('content')
  <!-- Your html goes here -->
   <a href="{{CRUDBooster::mainpath($slug=NULL)}}"><i class="fa fa-chevron-circle-left">&nbsp;  Back To List Data</i></a>
  
  
  <div class="row">
                            <div class="col-md-4 col-sm-12">
           <div class="box box-warning">
            <div class="box-header">
              <i class="fa fa-list"></i>

              <h3 class="box-title">Kebutuhan Harian Cempe / anakan</h3>
              <!-- tools box -->
              <!-- /. tools -->
            </div>
            <div class="box-body">
                <canvas id="myChart_cempe" width="100%"></canvas>
                </div>
                </div>
                </div>
                
                                   <div class="col-md-4 col-sm-12">
           <div class="box box-warning">
            <div class="box-header">
              <i class="fa fa-list"></i>

              <h3 class="box-title">Kabutuhan Harian Penggemukan</h3>
              <!-- tools box -->
              <!-- /. tools -->
            </div>
            <div class="box-body">
                <canvas id="myChart_penggemukan" width="100%"></canvas>
                </div>
                </div>
                </div>
                
                                   <div class="col-md-4 col-sm-12">
           <div class="box box-warning">
            <div class="box-header">
              <i class="fa fa-list"></i>

              <h3 class="box-title">Kebutuhan Bunting dan Menyusui</h3>
              <!-- tools box -->
              <!-- /. tools -->
            </div>
            <div class="box-body">
                <canvas id="myChart_bunting" width="100%"></canvas>
                </div>
                </div>
                </div>
  </div>
  
  
  
  
  
  
  
  
  <div class='panel panel-default'>
    <div class='panel-heading'>Detail Analisis Pakan</div>
    <div class='panel-body'>      
        <!--<div class='form-group'>-->
        <!--  <label>Name</label>-->
        <!--  <p></p>-->
        <!--</div>-->
        <!-- etc .... -->
         
    <div class="row">
        
        <div class="col-md-6 col-sm-12">
        <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Data Parameter Analisa</h3>
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
              <h3 class="box-title">Data Bahan Pakan Kering Ternak Yang Di Pilih</h3>
            </div>
            <div class="box-body">
                 <div class="box-body table-responsive no-padding">
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
    <td>Total Bahan Kering : {{$total_kering}} gram</td>
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
                
            </div>
        </div>
        </div>
        
        </div>
         
      </form>
    </div>
  </div>
  
  
      
        <div class='panel panel-info'>
    <div class='panel-heading'>Kebutuhan Pakan ternak</div>
    <div class='panel-body'> 
     <div class="row">
         <div class="col-md-6 col-sm-12">
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
         
         <div class="col-md-6 col-sm-12">
        <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Kebutuhan Jika Bahan Basah dengan nutrsi yang sama</h3>
            </div>
            <div class="box-body">
                 <div class="box-body table-responsive no-padding">
                <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">nama</th>
      <th scope="col">bahan basah</th>
      <th scope="col">pk</th>
      <th scope="col">sk</th>
      <th scope="col">tdn</th>
      <th scope="col">p</th>
      <th scope="col">c</th>
      <th scope="col">Total Kg</th>
    </tr>
  </thead>

  <tbody>
      @foreach($bahan_pakan as $row)
    <tr>
      <th scope="row">{{$row['nama']}}</th>
      <td>100%</td>
      <td>{{$row['pk']}}</td>
      <td>{{$row['sk']}}</td>
      <td>{{$row['tdn']}}</td>
      <td>{{$row['p']}}</td>
      <td>{{$row['c']}}</td>
      <td><?php $total_g_susut = (1000*$row['bk'])/100;
      $jumlah_penyusutan_dari_1kg=1000/$total_g_susut;
     $kebutuhan_pakan_basah= $jumlah_penyusutan_dari_1kg*$total_g_susut;
      echo round($kebutuhan_pakan_basah,2)." gram";
      
      
      ?></td>
      <?php 
      $pktt +=$row['pk'];
      $sktt +=$row['sk'];
      $tdntt +=$row['tdn'];
      $ptt +=$row['p'];
      $ctt +=$row['c'];
      $total_basah +=$kebutuhan_pakan_basah;
      
       if($row['tdn']){
      $ii +=1;
      }
      
      ?>
    </tr>
    @endforeach
    <tr>
    <th scope="row">Total Nutrisi</th>
    <td>Basah</td>
    <td>{{$pktt}} %</td>
    <td>{{$sktt}} %</td>
    <td><?php $rr=$tdntt/$ii; echo $rr; ?>%</td>
    <td>{{$ptt}} %</td>
    <td>{{$ctt}} %</td>
    <td><?php echo round($total_basah,2);  ?> gram</td>
    </tr>
    </tbody>
    </table>
    </div>
    
       </div>
    </div>   
         
         
    </div>
    </div>
      
  </div>
  </div>
  
    <!--rumus-->
  
  <?php
  $result_1_kering=CRUDBooster::result_analisis_kering($total_kering,$hasil,$total_row);
  
  $hasil_pembanding=$hasil*1000;
  
    $result_1_basah=CRUDBooster::result_analisis_kering($total_basah,
    $hasil1,$total_row);
  
  $hasil_pembanding=$hasil*1000;
  $hasil_pembanding_basah=$hasil1*1000;

  ?>
  
       <div class='panel panel-warning'>
    <div class='panel-heading'><h3>Hasil Result Analisis Kebutuhan Untuk {{$parameter->total_ternak}} Ekor Ternak Pakan Kering</h3></div>
    <div class='panel-body'> 
     <div class="row">
          <div class="box-body table-responsive no-padding">
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
@if($total_kering < $hasil_pembanding )
  <tbody>
      @foreach($bahan_pakan as $row)
    <tr>
        <?php $kebutuhan_dalam_pakan_kering=($row['bk']*1000)/100; 
        
        $pertambahan_pk=CRUDBooster::result_analisis_pertambahan_nilai($row['pk'],$result_1_kering,$kebutuhan_dalam_pakan_kering);
        
        $pertambahan_sk=CRUDBooster::result_analisis_pertambahan_nilai($row['sk'],$result_1_kering,$kebutuhan_dalam_pakan_kering);
        
        
        $pertambahan_p=CRUDBooster::result_analisis_pertambahan_nilai($row['p'],$result_1_kering,$kebutuhan_dalam_pakan_kering);
        
        $pertambahan_c=CRUDBooster::result_analisis_pertambahan_nilai($row['c'],$result_1_kering,$kebutuhan_dalam_pakan_kering);
        
      
        ?>
      <th scope="row">{{$row['nama']}}</th>
      <td>{{$row['bk']}}%</td>
      <td>{{$row['pk']+$pertambahan_pk}}%</td>
      <td>{{$row['sk']+$pertambahan_sk}}%</td>
      <td>{{$row['tdn']}}%</td>
      <td>{{$row['p']+$pertambahan_p}}%</td>
      <td>{{$row['c']+$pertambahan_c}}%</td>
      <td>{{$row['sumber']}}</td>
      <td><?php 
      echo round($kebutuhan_dalam_pakan_kering+$result_1_kering,1)."gram";
      ?></td>
      <?php 
      $pktr +=$row['pk']+$pertambahan_pk;
      $sktr +=$row['sk']+$pertambahan_sk;
      $tdnt +=$row['tdn'];
      $ptr +=$row['p']+$pertambahan_p;
      $ctr +=$row['c']+$pertambahan_c;
      if($row['tdn']){
      $i +=1;
      }
      $total_kering_result +=$kebutuhan_dalam_pakan_kering+$result_1_kering;
      ?>
    </tr>
    @endforeach
    <tr>
    <th scope="row">Total Nutrisi Pakan</th>
    <td></td>
    <td>{{$pktr}} %</td>
    <td>{{$sktr}} %</td>
    <td><?php $r2=$tdnt/$i; echo round($r2,1); ?>%</td>
    <td>{{$ptr}} %</td>
    <td>{{$ctr}} %</td>
    <td><b style="color:blue">-</b></td>
    <td>Total Bahan Kering : {{$total_kering_result}} gram  / {{$total_kering_result/1000}} Kg</td>
    </tr>
    
    <tr>
    <th scope="row"><b style="color:blue">Nutrisi Pakan 1 Ekor Ternak</b></th>
    <td></td>
    <td><b style="color:blue">{{$pktr/$parameter->total_ternak}} %</b></td>
    <td><b style="color:blue">{{$sktr/$parameter->total_ternak}} %</b></td>
    <td><b style="color:blue"><?php $r2=$tdnt/$i; echo round($r2,1); ?>%</b></td>
    <td><b style="color:blue">{{$ptr/$parameter->total_ternak}} %</b></td>
    <td><b style="color:blue">{{$ctr/$parameter->total_ternak}} %</b></td>
    <td><b style="color:blue">-</b></td>
    <td><b style="color:blue">Kebutuhan 1 Ekor : {{$total_kering_result/$parameter->total_ternak}} gram /  {{($total_kering_result/$parameter->total_ternak)/1000}} Kg</b></td>
    </tr>
    
    </tbody>
    
    @else
    
      <tbody>
      @foreach($bahan_pakan as $row)
    <tr>
        <?php $kebutuhan_dalam_pakan_kering=($row['bk']*1000)/100; 
        
        $pertambahan_pk=CRUDBooster::result_analisis_pertambahan_nilai($row['pk'],$result_1_kering,$kebutuhan_dalam_pakan_kering);
        
        $pertambahan_sk=CRUDBooster::result_analisis_pertambahan_nilai($row['sk'],$result_1_kering,$kebutuhan_dalam_pakan_kering);
        
        
        $pertambahan_p=CRUDBooster::result_analisis_pertambahan_nilai($row['p'],$result_1_kering,$kebutuhan_dalam_pakan_kering);
        
        $pertambahan_c=CRUDBooster::result_analisis_pertambahan_nilai($row['c'],$result_1_kering,$kebutuhan_dalam_pakan_kering);
        
      
        ?>
      <th scope="row">{{$row['nama']}}</th>
      <td>{{$row['bk']}}%</td>
      <td>{{$row['pk']-$pertambahan_pk}}%</td>
      <td>{{$row['sk']-$pertambahan_sk}}%</td>
      <td>{{$row['tdn']}}%</td>
      <td>{{$row['p']-$pertambahan_p}}%</td>
      <td>{{$row['c']-$pertambahan_c}}%</td>
      <td>{{$row['sumber']}}</td>
      <td><?php 
      echo round($kebutuhan_dalam_pakan_kering-$result_1_kering,1)."gram";
      ?></td>
      <?php 
      $pktr +=$row['pk']-$pertambahan_pk;
      $sktr +=$row['sk']-$pertambahan_sk;
      $tdnt +=$row['tdn'];
      $ptr +=$row['p']-$pertambahan_p;
      $ctr +=$row['c']-$pertambahan_c;
      if($row['tdn']){
      $i +=1;
      }
      $total_kering_result +=$kebutuhan_dalam_pakan_kering-$result_1_kering;
      ?>
    </tr>
    @endforeach
    <tr>
    <th scope="row">Total Nutrisi Pakan</th>
    <td></td>
    <td>{{$pktr}} %</td>
    <td>{{$sktr}} %</td>
    <td><?php $r2=$tdnt/$i; echo round($r2,1); ?>%</td>
    <td>{{$ptr}} %</td>
    <td>{{$ctr}} %</td>
    <td><b style="color:blue">-</b></td>
    <td>Total Bahan Kering : {{$total_kering_result}} gram / {{$total_kering_result/1000}} Kg</td>
    </tr>
    
        <tr>
    <th scope="row"><b style="color:blue">Nutrisi Pakan 1 Ekor Ternak</b></th>
    <td></td>
    <td><b style="color:blue">{{$pktr/$parameter->total_ternak}} %</b></td>
    <td><b style="color:blue">{{$sktr/$parameter->total_ternak}} %</b></td>
    <td><b style="color:blue"><?php $r2=$tdnt/$i; echo round($r2,1); ?>%</b></td>
    <td><b style="color:blue">{{$ptr/$parameter->total_ternak}} %</b></td>
    <td><b style="color:blue">{{$ctr/$parameter->total_ternak}} %</b></td>
    <td><b style="color:blue">-</b></td>
    <td><b style="color:blue">Kebutuhan 1 Ekor : {{$total_kering_result/$parameter->total_ternak}} gram / {{($total_kering_result/$parameter->total_ternak)/1000}} Kg</b></td>
    </tr>
    
    
    </tbody>
    
    @endif
    
    
    
    </table>
    </div>
           </div>
    </div>
      
  </div>
  
  
  
  
    <div class='panel panel-info'>
    <div class='panel-heading'><h3>Hasil Result Analisis Kebutuhan Untuk {{$parameter->total_ternak}} Ekor Ternak Pakan Basah</h3></div>
    <div class='panel-body'> 
     <div class="row">
          <div class="box-body table-responsive no-padding">
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
  @if($total_basah < $hasil_pembanding_basah )
  <tbody>
      @foreach($bahan_pakan as $row)
    <tr>
        
        <?php 
        
        $total_g_susut = (1000*$row['bk'])/100;
        $jumlah_penyusutan_dari_1kg=1000/$total_g_susut;
        $kebutuhan_pakan_basah= $jumlah_penyusutan_dari_1kg*$total_g_susut;
        
        $kebutuhan_dalam_pakan_kering=($row['bk']*1000)/100; 
        
        
        $pertambahan_pk_basah=CRUDBooster::result_analisis_pertambahan_nilai($row['pk'],$result_1_kering,$kebutuhan_dalam_pakan_kering);
        
        $pertambahan_sk_basah=CRUDBooster::result_analisis_pertambahan_nilai($row['sk'],$result_1_kering,$kebutuhan_dalam_pakan_kering);
        
        
        $pertambahan_p_basah=CRUDBooster::result_analisis_pertambahan_nilai($row['p'],$result_1_kering,$kebutuhan_dalam_pakan_kering);
        
        $pertambahan_c_basah=CRUDBooster::result_analisis_pertambahan_nilai($row['c'],$result_1_kering,$kebutuhan_dalam_pakan_kering);
        
      
        ?>
      <th scope="row">{{$row['nama']}}</th>
      <td>{{$row['bk']}}%</td>
      <td>{{$row['pk']+$pertambahan_pk_basah}}%</td>
      <td>{{$row['sk']+$pertambahan_sk_basah}}%</td>
      <td>{{$row['tdn']}}%</td>
      <td>{{$row['p']+$pertambahan_p_basah}}%</td>
      <td>{{$row['c']+$pertambahan_c_basah}}%</td>
      <td>{{$row['sumber']}}</td>
      <td><?php 
      echo round($kebutuhan_pakan_basah+$result_1_basah,1)."gram";
      ?></td>
      <?php 
      $pktr_basah +=$row['pk']+$pertambahan_pk_basah;
      $sktr_basah +=$row['sk']+$pertambahan_sk_basah;
      $tdnt_basah +=$row['tdn'];
      $ptr_basah +=$row['p']+$pertambahan_p_basah;
      $ctr_basah +=$row['c']+$pertambahan_c_basah;
      if($row['tdn']){
      $k +=1;
      }
      $total_basah_result +=$kebutuhan_pakan_basah+$result_1_basah;
      ?>
    </tr>
     @endforeach
       <tr>
    <th scope="row">Total Nutrisi Pakan</th>
    <td></td>
    <td>{{$pktr_basah}} %</td>
    <td>{{$sktr_basah}} %</td>
    <td><?php $r2_basah=$tdnt_basah/$k; echo round($r2_basah,1); ?>%</td>
    <td>{{$ptr_basah}} %</td>
    <td>{{$ctr_basah}} %</td>
    <td><b style="color:blue">-</b></td>
    <td>Total Bahan Kering : {{$total_basah_result}} gram / {{$total_basah_result/1000}} Kg</td>
    </tr>
    
            <tr>
    <th scope="row"><b style="color:blue">Nutrisi Pakan 1 Ekor Ternak</b></th>
    <td></td>
    <td><b style="color:blue">{{$pktr_basah/$parameter->total_ternak}} %</b></td>
    <td><b style="color:blue">{{$sktr_basah/$parameter->total_ternak}} %</b></td>
    <td><b style="color:blue"><?php $r2_basah=$tdnt_basah/$k; echo round($r2_basah,1); ?>%</b></td>
    <td><b style="color:blue">{{$ptr_basah/$parameter->total_ternak}} %</b></td>
    <td><b style="color:blue">{{$ctr_basah/$parameter->total_ternak}} %</b></td>
    <td><b style="color:blue">-</b></td>
    <td><b style="color:blue">Kebutuhan 1 Ekor : {{$total_basah_result/$parameter->total_ternak}} gram / {{($total_basah_result/$parameter->total_ternak)/1000}} Kg</b></td>
    </tr>
    </tbody>
    @else
      <tbody>
      @foreach($bahan_pakan as $row)
    <tr>
        
        <?php 
        
        $total_g_susut = (1000*$row['bk'])/100;
        $jumlah_penyusutan_dari_1kg=1000/$total_g_susut;
        $kebutuhan_pakan_basah= $jumlah_penyusutan_dari_1kg*$total_g_susut;
        
        $kebutuhan_dalam_pakan_kering=($row['bk']*1000)/100; 
        
        
        $pertambahan_pk_basah=CRUDBooster::result_analisis_pertambahan_nilai($row['pk'],$result_1_kering,$kebutuhan_dalam_pakan_kering);
        
        $pertambahan_sk_basah=CRUDBooster::result_analisis_pertambahan_nilai($row['sk'],$result_1_kering,$kebutuhan_dalam_pakan_kering);
        
        
        $pertambahan_p_basah=CRUDBooster::result_analisis_pertambahan_nilai($row['p'],$result_1_kering,$kebutuhan_dalam_pakan_kering);
        
        $pertambahan_c_basah=CRUDBooster::result_analisis_pertambahan_nilai($row['c'],$result_1_kering,$kebutuhan_dalam_pakan_kering);
        
      
        ?>
      <th scope="row">{{$row['nama']}}</th>
      <td>{{$row['bk']}}%</td>
      <td>{{$row['pk']-$pertambahan_pk_basah}}%</td>
      <td>{{$row['sk']-$pertambahan_sk_basah}}%</td>
      <td>{{$row['tdn']}}%</td>
      <td>{{$row['p']-$pertambahan_p_basah}}%</td>
      <td>{{$row['c']-$pertambahan_c_basah}}%</td>
      <td>{{$row['sumber']}}</td>
      <td><?php 
      echo round($kebutuhan_pakan_basah-$result_1_basah,1)."gram";
      ?></td>
      <?php 
      $pktr_basah +=$row['pk']-$pertambahan_pk_basah;
      $sktr_basah +=$row['sk']-$pertambahan_sk_basah;
      $tdnt_basah +=$row['tdn'];
      $ptr_basah +=$row['p']-$pertambahan_p_basah;
      $ctr_basah +=$row['c']-$pertambahan_c_basah;
      if($row['tdn']){
      $k +=1;
      }
      $total_basah_result +=$kebutuhan_pakan_basah-$result_1_basah;
      ?>
    </tr>
     @endforeach
       <tr>
    <th scope="row">Total Nutrisi Pakan</th>
    <td></td>
    <td>{{$pktr_basah}} %</td>
    <td>{{$sktr_basah}} %</td>
    <td><?php $r2_basah=$tdnt_basah/$k; echo round($r2_basah,1); ?>%</td>
    <td>{{$ptr_basah}} %</td>
    <td>{{$ctr_basah}} %</td>
    <td><b style="color:blue">-</b></td>
    <td>Total Bahan Kering : {{$total_basah_result}} gram / {{$total_basah_result/1000}} Kg</td>
    </tr>
    
            <tr>
    <th scope="row"><b style="color:blue">Nutrisi Pakan 1 Ekor Ternak</b></th>
    <td></td>
    <td><b style="color:blue">{{$pktr_basah/$parameter->total_ternak}} %</b></td>
    <td><b style="color:blue">{{$sktr_basah/$parameter->total_ternak}} %</b></td>
    <td><b style="color:blue"><?php $r2_basah=$tdnt_basah/$k; echo round($r2_basah,1); ?>%</b></td>
    <td><b style="color:blue">{{$ptr_basah/$parameter->total_ternak}} %</b></td>
    <td><b style="color:blue">{{$ctr_basah/$parameter->total_ternak}} %</b></td>
    <td><b style="color:blue">-</b></td>
    <td><b style="color:blue">Kebutuhan 1 Ekor : {{$total_basah_result/$parameter->total_ternak}} gram / {{($total_basah_result/$parameter->total_ternak)/1000}} Kg</b></td>
    </tr>
    </tbody>
    @endif
    </table>
    
    </div>
    </div>
    </div>
    </div>
         
         
         
         <!--perbandingan kebutuhan harian dan racikan pakan-->
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
      <td>{{$pktr/$parameter->total_ternak}} %</td>
      <td>
          <?php
          
          if($kebutuhan_nutrisi->pk >= $pktr/$parameter->total_ternak){
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
        <td><?php $r2=$tdnt/$i; echo round($r2,1); ?>%</td>
        <td>
                     <?php
          
          if($kebutuhan_nutrisi->tdn >= round($r2,1) ){
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
        <td>{{$ptr/$parameter->total_ternak}} %</td>
        <td>
                     <?php
          
          if($kebutuhan_nutrisi->p>=$ptr/$parameter->total_ternak){
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
        <td>{{$ctr/$parameter->total_ternak}} %</td>
        <td>
                     <?php
          
          if($kebutuhan_nutrisi->ca>=$ctr/$parameter->total_ternak){
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
                    
                    $hasilpk=$pktr/$parameter->total_ternak;
                    $hasilp=$ptr/$parameter->total_ternak;
                    $hasilc=$ctr/$parameter->total_ternak;
                    $hasiltdn=$tdnt/$i;
                    
                    ?>
                    <canvas id="myChart" width="100%"></canvas>
                </div>
    </div>
      
  </div>
  
  @push('bottom')
  
  <script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.0/dist/chart.min.js"></script>
  
  <script type="text/javascript">
var ctxcempe = document.getElementById('myChart_cempe').getContext('2d');
var myChart_cempe = new Chart(ctxcempe, {
type: 'doughnut',
data : {
  labels: ['rumput', 'legum', 'pakan tambahan', 'air'],
  datasets: [
    {
      label: 'Kebutuhan Nutrisi',
      data: [<?php echo $cempe; ?>],
      backgroundColor: [
      'rgb(255, 99, 132)',
      'rgb(54, 162, 235)',
      'rgb(255, 205, 86)',
      '#28FFBF'
    ],
    }
  ]
},
  options: {
    responsive: true,
    plugins: {
      legend: {
        position: 'top',
      },
      title: {
        display: true,
        text: 'Chart Kebutuhan Nutrisi Cempe'
      }
    }
  },
});
    
</script>

<script type="text/javascript">
var ctxbunting = document.getElementById('myChart_bunting').getContext('2d');
var myChart_bunting = new Chart(ctxbunting, {
type: 'doughnut',
data : {
  labels: ['rumput', 'legum', 'pakan tambahan', 'air'],
  datasets: [
    {
      label: 'Kebutuhan Nutrisi',
      data: [<?php echo $bunting; ?>],
      backgroundColor: [
      'rgb(255, 99, 132)',
      'rgb(54, 162, 235)',
      'rgb(255, 205, 86)',
      '#28FFBF'
    ],
    }
  ]
},
  options: {
    responsive: true,
    plugins: {
      legend: {
        position: 'top',
      },
      title: {
        display: true,
        text: 'Chart Kebutuhan Nutrisi Bunting'
      }
    }
  },
});
    
</script>

<script type="text/javascript">
var ctxpenggemukan = document.getElementById('myChart_penggemukan').getContext('2d');
var myChart_penggemukan = new Chart(ctxpenggemukan, {
type: 'doughnut',
data : {
  labels: ['rumput', 'legum', 'pakan tambahan', 'air'],
  datasets: [
    {
      label: 'Kebutuhan Nutrisi',
      data: [<?php echo $penggemukan; ?>],
      backgroundColor: [
      'rgb(255, 99, 132)',
      'rgb(54, 162, 235)',
      'rgb(255, 205, 86)',
      '#28FFBF'
    ],
    }
  ]
},
  options: {
    responsive: true,
    plugins: {
      legend: {
        position: 'top',
      },
      title: {
        display: true,
        text: 'Chart Kebutuhan Nutrisi Penggemukan'
      }
    }
  },
});
    
</script>

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





















