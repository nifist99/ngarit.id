@extends('crudbooster::admin_template')
@section('content')

    <div class="row">

            <div class="col-md-12">
              <!-- DIRECT CHAT -->
              <div class="box box-info direct-chat direct-chat-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Direct Chat</h3>

                  <div class="box-tools pull-right">
                    <!--<span data-toggle="tooltip" title="3 New Messages" class="badge bg-yellow">1</span>-->
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Contacts"
                            data-widget="chat-pane-toggle">
                      <i class="fa fa-comments"></i></button>
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
                       <img class="direct-chat-img" src="{{url($row->photo)}}" alt="message user image">
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
                  action={{CRUDBooster::mainpath('/')}}>
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