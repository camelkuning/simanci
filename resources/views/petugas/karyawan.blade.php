@extends('petugas.layouts.main')
@section('title', 'Dashboard | Karyawan')
@section('content')
    <div id="layoutSidenav_content">
        <div class="container-fluid px-4">
            <div class="container-fluid px-4">
                <h1 class="mt-4">Tabel Karyawan</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Daftar Karyawan</li>
                </ol>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Daftar Karyawan
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple" class="table table-striped ">
                            <thead>
                                <tr>
                                    <th>id_karyawan</th>
                                    <th>nama_karyawan</th>
                                    <th>kode_jabatan</th>
                                    <th>no_tlp_karyawan</th>
                                    {{-- <th>status</th> --}}
                                </tr>
                            </thead> 
                            <tbody>
                                @foreach ($karyawan as $item)
                                    <tr>
                                        <td>{{ $item->id_karyawan  }}</td>
                                        <td>{{ $item->nama_karyawan  }}</td>
                                        <td>{{ $item->kode_jabatan  }}</td>
                                        <td>{{ $item->no_tlp_karyawan   }}</td>
                                        {{-- <td>{{ $item->status  }}</td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Simanci | UKDW &copy; Varel & Lexi</div>
                </div>
            </div>
        </footer>
    </div>
@endsection
