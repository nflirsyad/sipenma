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
                        <div class="form-group float-end">
                            <a href="{{ route('menunggu_dikonfirmasi') }}" class="btn btn-secondary">Kembali</a>
                            <button type="button" class="btn btn-danger" data-toggle="tooltip" title="Reject"
                                data-bs-toggle="modal" data-bs-target="#reject" data-id="{{ $aduan->id }}">Tolak
                                Aduan</button>
                            <button type="button" class="btn btn-primary" data-toggle="tooltip" title="Accept"
                                data-bs-toggle="modal" data-bs-target="#accept" data-id="{{ $aduan->id }}">Terima
                                Aduan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="accept" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="forms-sample" id="terima_aduan_form" method="POST" action="{{ route('terima_aduan', $aduan->id) }}" enctype="multipart/form-data">
                        @csrf
                        <h5>Apakah Anda yakin untuk menerima pengaduan ini?</h5>
                        <br>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Ya, Terima</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const terimaAduanForm = document.getElementById('terima_aduan_form');

        terimaAduanForm.addEventListener('submit', function (event) {
            event.preventDefault();

            // Kirim form 'terima_aduan_form'
            terimaAduanForm.submit();
        });
    });
</script>
@endsection
