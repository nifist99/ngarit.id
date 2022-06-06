@extends('frontend.content')
@section('content')

@push('css')
<style type="text/css">
  .card-detail{
    -webkit-box-shadow: 2px 5px 19px -4px rgba(0,0,0,0.29); 
box-shadow: 2px 5px 19px -4px rgba(0,0,0,0.29);
background-color: white;
width: 100%;
min-height: 500px;
max-height: 100%;
border-radius: 10px;
padding: 5px;
  }
</style>
@endpush

  <section style="min-height:680px;max-height: 100%;background-color:#193776;background-image: url('../portofolio/landing/image/image_corak_home_kenapa.png');background-repeat: no-repeat;
    background-position: bottom;background-position-x: left;">
        <div class="container">
              <div class="text-center">
       
                </div>
            <div class="row" style="padding-top: 120px">
            <div class="col-md-6 col-sm-12">
                 <div class="card-detail">

                  <table class="table table-borderless">
                      
                      <?php $link = url('detail_ternak/'.$row->kode); ?>

                     <tbody>
                          <tr>
            <td><b>Scan Barcode Berikut Untuk Melihat Detail Ternak</b></td>
            <td>: <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(100)->generate($link)) !!} ">
            <p style="font-size:10px;">Silahkan Download Barcode Bisa di tempel di eartag ternak atau kandang</p>
             <a href="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(300)->generate($link)) !!}" download="{{$row->nama}}{{$row->jenis_kelamin}}{{$row->kode}}" class="btn btn-sm btn-success">
                          download QRcode
                         </a>
            </td>
          <!--</tr>-->
          <tr>
          <tr>
            <td><b>Kode</b></td>
            <td>: {{$row->kode}}</td>
          </tr>
          <tr>
            <td><b>Nama Farm</b></td>
            <td>: {{$row->nama}}</td>
          </tr>
          <tr>
            <td><b>Tanggal Lahir Ternak</b></td>
            <td>: {{$row->ttl}}</td>
          </tr>

         
          <tr>
            <td><b>Jenis Kelamin</b></td>
            <td>: {{$row->jenis_kelamin}}</td>
          </tr>

          <?php 

          $jenis=DB::table('jenis_kambing')
          ->where('id',$row->jenis)->first();
          
          $jantan=DB::table('data_farm_mitra')
          ->where('id',$row->id_jantan)->first();
          
          $betina=DB::table('data_farm_mitra')
          ->where('id',$row->id_betina)->first();
          
          $pemilik=DB::table('cms_users')->where('id',$row->id_users)
          ->first();
          

          ?>

           <tr>
            <td><b>Jenis Hewan</b></td>
            <td>: {{$jenis->jenis}}</td>
          </tr>

            <tr>
            <td><b>Kondisi</b></td>
            <td>: {{$row->kondisi}}</td>
          </tr>

            <tr>
            <td><b>Status</b></td>
            <td>: {{$row->posisi}}</td>
          </tr>
          
           <tr>
            <td><b>Indukan Jantan</b></td>
            <td>: {{$jantan->kode}}</td>
          </tr>
          
           <tr>
            <td><b>Indukan Betina</b></td>
            <td>: {{$betina->kode}}</td>
          </tr>
          
          @if($investor==null)
           <tr>
            <td><b>Pemilik ternak</b></td>
            <td>: {{$pemilik->name}}</td>
          </tr>
          @else
               <tr>
            <td><b>Pemilik ternak</b></td>
            <td>{{$investor->name}}</td>
          </tr>
          
          
           <tr>
            <td><b>Mitra</b></td>
            <td>{{$mitra->name}}</td>
          </tr>
          @endif
          

        </tbody>
      </table>
      
      
      
      </div>
    </div>
   
        

            <div class="col-md-6 col-sm-12" style="margin-top:10px">
              <div class="card-detail">
                  @if($row->foto != null)
                <img src="{{url($row->foto)}}" width="100%">
                @else
                 <img src="{{url('portofolio/landing/background/test.jpg')}}" width="100%">
                 <p class="text-center">Foto Tidak Tersedia</p>
                @endif
              </div>
            </div>
            

<div class="col-md-6 col-sm-12 mt-5">
<div class="card-detail">
    
    
<div>
  <h4 style="color:blue">Jika Ternak di Beli Dari Penjual/Peternakan</h4>
</div>       
<table class="table table-bordered">
  <tbody>
    <tr>
      <td>Nama Penjual</td>
      <td>{{$row->nama_penjual}}</td>
    </tr>
    <tr>
      <td>Tanggal Beli Ternak</td>
      <td>{{$row->tgl_beli}}</td>
    </tr>
    <tr>
      <td>Indukan Jantan</td>
      <td>{{$row->indukan_jantan}}</td>
    </tr>
     <tr>
      <td>Indukan Betina</td>
      <td>{{$row->indukan_betina}}</td>
    </tr>
    
  </tbody>
</table>
    
    
    
<div>
  <h4 style="color:blue">History Kesehatan Ternak</h4>
</div>       
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">keterangan sakit</th>
      <th scope="col">tgl pengecekan</th>
      <th scope="col">penanganan</th>
    </tr>
  </thead>
  <tbody>
    @foreach($kesehatan as $key)
    <tr>
      <td>{{$key->keterangan_sakit}}</td>
      <td>{{$key->tgl}}</td>
      <td>{{$key->penanganan_sakit}}</td>
    </tr>
    @endforeach
  </tbody>
</table>

<div>
  <h4  style="color:blue">History pertambahan berat badan dan pakan</h4>
</div>        
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Tanggal Pengecekan</th>
      <th scope="col">pakan ternak</th>
      <th scope="col">berat</th>
    </tr>
  </thead>
  <tbody>
    @foreach($adg as $key1)
    <tr>
      <th scope="row">{{$key1->tgl}}</th>
      <td>{{$key1->pakan_ternak}}</td>
      <td>{{$key1->berat}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
 
<div>
  <h4  style="color:blue">History Jadwal Ternak</h4>
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

<div>
  <h4  style="color:blue">History pengambilan susu ternak</h4>
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
       
            </div>
        </div>
    </section>

@endsection