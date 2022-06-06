<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Login</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/album/">

    

    <!-- Bootstrap core CSS -->
<link href="{{url('boostrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <style>
  
    </style>

     <style>
      html,
body {
  height: 100%;
}

body {
  display: flex;
  align-items: center;
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #f5f5f5;
}

.form-signin {
  width: 100%;
  height: 100%;
  max-width: 430px;
  padding: 15px;
  margin: auto;
}

.form-signin .checkbox {
  font-weight: 400;
}

.form-signin .form-floating:focus-within {
  z-index: 2;
}

.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}

.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}

      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      .card-bg{
        box-shadow: -1px 6px 24px -2px rgba(0,0,0,0.33);
-webkit-box-shadow: -1px 6px 24px -2px rgba(0,0,0,0.33);
-moz-box-shadow: -1px 6px 24px -2px rgba(0,0,0,0.33);
padding: 10px;
background: white;
      }

      .card-content{
       -webkit-box-shadow: 5px 5px 15px -11px #000000; 
box-shadow: 5px 5px 15px -11px #000000;
background: white;
border-radius: 10px;
padding: 20px 5px 20px 5px;
      }

      .card-main{
        -webkit-box-shadow: 5px 5px 15px -11px #000000; 
box-shadow: 5px 5px 15px -11px #000000;
background: #20c997;
border-radius: 10px;
padding: 5px;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
  </head>
  <body>
    
<main class="form-signin">
  <div class="card-bg">
  <form>
      <div class="container text-center">
         <div class="row">
          <h3 class="h3 mb-3 fw-normal">PCR System RSB Kupang</h3>
        </div>
        <img class="mb-4" src="{{url('boostrap/logo.png')}}" alt="" style="margin: 10px" width="100" height="100">
      </div>

<div class="card-content">
  <div class="card-main">
    <div class="container text-center">
      <h4><b>VALID</b></h4>
    </div>
         <div class="row">
            <div class="col-md-4">
              <img class="mb-4" src="{{url('boostrap/barcode.png')}}" alt="" style="margin: 10px" width="100" height="100">
            </div>
            <div class="col-md-8">

              <table class="table table-borderless">
                <tr>
                  <td> <b>NIK Pasien</b> : {{$data->nik}}</td>
                  
                </tr>
                 <tr>
                  <td><b>Nama Pasien</b> : {{$data->nama}}</td>
                  
                </tr>
                 <tr>
                  <td><b>Jenis Kelamin</b> : {{$data->gender}}</td>
                  
                </tr>
                 <tr>
                  <td><b>Pemeriksaan</b> : {{$data->pemeriksaan}}</td>
                  
                </tr>
                 <tr>
                  <td><b>Tanggal Pengambilan Sampel </b>: {{$data->tanggal_pengamnilan_sample}}</td>
                  
                </tr>
                <tr>
                   <td><b>{{$data->status}}</b></td>
                    </tr>
                  
                </tr>
              </table>
              
            </div>
         </div>
       </div>
       <p>Anda Admin silahkan <a href="http://lab.rsbkupang.com/login"><i>Log in</i></a> kedalam system</p>
     </div>
  </form>
</div>
</main>


    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

      
  </body>
</html>
