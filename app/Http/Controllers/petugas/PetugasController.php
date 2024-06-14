<?php

namespace App\Http\Controllers\petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Import DB Facade
use App\Models\User;
use App\Models\Kunci;
use App\Models\karyawan;
use App\Models\Rotasikunci;
use App\Models\tambahkunci;
use App\Models\kantor;
use App\Models\Jabatan;

class PetugasController extends Controller
{

    public function dashboard()
    {
        $kunci = Kunci::all();
        // $karyawan = Karyawan::all();
        // $users = User::all();
        return view('petugas.dashboard', compact('kunci'));
    }

    public function sirkulasi()
    {
        $users = Rotasikunci::all();
        $result = DB::table('rotasikunci as rk')
        ->join('users AS us', 'rk.id_satpam', '=', 'us.id')
        ->join('kunci AS k', 'rk.id_kunci', '=', 'k.id_kunci')
        ->leftJoin('karyawan AS kar', 'kar.id_karyawan', '=', 'rk.id_karyawan')
        ->leftJoin('karyawan AS kar2', 'kar2.id_karyawan', '=', 'rk.id_karyawan_pengembali')
        ->select('k.nama_kunci', 'kar.nama_karyawan', 'kar2.nama_karyawan AS nama_karyawan_pengembalian', 'rk.*', 'us.nama_user')
        ->get();
        // dd($users);
        return view('petugas.sirkulasi', compact('result'));

    }

    public function karyawan()
    {
        // $kunci = Kunci::all();
        $karyawan = Karyawan::all();
        // $users = User::all();
        // $jabatan = Jabatan::all();
        return view('petugas.karyawan', compact('karyawan'));
    }

    public function dashboardsatpam()
    {
        $users = Kunci::all();
        // dd($users);
        return view('petugas.dashboard_satpam', compact('users'));
    }

    public function sirkulasisatpam()
    {
        $users = Rotasikunci::all();
        $result = DB::table('rotasikunci as rk')
            ->join('users AS us', 'rk.id_satpam', '=', 'us.id')
            ->join('kunci AS k', 'rk.id_kunci', '=', 'k.id_kunci')
            ->leftJoin('karyawan AS kar', 'kar.id_karyawan', '=', 'rk.id_karyawan')
            ->leftJoin('karyawan AS kar2', 'kar2.id_karyawan', '=', 'rk.id_karyawan_pengembali')
            ->select('k.nama_kunci', 'kar.nama_karyawan', 'kar2.nama_karyawan AS nama_karyawan_pengembalian', 'rk.*', 'us.nama_user')
            ->get();
        // dd($users);
        return view('petugas.sirkulasi_satpam', compact('result'));
    }

    public function formpinjam()
    {
        $kunci = Kunci::where('status', 'tersedia')->get();
        $karyawan = Karyawan::all();
        $users = user::where('role', 'satpam')->get();
        // dd($users);
        return view('petugas.formpinjam', compact('users', 'kunci', 'karyawan'));
    }
    public function postform(Request $request)
    {
        $validate = $request->validate([
            'id_satpam' => 'required',
            'id_kunci' => 'required',
            'id_karyawan' => 'required',
            'id_karyawan_pengembali' => 'nullable',
            'waktu_peminjaman' => 'required',
            'waktu_pengembalian' => 'nullable',
            'status_kunci' => 'required',
        ]);
        if (!empty($validate)) {
            Kunci::where('id_kunci', $request->id_kunci)->update([
                'status' => $request->status_kunci
            ]);
            Rotasikunci::create([
                'id_satpam' => $request->id_satpam,
                'id_kunci' => $request->id_kunci,
                'id_karyawan' => $request->id_karyawan,
                'id_karyawan_pengembali' => NULL,
                'waktu_peminjaman' => $request->waktu_peminjaman,
                'waktu_pengembalian' => NULL,
                'status_kunci' => $request->status_kunci,
            ]);
            return redirect('/sirkulasi_satpam')->with('pesan_berhasil', 'Data berhasil ditambahkan.');
        }else{
            return view('petugas.formpinjam')->with('pesan_gagal', 'Data gagal ditambahkan.')->withInput();
        }
    }

