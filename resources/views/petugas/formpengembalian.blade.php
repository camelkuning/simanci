@extends('petugas.layouts.main')
@section('title', 'Dashboard | Petugas')
@section('content')
    <div id="layoutSidenav_content">
        <div class="container-fluid px-4">
            <div class="container-fluid px-4">
                <h5 class="modal-title m-4 text-center" id="karyawanFormModalLabel">Form Pengembalian Kunci</h5>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <form action="/postpengembalian/{{ $result->no_rotasi }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group mb-3">
                                    <label class="form-label">Pilih Penerima </label>
                                    <select class="form-select" aria-label="Default select example" name="id_satpam">
                                        @foreach ($users as $item)
                                            <option {{ $item->id == $result->id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->nama_user }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <input type="text" hidden name="no_rotasi" value="{{ $result->no_rotasi }}">
                                <div class="form-group mb-3">
                                    <label class="form-label">Pilih Kunci</label>
                                    <select class="form-select" aria-label="Default select example" name="id_kunci">
                                        @foreach ($kunci as $item)
                                            <option {{ $item->id_kunci == $result->id_kunci ? 'selected' : '' }}
                                                value="{{ $item->id_kunci }}">{{ $item->nama_kunci }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Karyawan Peminjam</label>
                                    <select class="form-select" aria-label="Default select example"  name="id_karyawan">
                                        @foreach ($karyawan as $item)
                                            <option {{ $item->id_karyawan == $result->id_karyawan ? 'selected' : '' }}
                                                value="{{ $item->id_karyawan }}">{{ $item->nama_karyawan }} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Nama Karyawan Pengembali</label>
                                    <select class="form-select" aria-label="Default select example"
                                        name="id_karyawan_pengembali">
                                        <option selected>Pilih Karyawan Pengembali</option>
                                        @foreach ($karyawan as $item)
                                            <option
                                                {{ $item->id_karyawan == $result->id_karyawan_pengembali ? 'selected' : '' }}
                                                value="{{ $item->id_karyawan }}">{{ $item->nama_karyawan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Waktu peminjaman</label>
                                    <input type="datetime-local" name="waktu_peminjaman" class="form-control"
                                        value="{{ $result->waktu_peminjaman }}" placeholder="" readonly>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Waktu pengembalian</label>
                                    <input type="datetime-local" class="form-control" name="waktu_pengembalian"
                                        value="{{ $result->waktu_pengembalian }} placeholder="">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Status</label>
                                    <select class="form-select" aria-label="Default select example" name="status_kunci">
                                        <option value="dipinjam">Dipinjam</option>
                                        <option selected value="dikembalikan">Dikembalikan</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-dark mb-4 w-10"><i
                                        class="bi bi-pencil-square"></i>&nbsp; Update</button>
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
