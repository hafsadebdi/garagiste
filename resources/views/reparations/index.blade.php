<!DOCTYPE html>
<html @if(app()->getLocale() == "ar") dir=rtl @endif lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>GESTION GARAGISTE- ADMIN</title>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  @vite(['resources/js/app.js','resources/css/app.css'])
  <style>
    .content .box-info{
      display: flex;
      gap: 80px;
      justify-content: center;
    }
    .content .box-info li{
      list-style: none;
    }
    .p1{
      background-color: gray;
      padding: 10px;
      width: 300px;
      height: 100px;
      text-align: center;
      font-size: large;
      border: 1px solid beige;
      border-radius: 30px;
      color:white;
    }
    .p1:hover{
      color:gray;
      background-color: white;
    }
  </style>
  <!-- Google Font: Source Sans Pro -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css')}}">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">


  <!-- Navbar -->
  @include('layouts.header')
  <!-- Main Sidebar Container -->
  @include('layouts.section')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6"></div>
          <div class="col-sm-6"></div>
        </div>
      </div>
    </div>
    <!-- Main content -->
    <section class="content">
      <div id="showR">
        <!-- code de la fenetre modal -->
      </div>
      <div class='max-w-md mx-auto mt-10'>
        <div class="relative flex items-center w-full h-12 rounded-lg focus-within:shadow-lg bg-white overflow-hidden">
          <div class="grid place-items-center h-full w-12 text-gray-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
          </div>
          

        </div>
      </div>
      <div class="m-5">
        <a class="btn btn-secondary" href="{{route('reparations.create')}}">@lang('Ajouter une reparation')</a>
            <a href="{{route('generate-pdfc')}}">
                <button class="btn btn-primary" >@lang('telecharger en pdf')</button>
            </a>


        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show mt-10" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <p>{{ $message }}</p>
            </div>
        @endif
        <div id="showR">
            <!-- code de la fenetre modal  -->
        </div>
        <div id="divResult">


      </div>
      <div id="divDelete">

      </div>
    </section>
    <table class="table table-striped table-hover mt-10 w-50" >
        <tr>
            <th >@lang('Numero')</th>
            <th >@lang('description')</th>
            <th >@lang('status')</th>
            <th >@lang('date_debut')</th>
            <th >@lang('date_fin')</th>

            <th >@lang('nom_de_mecanicien')</th>
            <th >@lang('numero_vehicule')</th>
            <th>@lang('Action')</th>
        </tr>
        @foreach ($reparations as $rp)
            <tr id="row{{$rp->id}}">
                <td>{{ $rp->id}}</td>
                <td>{{ $rp->description}}</td>
                <td>{{ $rp->status}}</td>
                <td>{{ $rp->startDate }}</td>
                <td>{{$rp->endDate }}</td>
               <td> {{$rp->nom_mecaniciens}}</td>
                <td>{{$rp->vehicule_id }}</td>
                <td>
                     <button class="btnShow btn bg-primary-emphasis hover:bg-primary-emphasis text-black font-bold  px-2 border-b-4 border-primary-emphasis hover:border-primary-emphasis rounded" v="{{$rp->id}}">@lang('Voir')</button>
                    <a class="btnEdit btn  bg-success hover:bg-success text-white font-bold  px-2 border-b-4 border-success hover:border-success rounded" href="{{route('reparations.edit',$rp->id)}}">@lang('Modifier')</a>
                    <button class="btnDelete btn  bg-red-500 hover:bg-red text-white font-bold px-2 border-b-4 border-red hover:border-red rounded" v="{{$rp->id}}">{{ trans('Supprimer')}}</button>
                </td>
            </tr>
        @endforeach
    </table>
  </div>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-secondary"></aside>
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{ asset('plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{ asset('plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{ asset('plugins/moment/moment.min.js')}}"></script>
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{ asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('dist/js/pages/dashboard.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@yield('script')
</body>
</html>

<script>
function submitForm(event){
  event.preventDefault();
  var formData = $('#searchForm').serialize();


  axios.post(url, formData)
    .then(response => {
      $("#divResult").html(response.data);
    })
    .catch(error => {
      console.log(error);
    });
}
</script>
