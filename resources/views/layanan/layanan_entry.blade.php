@extends('layouts.app')

@section('title', 'Input Layanan')

@section('content')
<div class="header--wrapper">
    <div class="header--title">
        <span>Data</span>
        <h2>Input Layanan</h2>
    </div>
    <div class="user--info">
        <div class="search--box">
            <i class="fa-solid fa-search"></i>
            <input type="text" placeholder="search">
        </div>
    </div>
</div>
<div class="tabel-wrapper">
    <h3 class="main-title">Input Data</h3>
    <div class="form-wrapper">
        <form action="{{ route('layanan.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="layanan">Layanan</label>
                <input type="text" id="layanan" name="layanan" required>
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <input type="text" id="deskripsi" name="deskripsi" required>
            </div>
            <div class="form-group">
                <label for="lama_waktu">Lama Waktu / Hari</label>
                <input type="text" id="lama_waktu" name="lama_waktu" required>
            </div>
            <div class="form-group">
                <label for="harga">Harga</label>
                <input type="text" id="harga" name="harga" required>
            </div>
            <div class="form-group">
                <label for="foto">Foto</label>
                <input type="file" id="foto" name="foto" accept="image/*" onchange="previewFile()">
            </div>
            <div class="form-group">
                <img id="preview" src="#" alt="Preview" style="display: none; max-width: 300px;">
            </div>
            <div class="button-container">
                <button type="submit" class="move-button">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection
