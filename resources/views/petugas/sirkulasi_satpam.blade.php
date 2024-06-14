@extends('petugas.layouts.main')
@section('title', 'Dashboard | Petugas')
@section('content')

    @if (session('pesan_berhasil'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
            Toast.fire({
                icon: "success",
                title: "Kunci Berhasil Dipinjamkan"
            });
        </script>
    @endif
    @if (session('berhasil_kembali'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
            Toast.fire({
                icon: "success",
                title: "Kunci Berhasil Dikembalikan"
            });
        </script>
    @endif
    <div id="layoutSidenav_content">
        <div class="container-fluid px-4">
            <div class="container-fluid px-4">
                <h1 class="mt-4">Tabel Sirkulasi</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Rotasi Kunci disini</li>
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
                                    <th>Nomor</th>
                                    <th>Nama Kunci</th>
                                    <th>Nama Penerima</th>
                                    <th>Nama Karyawan Peminjam</th>
                                    <th>Nama Karyawan Pengembali</th>
                                    <th>waktu_peminjaman</th>
                                    <th>waktu_pengembalian</th>
                                    <th>status_kunci</th>
                                    <th>Return</th>
                                    {{-- <th>Cek Status</th> --}}

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($result as $idx => $item)
                                    <tr>
                                        <td>{{ $idx + 1 }}</td>
                                        <td>{{ $item->nama_kunci }}</td>
                                        <td>{{ $item->nama_user }}</td>
                                        <td>{{ $item->nama_karyawan }}</td>
                                        <td>{{ $item->nama_karyawan_pengembalian }}</td>
                                        <td>{{ $item->waktu_peminjaman }}</td>
                                        <td>{{ $item->waktu_pengembalian }}</td>
                                        <td>{{ $item->status_kunci }} </td>
                                        <td><a class="btn btn-dark" href="/formpengembalian/{{ $item->no_rotasi }}"><i
                                                    class="bi bi-arrow-return-left"></i></a></td>&nbsp;
                                        {{-- <td><a class="btn btn-warning" {{ $item->no_rotasi }}><i
                                                        class="bi bi-info-circle-fill"></i></a></td>&nbsp; --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div>
                            <a href="/cetak-pdf" class="btn btn-warning"><i
                                    class="bi bi-file-earmark-pdf-fill"></i>&nbsp;Download PDF</a>
                        </div>


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
