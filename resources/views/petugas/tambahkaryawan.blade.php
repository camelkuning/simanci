@extends('petugas.layouts.main')
@section('title', 'Dashboard | Petugas')
@section('content')
    <div id="layoutSidenav_content">
        <div class="container-fluid px-4">
            <div class="container-fluid px-4">
                <h5 class="modal-title m-4 text-center" id="karyawanFormModalLabel">Form Tambah Karyawan</h5>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <form action="/posttambahkaryawan" method="POST">
                                @csrf

                                <div class="mb-3">
                                    <label class="form-label">Id Karyawan</label>
                                    <input type="text" class="form-control" name="id_karyawan" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Nama Karyawan</label>
                                    <input type="text" class="form-control" name="nama_karyawan" required>
                                </div>

                                <div class="form-group mb-3">
                                    <label class="form-label">Pilih Jabatan </label>
                                    <select class="form-select" aria-label="Default select example" name="kode_jabatan">
                                        <option selected>Pilih Jabatan</option>
                                        @foreach ($jabatan as $item)
                                            <option value="{{ $item->kode_jabatan }}">{{ $item->ket_jabatan }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">No Telp Karyawan</label required>
                                    <input type="text" class="form-control" name="no_tlp_karyawan">
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
