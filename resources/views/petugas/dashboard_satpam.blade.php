@extends('petugas.layouts.main')
@section('title', 'Dashboard | Petugas')
@section('content')
    @if (session('success'))
        <script>
            Swal.fire({
                title: 'Sukses!',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        </script>
    @endif
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Dashboard</h1>
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
                                        <th>Id_kunci</th>
                                        <th>Nama_kunci</th>
                                        <th>Kode_kantor</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $item)
                                        <tr>
                                            <td>{{ $item->id_kunci }}</td>
                                            <td>{{ $item->nama_kunci }}</td>
                                            <td>{{ $item->kode_kantor }}</td>
                                            <td>{{ $item->status }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="btn-group">
                                <a type="button" class="btn btn-dark" href="/formpinjam">
                                    <i class="bi bi-key-fill"></i>&nbsp; add peminjaman
                                </a>
                                {{-- </div>
                            <div class="btn-group">
                                <a type="button" class="btn btn-primary" href="/formpinjam">PINJAM</a>
                            </div> --}}
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
