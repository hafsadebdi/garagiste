<!DOCTYPE html>
<html @if(app()->getLocale() == "ar") dir=rtl @endif lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GESTION GARAGISTE- ADMIN</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .content .box-info {
            display: flex;
            gap: 80px;
            justify-content: center;
        }
        .content .box-info li {
            list-style: none;
        }
        .p1 {
            background-color: gray;
            padding: 10px;
            width: 300px;
            height: 100px;
            text-align: center;
            font-size: large;
            border: 1px solid beige;
            border-radius: 30px;
            color: white;
        }
        .p1:hover {
            color: gray;
            background-color: white;
        }
    </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">

    <!-- Navbar -->
    @include('layouts.header')
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="login" class="brand-link">
          <img src="{{ asset('https://i.pinimg.com/564x/c1/4d/42/c14d4224df992ee8f06ef82afff0d9c0.jpg.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">@lang('GARAGISTE')</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar user panel (optional) -->

            <div class="info" style="color:white">
            {{ Auth::user()->name }}

            </div>
          </div>

          

          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">


                    <a href="#" class="nav-link">
                      <i class="nav-icon fas fa-th"></i>
                      <p>
                       @lang('Gestion des véhicules')
                      </p>
                    </a>

                    <a href="{{route('factures.index')}}" class="nav-link">
                      <i class="nav-icon fas fa-th"></i>
                      <p>
                        @lang('Listes des factures')
                      </p>
                    </a>
                    <a href="{{route('reparations.liste')}}" class="nav-link">
                      <i class="nav-icon fas fa-th"></i>
                      <p>
                        @lang('Réparations')
à                      </p>
                    </a>

                  </li>

            </ul>
          </nav>
          <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
      </aside>
    <!-- Main Sidebar Container -->


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
        <section class="content" style="margin: 10px;">
            <div class="row">
                <div class="col-lg-12 mt-10">
                    <div class="pull-right" style="margin-left:800px">
                        <a class="btn btn-primary" href="{{ route('vehicules.listem') }}">@lang('Retourner')</a>
                    </div>
                </div>
            </div>

            @if ($errors->any())
                <div class="alert alert-warning alert-dismissible fade show mt-10" role="alert">
                    <strong>@lang('Whooops ') </strong>@lang('Veuillez remplir tous les champs.')
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <table class="table table-striped table-hover mt-10">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Marque</th>
                        <th>Modèle</th>
                        <th>Type de Fuel</th>
                        <th>Immatriculation</th>
                        <th>Image</th>
                        <th>Nom du client</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ( $reparations as $vehicule)
                        <tr id="row{{ $vehicule->id }}">
                            <td>{{ $vehicule->id }}</td>
                            <td>{{ $vehicule->marque }}</td>
                            <td>{{ $vehicule->modele }}</td>
                            <td>{{ $vehicule->typeFuel }}</td>
                            <td>{{ $vehicule->registration }}</td>
                            <td><img src="{{ asset('images/' . $vehicule->image) }}" alt="Image du véhicule" style="width: 100px;"></td>
                            <td>{{ $vehicule->client_nom ?? 'N/A' }} {{ $vehicule->client_prenom}}</td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </div>

    <!-- Modal -->
    <div id="myModalDeleteM" class="modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">@lang('Supprimer')</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="deleteForm" onsubmit="return submitDeleteForm(event)">
                        @csrf
                        <input type="hidden" value="" id="txtId" name="txtId" />
                    </form>
                    <p>@lang('Êtes-vous sûr de vouloir supprimer ce véhicule ?')</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" id="deleteConfirm">@lang('Oui, supprimer !')</button>
                    <button class="btn btn-secondary" data-bs-dismiss="modal">@lang('Fermer')</button>
                </div>
            </div>
        </div>
    </div>



    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark"></aside>
</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>
<script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
<script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<script src="{{ asset('dist/js/adminlte.js') }}"></script>
<script src="{{ asset('dist/js/demo.js') }}"></script>
<script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function submitDeleteForm(event) {
        event.preventDefault();
        var formData = $('#deleteForm').serialize();

        axios.post('{{ route('vehicules.delete') }}', formData)
            .then(response => {
                $('#row' + $('#txtId').val()).remove();
                $('#myModalDeleteM').modal('hide');
            })
            .catch(error => {
                console.log(error);
            });
    }
</script>

@yield('script')

</body>
</html>
