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
        PEMASUKAN PETERNAKAN
      </p>
      <p style="padding-right: 5px">
         {{date('Y-m-d H:i:s')}}
      </p> 
            </td>
        </tr>

    </table>
</div>

 
	<div class="container" style="margin-top:10px;">
      <table id="customers" class="table" border="1px">
        <tbody>
          <tr>
            <td><b>Pemasukan</b></td>
            <td>{{$row[0]->pemasukan}}</td>
          </tr>
          <tr>
            <td><b>Kategori Pemasukan Dana</b></td>
            <td>{{$row[0]->jenis_pemasukan}}</td>
          </tr>
          <tr>
            <td><b>Tanggal</b></td>
            <td>{{$row[0]->tgl}}</td>
          </tr>
  
          <tr>
            <td><b>Harga</b></td>
            <td>Rp.{{number_format($row[0]->harga)}}</td>
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
</body>
</html>
