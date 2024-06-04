
<div class="logo"></div>
<ul class="menu">
    <li>
        <a href="{{ url('dashboard') }}">
            <i class="fas fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <li>
        <a href="{{ url('layanan/create') }}">
            <i class="fas fa-note-sticky"></i>
            <span>Input Data</span>
        </a>
    </li>
    <li>
        <a href="{{ url('layanan') }}">
            <i class="fas fa-briefcase"></i>
            <span>Service</span>
        </a>
    </li>
    <li>
        <a href="{{ url('transaksi/transaction') }}">
            <i class="fas fa-chart-bar"></i>
            <span>Transaction</span>
        </a>
    </li>
    <li class="logout">
        <a href="{{ url('client/logout') }}">
            <i class="fas fa-sign-out-alt"></i>
            <span>Log out</span>
        </a>
    </li>
</ul>