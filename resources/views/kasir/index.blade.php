<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sufee Admin - HTML5 Admin Template</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="{{ asset('admin/css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/cs-skin-elastic.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/scss/style.css') }}">
    <link href="{{ asset('admin/css/lib/vector-map/jqvmap.min.css') }}" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <style>
        .dataTables_filter {
            float: right;
        }
    </style>
</head>

<body>
    @include('layouts.sidebar')
    @include('layouts.navbar')

    <div id="right-panel" class="right-panel">
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Data Table Kasir</a></li>
                            <li class="active">Data Kasir</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        {{-- /breadcrumbs --}}
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Data Kasir</strong>
                                <div class="pull-right">
                                    <a href="{{ route('kasir.create') }}" class="btn btn-primary btn-sm">+ Tambah</a>
                                </div>
                            </div>
                            <div class="card-body" style="overflow-x:auto;">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    @if (session('success'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama kasir</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Alamat</th>
                                            <th>No Telepon</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($kasir as $data)
                                        <tr class="odd gradeX">
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $data->nama_kasir }}</td>
                                            <td>{{ $data->jenis_kelamin }}</td>
                                            <td>{{ $data->alamat }}</td>
                                            <td>{{ $data->no_telepon }}</td>
                                            <form action="{{ route('kasir.destroy', $data->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <td class="center">
                                                    <a href="{{ route('kasir.edit', $data->id) }}"
                                                        class="btn btn-success"><i class="fa fa-pencil-square-o"></i></a>
                                                    <a href="{{ route('kasir.show', $data->id) }}"
                                                        class="btn btn-warning"><i class="fa fa-eye"></i></a>
                                                    <button type="submit" class="btn btn-danger"
                                                        onclick="return confirm('Apakah Anda Yakin ingin menghapus data ini?')">
                                                        <i class="fa fa-trash-o"></i></button>
                                                </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('admin/js/vendor/jquery-2.1.4.min.js') }}"></script>
    <script src="{{ asset('admin/js/popper.min.js') }}"></script>
    <script src="{{ asset('admin/js/plugins.js') }}"></script>
    <script src="{{ asset('admin/js/main.js') }}"></script>
    <script src="{{ asset('admin/js/lib/data-table/datatables.min.js') }}"></script>
    <script src="{{ asset('admin/js/lib/data-table/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/js/lib/data-table/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('admin/js/lib/data-table/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/js/lib/data-table/jszip.min.js') }}"></script>
    <script src="{{ asset('admin/js/lib/data-table/pdfmake.min.js') }}"></script>
    <script src="{{ asset('admin/js/lib/data-table/vfs_fonts.js') }}"></script>
    <script src="{{ asset('admin/js/lib/data-table/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('admin/js/lib/data-table/buttons.print.min.js') }}"></script>
    <script src="{{ asset('admin/js/lib/data-table/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('admin/js/lib/data-table/datatables-init.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#bootstrap-data-table').DataTable();
        });
    </script>
</body>
</html>
