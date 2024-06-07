@extends('petugas.layouts.main')
@section('title', 'Dashboard | Petugas')
@section('content')

    @if (session('pesan_gagal'))
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
                icon: "error",
                title: "Kunci Berhasil Dipinjamkan"
            });
        </script>
    @endif
    <div id="layoutSidenav_content">
        <div class="container-fluid px-4">
            <div class="container-fluid px-4">
                <h5 class="modal-title m-4 text-center" id="karyawanFormModalLabel">Form Pengisian Karyawan</h5>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <form action="/postsirkulasisatpam" method="POST">
                                @csrf

                                <div class="form-group mb-3">
                                    <label class="form-label">Pilih Kunci</label>
                                    <select class="form-select" aria-label="Default select example" name="id_kunci">
                                        <option selected>Pilih Kunci</option>
                                        @foreach ($kunci as $item)
                                            <option value="{{ $item->id_kunci }}">{{ $item->nama_kunci }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">ID Karyawan</label>
                                    <select class="form-select" aria-label="Default select example" name="id_karyawan">
                                        <option selected>Pilih ID</option>
                                        @foreach ($karyawan as $item)
                                            <option value="{{ $item->id_karyawan }}">{{ $item->nama_karyawan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mb-3" hidden>
                                    <label class="form-label">ID Karyawan Pengembali</label>
                                    <input type="text" name="id_karyawan_pengembali" class="form-control" readonly>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Waktu peminjaman</label>
                                    <input type="datetime-local" name="waktu_peminjaman" class="form-control"
                                        placeholder="">
                                </div>
                                <div class="form-group mb-3" hidden>
                                    <label class="form-label">Waktu pengembalian</label>
                                    <input type="datetime-local" class="form-control" name="waktu_pengembalian"
                                        placeholder="" readonly>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Status</label>
                                    <select class="form-select" aria-label="Default select example" name="status_kunci">
                                        <option value="dipinjam">Dipinjam</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-dark mb-4">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <footer class="py-4 bg-light mt-auto ">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Simanci | UKDW &copy; Varel & Lexi</div>
                </div>
            </div>
        </footer> --}}
    </div>
@endsection
