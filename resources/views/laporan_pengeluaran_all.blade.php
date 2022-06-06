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
        PENGELUARAN PETERNAKAN
      </p>
      <p style="padding-right: 5px">
         {{date('Y-m-d H:i:s')}}
      </p> 
            </td>
        </tr>

    </table>
</div>

	<div class="container" style="margin-top:10px;">
	    <p><b>Keterangan Data Print</b></p>
	     <table id="customers" class="table" border="1px" style="margin-bottom:10px">
   
        <tbody>
            <tr>
                <td>Nama File</td>
                <td>{{$data['file']}}</td>
            </tr>
            <tr>
            <td>Kategori</td>
                <td>{{$data['kategori']}}</td>
            </tr>
             <tr>
                <td>Filter Date Start</td>
                <td>{{$data['start']}}</td>
            </tr>
             <tr>
                <td>Filter Date End</td>
                <td>{{$data['last']}}</td>
            </tr>
              <tr>
                <td>Nama Pencetak</td>
                <td>{{$data['name']}}</td>
            </tr>
        </tbody>
        </table>
	    
	    <p><b>Hasil Data Print</b></p>
      <table id="customers" class="table" border="1px">
          <thead>
              <tr>
        <th>Pengeluaran</th>
        <th>Kategori Pengeluaran Dana</th>
        <th>Tanggal</th>
        <th>Harga</th>
        </tr>
         </thead>
   
        <tbody>
            @foreach($data['row'] as $key)
            <tr>
              <td>{{$key->keperluan}}</td>
              <td>{{$key->jenis_keperluan}}</td>
              <td>{{$key->tgl}}</td>
              <td>Rp.{{number_format($key->harga)}}</td>
            </tr>
            <?php $jumlah +=$key->harga; ?>
            @endforeach
            <tr>
                <td colspan="3"><b>Total Pengeluaran</b></td>
                <td><b>Rp.{{number_format($jumlah)}}</b></td>
            </tr>
       </tbody>
      </table>
      </div>
</body>
</html>
