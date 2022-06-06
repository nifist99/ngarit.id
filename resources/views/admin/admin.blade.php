<!-- First you need to extend the CB layout -->
@extends('crudbooster::admin_template')
@section('content')
<!-- Your custom  HTML goes here -->
 <div class="row">

    @foreach($result as $row)
      
      
        <div class="col-md-4 col-sm-12">
        
          <!-- Box Comment -->
          <div class="box box-widget" style="border-radius:10px;">
            <div class="box-header with-border">
              <div class="user-block">
                <img class="img-circle" src="{{url($row->photo)}}" alt="User Image">
                <span class="username"><a href="#">{{$row->name}}</a></span>
                <span class="description">Shared publicly - {{$row->tgl}}</span>
              </div>
              <!-- /.user-block -->
              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Mark as read">
                  <i class="fa fa-circle-o"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <img style="border-radius:10px;" class="img-responsive pad" src="{{url($row->foto)}}" alt="Photo">

              <h3><a href="{{CRUDBooster::mainpath('detail/'.$row->id)}}">
                  {{$row->judul}}</a></h3>
              <br>
              <?php
    $jumlah_komen=DB::table('komen_artikel')
   ->where('id_artikel',$row->id)->count();
   $jumlah_like=DB::table('like_artikel')
   ->where('id_artikel',$row->id)->count();
   
    $cek_like=DB::table('like_artikel')
   ->where('id_artikel',$row->id)
   ->where('id_users',CRUDBooster::myId())
   ->first();
   
              ?>

               @if($cek_like==null)
              <form action="{{CRUDBooster::mainpath('like')}}" method="get">
                  {{csrf_field()}}
              <input type="hidden" name="id_artikel" value="{{$row->id}}">
              <input type="hidden" name="like" value="1">
              <button type="submit" class="btn btn-default btn-xs"><i class="fa fa-thumbs-o-up"></i> Like</button>
              </form>
              @else
              <button type="button" class="btn btn-success btn-xs"><i class="fa fa-thumbs-o-up"></i>Anda Menyukai Ini</button>
              @endif
              
              <span class="pull-right text-muted">{{$jumlah_like}} likes - {{$jumlah_komen}} comments</span>
            </div>
            <!-- /.box-body -->
          
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
    @endforeach
  </div>


@endsection
