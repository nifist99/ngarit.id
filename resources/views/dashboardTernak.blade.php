@extends('crudbooster::admin_template')
@section('content')

@push('head')
<style>
    .bg-hijau{
        background-color:#28a745!important

    }
    
    .bg-biru{
        background-color:#17a2b8!important
    }
    
    .bg-kuning{
        background-color:#ffc107!important
    }
    .bg-merah{
        background-color:#dc3545!important
    }
    .text-w{
        color :white!important;
        font-weight: 700;
    margin: 0 0 10px;
    padding: 0;
    white-space: nowrap;
    }
    
        .text-h{
        color :black!important;
        font-weight: 700;
    margin: 0 0 10px;
    padding: 0;
    white-space: nowrap;
    }
</style>
@endpush

 <section class="content">
      <div class="container-fluid">
        <!--<h2 id="demo"></h2>-->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-biru">
              <div class="inner">
                <h4 class="text-w"><b></b>RP. {{number_format($total_pengeluaran)}}</b></h4>

                <p class="text-w">TOTAL PENGELUARAN</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info</a>
            </div>
          </div>
          
                   <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-kuning">
              <div class="inner">
                <h4 class="text-w">RP. {{number_format($pemasukan_farm)}}</h4>

                <p class="text-w">TOTAL PEMASUKAN</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info</a>
            </div>
          </div>
           
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-hijau">
              <div class="inner">
                <h4 class="text-w">{{$data}}</h4>

                <p class="text-w" style="width :100%">JUMLAH TERNAK TOTAL <br> YANG PERNAH DI PELIHARA</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info</a>
            </div>
          </div>
          <!-- ./col -->
 
          <div class="col-lg-3 col-6">
            <div class="small-box bg-merah">
              <div class="inner">
                <h4 class="text-w">{{$ternak_mati}}</h4>

                <p class="text-w">JUMLAH TERNAK MATI</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info</a>
            </div>
          </div> 
           
        </div>
        
        <!--SECTION 2-->
        
            <div class="row">
                
                     <div class="col-lg-3 col-6">
            <div class="small-box bg-merah">
              <div class="inner">
                <h4 class="text-w">{{$sold_out}}</h4>

                <p class="text-w">JUMLAH TERNAK TERJUAL</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info</a>
            </div>
          </div> 
          
               <div class="col-lg-3 col-6">
            <div class="small-box bg-kuning">
              <div class="inner">
                <h4 class="text-w">{{$jantan}}</h4>

                <p class="text-w">JUMLAH TERNAK JANTAN</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info</a>
            </div>
          </div> 
          
               <div class="col-lg-3 col-6">
            <div class="small-box bg-biru">
              <div class="inner">
                <h4 class="text-w">{{$betina}}</h4>

                <p class="text-w">JUMLAH TERNAK BETINA</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info</a>
            </div>
          </div> 
          
               <div class="col-lg-3 col-6">
            <div class="small-box bg-hijau">
              <div class="inner">
                <h4 class="text-w">{{$kandang}}</h4>

                <p class="text-w">JUMLAH TERNAK DI KANDANG</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info</a>
            </div>
          </div> 
     
          
          </div>
          
                  <div class="row">
                 <div class="col-sm-12">
           <div class="box box-info">
            <div class="box-header">
              <i class="fa fa-list"></i>

              <h3 class="box-title">Analisis Pengeluaran & Pemasukan Bar Chart</h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                      <div class="btn-group">
                  <button type="button" class="btn btn-info">
                      @if($tahun !=null)
                      {{$tahun}}
                      @else
                      {{date('Y')}}
                      @endif
                      
                      </button>
                  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  
                  <ul class="dropdown-menu" role="menu">
                      <li><a href="{{CRUDBooster::mainpath('/')}}">Tampilkan Tahun Sekarang</a></li>
                    <li class="divider"></li>
                    @foreach($listtahun as $row)
                    <li><a href="{{CRUDBooster::mainpath('/?tahun='.$row['id'])}}">{{$row['id']}}</a></li>
                    @endforeach
                  </ul>
                </div>
              </div>
              <!-- /. tools -->
            </div>
            <div class="box-body">
                <canvas id="myChart" width="100%"></canvas>
                </div>
                </div>
                </div>
                
                
                                <div class="col-md-6 col-sm-12">
           <div class="box box-success">
            <div class="box-header">
              <i class="fa fa-list"></i>

              <h3 class="box-title">Kategori Pengeluaran Keuangan</h3>
              <!-- tools box -->
              <!-- /. tools -->
            </div>
            <div class="box-body">
                <canvas id="myChart_pengeluaran" width="100%"></canvas>
                </div>
                </div>
                </div>
                
                                          <div class="col-md-6 col-sm-12">
           <div class="box box-success">
            <div class="box-header">
              <i class="fa fa-list"></i>

              <h3 class="box-title">Kategori Pemasukan Keuangan</h3>
              <!-- tools box -->
              <!-- /. tools -->
            </div>
            <div class="box-body">
                <canvas id="myChart_pemasukan" width="100%"></canvas>
                </div>
                </div>
                </div>
                
                
                
                <!--donut-->
                
                         <div class="col-md-6 col-sm-12">
           <div class="box box-warning">
            <div class="box-header">
              <i class="fa fa-list"></i>

              <h3 class="box-title">Kategori Pemeliharaan Ternak</h3>
              <!-- tools box -->
              <!-- /. tools -->
            </div>
            <div class="box-body">
                <canvas id="myChart_pie" width="100%"></canvas>
                </div>
                </div>
                </div>
                
                                    <div class="col-md-6 col-sm-12">
           <div class="box box-warning">
            <div class="box-header">
              <i class="fa fa-list"></i>

              <h3 class="box-title">Jenis Ternak</h3>
              <!-- tools box -->
              <!-- /. tools -->
            </div>
            <div class="box-body">
                <canvas id="myChart_jenisternak" width="100%"></canvas>
                </div>
                </div>
                </div>
                
                
                </div>
        
    <div class="col-sm-12" style="margin-bottom: 30px">
    <div class="card card-primary">
      <div class="card-header ">
        <h3>Lokasi Investor dan Mitra</h3>
      </div>
      <div class="panel-body">
        <div style="width: 100%;height: 500px;" id="map"></div>
      </div>
    </div>
    </div>
            
</div>
</div>


@push('bottom')

<?php
  $latitude = -7.614529200000001;
  $longitude = 110.7122465;
?>


<script>   
  $(document).ready(function(){
    refreshMarkers();
  });
  function refreshMarkers(){
    loadMarkers();
  }
  var markersVar = {};
  var infowindow = null;
  var markers = [];       
  var map = null;

  function initMap() {
    var myLatLng = {lat: {{$latitude}}, lng: {{$longitude}}};
    map = new google.maps.Map(document.getElementById('map'), {
      center: myLatLng,
      scrollwheel: true,
      zoom: 7
    });      
    loadMarkers();
    var intervalMarkers = setInterval(function() {
      loadMarkers();
    },60000);   
  }
  function loadMarkers() {
    clearMarkers();
    $.get("{{url('markerhome')}}",function(r) {
      if(r.items) {
        // console.log(r);
        $.each(r.items,function(i,obj) {
          var image = {
              url: obj.marker,
              // This marker is 20 pixels wide by 32 pixels high.
              scaledSize: new google.maps.Size(32, 32), // scaled size
              // The origin for this image is (0, 0).
              origin: new google.maps.Point(0, 0),
              // The anchor for this image is the base of the flagpole at (0, 32).
              anchor: new google.maps.Point(0, 0)
            };
          var marker = new google.maps.Marker({
              map: map,
              position: {lat: parseFloat(obj.latitude),lng: parseFloat(obj.longitude) },
              title: obj.name+" "+obj.role,
                icon: image,
            });
            markersVar[obj.id] = marker;
            var contentString = 
            "<table class='infoWindow'>"+
            "<tr><td style='font-weight:bold;'>Nama : "+obj.name+"</td></tr>"+
            "<tr><td style='font-weight:bold;'>Nama : "+obj.role+"</td></tr>"+
            "</table>";
            infowindow = new google.maps.InfoWindow({
            content: contentString,
          });               
            markers.push(marker);
            google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
              infowindow.setContent(contentString);
              infowindow.open(map, marker);
              map.setZoom(20);
              map.setCenter(marker.getPosition());
            }
          })(marker, i));
        })
      }
    })
  }
  function clearMarkers() {
    if(markers.length>0) {
      for(var i = 0; i < markers.length; i++) {
          markers[i].setMap(null);
        }
    }

  }
</script>

<script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.0/dist/chart.min.js"></script>
<script>
    var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Januari', 'Ferbuari', 'Maret', 'April', 'Mei', 'Juni','Juli','Agustus','September','Oktober','November','Desember'],
        datasets: [{
            label: '# Pengeluaran Bulanan',
            data: [{{$pengeluaran_bulanan}}],
            backgroundColor:
                'rgba(255, 99, 132, 0.2)',
            borderColor:
                'rgba(255, 99, 132, 1)',
            borderWidth: 1
        },{
            label: '# Pmasukan Bulanan',
            data: [{{$pemasukan_bulanan}}],
            backgroundColor:
                'rgba(54, 162, 235, 0.2)',
            borderColor:
                'rgba(54, 162, 235, 1)',
            borderWidth: 1
        }
        
        ],
        
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>

