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

                    <form class="forms-sample" id="terima_aduan_form" method="POST" action="{{ route('terima_aduan', $aduan->id) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label for="jenisAduan" class="col-sm-3 col-form-label">Status</label>
                            <div class="col-sm-9">
                                <label>:</label>
                                <label class="form-label" name="jenis_aduan"
                                    id="jenisAduan"><td class="align-middle">
                                        @if ($aduan->status == 1)
                                        <span class="badge rounded-pill bg-secondary"> Sedang diverifikasi</span>
                                        @elseif ($aduan->status == 2)
                                        <span class="badge rounded-pill bg-warning"> Sedang dikerjakan</span>
                                        @elseif ($aduan->status == 3)
                                        <span class="badge rounded-pill bg-success"> Aduan telah diselesaikan</span>
                                        @elseif ($aduan->status == 4)
                                        <span class="badge rounded-pill bg-danger"> Aduan ditolak</span>
                                        @else
                                        <span class="badge rounded-pill bg-danger"> Aduan tidak valid</span>
                                        @endif
                                </td></label>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="jenisAduan" class="col-sm-3 col-form-label">Nama Pengadu</label>
                            <div class="col-sm-9">
                                <label>:</label>
                                <label class="form-label" name="nama"
                                    id="jenisAduan">{{ $aduan->nama }}</label>
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
                                <label>:</label>
                                <img src="{{ asset('storage/' . $aduan->gambar) }}" alt="Current Image" width="100">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Keterangan</label>
                            <div class="col-sm-9">
                                <label>:</label>
                                <label type="text" class="form-label" name="deskripsi"
                                    id="deskripsi">{{ $aduan->keterangan }}</label>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="gambar" class="col-sm-3 col-form-label">Bukti Selesai</label>
                            <div class="col-sm-9">
                                <img src="{{ asset('storage/' . $aduan->bukti_selesai) }}" alt="Current Image" width="100">
                            </div>
                        </div>
                        <input type="hidden" name="status" value="2">
                        <div class="form-group float-end">
                            <a href="{{ route('aduan_selesai') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

