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
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Table</a></li>
                            <li class="active">Edit Data barang</li>
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
                                <strong>Edit Data barang</strong>
                            </div>
                            <form action="{{ route('barang.update', $barang->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-body custom-padding"> <!-- Tambahkan kelas custom-padding di sini -->
                                    <div class="form-group mb-3">
                                        <label>Nama barang</label>
                                        <input type="text" class="form-control" name="nama_barang"
                                            value="{{ $barang->nama_barang }}" placeholder="Nama barang">
                                        <p class="help-block">Masukkan Nama Anda </p>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Stok</label><br>
                                        <select class="form-control" name="stok" id="stok" required>
                                            <option value="" disabled selected>Pilih Stok</option>
                                            <option value="10" {{ $barang->stok == '10' ? 'checked' : '' }}>10</option>
                                            <option value="20" {{ $barang->stok == '20' ? 'checked' : '' }}>20</option>
                                            <option value="30" {{ $barang->stok == '30' ? 'checked' : '' }}>30</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Harga</label>
                                        <input type="text" class="form-control" name="harga" id="harga" value="{{$barang->harga}}"
                                            readonly>
                                        <div class="form-group mb-3">
                                            <label>Nama Merk</label>
                                            <select class="form-control" name="id_merk">
                                                @foreach ($merk as $data)
                                                    <option value="{{ $data->id }}"
                                                        {{ $data->id == $barang->id_merk ? 'selected' : '' }}>{{ $data->nama_merk }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="cover" class="form-label">Masukkan Gambar</label>
                                        <input class="form-control form-control-sm" id="cover" type="file"
                                            name="cover">
                                    </div>
                                    <button type="submit" class="btn btn-success">Tambah</button>
                                    <a href="{{ url('barang') }}" class="btn btn-primary">Kembali</a>
                                </div> <!-- Akhiri card-body custom-padding -->
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
