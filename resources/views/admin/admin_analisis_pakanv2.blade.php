<!-- First, extends to the CRUDBooster Layout -->
@extends('crudbooster::admin_template')
@section('content')

@push('head')
  
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  
  @endpush
  
  <form  class='form-horizontal' method='post' action='{{CRUDBooster::mainpath('simpan')}}'>
  {{csrf_field()}}
 
  <!-- Your html goes here -->
  <div class='panel panel-default'>
    <div class='panel-heading'>Data Parameter Ternak</div>
    <div class='panel-body'>

        <div class='form-group' style="padding-top: 10px;">
          <label class="col-sm-2 control-label">Nama</label>
          <div class="col-sm-10">
          <input type='text' name='nama' required class='form-control'/>
          </div>
        </div>
        
        <div class='form-group' style="padding-top: 10px;">
          <label class="col-sm-2 control-label">Tanggal</label>
          <div class="col-sm-10">
          <input type='date' name='tgl' required class='form-control'/>
          </div>
        </div>
        
        <div class='form-group' style="padding-top: 10px;">
          <label class="col-sm-2 control-label">Total Ternak</label>
          <div class="col-sm-10">
          <input type='number' name='total_ternak' required class='form-control'/>
          </div>
        </div>
        
          <div class='form-group' style="padding-top: 10px;">
          <label class="col-sm-2 control-label">Lama Perawatan / Hari</label>
          <div class="col-sm-10">
          <input type='number' name='lama_perawatan' required class='form-control' placeholder="tulis lamanya hari"/>
          </div>
        </div>
        
        <div class='form-group' style="padding-top: 10px;">
          <label class="col-sm-2 control-label">Berat rata rata ternak</label>
          <div class="col-sm-10">
          <input type='number' name='berat_badan' required class='form-control'/>
          </div>
        </div>
        
             <div class="form-group" style="padding-top: 10px;">
                 <label class="col-sm-2 control-label">Kategori Kebutuhan Nutrisi Ternak</label>
                <div class="col-sm-10">
                <select class="form-control select2" name="kebutuhan_nutrisi" data-placeholder="Pilih Kebutuhan Nutrisi"
                        style="width: 100%;" required>
                    <option value="">-- Silahkan Pilih Untuk kebutuhan Nutrisi</option>
                    @foreach($kebutuhan_nutrisi as $row)
                  <option value="{{$row->id}}">{{$row->nama}} berat sekitar {{$row->berat_badan}} KG</option>
                  @endforeach
                </select>
              </div>
             </div>
         
    </div>
    <div class='panel-footer'>
      <input type='submit' class='btn btn-primary' value='Simpan Data Analisis'/>
    </div>
  </div>
  
   </form>
   
   <div class='panel panel-info'>
    <div class='panel-heading'>Analisis Pakan Ternak</div>
    <div class='panel-body'>
    <div class="box-body table-responsive no-padding">
   <table id="" class='table table-bordered'>
  <thead>
      <tr>
        <th>Nama</th>
        <th>Tanggal Buat</th>
        <th>Lama Perawatan</th>
        <th>Berat Badan rata-rata</th>
        <th>Total Ternak</th>
        <th>Kategori Kebutuhan Nutrisi</th>
        <th>Cek Result Analisis</th>
       </tr>
  </thead>
  <tbody>
    @foreach($result as $row)
      <tr>
        <td>{{$row->nama}}</td>
        <td>{{$row->tgl}}</td>
        <td>{{$row->lama_perawatan}} Hari</td>
        <td>{{$row->berat_badan}} Kg</td>
        <td>{{$row->total_ternak}} Ekor</td>
        <td>{{$row->kebutuhan_nutrisi}} & Berat {{$row->bb}} Kg</td>
        <td>
          <a class='btn btn-success btn-sm' href='{{CRUDBooster::mainpath("detail/$row->id")}}'><span class="fa fa-bar-chart"></span> Analisis</a>
           @if(CRUDBooster::isDelete() && $button_edit)
           <a class='btn btn-danger btn-sm' href='{{CRUDBooster::mainpath("delete/$row->id")}}'><span class="fa fa-trash"></span></a>
           @endif
            <a class='btn btn-warning btn-sm' href='{{CRUDBooster::mainpath("edit/$row->id")}}'><span class='fa fa-pencil'> </span> </a>
        </td>
       </tr>
    @endforeach
  </tbody>
</table>
<p>{!! urldecode(str_replace("/?","?",$result->appends(Request::all())->render())) !!}</p>
</div>

  </div>
  </div>
    </div>
  
  
     @push('bottom')
   
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    
 <script>

        $(function () {
                    $('.select2').select2();
                })
 </script>
 

 
  @endpush
  
  
@endsection