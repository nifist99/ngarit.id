<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Ngarit ID</title>
        <link rel="icon" type="image/x-icon" href="{{ CRUDBooster::getSetting('favicon')}}" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="   https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{url('portofolio/css/styles.css')}}" rel="stylesheet" />
         <link href="{{url('portofolio/css/custom.css')}}" rel="stylesheet" />

        <style type="text/css">
         

        </style>
        @stack('css')
    </head>
    <body id="page-top">
        
    <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="{{url('/')}}">NGARIT ID</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                         <li class="nav-item"><a class="nav-link" 
                        href="{{url('team')}}">Our Teams</a></li>
                         <li class="nav-item"><a class="nav-link" 
                        href="https://www.youtube.com/channel/UCoNSRwUfGkK9358KnMxMUmA" target="_blank">Tutorial</a></li>
                        <li class="nav-item"><a class="nav-link"
                        href="{{url('registrasi')}}">Registrasi</a></li>
                        <li class="nav-item"><a class="nav-link" 
                        href="{{url('admin/login')}}">Login Partner</a></li>
                        
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        

         @yield('content')
     
        
        <!-- Contact-->
         <section class="" id="" style="background-color: #193776">
            <div class="container">
            <div class="row bg-footer">
                
                <div class="col-md-6 col-sm-12">
                  <div style="margin-top: 80px">
                    <h2 class="text-white text-left">
                        Temukan Komunitas Kita Dengan Mudah
                    </h2>
                    <p class="text-white">

INDONESIA, NUSANTARA
                    </p>
                    <p class="text-white">
                        Fahmi Maulana : 085755124527
                    </p>
                    <p class="text-white">
                        Niko Figit S : 082238982100
                    </p>
                    
                     <p class="text-white">
                        Lidya : 08983212419
                    </p>
                    
                     <p class="text-white">
                        Chalidah W : 085868258328
                    </p>
                      <p class="text-white">
                        Dipta : 085705057737
                    </p>
                </div>

               </div>
               <div class="col-md-6 col-sm-12">
                <div class="text-center" style="margin-top: 80px">
                   <!--<iframe style="border-radius: 20px" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3954.6832234508715!2d112.00415171401382!3d-7.609407994513134!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7849f0c77ed53f%3A0x52ba5da972d1befe!2s96%20Farm%20Nganjuk!5e0!3m2!1sid!2sid!4v1627210088172!5m2!1sid!2sid" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy"></iframe>-->
                   
                   <iframe style="border-radius: 20px" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d32658811.88865562!2d99.44691326890155!3d-2.2758013419357703!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2c4c07d7496404b7%3A0xe37b4de71badf485!2sIndonesia!5e0!3m2!1sid!2sid!4v1627576737373!5m2!1sid!2sid" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
               </div>
               </div>
</div>
</div>
</section>


   <footer class="footer small text-center text-white-50" style="background-color: #193776">
            <div class="container px-4 px-lg-5">Copyright &copy; Ngarit 2021</div>
        </footer>
       
       <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

       <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"></script>

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{url('portofolio/js/scripts.js')}}"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
        
        <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-R86XETNBLH"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-R86XETNBLH');
</script>
        
          <script>

 $(document).ready(function(){
 
  $("#img1").mouseover(function(){
   
    $("#f1").css("color","white");
    $("#f11").css("color","white");

  });
  $("#img1").mouseout(function(){
   
    $("#f1").css("color","black");
    $("#f11").css("color","black");
  });

  $("#img2").mouseover(function(){
  
    $("#f2").css("color","white");
    $("#f22").css("color","white");
  });
  $("#img2").mouseout(function(){
    
    $("#f2").css("color","black");
    $("#f22").css("color","black");
  });

  $("#img3").mouseover(function(){
    
    $("#f3").css("color","white");
    $("#f33").css("color","white")
  });
  $("#img3").mouseout(function(){

    $("#f3").css("color","black");
    $("#f33").css("color","black");
  });
});
</script>
    </body>
</html>
