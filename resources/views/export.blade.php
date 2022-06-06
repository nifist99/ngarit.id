<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{crudbooster::getSetting('appname')}} : INVOICE</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" >
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <style type="text/css">
        @page {
            margin: 0px;
        }
        body {
            margin: 0px;
        }
        * {
            font-family: Verdana, Arial, sans-serif;
        }
        a {
            color: #fff;
            text-decoration: none;
        }
        table {
            font-size:  x-small;
        }
        .information table tr td{
          margin:0px;
          padding: 0px!important;
        }
        .information table{
        
  border-collapse: collapse;
  border-spacing: 0;

        }
        tfoot tr td {
            font-weight: bold;
            font-size: x-small;
        }
        .invoice table {
            margin: 15px;
        }
        .invoice h3 {
            margin-left: 15px;
        }
        .information {
         /*   background-color:#00a6ff;*/
            color: #FFF;
            padding: 0px;
        }
        .information .logo {
            margin: 5px;
        }
        .information table {
            padding: 0px;
            margin:0px;
        }
        .container {
            margin-left: 30px;
        }
    /*    .titel-konten{
            margin-left: 5px;
        }*/
    .information .va{
    background-color: #fff !important;
    border-bottom-right-radius: 100px;
    height:100%;
  top:0px;
  padding-left: 10px;
  padding-right: 100px;
  padding-top: 20px;
  padding-bottom: 20px;
    width: 200px;
    position: relative;
        }

        .information .ok{
      background-color: #fff !important;
    border-bottom-right-radius: 100px;
/*    border-radius: 20px!important*/
    height:70px;
  padding-left: 10px;
  padding-right: 100px;
  padding-top: 20px;
  padding-bottom: 20px;
    width: 220px;
        }

    </style>

</head>
<body>

<div class="information">
    <table width="100%"  style="background-color: #00a6ff">
        <tr>
            <td align="left" style="background-color: #00a6ff">
              <div class="ok">
                <img src="{{public_path('vendor/crudbooster/ngarit.jpg')}}" width="200px" alt="Logo" />
              </div>
            </td>
            <td align="right" style="width: 40%;background-color: #00a6ff">
        <p style="padding-right: 5px">
        DATA INFORMASI TERNAK
      </p>
      <p style="padding-right: 5px">
         {{date('Y-m-d H:i:s')}}
      </p> 
            </td>
        </tr>

    </table>
</div>

 
	<div class="page">
      <table id="customers" class="table" border="1px">
        <tbody>
          <tr>
               <?php $link = url('detail_ternak/'.$row[0]->kode); ?>
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
          
          $jantan=DB::table('data_farm')
          ->where('id',$row[0]->id_jantan)->first();
          
          $betina=DB::table('data_farm')
          ->where('id',$row[0]->id_betina)->first();
          
          $pemilik=DB::table('cms_users')->where('id',$row[0]->id_users)
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

        $kesehatan=DB::table('kesehatan_ternak')->where('id_kambing',$row[0]->id)->get();
        $adg=DB::table('adg_ternak')->where('id_kambing',$row[0]->id)->get();
        $jadwal=DB::table('jadwal_farm')->where('id_kambing',$row[0]->id)->get();
        $susu=DB::table('susu_ternak')->where('id_ternak',$row[0]->id)->get();

      ?>
 
<div class="col-sm-12">
          <table id="customers" class="table" border="1px">
          <tr>
              <th>
                 <h5 style="color:green"> Data Jika Ternak Dibeli Dari Peternak</h5>
              </th>
          </tr>
        <tbody>
          <tr>
              <td><b>Nama Penjual</b></td>
              <td><b>{{$row[0]->nama_penjual}}</b></td>
          </tr>
          <tr>
              <td><b>Tgl Beli</b></td>
              <td><b>{{$row[0]->tgl_beli}}</b></td>
          </tr>
          <tr>
              <td><b>Indukan Betina</b></td>
              <td><b>{{$row[0]->indukan_betina}}</b></td>
          </tr>
            <tr>
              <td><b>Indukan Jantan</b></td>
              <td><b>{{$row[0]->indukan_jantan}}</b></td>
          </tr>
        </tbody>
        </table>
</div>

<div class="col-sm-12">
<div>
  <h5 style="color:green">History Kesehatan Ternak</h5>
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
  <h5 style="color:green">History pertambahan berat badan dan pakan</h5>
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
  <h5 style="color:green">History Jadwal Ternak</h5>
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
  <h5 style="color:green">History pengambilan susu ternak</h5>
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
</body>
</html>
