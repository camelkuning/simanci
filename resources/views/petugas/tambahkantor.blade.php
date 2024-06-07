@extends('petugas.layouts.main')
@section('title', 'Dashboard | Petugas')
@section('content')
    <div id="layoutSidenav_content">
        <div class="container-fluid px-4">
            <div class="container-fluid px-4">
                <h5 class="modal-title m-4 text-center" id="karyawanFormModalLabel">Form Tambah Kantor</h5>
                <div class="modal-body">
                    <form action="/posttambahkantor" method="POST">
                        @csrf
                         
                        <div class="mb-3">
                            <label  class="form-label">Kode Kantor</label>
                            <input type="text" class="form-control" name="kode_kantor" required>
                          </div>

                          <div class="mb-3">
                            <label  class="form-label">Nama Unit</label>
                            <input type="text" class="form-control" name="nama_unit" required>
                          </div>

                       <div class="mb-3">
                            <label  class="form-label">Lokasi Unit</label>
                            <input type="text" class="form-control" name="lokasi_unit" required>
                          </div>

                        <div class="mb-3">
                            <label  class="form-label">Nomor Ruang</label required>
                            <input type="text" class="form-control" name="nomor_ruangan">
                          </div>

                        <button type="submit" class="btn btn-primary mb-4" >Save</button>
                    </form>
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
