@extends('crudbooster::admin_template')
@section('content')

    <div class="row">
        <div class="col-md-3">
               <a href="{{CRUDBooster::mainpath('/')}}" class="btn btn-primary btn-md">
                    Kembali ke menu chat
                </a>
              
            <div class="box box-warning direct-chat direct-chat-info" style="margin-top:10px">
                <div class="box-header with-border">
                  <h3 class="box-title">Direct Chat</h3>
                  
            <table class="table table-bordered">
                <thead>
      <tr>
          <td>Foto</td>
      <td>Nama</td>
      <td>Peternakan</td>
      </tr>
    </thead>
    <tbody>
      <tr>
          <td>
              @if($key->photo == null)
              <img src="{{url('vendor/crudbooster/avatar.jpg')}}" style="border-radius:50px"  width="50px">
              @else
              <img src="{{url($key->photo)}}" style="border-radius:50px" width="50px">
              @endif
              
          </td>
        <td>{{$key->name}}</td>
        <td>{{$key->farm}}</td>
      </tr>

           </table>
        </div>
        </div>
        </div>
            <div class="col-md-9">
              <!-- DIRECT CHAT -->
              <div class="box box-warning direct-chat direct-chat-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Direct Chat</h3>

                  <div class="box-tools pull-right">
                    <span data-toggle="tooltip" title="3 New Messages" class="badge bg-yellow">3</span>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Contacts"
                            data-widget="chat-pane-toggle">
                      <i class="fa fa-comments"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body" >
                  <!-- Conversations are loaded here -->
                  <div class="direct-chat-messages" style="min-height:500px">
                    <!-- Message. Default to the left -->
                    @foreach($message as $row)
                    @if($row->chat_by =="admin" || $row->chat_by =="Super Administrator")
                    <div class="direct-chat-msg">
                      <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-left">Admin</span>
                        <span class="direct-chat-timestamp pull-right">
                            {{$row->date}}
                        </span>
                      </div>
                      <!-- /.direct-chat-info -->
                      <img class="direct-chat-img" 
                      src="{{url('vendor/crudbooster/avatar.jpg')}}" alt="message Admin">
                      <!-- /.direct-chat-img -->
                      <div class="direct-chat-text">
                        {{$row->content}}
                      </div>
                      <!-- /.direct-chat-text -->
                    </div>
                    <!-- /.direct-chat-msg -->
                    @else
                    <!-- Message to the right -->
                    <div class="direct-chat-msg right">
                      <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-right">
                            {{$row->name}}</span>
                        <span class="direct-chat-timestamp pull-left">
                            {{$row->date}}
                        </span>
                      </div>
                      <!-- /.direct-chat-info -->
                      @if($row->foto !=null)
                       <img class="direct-chat-img" src="{{url($row->foto)}}" alt="message user image">
                      @else
                        <img class="direct-chat-img" 
                      src="{{url('vendor/crudbooster/avatar.jpg')}}" alt="message user image">
                      @endif
                     
                      
                      <!-- /.direct-chat-img -->
                      <div class="direct-chat-text">
                        {{$row->content}}
                      </div>
                      <!-- /.direct-chat-text -->
                    </div>
                    @endif
                    @endforeach
   
                  </div>

                </div>
                <!-- /.box-body -->
                  <div class="box-footer">
                  <form  method='get'
                  action={{CRUDBooster::mainpath('chat/'.$key->id)}}>
                    <div class="input-group">
                      <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                      <span class="input-group-btn">
                            <input type="submit" value="Kirim" class="btn btn-warning btn-flat">
                          </span>
                    </div>
                  </form>
                </div>
                <!-- /.box-footer-->
              </div>
              <!--/.direct-chat -->
            </div>

            @endsection