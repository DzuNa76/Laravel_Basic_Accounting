@extends('layouts.app')

@section('content')
<div class="header--wrapper">
    <div class="header--title">
        <span>Data</span>
        <h2>Edit Layanan</h2>
    </div>
    <div class="user--info">
        <div class="search--box">
            <i class="fa-solid fa-search"></i>
            <input type="text" placeholder="search">
        </div>
    </div>
</div>
<div class="tabel-wrapper">
    <h3 class="main-title">Edit Data</h3>
    <div class="form-wrapper">
        <form action="{{ route('layanan.update', $layanan->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="layanan">Layanan</label>
                <input type="text" id="layanan" name="layanan" value="{{ $layanan->layanan }}" required>
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <input type="text" id="deskripsi" name="deskripsi" value="{{ $layanan->deskripsi }}" required>
            </div>
            <div class="form-group">
                <label for="lama_waktu">Lama Waktu / Hari</label>
                <input type="text" id="lama_waktu" name="lama_waktu" value="{{ $layanan->lama_waktu }}" required>
            </div>
            <div class="form-group">
                <label for="harga">Harga</label>
                <input type="text" id="harga" name="harga" value="{{ $layanan->harga }}" required>
            </div>
            <div class="form-group">
                <label for="gambar">Foto</label>
                <input type="file" id="gambar" name="gambar" accept="image/*" onchange="previewFile()">
            </div>
            <div class="form-group">
                <img id="preview" src="{{ asset('img_layanan/' . $layanan->gambar) }}" alt="Preview" style="max-width: 300px;">
            </div>
            <div class="button-container">
                <a href="{{ route('layanan.index') }}" class="move-button" style="text-decoration: none; display: inline-block; padding: 10px 20px; background-color: #ccc; color: #000; border-radius: 5px;">Kembali</a>
                <button type="submit" class="move-button">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection
