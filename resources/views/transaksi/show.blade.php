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
                <div class="page-header float-right ">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Table</a></li>
                            <li class="active">Edit Data Transaksi</li>
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
                                <strong>Detail Data Transaksi</strong>
                                <form action="" method="POST">
                                    <div class="mb-3">
                                        <br>
                                        <label for="exampleInputEmail1" class="form-label">Tanggal Pembelian</label>
                                        <input type="text" class="form-control mb-2" name="tanggal_pembelian"
                                            value="{{ $transaksi->tanggal_pembelian }}" disabled>
                                        <label for="exampleInputEmail1" class="form-label">Nama barang</label>
                                        <input type="text" class="form-control mb-2" name="id_barang"
                                            value="{{ $transaksi->barang->nama_barang }}" disabled>
                                        <label for="exampleInputEmail1" class="form-label">Nama kasir</label>
                                        <input type="text" class="form-control mb-2" name="id_kasir"
                                            value="{{ $transaksi->kasir->nama_kasir }}" disabled>
                                        <label for="exampleInputEmail1" class="form-label">jumlah</label>
                                        <input type="text" class="form-control mb-2" name="jumlah"
                                            value="{{ $transaksi->jumlah }}" disabled>
                                        <label for="exampleInputEmail1" class="form-label">total</label>
                                        <input type="text" class="form-control mb-2" name="total"
                                            value="{{ $transaksi->total }}" disabled>
                                    </div>
                                    <a href="{{ url('transaksi') }}" class="btn btn-primary mt-4">Kembali</a>
                                </form>
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