    public function formpengembalian($no_rotasi)
    {
        $result = Rotasikunci::find($no_rotasi);
        $kunci = Kunci::all();
        $karyawan = Karyawan::all();
        $users = user::where('role', 'satpam')->get();
        return view('petugas.formpengembalian', compact('result', 'users', 'kunci', 'karyawan'));
    }

    public function postpengembalian($no_rotasi, Request $request)
    {

        $item = Rotasikunci::find($no_rotasi);
        $item->id_kunci = $request->id_kunci;
        $item->id_karyawan = $request->id_karyawan;
        $item->id_karyawan_pengembali = $request->id_karyawan_pengembali;
        $item->waktu_peminjaman = $request->waktu_peminjaman;
        $item->waktu_pengembalian = $request->waktu_pengembalian;
        $item->status_kunci = $request->status_kunci;
        Kunci::where('id_kunci', $request->id_kunci)->update([
            'status' => 'Tersedia'
        ]);
        $item->save();
        return redirect('/sirkulasi_satpam')->with('berhasil_kembali', 'Kunci berhasil dikembalikan');
    }

    public function tambahkunci()
    {
        $kunci = Kunci::all();
        $karyawan = Karyawan::all();
        $users = user::all();
        $kantor = kantor::all();
        return view('petugas.tambahkunci', compact('users', 'kunci', 'karyawan', 'kantor'));
    }
    public function posttambahkunci(Request $request)
    {
        $validate = $request->validate([
            'id_kunci' => 'required',
            'nama_kunci' => 'required',
            'kode_kantor' => 'required',
            'status' => 'required',
        ]);
        if (!empty($validate)) {
            Kunci::create([
                'id_kunci' => $request->id_kunci,
                'nama_kunci' => $request->nama_kunci,
                'kode_kantor' => $request->kode_kantor,
                'status' => $request->status,
            ]);
            return redirect('/admin')->with('success', 'Data berhasil ditambahkan.');
        } else {
            return redirect('/formpinjam')->with('error', 'Data gagal ditambahkan.')->withInput();
        }
    }


    public function daftarkantor()
    {
        $kantor = kantor::all();
        return view('petugas.daftarkantor', compact('kantor'));
    }

    public function tambahkantor()
    {
        $kunci = Kunci::all();
        $karyawan = Karyawan::all();
        $users = user::all();
        $kantor = user::all();
        return view('petugas.tambahkantor', compact('users', 'kunci', 'karyawan', 'kantor'));

    }

    public function posttambahkantor(Request $request)
    {
        $request->validate([

            'kode_kantor' => 'required',
            'nama_unit' => 'required',
            'lokasi_unit' => 'required',
            'nomor_ruangan' => 'required',

        ]);
        // dd($request->all());
        Kantor::create([
            'kode_kantor' => $request->kode_kantor,
            'nama_unit' => $request->nama_unit,
            'lokasi_unit' => $request->lokasi_unit,
            'nomor_ruangan' => $request->nomor_ruangan,
        ]);

        return redirect('/admin')->with('success', 'Data Kantor Berhasil Ditambahkan');
    }

    public function tambahkaryawan()
    {
        $jabatan = Jabatan::all();
        $karyawan = Karyawan::all();
        return view('petugas.tambahkaryawan', compact('karyawan', 'jabatan'));

    }

    public function posttambahkaryawan(Request $request)
    {
        
        $request->validate([
            'id_karyawan' => 'required',
            'nama_karyawan' => 'required',
            'kode_jabatan' => 'required',
            'no_tlp_karyawan' => 'required',

        ]);
        //  dd($request->all());
        karyawan::create([
            'id_karyawan' => $request->id_karyawan,
            'nama_karyawan' => $request->nama_karyawan,
            'kode_jabatan' => $request->kode_jabatan,
            'no_tlp_karyawan' => $request->no_tlp_karyawan,
        ]);

        return redirect('/admin')->with('success', 'Data Karyawan Berhasil Ditambahkan');
    }

    public function deletekantor($kode_kantor)
    {
        $kantor = Kantor::find($kode_kantor);
        $kantor->delete();
        return redirect('petugas.daftarkantor')->with('alertdelete', 'Data berhasil dihapus.');
    }

}

