@extends('petugas.layouts.main')
@section('title', 'Dashboard | Petugas')
@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Daftar Kantor</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Daftar Kunci
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple" class="table table-striped ">
                                <thead>
                                    <tr>
                                        <th>kode_kantor</th>
                                        <th>nama_unit</th>
                                        <th>lokasi_unit</th>
                                        <th>nomor_ruangan</th>
                                        {{-- <th>aksi</th> --}}
                                    </tr>
                                </thead> 
                                <tbody>
                                    @foreach ($kantor as $item)
                                        <tr>
                                            <td>{{ $item->kode_kantor }}</td>
                                            <td>{{ $item->nama_unit }}</td>
                                            <td>{{ $item->lokasi_unit }}</td>
                                            <td>{{ $item->nomor_ruangan }}</td>
                                            {{-- <td scope="row" class="flex">
                                                <a class="btn btn-danger" href="/delete/{{ $item->kode_kantor }}">Delete</a>
                                            </td> --}}
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table> 
                            <div class="btn-group">
                                <a type="button" class="btn btn-dark" href="/tambahkantor">
                                    <i class="bi bi-plus-circle-fill"></i>&nbsp; Kantor
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Simanci | UKDW &copy; Varel & Lexi</div>
                </div>
            </div>
        </footer>
    </div>
@endsection
