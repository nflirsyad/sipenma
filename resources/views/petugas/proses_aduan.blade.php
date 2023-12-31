@extends('templates.master')
@section('content')
    <div>
        <div class=" grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    <h6 class="card-title">Detail Aduan</h6>

                    @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form class="forms-sample" method="POST"
                        action="{{ route('selesai_aduan', $aduan->id) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label for="namaPengadu" class="col-sm-3 col-form-label">Nama Pengadu</label>
                            <div class="col-sm-9">
                                <label>:</label>
                                <label class="form-label" name="jenis_aduan" id="namaPengadu">{{ $aduan->nama }}</label>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="jenisAduan" class="col-sm-3 col-form-label">Jenis Aduan</label>
                            <div class="col-sm-9">
                                <label>:</label>
                                <label class="form-label" name="jenis_aduan"
                                    id="jenisAduan">{{ $aduan->jenis_aduan }}</label>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Judul Aduan</label>
                            <div class="col-sm-9">
                                <label>:</label>
                                <label type="text" class="form-label" name="judul_aduan"
                                    id="judul_aduan">{{ $aduan->judul_aduan }}</label>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Deskripsi</label>
                            <div class="col-sm-9">
                                <label>:</label>
                                <label type="text" class="form-label" name="deskripsi"
                                    id="deskripsi">{{ $aduan->deskripsi }}</label>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="gambar" class="col-sm-3 col-form-label">Gambar</label>
                            <div class="col-sm-9">
                                <img src="{{ asset('storage/' . $aduan->gambar) }}" alt="Current Image" width="100">
                            </div>
                        </div>
                        <input type="hidden" name="status" value="2">
                        <div class="row mb-3">
                            <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Keterangan</label>
                            <div class="col-sm-9">
                                <textarea type="text" class="form-control" name="keterangan" id="keterangan" autocomplete="off" required></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="bukti_selesai" class="col-sm-3 col-form-label">Bukti Selesai</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" name="bukti_selesai" id="bukti_selesai"
                                    accept="image/*" required>
                            </div>
                        </div>
                        <div class="form-group float-end">
                            <a href="{{ route('sedang_dikerjakan') }}" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-success">Selesaikan aduan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
