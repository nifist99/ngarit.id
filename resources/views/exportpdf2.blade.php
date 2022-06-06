<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Invoice - #123</title>

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
            font-size: x-small;
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
            background-color: #60A7A6;
            color: #FFF;
        }
        .information .logo {
            margin: 5px;
        }
        .information table {
            padding: 10px;
        }
    </style>

</head>
<body>

<div class="information">
    <table width="100%">
        <tr>
            <td align="left" style="width: 40%;">
                <h3>John Doe</h3>
                <pre>
Street 15
123456 City
United Kingdom
<br /><br />
Date: 2018-01-01
Identifier: #uniquehash
Status: Paid
</pre>


            </td>
            <td align="center">
                <img src="/path/to/logo.png" alt="Logo" width="64" class="logo"/>
            </td>
            <td align="right" style="width: 40%;">

                <h3>CompanyName</h3>
                <pre>
                    https://company.com

                    Street 26
                    123456 City
                    United Kingdom
                </pre>
            </td>
        </tr>

    </table>
</div>


<br/>

<div class="invoice">
    <h3>Invoice specification #123</h3>
         <table id="customers" class="table table-striped" border="1px">
        <tbody>
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
          
          $mitra=DB::table('data_mitra')->where('id',$row[0]->id_mitra)
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
            <td>{{$mitra->nama}}</td>
          </tr>
          
           <tr>
            <td><b>Foto</b></td>
            <td><img src="{{url($row[0]->foto)}}" width="300px"></td>
          </tr>
            
       

        </tbody>
      </table>
</div>

<div class="information" style="position: absolute; bottom: 0;">
    <table width="100%">
        <tr>
            <td align="left" style="width: 50%;">
                &copy; {{ date('Y') }} {{ config('app.url') }} - All rights reserved.
            </td>
            <td align="right" style="width: 50%;">
                Company Slogan
            </td>
        </tr>

    </table>
</div>
</body>
</html>