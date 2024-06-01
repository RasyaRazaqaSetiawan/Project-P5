<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu"
                aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <h5 class="navbar-brand">Project P5</h5>
            <a class="navbar-brand hidden" href="./"><img src="{{ asset('images/logo2.png') }}" alt="Logo"></a>
        </div>
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="{{ route('home') }}"> <b class="menu-icon fa fa-dashboard"></b>Dashboard</a>
                </li>
                <h3 class="menu-title">Data Tabel Kasir</h3>
                <li class="menu">
                    <a href="{{ route('merk.index') }}"> <b class="menu-icon fa fa-laptop"></b>Merk</a>
                </li>
                <li class="menu">
                    <a href="{{ route('barang.index') }}"> <b class="menu-icon fa fa-th"></b>Barang</a>
                </li>
                <li class="menu">
                    <a href="{{ route('kasir.index') }}"> <b class="menu-icon fa fa-table"></b>Kasir</a>
                </li>
                <li class="menu">
                    <a href="{{ route('transaksi.index') }}"> <b class="menu-icon fa fa-th"></b>Transaksi</a>
                </li>
            </ul>
        </div>
    </nav>
</aside>
