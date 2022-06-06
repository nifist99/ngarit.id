@extends('crudbooster::admin_template')
@section('content')

    <div class="row">
        <div class="col-md-3">
            <div class="box box-warning direct-chat direct-chat-info">
                <div class="box-header with-border">
                        <div class="box-header with-border">
              <h3 class="box-title">Chat</h3>

              <div class="box-tools pull-right">
                <div class="has-feedback">
                  <input type="text" class="form-control input-sm" placeholder="Search">
                  <span class="glyphicon glyphicon-search form-control-feedback"></span>
                </div>
              </div>
              <!-- /.box-tools -->
            </div>
                  
            <table class="table table-bordered">
                <thead>
      <tr>
          <td>Foto</td>
      <td>Nama</td>
      <td>Chat</td>
      </tr>
    </thead>
    <tbody>
        @foreach($peternak as $key)
      <tr>
          <td>
              @if($key->photo == null)
              <img src="{{url('vendor/crudbooster/avatar.jpg')}}" style="border-radius:50px"  width="50px">
              @else
              <img src="{{url($key->photo)}}" style="border-radius:50px" width="50px">
              @endif
              
          </td>
        <td>{{$key->name}}</td>
        <td><a href="{{CRUDBooster::mainpath('chat/'.$key->id)}}" class="btn btn-primary btn-sm" style="border-radius:10px">Chat</a></td>
      </tr>
      @endforeach

           </table>
        </div>
        <p>{!! urldecode(str_replace("/?","?",$peternak->appends(Request::all())->render())) !!}</p>
        </div>
        </div>
        
         <div class="col-md-3">
            <div class="box box-warning direct-chat direct-chat-info">
                <div class="box-header with-border">
                  <h3 class="box-title">History Chat</h3>
            <table class="table table-bordered">
                <thead>
      <tr>
          <td>Foto</td>
      <td>Nama</td>
      <td>Chat</td>
      </tr>
    </thead>
    <tbody>
        @foreach($history_chat as $chat)
      <tr>
          <td>
              @if($chat->photo == null)
              <img src="{{url('vendor/crudbooster/avatar.jpg')}}" style="border-radius:50px"  width="50px">
              @else
              <img src="{{url($chat->photo)}}" style="border-radius:50px" width="50px">
              @endif
              
          </td>
        <td>{{$chat->name}}</td>
        <td><a href="{{CRUDBooster::mainpath('chat/'.$chat->id)}}" class="btn btn-danger btn-sm" style="border-radius:10px">Cek History</a></td>
      </tr>
      @endforeach

           </table>
        </div>
        </div>
        </div>
        
        
        
        
            <div class="col-md-6">
              <!-- DIRECT CHAT -->
              <div class="box box-warning direct-chat direct-chat-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Pesan Belum di Baca </h3>

                  <div class="box-tools pull-right">
                    <!--<span data-toggle="tooltip" title="3 New Messages" class="badge bg-yellow">3</span>-->
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Contacts"
                            data-widget="chat-pane-toggle">
                      <i class="fa fa-comments"></i></button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body" >
                  <!-- Conversations are loaded here -->
                  <div class="direct-chat-messages" style="min-height:500px">
                      
                      
                        <table class="table table-borderless">
                <thead>
      <tr>
          <td>Foto</td>
      <td>Nama</td>
      <td>Chat</td>
      <td>Pesan Belum Dibaca</td>
      </tr>
    </thead>
    <tbody>
        @foreach($pesan as $key1)
      <tr>
          <td>
                  @if($key1['photo'] == null)
              <img src="{{url('vendor/crudbooster/avatar.jpg')}}" style="border-radius:50px"  width="50px">
              @else
              <img src="{{url($key1['photo'])}}" style="border-radius:50px" width="50px">
              @endif
          </td>
        <td>{{$key1['name']}}</td>
        <td><a href="{{CRUDBooster::mainpath('chat/'.$key1['id'])}}" class="btn btn-warning btn-sm" style="border-radius:10px">Balas</a></td>
        <td> <span data-toggle="tooltip" title="3 New Messages" class="badge bg-yellow">{{$key1['belum_dibaca']}}</span></td>
      </tr>
      @endforeach

           </table>
        </div>
                  </div>
                  <!--/.direct-chat-messages-->

                  <!-- /.direct-chat-pane -->
                </div>
                <!-- /.box-body -->
                <!-- /.box-footer-->
              </div>
              <!--/.direct-chat -->
            </div>

            @endsection