@extends('frontend.content')
@section('content')

          <section style="min-height:680px;max-height: 100%;background-color:#193776;background-image: url('../portofolio/landing/bg/image_corak_home_kenapa.png');background-repeat: no-repeat;
    background-position: bottom;background-position-x: left;">
        <div class="container">
              <div class="text-Left">
                    
              </div>
            <div class="row" style="padding-top: 140px">
              <div class="col-sm-12">
                    @if ( Session::get('message') != '' )
        
        <div class="alert alert-primary" role="alert">
 {{ Session::get('message') }}
</div>
            
        @endif
                <p class="text-white">Untuk melakukan activasi account silahkan cek email anda</p>
              </div>
            </div>

               
</div>
</div>
</section>

@endsection