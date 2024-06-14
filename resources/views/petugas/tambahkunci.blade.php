@extends('petugas.layouts.main')
@section('title', 'Dashboard | Petugas')
@section('content')
    <div id="layoutSidenav_content">
        <div class="container-fluid px-4">
            <div class="container-fluid px-4">
                <h5 class="modal-title m-4 text-center" id="karyawanFormModalLabel">Form Tambah Kunci</h5>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <form action="/posttambahkunci" method="POST">
                                @csrf

                                <div class="mb-3">
                                    <label class="form-label">Id Kunci</label>
                                    <input type="text" class="form-control" name="id_kunci" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Nama Kunci</label>
                                    <input type="text" class="form-control" name="nama_kunci" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Kode Kantor</label>
                                    <select class="form-select" aria-label="Default select example" name="kode_kantor">
                                        <option selected>Pilih kantor</option>
                                        @foreach ($kantor as $item)
                                            <option value="{{ $item->kode_kantor }}">{{ $item->nama_unit }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Status</label required>
                                        <select class="form-select" aria-label="Default select example" name="kode_kantor">
                                            <option>Status Kunci</option>
                                                <option value="Tersedia" selected>Tersedia</option>
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
