
@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="header--wrapper">
    <div class="header--title">
        <span>Home</span>
        <h2>Admin</h2>
    </div>
    <div class="user--info">
        <div class="search--box">
            <i class="fa-solid fa-search"></i>
            <input type="text" placeholder="search" />
        </div>
        {{-- <div class="user--name" id="username" data-username="{{ $username }}">
            <p>Welcome, {{ $username }}!</p>
        </div> --}}
    </div>
</div>
<!--  Widget  -->
<div class="tabel-wrapper">
    <div class="dashboard-home">
        <h2 id="text"></h2>
        <h3 id="date"></h3>
    </div>
    <div class="stats-wrapper">
        <div class="stats-card">
            <h3>Total Layanan</h3>
            <p>{{ $count_layanan }}</p>
            <h4>Layanan yang tersedia</h4>
        </div>
        <div class="stats-card">
            <h3>Total Pengajuan</h3>
            <p>{{ $count_pengajuan }}</p>
            <h4>Client yang mengajukan kerja sama</h4>
        </div>
        <div class="stats-card">
            <h3>Total Admin</h3>
            <p>{{ $count_user }}</p>
            <h4>User Admin</h4>
        </div>
    </div>
</div>
@endsection
