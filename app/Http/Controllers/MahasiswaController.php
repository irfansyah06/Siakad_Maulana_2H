<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Kelas;
use App\Models\Mahasiswa_MataKuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
            // Yang semula Mahasiswa::all, diubah menjadi with() yang menyatakan relasi
            // $mahasiswa = Mahasiswa::with('kelas')->get(); 
            // $paginate = Mahasiswa::orderBy('id_mahasiswa', 'asc')->paginate(4);
            // return view('mahasiswa.index', ['mahasiswa' => $mahasiswa,'paginate'=>$paginate]);
        if($request->has('search')){
            $mahasiswa = Mahasiswa::where('Nama', 'like', "%".$request->search."%")
            ->orWhere('Nim', $request->search)
            ->paginate(4);
        } else {
            //fungsi eloquent menampilkan data menggunakan pagination
            $mahasiswa = Mahasiswa::paginate(4); // Membuat pagination, setiap page, menampilkan 4 data
        }
        return view('mahasiswa.index', compact('mahasiswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $kelas = Kelas::all();
        return view('mahasiswa.create', ['kelas' => $kelas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //melakukan validasi data
        $request->validate([
            'Nim' => 'required',
            'Nama' => 'required',
            'Kelas' => 'required',
            'Jurusan' => 'required',
            'Email' => 'required',
            'Tanggal_Lahir' => 'required',
            'Alamat' => 'required',
    ]);

        $mahasiswa = new Mahasiswa;
        $mahasiswa->nim = $request->get('Nim');
        $mahasiswa->nama = $request->get('Nama');
        $mahasiswa->kelas_id = $request->get('Kelas');
        $mahasiswa->jurusan = $request->get('Jurusan');
        $mahasiswa->email = $request->get('Email');
        $mahasiswa->tanggal_lahir = $request->get('Tanggal_Lahir');
        $mahasiswa->alamat = $request->get('Alamat');
        $mahasiswa->save();
        // $mahasiswa::create($request->all());

        // $kelas = new Kelas;
        // $kelas->id = $request->get('Kelas');

        //fungsi eloquent untuk menambah data dengan relasi belongsTo
        // $mahasiswa->kelas()->associate($kelas);
        // $mahasiswa->save();

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('mahasiswa.index')
            ->with('success', 'Mahasiswa Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($nim)
    {
        //menampilkan detail data dengan menemukan/berdasarkan Nim Mahasiswa
        $Mahasiswa = Mahasiswa::where('nim', $nim)->first();
        return view('mahasiswa.detail', compact('Mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($nim)
    {
        //menampilkan detail data dengan menemukan berdasarkan Nim Mahasiswa untuk diedit
        $Mahasiswa = Mahasiswa::find($nim);
        $kelas = Kelas::all(); // mendapatkan data dari tabel kelas
        return view('mahasiswa.edit', compact('Mahasiswa', 'kelas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nim)
    {
        //melakukan validasi data
        $request->validate([
            'Nim' => 'required',
            'Nama' => 'required',
            'Kelas' => 'required',
            'Jurusan' => 'required',
            'Email' => 'required',
            'Tanggal_Lahir' => 'required',
            'Alamat' => 'required',
        ]);
        $mahasiswa = Mahasiswa::with('kelas')->where('nim', $nim)->first();        $mahasiswa->nim = $request->get('Nim');
        $mahasiswa->nama = $request->get('Nama');
        $mahasiswa->kelas_id = $request->get('Kelas');
        $mahasiswa->jurusan = $request->get('Jurusan');
        $mahasiswa->email = $request->get('Email');
        $mahasiswa->tanggal_lahir = $request->get('Tanggal_Lahir');
        $mahasiswa->alamat = $request->get('Alamat');
        $mahasiswa->save();

        //fungsi eloquent untuk mengupdate data inputan kita
        // Mahasiswa::where('nim', $nim)
        //     ->update([
        //         'nim'=>$request->Nim,
        //         'nama'=>$request->Nama,
        //         'kelas'=>$request->Kelas,
        //         'jurusan'=>$request->Jurusan,
        //         'email'=>$request->Email,
        //         'tanggal_lahir'=>$request->Tanggal_Lahir,
        //         'alamat'=>$request->Alamat,

        // ]);
        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('mahasiswa.index')
            ->with('success', 'Mahasiswa Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($nim)
    {
        //fungsi eloquent untuk menghapus data
        Mahasiswa::where('nim', $nim)->delete();
        return redirect()->route('mahasiswa.index')
            -> with('success', 'Mahasiswa Berhasil Dihapus');
    }
    public function nilai($nim){
        $mahasiswa = Mahasiswa_MataKuliah::with('mahasiswa')
            ->where('mahasiswa_id', $nim)
            ->first();
        $nilai = Mahasiswa_MataKuliah::with('matakuliah')
            ->where('mahasiswa_id', $nim)
            ->get();
        return view('mahasiswa.nilai', compact('mahasiswa', 'nilai'));
    }
}
