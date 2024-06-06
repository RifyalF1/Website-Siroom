<?php

namespace App\Http\Controllers;

use App\Models\Komen;
use App\Models\Suka;
use App\Models\Topik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TopikController extends Controller
{
    function index()
    {
        // Mengambil data topik
        $topik = Topik::all();
    
        // Mengambil data suka dari tabel Suka dan menghitung total berdasarkan id_topik
        $data = Suka::join('topik', 'suka.id_topik', '=', 'topik.id_topik')
            ->select('topik.judul', DB::raw('count(*) as total'))
            ->groupBy('topik.id_topik', 'topik.judul')
            ->orderBy('total', 'desc')
            ->take(5)
            ->get();

        $formattedData = $data->map(function ($item) {
            return [
                'label' => $item->judul,
                'value' => $item->total
            ];
        });
            
        // Mengirimkan data ke view dashboard.blade.php
        return view('dashboard', compact('topik', 'formattedData'));
    }

    function topikdetail($id_topik) 
    {
        $topik = Topik::findOrFail($id_topik);
        $komen = Komen::where('id_topik', $id_topik)->get();

        return view('topikdetail',compact('topik','komen'));
    }

    function tambahtopik(Request $request)
    {
        $id = Auth::user()->id;

        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
        ],[
            'judul.required' => 'Judul Harus Diisi',
            'deskripsi.required' => 'Deskripsi Harus Diisi',
        ]);

        // Default gambar
        $gambar = 'Image_Icon.png'; // Ganti 'default.jpg' dengan nama file gambar default Anda

        // Jika ada file gambar yang diunggah
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $gambar = time() . "_" . $file->getClientOriginalName();
            $tujuanupload = 'image';
            $file->move($tujuanupload, $gambar);
        }

        // Buat pengguna baru dengan gambar yang disimpan
        Topik::create([
        'judul' => $request->judul,
        'deskripsi' => $request->deskripsi,
        'id' => $id,
        'gambar' => $gambar,
        ]);

        return redirect('/dashboard')->with('success', 'Topik telah dibuat');
    }
    function edittopik($id_topik, Request $request)
    {
        $topik = Topik::findOrFail($id_topik);
        $topik->judul = $request->judul;
        $topik->deskripsi = $request->deskripsi;

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $gambar = time() . "_" . $file->getClientOriginalName();
            $tujuanupload = 'image';
            $file->move($tujuanupload, $gambar);
            $topik->gambar = $gambar;
        }

        $topik->save();
        return redirect('/topikdetail/' .$id_topik)->with('success', 'Topik berhasil diedit');
    }
    function deletetopik($id_topik)
    {
        $id_topik = Topik::findOrFail($id_topik);
        $id_topik->delete();

        return redirect('/dashboard')->with('success', 'Topik telah diHapus');
    }

    function suka($id_topik)
    {
        $id = Auth::user()->id;
        
        Suka::create([
            'id_topik' => $id_topik,
            'id' => $id,
        ]);

        return redirect('/dashboard')->with('success', 'Berhasil Like');
    }

    function komen($id_topik, Request $request)
    {
        $request->validate([
            'komentar' => 'required',
        ],[
            'Komentar.required' => 'Chat Harus Diisi',
        ]);

        $id = Auth::user()->id;
        Komen::create([
            'id_topik' => $id_topik,
            'id' => $id,
            'komentar' => $request->komentar,
        ]);

        return redirect('/topikdetail/'. $id_topik)->with('success', 'Berhasil Komentar');
    }

    function deletekomen($id_komen)
    {

        $komen = Komen::findOrFail($id_komen);

        $id_topik = $komen->id_topik;

        $komen->delete();

        return redirect('/topikdetail/'. $id_topik)->with('success', 'Komen telah diHapus');
    }
}
