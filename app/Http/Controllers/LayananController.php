<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Dompdf\Dompdf;

class LayananController extends Controller
{
    public function index()
    {
        $layanan = Layanan::all();
        return view('layanan.layanan', compact('layanan'));
    }

    public function create()
    {
        return view('layanan.layanan_entry');
    }

    public function store(Request $request)
    {
        $request->validate([
            'layanan' => 'required',
            'deskripsi' => 'required',
            'lama_waktu' => 'required',
            'harga' => 'required',
            'foto' => 'required|file|mimes:png,jpg,jpeg',
        ]);

        $foto = $request->file('foto');
        $nama_gambar = time() . '_' . $foto->getClientOriginalName();
        $tujuan_upload = 'img_layanan';
        $foto->move($tujuan_upload, $nama_gambar);
        
        // Buat data layanan baru dan simpan ke dalam database
        Layanan::create([
            'layanan' => $request->layanan,
            'deskripsi' => $request->deskripsi,
            'lama_waktu' => $request->lama_waktu,
            'harga' => $request->harga,
            'gambar' => $nama_gambar, // Gunakan $nama_gambar, bukan $foto
        ]);

        return redirect('/layanan')->with('success', 'Data layanan berhasil disimpan.');
    }

    public function edit($id_layanan)
    {
        $layanan = Layanan::find($id_layanan);
        return view('layanan.layanan_edit', compact('layanan'));
    }

    public function update(Request $request, $id_layanan)
    {
        $request->validate([
            'layanan' => 'required',
            'deskripsi' => 'required',
            'lama_waktu' => 'required',
            'harga' => 'required',
            'gambar' => 'file|mimes:png,jpg,jpeg',
        ]);

        $layanan = Layanan::find($id_layanan);

        if (!$layanan) {
            return redirect('/layanan')->with('error', 'Data layanan tidak ditemukan.');
        }

        if ($request->hasFile('gambar')) {
            File::delete('img_layanan/' . $layanan->gambar);
            $gambar = $request->file('gambar');
            $nama_gambar = time() . '_' . $gambar->getClientOriginalName();
            $tujuan_upload = 'img_layanan';
            $gambar->move($tujuan_upload, $nama_gambar);
            $layanan->gambar = $nama_gambar;
        }

        $layanan->update([
            'layanan' => $request->layanan,
            'deskripsi' => $request->deskripsi,
            'lama_waktu' => $request->lama_waktu,
            'harga' => $request->harga,
            'gambar' => $nama_gambar,
        ]);

        return redirect('/layanan')->with('success', 'Data layanan berhasil diperbarui.');
    }

    public function delete($id_layanan)
    {
        $layanan = Layanan::find($id_layanan);
        return view('layanan.layanan-hapus', compact('layanan'));
    }

    public function destroy($id_layanan)
    {
        $layanan = Layanan::find($id_layanan);
        
        if (!$layanan) {
            return redirect('/layanan')->with('error', 'Data layanan tidak ditemukan.');
        }

        File::delete('img_layanan/' . $layanan->gambar);
        $layanan->delete();

        return redirect('/layanan')->with('success', 'Data layanan berhasil dihapus.');
    }
    
    public function cetakLaporan()
    {
        $layanan = Layanan::all();

        // Render view into HTML
        $html = view('layanan.layanan_cetak', compact('layanan'))->render();

        // Instantiate Dompdf
        $dompdf = new Dompdf();

        // Load HTML content
        $dompdf->loadHtml($html);

        // Set paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // Render HTML as PDF
        $dompdf->render();

        // Output the generated PDF (inline or download)
        return $dompdf->stream('laporan-layanan.pdf');
    }
}
