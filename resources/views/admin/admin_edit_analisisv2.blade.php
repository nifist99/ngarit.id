<!-- First, extends to the CRUDBooster Layout -->
@extends('crudbooster::admin_template')
@section('content')
 <a href="{{CRUDBooster::mainpath($slug=NULL)}}"><i class="fa fa-chevron-circle-left">&nbsp;  Back To List Data</i></a>
@push('head')
  
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  
  @endpush
  
  <form  class='form-horizontal' method='post' action='{{CRUDBooster::mainpath('editdata')}}'>
  {{csrf_field()}}
 
  <!-- Your html goes here -->
  <div class='panel panel-default'>
    <div class='panel-heading'>Data Parameter Ternak</div>
    <div class='panel-body'>
        <input type="hidden" name="id" value="{{$id}}" >
        <div class='form-group' style="padding-top: 10px;">
          <label class="col-sm-2 control-label">Nama</label>
          <div class="col-sm-10">
          <input type='text' name='nama' value="{{$parameter->nama}}" required class='form-control'/>
          </div>
        </div>
        
        <div class='form-group' style="padding-top: 10px;">
          <label class="col-sm-2 control-label">Tanggal</label>
          <div class="col-sm-10">
          <input type='date' name='tgl' value="{{$parameter->tgl}}" required class='form-control'/>
          </div>
        </div>
        
        <div class='form-group' style="padding-top: 10px;">
          <label class="col-sm-2 control-label">Total Ternak</label>
          <div class="col-sm-10">
          <input type='number' name='total_ternak' value="{{$parameter->total_ternak}}" required class='form-control'/>
          </div>
        </div>
        
          <div class='form-group' style="padding-top: 10px;">
          <label class="col-sm-2 control-label">Lama Perawatan / Hari</label>
          <div class="col-sm-10">
          <input type='number' name='lama_perawatan' value="{{$parameter->lama_perawatan}}" required class='form-control' placeholder="tulis lamanya hari"/>
          </div>
        </div>
        
        <div class='form-group' style="padding-top: 10px;">
          <label class="col-sm-2 control-label">Berat rata rata ternak</label>
          <div class="col-sm-10">
          <input type='number' name='berat_badan' value="{{$parameter->berat_badan}}" required class='form-control'/>
          </div>
        </div>
        
             <div class="form-group" style="padding-top: 10px;">
                 <label class="col-sm-2 control-label">Kategori Kebutuhan Nutrisi Ternak</label>
                <div class="col-sm-10">
                <select class="form-control select2" name="kebutuhan_nutrisi" data-placeholder="Pilih Kebutuhan Nutrisi"
                        style="width: 100%;" required>
                    <option value="{{$parameter->id}}">
                        {{$parameter->kebutuhan}} berat sekitar 
                        {{$parameter->berat_badan}} Kg</option>
                    @foreach($kebutuhan_nutrisi as $row)
                  <option value="{{$row->id}}">{{$row->nama}} berat sekitar {{$row->berat_badan}} KG</option>
                  @endforeach
                </select>
              </div>
             </div>
         
    </div>
    <div class='panel-footer'>
      <input type='submit' class='btn btn-success' value='Edit Data Analisis'/>
    </div>
  </div>
  
   </form>

    @push('bottom')
   
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    
 <script>

        $(function () {
                    $('.select2').select2();
                })
 </script>
 

 
  @endpush
  
  
@endsection