@extends('templates.master')
@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Master Data</a></li>
            <li class="breadcrumb-item active" aria-current="page">Aduan</li>
        </ol>
    </nav>

    <div class="container">
        <div>
            @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ Session::get('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Data Aduan</h6>
                            <div class="table-responsive">
                                <table id="dataTableExample" class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th width="100px">Nama Pengadu</th>
                                            <th width="100px">Jenis Aduan</th>
                                            <th width="400px">Judul Aduan</th>
                                            <th width="100px">Deskripsi</th>
                                            <th width="400px">Status</th>
                                            <th width="400px">Gambar</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($aduanDikerjakan ->count() > 0)
                                            @foreach ($aduanDikerjakan  as $item)
                                                <tr>
                                                    <input type="hidden" class="delete_id" value="{{ $item->id }}">
                                                    <td class="align-middle">{{ $loop->iteration }}</td>
                                                    <td class="align-middle">{{ (string) $item->nama }}</td>
                                                    <td class="align-middle">{{ (string) $item->jenis_aduan }}</td>
                                                    <td class="align-middle ">{{ $item->judul_aduan }}</td>
                                                    <td class="align-middle">{{ $item->deskripsi }}</td>
                                                    <td class="align-middle">
                                                        <span class="badge rounded-pill bg-warning">Sedang dikerjakan</span>
                                                    </td>
                                                    <td>
                                                        <img src="{{ asset('storage/' . $item->gambar) }}"
                                                        alt="Gambar Aduan" class="img-fluid rounded"
                                                        style="width: 100px; height: 90px;">
                                                    </td>
                                                    <td  class="align-middle">
                                                        <a href="{{ route('proses_aduan', $item->id) }}" type="button"
                                                            name="show" class="btn btn-success"><i class="icon-sm"
                                                                data-feather="check-square"></i>  Selesaikan aduan</a>
                                                    </td>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
