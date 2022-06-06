<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Result Swab Pcr</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/jumbotron/">

    

    <!-- Bootstrap core CSS -->
<link href="{{url('boostrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      .card{
        box-shadow: -2px 2px 0px -1px rgba(0,0,0,0.75);
-webkit-box-shadow: -2px 2px 0px -1px rgba(0,0,0,0.75);
-moz-box-shadow: -2px 2px 0px -1px rgba(0,0,0,0.75);
background: white;
border-radius: 25px;
      }

      .card-main{
        box-shadow: -2px 2px 11px -1px rgba(0,0,0,0.75);
-webkit-box-shadow: -2px 2px 11px -1px rgba(0,0,0,0.75);
-moz-box-shadow: -2px 2px 11px -1px rgba(0,0,0,0.75);
background: white;
border-radius: 25px;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .px5{
        padding: 10px;
      }
      .hj{
        margin-top: 5px;
        max-height: 700px;
    height: 100%;
      }
    </style>

    
  </head>
  <body style="background: aliceblue;">
    
<main>
  <div class="container">

   
      <div class="container px5 card-main hj">

<div class="row">
  <div class="col-sm-6">
        <div class="card" style="width: auto;">

  <div class="card-body">
    <div class="row">
      <div class="col-sm-12">
        <img class="mb-4" src="{{url($logo->foto)}}" width="100%">
      </div>
    </div>

    <center><h5 class="card-title" style="color: blue">Informasi Umum</h5></center>
    <hr>
    <p style=""></p>
    <table class="table table-borderless">
  <tr>
    <td><p><b style="color: #a8a8a8">Nama :</b></p></td>
  </tr>
  <tr>
      <td><p style="color: #757575;    font-weight: bolder;">{{$data->nama}}</p></td>
  </tr>
  <tr>
    <td><p><b style="color: #a8a8a8">Waktu Swab Selesai :</b></p></td>
  </tr>
  <tr>
       <td><p style="color: #757575;    font-weight: bolder;">{{$data->tanggal_pengamnilan_sample}}</p></td>
  </tr>
  
    <tr>
    <td><p><b style="color: #a8a8a8">Pemeriksaan :</b></p></td>
  </tr>
  <tr>
       <td><p style="color: #757575;    font-weight: bolder;">{{$data->pemeriksaan}}</p></td>
  </tr>
  
  <tr>
    <td><p><b style="color: #a8a8a8">Hasil Swab :</p></b></td>
  </tr>
  <tr><td><p style="color: #757575;    font-weight: bolder;">{{$data->status}}</p></td></tr>
</table>
    <!--<a href="#" class="btn btn-primary">Go somewhere</a>-->

  </div>
</div>
</div>


</div>
      </div>

    <footer class="pt-3 mt-4 text-muted border-top">
      &copy; 2021
    </footer>
  </div>
</main>


    
  </body>
</html>
