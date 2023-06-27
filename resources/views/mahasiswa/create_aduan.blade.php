@extends('templates.master')
@section('content')
<div>
    <div class=" grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                <h6 class="card-title">Form Tambah Aduan</h6>

                @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{session('success')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <form class="forms-sample" method="POST" action="{{route('store_aduan')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <label for="jenisAduan" class="col-sm-3 col-form-label">Jenis Aduan</label>
                        <div class="col-sm-9">
                            <select class="form-select" name="jenis_aduan" id="jenisAduan" required>
                                <option selected disabled>Pilih jenis aduan</option>
                                @foreach($jenisAduan as $jenis)
                                    <option value="{{ $jenis->nama }}">{{ $jenis->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Judul Aduan</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="judul_aduan" id="judul_aduan" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Deskripsi</label>
                        <div class="col-sm-9">
                            <textarea type="text" class="form-control"  name="deskripsi"  id="deskripsi" autocomplete="off" required></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="gambar" class="col-sm-3 col-form-label">Gambar</label>
                        <div class="col-sm-9">
                            <input type="file" class="form-control" name="gambar" id="gambar" accept="image/*" required>
                        </div>
                    </div>
                    <div class="form-group float-end">
                        <a href="{{route('mhs_aduan')}}" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-primary me-2">Tambah</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
