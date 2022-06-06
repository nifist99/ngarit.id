@extends('crudbooster::admin_template')
@section('content')

<div class="row">
    <div class="col-sm-12">

               <div class="btn-group">
                  <button type="button" class="btn btn-info">
                      @if($kategori !=null)
                      {{$kategori}}
                      @else
                      Pilih Kategori Video Disini
                      @endif
                      
                      </button>
                  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="{{CRUDBooster::mainpath('/')}}">Tampilkan Semua Video</a></li>
                    <li class="divider"></li>
                    @foreach($video as $row)
                    <li><a href="{{CRUDBooster::mainpath('/?kategori='.$row->id)}}">{{$row->nama}}</a></li>
                    @endforeach
                  </ul>
                </div>
                  </div>
                    </div>

<div class="row" style="margin-top:10px">
    
    @foreach($result as $key)
        <div class="col-md-4 col-sm-12">
          <!-- Box Comment -->
          <div class="box box-widget">
            <div class="box-body">
             <center> 
          
                 {!! $key->url !!}
              
            </center>
            <center>
              <a href="{{$key->link_youtube}}" style="text-align:center;font-weight: 800;
    font-size: large;
}">
                  {{$key->judul}}</a>
                  </center>
            </div>
          </div>
          </div>
          @endforeach
        </div>
        
        <!-- ADD A PAGINATION -->
<p>{!! urldecode(str_replace("/?","?",$result->appends(Request::all())->render())) !!}</p>

@endsection