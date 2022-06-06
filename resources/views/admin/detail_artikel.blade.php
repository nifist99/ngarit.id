@extends('crudbooster::admin_template')
@section('content')
<a href="{{CRUDBooster::mainpath()}}" class="btn btn-sm btn-primary">kembali ke menu artikel</a>
<div class="row">
        <div class="col-md-12">
          <!-- Box Comment -->
          <div class="box box-widget">
            <div class="box-header with-border">
              <div class="user-block">
                <img widht="300px" height="300px" class="img-circle" src="{{url($row->photo)}}" alt="User Image">
                <span class="username"><a href="#">{{$row->name}}</a></span>
                <span class="description">Shared publicly - {{$row->tgl}}</span>
              </div>
              <!-- /.user-block -->
              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Mark as read">
                  <i class="fa fa-circle-o"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
               
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             <center> 
            <img style="height:300px;widht:200px;border-radius:10px!important;" class="img-responsive pad" src="{{url($row->foto)}}" alt="Photo">
            </center>
              <h3 style="text-align:center;">{{$row->judul}}</h3>
              <hr>

              <p style="font-size:14px;font-weight:600px;">{!! $row->content !!}</p>
              <!--<button type="button" class="btn btn-default btn-xs"><i class="fa fa-share"></i> Share</button>-->
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
            
              <div class="box-footer box-comments">
                  
                 
                  @foreach($komen as $row)
              <div class="box-comment">
                <!-- User image -->
                <img class="img-circle img-sm"
                src="{{url($row->photo)}}" alt="User Image">

                <div class="comment-text">
                      <span class="username">
                        {{$row->name}}
                        <span class="text-muted pull-right">{{$row->created_at}}</span>
                      </span><!-- /.username -->
                  {{$row->content}}
                </div>
                <!-- /.comment-text -->
              </div>
              @endforeach
           
           
            </div>
            
            <div class="box-footer">
              <form action="{{CRUDBooster::mainpath('komen')}}" method="get">
                  {{csrf_field()}}
                <img class="img-responsive img-circle img-sm" src="{{ CRUDBooster::myPhoto() }}" alt="Alt Text">
                <div class="img-push">
                  <div class="input-group">
                  <input type="hidden" name="id_artikel" value="{{$row->id}}">
                  <input type="text" name="content" placeholder="Type Comment ..." class="form-control">
                      <span class="input-group-btn">
                        <button type="submit" class="btn btn-primary btn-flat">Send</button>
                      </span>
                </div>
                </div>
              </form>
            </div>
            
            
          </div>
          <!-- /.box -->
        </div>

@endsection