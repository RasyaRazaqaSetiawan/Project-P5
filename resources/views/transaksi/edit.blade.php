<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Startmin - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{ asset('admin/css/metisMenu.min.css') }}" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="{{ asset('admin/css/timeline.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('admin/css/startmin.css') }}" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{{ asset('admin/css/morris.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ asset('admin/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            {{-- NAVBAR --}}
            @include('layouts.navbar')
            {{-- /NAVBAR --}}

            {{-- SIDEBAR --}}
            @include('layouts.sidebar')
            {{-- /SIDEBAR --}}
        </nav>

        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Edit Data transaksi</h1>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Edit Data transaksi
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form action="{{ route('transaksi.update', $transaksi->id) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group">
                                                <label>Tanggal</label>
                                                <input type="text" class="form-control" name="nama_transaksi"
                                                    placeholder="Nama transaksi" value="{{ $transaksi->nama_transaksi }}">
                                                <p class="help-block">Masukkan data yang anda mau</p>
                                            </div>
                                            <div class="form-group">
                                                <label>Jenis Kelamin</label><br>
                                                <input type="radio" name="jenis_kelamin" value="Laki-Laki" {{ $transaksi->jenis_kelamin == 'Laki-Laki' ? 'checked' : '' }}> Laki-Laki
                                                <input type="radio" name="jenis_kelamin" value="Perempuan" {{ $transaksi->jenis_kelamin == 'Perempuan' ? 'checked' : '' }}> Perempuan
                                            </div>
                                            <div class="form-group">
                                                <label>Alamat</label>
                                                <textarea class="form-control" rows="3" placeholder="Masukkan Alamat" name="alamat">{{ $transaksi->alamat }}</textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="datePicker" class="form-label">Pilih Tanggal</label>
                                                <input type="date" class="form-control" id="datePicker"
                                                    name="tanggal_terbit" value="{{ $transaksi->tanggal_terbit }}">
                                            </div>
                                            <div class="form-group">
                                                <label>No Telepon</label>
                                                <input type="tel" class="form-control" name="no_telepon" value="{{ $transaksi->no_telepon }}" placeholder="No Telepon">
                                            </div>
                                            <div class="form-group">
                                                <label>Cover</label>
                                                <input type="file" name="cover">
                                            </div>
                                            <button type="submit" class="btn btn-success">Ubah</button>
                                            <a href="{{ url('transaksi') }}" class="btn btn-primary">Kembali</a>
                                        </form>
                                    </div>
                                </div>
                                <!-- /.row (nested) -->
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('admin/js/jquery.min.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{ asset('admin/js/metisMenu.min.js') }}"></script>

    <!-- Morris Charts JavaScript -->
    <script src="{{ asset('admin/js/raphael.min.js') }}"></script>
    <script src="{{ asset('admin/js/morris.min.js') }}"></script>
    <script src="{{ asset('admin/js/morris-data.js') }}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{ asset('admin/js/startmin.js') }}"></script>

</body>

</html>
