@extends('frontend.content')
@section('content')

                <div style="position:fixed;right:20px;bottom:20px;">
<a href="https://api.whatsapp.com/send?phone=+6285868258328&text=Halo">
<button style="color:white;background:#32C03C;vertical-align:center;height:36px;border-radius:5px">
Whatsapp Kami</button></a>
</div>

  <section style="min-height:680px;max-height: 100%;background-color:#193776;background-image: url('../portofolio/landing/image/image_corak_home_kenapa.png');background-repeat: no-repeat;
    background-position: bottom;background-position-x: left;">
        <div class="container">
              <div class="text-center">
       
                </div>
            <div class="row" style="padding-top: 120px">
                
        @if ( Session::get('message') != '' )
        
        <div class="alert alert-warning" role="alert">
 {{ Session::get('message') }}
</div>

        @endif

                <div class="col-md-6 col-sm-12">
                 <form class="form-signup" id="contactForm" action="{{url('register')}}"  method="POST">
                            <!-- Email address input-->
                            {{csrf_field()}}
                            <div class="row input-group-newsletter">
                                <div class="col-sm-12">
                                  <label for="exampleInputEmail1" class="text-white">Username / Nama lengkap</label>
                                  <input class="form-control" id="username" name="name" type="text"  placeholder="Enter username..." aria-label="Enter username..."required minlength="3" maxlength="30"/>
                                                  @if ($errors->has('name'))
 
                    <span class="text-warning">{{ $errors->first('name') }}</span>
 
                @endif
                                </div>
                                <!-- <div class="col-auto"><button class="btn btn-primary disabled" id="submitButton" type="submit">Notify Me!</button> -->
                                   <div class="col-sm-12" style="margin-top: 10px">
                                    <label for="exampleInputEmail1" class="text-white">Email Address</label>
                                  <input class="form-control" id="emailAddress" type="email" name="email" placeholder="Enter email address..." aria-label="Enter email address..." required />
                                                  @if ($errors->has('email'))
 
                    <span class="text-warning">{{ $errors->first('email') }}</span>
 
                @endif
                                </div>

                                 <div class="col-sm-12" style="margin-top: 10px">
                                  <label for="exampleInputEmail1" class="text-white">No Hp</label>
                                  <input class="form-control" id="hp" type="number" name="hp" placeholder="Enter nomor hp..." aria-label="Enter nomor hp..." required minlength="9" maxlength="13"/>
                                                  @if ($errors->has('hp'))
 
                    <span class="text-warning">{{ $errors->first('hp') }}</span>
 
                @endif
                                </div>
                                 <div class="col-sm-12" style="margin-top: 10px">
                                  <label for="exampleInputEmail1" class="text-white">Nama Farm/Peternakan</label>
                                  <input class="form-control" id="peternakan" name="farm" type="text" placeholder="Enter nama peternakan..." aria-label="Enter nama peternakan..."required minlength="3" maxlength="50"/>
                                                  @if ($errors->has('farm'))
 
                    <span class="text-warning">{{ $errors->first('farm') }}</span>
 
                @endif
                                </div>
                                

                                 <div class="col-sm-12" style="margin-top: 10px">
                                  <label for="exampleInputEmail1" class="text-white">Password</label>
                                  <input class="form-control" id="password" name="password" type="password" placeholder="Enter password..." aria-label="Enter password..." required minlength="4" maxlength="30"/>
                                                  @if ($errors->has('password'))
 
                    <span class="text-warning">{{ $errors->first('password') }}</span>
 
                @endif
                                </div>

                                <div class="col-sm-12" style="margin-top: 10px">
                                   <input class="btn btn-success" value="register" type="submit"/>

                                </div>


                                </div>
                       

                        </form>
            </div>

            <div class="col-md-6 col-sm-12" style="margin-top:10px">
              <img src="{{url('portofolio/landing/background/test.jpg')}}" width="100%">
            </div>
       
            </div>
        </div>
    </section>

@endsection