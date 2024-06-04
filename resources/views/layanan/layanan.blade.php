@extends('layouts.app')

@section('content')
    <div class="header--wrapper">
        <div class="header--title">
            <span>Data</span>
            <h2>Layanan</h2>
        </div>
        <div class="user--info">
            <div class="search--box">
                <i class="fa-solid fa-search"></i>
                <input type="text" placeholder="search">
            </div>
        </div>
    </div>
    <div class="tabular--wrapper">
        <div class="button-container">
            <a href="{{ url('/layanan/cetak') }}" class="move-button" style="text-decoration: none; display: inline-block; padding: 10px 20px; background-color: #ccc; color: #000; border-radius: 5px;">Cetak</a>
        </div>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Layanan</th>
                        <th>Deskripsi</th>
                        <th>Lama Waktu</th>
                        <th>Harga</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($layanan as $item)
                        <tr>
                            <td><img src="{{ asset('img_layanan/' . $item->gambar) }}" alt="Foto" style="width:150px; height:auto;"></td>
                            <td>{{ $item->layanan }}</td>
                            <td>{{ $item->deskripsi }}</td>
                            <td>{{ $item->lama_waktu }} Hari</td>
                            <td>Rp. {{ number_format($item->harga, 0, ',', '.') }}</td>
                            <td>
                                <form action="{{ route('layanan.edit', $item->id) }}" method="get">
                                    @csrf
                                    <button type="submit" class="btn-edit">Edit</button>
                                </form>
                                <form action="{{ route('layanan.destroy', $item->id) }}" method="post" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-delete" onclick="return confirm('Apakah Anda yakin ingin menghapus layanan ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6">Tidak ada data layanan</td></tr>
                    @endforelse
                </tbody>                
            </table>
        </div>
    </div>
@endsection
