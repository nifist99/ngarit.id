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
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-hijau">
              <div class="inner">
                <h4 class="text-w">{{$data}}</h4>

                <p class="text-w">JUMLAH TERNAK TOTAL YANG <br> PERNAH DI PELIHARA</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info</a>
            </div>
          </div>
          <!-- ./col -->
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
              <i class="fa fa-bar"></i>

              <h3 class="box-title">Analisis Pengeluaran & Pemasukan Bar Chart</h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip"
                        title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
              <!-- /. tools -->
            </div>
            <div class="box-body">
                <canvas id="myChart" width="100%"></canvas>
                </div>
                </div>
                </div>
                </div>
          
          <?php if(CRUDBooster::myPrivilegeName() == "mitra"){}else{ ?>
    <div class="col-sm-12" style="margin-bottom: 30px">
    <div class="card card-primary">
      <div class="card-header ">
        <h3>Posisi Ternak Di mitra</h3>
      </div>
      <div class="panel-body">
        <div style="width: 100%;height: 500px;" id="map"></div>
      </div>
    </div>
    </div>
    <?php }?>
        
   

</div>
</div>

@push('bottom')
<script>
//     function tanggal()
// {
//     arrbulan = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
// date = new Date();
// millisecond = date.getMilliseconds();
// detik = date.getSeconds();
// menit = date.getMinutes();
// jam = date.getHours();
// hari = date.getDay();
// tanggal = date.getDate();
// bulan = date.getMonth();
// tahun = date.getFullYear();
// return tanggal+"-"+arrbulan[bulan]+"-"+tahun+"<br/>";
// }

// document.getElementById("demo").innerHTML = tanggal();

</script>

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
    $.get("{{url('marker')}}",function(r) {
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
              title: obj.name,
                icon: image,
            });
            markersVar[obj.id] = marker;
            var contentString = 
            "<table class='infoWindow'>"+
            "<tr><td style='font-weight:bold;'>Nama : "+obj.name+"</td></tr>"+
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


<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD_Q3vZOlt8dDp7mrfoiPsPzSHytqBA8R0&callback=initMap"
    async defer></script>

@endpush

@endsection