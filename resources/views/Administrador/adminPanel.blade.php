@extends('adminlte::page')


@section('content_header')
    <h1>Panel de Administrador</h1>
@stop

@section('content')
<style>
  .main-sidebar{
    background: #0F3759 !important;
  }
</style>
    <style>
    #chartdiv {
      width: 100%;
      height: 500px;
    }
    </style>
    <br>
    <p>Usuarios totales: {{$totalUsers}}</p>
    <p>organizaciones totales: {{$totalOrganizaciones}}</p>
    <p>Talleres totales: {{$totalActivities}}</p>
    <p>Mesas totales: {{$totalMesas}}</p>
    <div class="card">
    <div class="card-header">
    <h3 class="card-title">Participantes por organizacion</h3>

    <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
        <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove">
        <i class="fas fa-times"></i>
        </button>
    </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
    <div class="row">
        <div class="col-md-8">
        <div class="chart-responsive">
            <canvas id="pieChart" height="300"></canvas>
        </div>
        <!-- ./chart-responsive -->
        </div>
        <!-- /.col -->
        <div class="col-md-4">
        <ul class="chart-legend clearfix">
          @foreach($organizaciones as $index => $organizacion)
            <li><i class="far fa-circle" style="color: {{ $colors[$index] }}"></i> {{ $organizacion->nombre }}</li>
          @endforeach
        </ul>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
    </div>
    <!-- /.footer -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns@3"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.umd.js" integrity="sha512-ZwR1/gSZM3ai6vCdI+LVF1zSq/5HznD3ZSTk7kajkaj4D292NLuduDCO1c/NT8Id+jE58KYLKT7hXnbtryGmMg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</div>
<!-- /.card -->

@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
<script>
  $(function () {
    var ctx = $('#pieChart').get(0).getContext('2d');

    var data = {
      labels: {!! json_encode($labels) !!},
      datasets: [{
        data: {!! json_encode($data) !!},
        backgroundColor: {!! json_encode($colors) !!},
      }]
    };

    var options = {
      maintainAspectRatio: false,
      responsive: true,
    };

    new Chart(ctx, {
      type: 'pie',
      data: data,
      options: options
    });
  });
</script>
@stop

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script
  src="https://code.jquery.com/jquery-3.7.1.js"
  integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
  crossorigin="anonymous"></script>
<!-- Bootstrap -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js" integrity="sha512-7Pi/otdlbbCR+LnW+F7PwFcSDJOuUJB3OxtEHbg4vSMvzvJjde4Po1v4BR9Gdc9aXNUNFVUY+SK51wWT8WF0Gg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- overlayScrollbars -->
<script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.0/browser/overlayscrollbars.browser.es6.min.js"></script>
<!-- AdminLTE App -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/js/adminlte.min.js" integrity="sha512-KBeR1NhClUySj9xBB0+KRqYLPkM6VvXiiWaSz/8LCQNdRpUm38SWUrj0ccNDNSkwCD9qPA4KobLliG26yPppJA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.js" integrity="sha512-c5JDIvikBZ6tuz+OyaFsHKvuyg+tCug3hf41Vmmd5Yz9H5anj4vZOqlBV5PJoEbBJGFCgKoRT9YAgko4JS6/Qw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.3.0/raphael.min.js" integrity="sha512-tBzZQxySO5q5lqwLWfu8Q+o4VkTcRGOeQGVQ0ueJga4A1RKuzmAu5HXDOXLEjpbKyV7ow9ympVoa6wZLEzRzDg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-mapael/2.2.0/js/jquery.mapael.min.js" integrity="sha512-+iXNzFArGbqxdmbClb1f6MKIiZASR7H8ep6rS1ZFn2I7tRX400ApvS0nsG8/v1+F7RoGU2shMDTl/gZ5lZF1iw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- ChartJS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.min.js" integrity="sha512-L0Shl7nXXzIlBSUUPpxrokqq4ojqgZFQczTYlGjzONGTDAcLremjwaWv5A+EDLnxhQzY5xUZPWLOLqYRkY0Cbw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
