<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <img src="">
        </div>
        <div class="sidebar-brand-text mx-3">Data Kasir</div>
    </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Table Data Kasir
    </div>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable"
            aria-expanded="true" aria-controls="collapseTable">
            <i class="fas fa-fw fa-table"></i>
            <span>Tables</span>
        </a>
        <div id="collapseTable" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Table Kasir</h6>
                <a class="collapse-item" href="{{ route('kasir.index') }}">Table Kasir</a>
                <a class="collapse-item" href="{{ route('merk.index') }}">Table Merk</a>
                <a class="collapse-item" href="{{ route('barang.index') }}">Table Barang</a>
                <a class="collapse-item" href="{{ route('transaksi.index') }}">Table Transaksi</a>
            </div>
        </div>
    </li>

</ul>
<!-- Sidebar -->
