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
        .custom-padding {
            padding: 20px;
        }
        .form-group {
            margin-bottom: 1.5rem;
        }
    </style>
</head>

<body>
    @include('layouts.sidebar')

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
                            <li><a href="#">Table</a></li>
                            <li class="active">Show Data kasir</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        {{-- /breadcrumbs --}}
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row justify-content-center">
                    <div class="col-sm-6 col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong>Show Data Kasir</strong>
                            </div>
                            <form action="" method="POST">
                                @csrf
                                <div class="card-body custom-padding">
                                    <div class="form-group mb-3">
                                        <label>Nama kasir</label>
                                        <input type="text" class="form-control" name="nama_kasir" value="{{$kasir->nama_kasir}}" placeholder="Nama kasir" disabled>
                                        <p class="help-block">Masukkan Nama Anda </p>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Jenis Kelamin</label><br>
                                        <input type="radio" name="jenis_kelamin" value="Laki-Laki" {{ $kasir->jenis_kelamin == 'Laki-Laki' ? 'checked' : '' }} disabled> Laki-Laki
                                        <input type="radio" name="jenis_kelamin" value="Perempuan" {{ $kasir->jenis_kelamin == 'Perempuan' ? 'checked' : '' }} disabled> Perempuan
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Alamat</label>
                                        <textarea class="form-control" rows="3" placeholder="Masukkan Alamat" name="alamat" disabled>{{$kasir->alamat}}</textarea>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>No Telepon</label>
                                        <input type="tel" class="form-control" name="no_telepon" placeholder="No Telepon" value="{{$kasir->no_telepon}}" required disabled>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="cover" class="form-label">Tampilan Gambar</label><br>
                                        <img src="{{ asset('images/kasir/' . $kasir->cover) }}" width="150" alt="Cover kasir">
                                    </div>
                                    <button type="submit" class="btn btn-success">Tambah</button>
                                    <a href="{{ url('kasir') }}" class="btn btn-primary">Kembali</a>
                                </div>
                            </form>
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

    <script>
        jQuery(document).ready(function() {
            jQuery(".standardSelect").chosen({
                disable_search_threshold: 10,
                no_results_text: "Oops, nothing found!",
                width: "100%"
            });
        });
    </script>
</body>

</html>