<script type="text/javascript">
var ctxpie = document.getElementById('myChart_pie').getContext('2d');
var myChart_pie = new Chart(ctxpie, {
type: 'doughnut',
data : {
  labels: ['Breeding', 'Penggemukan', 'Perah', 'Perawatan Cempe'],
  datasets: [
    {
      label: 'Kategori Pemeliharaan Ternak',
      data: [{{$jenis_pemeliharaan}}],
      backgroundColor: [
      'rgb(255, 99, 132)',
      'rgb(54, 162, 235)',
      'rgb(255, 205, 86)',
      '#28FFBF'
    ],
    }
  ]
},
  options: {
    responsive: true,
    plugins: {
      legend: {
        position: 'top',
      },
      title: {
        display: true,
        text: 'Chart Jenis Pemeliharaan'
      }
    }
  },
});
    
</script>

<script type="text/javascript">
var ctxpiejenisternak =
document.getElementById('myChart_jenisternak').getContext('2d');
var myChart_jenisternak = new Chart(ctxpiejenisternak, {
type: 'doughnut',
data : {
  labels: [<?php echo $jenis_ternak; ?>],
  datasets: [
    {
      label: 'Jenis Ternak',
      data: [<?php echo $jumlah_ternak; ?>],
      backgroundColor:[<?php echo $color; ?>],
    }
  ]
},
  options: {
    responsive: true,
    plugins: {
      legend: {
        position: 'top',
      },
      title: {
        display: true,
        text: 'Chart Jenis Ternak'
      }
    }
  },
});
    
</script>

<script>
    var ctx_pemasukan = document.getElementById('myChart_pemasukan').getContext('2d');
var myChart_pemaukan = new Chart(ctx_pemasukan, {
    type: 'bar',
    data: {
        labels: ['Januari', 'Ferbuari', 'Maret', 'April', 'Mei', 'Juni','Juli','Agustus','September','Oktober','November','Desember'],
        datasets: [{
            label: '# Jual Pakan ternak',
            data: [{{$jual_pakan}}],
            backgroundColor:'#F6A9A9',
            borderColor:'#F6A9A9',
            borderWidth: 1
        },{
            label: '# Jual Hewan Ternak',
            data: [{{$jual_hewan}}],
            backgroundColor:'#FFBF86',
            borderColor:'#FFBF86',
            borderWidth: 1
        },{
            label: '# Jual Susu Ternak',
            data: [{{$jual_susu}}],
            backgroundColor:'#FFF47D',
            borderColor:'#FFF47D',
            borderWidth: 1
        },{
            label: '# Jual Kotoran',
            data: [{{$jual_kotoran}}],
            backgroundColor:'#C2F784',
            borderColor:'#C2F784',
            borderWidth: 1
        }
        ],
        
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>


<script>
    var ctx_pengeluaran = document.getElementById('myChart_pengeluaran').getContext('2d');
var myChart_pengeluaran = new Chart(ctx_pengeluaran, {
    type: 'bar',
    data: {
        labels: ['Januari', 'Ferbuari', 'Maret', 'April', 'Mei', 'Juni','Juli','Agustus','September','Oktober','November','Desember'],
        datasets: [{
            label: '# Pengeluaran Pakan ternak',
            data: [{{$jumlah_pakan}}],
            backgroundColor:'#ECD662',
            borderColor:'#ECD662',
            borderWidth: 1
        },{
            label: '# Pengeluaran Hewan Ternak',
            data: [{{$jumlah_hewan}}],
            backgroundColor:'#5D8233',
            borderColor:'#5D8233',
            borderWidth: 1
        },{
            label: '# Pengeluaran Asset Ternak',
            data: [{{$jumlah_asset}}],
            backgroundColor:'#284E78',
            borderColor:'#284E78',
            borderWidth: 1
        },{
            label: '# Pengeluaran Operasional',
            data: [{{$jumlah_operasional}}],
            backgroundColor:'#3E215D',
            borderColor:'#3E215D',
            borderWidth: 1
        },{
            label: '# Pengeluaran Gaji Karyawan',
            data: [{{$jumlah_gaji}}],
            backgroundColor:'#C2F784',
            borderColor:'#C2F784',
            borderWidth: 1
        },{
            label: '# Pengeluaran Obat Ternak',
            data: [{{$jumlah_obat}}],
            backgroundColor:'#F6A9A9',
            borderColor:'#F6A9A9',
            borderWidth: 1
        }
        
        ],
        
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>




<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD_Q3vZOlt8dDp7mrfoiPsPzSHytqBA8R0&callback=initMap"
    async defer></script>

@endpush

@endsection