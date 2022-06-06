<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" >
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>

<style>
.page{
  margin-top: 20px;
  margin-right: 10px;
  margin-left: 10px;
}
#customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
}
</style>
<body>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">    
  <div class="page">
    <h4>Data Farm {{$row[0]->kode}}</h4>
    <p style="text-align: right;"> {{date('d-M-Y')}}</p>
  </div>
	<div class="page">
      <table id="customers" class="table table-striped" border="1px">
        <tbody>
                 <tr>
               <?php $link = url('detail_ternak_investor/'.$row[0]->kode); ?>
            <td><b>Scan Barcode Berikut Untuk Melihat Detail Ternak</b></td>
            <td><img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(100)->generate($link)) !!} "></td>
          </tr>
      
          <tr>
            <td><b>Kode</b></td>
            <td>{{$row[0]->kode}}</td>
          </tr>
          <tr>
            <td><b>Nama Farm</b></td>
            <td>{{$row[0]->nama}}</td>
          </tr>
          <tr>
            <td><b>Tanggal Lahir Ternak</b></td>
            <td>{{$row[0]->ttl}}</td>
          </tr>

         
          <tr>
            <td><b>Jenis Kelamin</b></td>
            <td>{{$row[0]->jenis_kelamin}}</td>
          </tr>

          <?php 

          $jenis=DB::table('jenis_kambing')
          ->where('id',$row[0]->jenis)->first();
          
          $jantan=DB::table('data_farm_investor')
          ->where('id',$row[0]->id_jantan)->first();
          
          $betina=DB::table('data_farm_investor')
          ->where('id',$row[0]->id_betina)->first();
          
          $pemilik=DB::table('cms_users')->where('id',$row[0]->id_investor)
          ->first();
          
          $mitra=DB::table('cms_users')->where('id',$row[0]->id_mitra)
          ->first();

          ?>

           <tr>
            <td><b>Jenis Hewan</b></td>
            <td>{{$jenis->jenis}}</td>
          </tr>

            <tr>
            <td><b>Kondisi</b></td>
            <td>{{$row[0]->kondisi}}</td>
          </tr>

            <tr>
            <td><b>Status</b></td>
            <td>{{$row[0]->posisi}}</td>
          </tr>
          
           <tr>
            <td><b>Indukan Jantan</b></td>
            <td>{{$jantan->kode}}</td>
          </tr>
          
           <tr>
            <td><b>Indukan Betina</b></td>
            <td>{{$betina->kode}}</td>
          </tr>
          
           <tr>
            <td><b>Pemilik ternak</b></td>
            <td>{{$pemilik->name}}</td>
          </tr>
          
          
           <tr>
            <td><b>Mitra</b></td>
            <td>{{$mitra->name}}</td>
          </tr>
            @if($row[0]->foto!=null)
           <tr>
            <td><b>Foto</b></td>
            <td><img src="{{url($row[0]->foto)}}" width="300px"></td>
          </tr>
          @endif
            
       

        </tbody>
      </table>
      
      
      
      </div>
   
         <?php 

        $kesehatan=DB::table('kesehatan_ternak_investor')->where('id_kambing',$row[0]->id)->get();
        $adg=DB::table('adg_ternak_investor')->where('id_kambing',$row[0]->id)->get();
        $jadwal=DB::table('jadwal_farm_investor')->where('id_kambing',$row[0]->id)->get();
        $susu=DB::table('susu_ternak_investor')->where('id_ternak',$row[0]->id)->get();

      ?>
 


<div class="col-sm-12">
<div>
  <h4 style="color:green">History Kesehatan Ternak</h4>
</div>       
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">nama</th>
      <th scope="col">keterangan sakit</th>
      <th scope="col">tgl pengecekan</th>
      <th scope="col">penanganan/penyemnuhan</th>
    </tr>
  </thead>
  <tbody>
    @foreach($kesehatan as $key)
    <tr>
      <th scope="row">{{$key->nama}}</th>
      <td>{{$key->keterangan_sakit}}</td>
      <td>{{$key->tgl}}</td>
      <td>{{$key->penanganan_sakit}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>



<div class="col-sm-12"> 
<div>
  <h4  style="color:green">History pertambahan berat badan dan pakan</h4>
</div>        
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Tanggal Pengecekan</th>
      <th scope="col">pakan ternak</th>
      <th scope="col">berat</th>
      <th scope="col">keterangan</th>
    </tr>
  </thead>
  <tbody>
    @foreach($adg as $key1)
    <tr>
      <th scope="row">{{$key1->tgl}}</th>
      <td>{{$key1->pakan_ternak}}</td>
      <td>{{$key1->berat}}</td>
      <td>{{$key1->keterangan}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>



<div class="col-sm-12"> 
<div>
  <h4  style="color:green">History Jadwal Ternak</h4>
</div>        
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">jadwal</th>
      <th scope="col">kondisi_pelaksanaan</th>
      <th scope="col">tanggal</th>
    </tr>
  </thead>
  <tbody>
    @foreach($jadwal as $key2)
    <tr>
      <th scope="row">{{$key2->jadwal}}</th>
      <td>{{$key2->kondisi_pelaksanaan}}</td>
      <td>{{$key2->created_at}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>

<div class="col-sm-12">   
<div>
  <h4  style="color:green">History pengambilan susu ternak</h4>
</div>      
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">tanggal</th>
      <th scope="col">jumlah liter</th>
      <th scope="col">catatan</th>
    </tr>
  </thead>
  <tbody>
    @foreach($susu as $key3)
    <tr>
      <th scope="row">{{$key3->tgl}}</th>
      <td>{{$key3->jumlah_liter}}</td>
      <td>{{$key3->catatan}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>

      
      
      </div>

</body>
</html>
