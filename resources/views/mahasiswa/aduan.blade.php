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
            <a href="{{ route('create_aduan') }}" type="button" name="create"
                class="create btn btn-primary btn-xs mb-2 align-middle pt-2 pb-2 float-right"><i class="icon-sm "
                    data-feather="plus"></i>Tambah Data</a>

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
                                            <th width="100px">Jenis Aduan</th>
                                            <th width="400px">Judul Aduan</th>
                                            <th width="400px">Deskripsi</th>
                                            <th width="400px">Status</th>
                                            <th width="400px">Gambar</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($jenisAduan->count() > 0)
                                            @foreach ($jenisAduan as $item)
                                                <tr>
                                                    <input type="hidden" class="delete_id" value="{{ $item->id }}">
                                                    <td class="align-middle">{{ $loop->iteration }}</td>
                                                    <td class="align-middle">{{ (string) $item->jenis_aduan }}</td>
                                                    <td class="align-middle">{{ $item->judul_aduan }}</td>
                                                    <td class="align-middle">{{ $item->deskripsi }}</td>
                                                    <td class="align-middle">
                                                        <span class="badge rounded-pill bg-warning">
                                                            @if ($item->status == 1)
                                                                Sedang diverifikasi
                                                            @elseif ($item->status == 2)
                                                                Sedang dalam proses
                                                            @elseif ($item->status == 3)
                                                                Selesai
                                                            @elseif ($item->status == 4)
                                                                Ditolak
                                                            @else
                                                                Status tidak valid
                                                            @endif
                                                        </span>
                                                    </td>
                                                    <td class="align-middle">
                                                        <img src="{{ asset('storage/' . $item->gambar) }}"
                                                            alt="Gambar Aduan" class="img-fluid rounded"
                                                            style="width: 120px; height: 90px;">
                                                    </td>

                                                    <td>
                                                    <td>
                                                        <a href="{{ route('petugas.edit', $item->id) }}" type="button"
                                                            name="edit" class="btn btn-primary btn-xs"><i class="icon-sm"
                                                                data-feather="edit"></i></a>
                                                        <button type="button"
                                                            class="btn btn-xs btn-danger btn-flat show-alert-delete-box btn-xs delete-confirm"
                                                            data-toggle="tooltip" title='Delete' data-bs-toggle="modal"
                                                            data-bs-target="#delete" data-id="{{ $item->id }}">
                                                            <i class="icon-sm" data-feather="trash-2"></i>
                                                        </button>
                                                    </td>
                                                    {{-- <form method="POST" action="{{ route('destroy_aduan', $item->id) }}">
            <a href="{{route('mahasiswa.edit',$item->id)}}" type="button" name="edit" class="btn btn-primary btn-xs"><i class="icon-sm" data-feather="edit"></i></a>
              @csrf
              @method('delete')
              <input name="_method" type="hidden" value="DELETE">
              <button type="submit" class="btn btn-xs btn-danger btn-flat show-alert-delete-box btn-xs delete-confirm" data-toggle="tooltip" title='Delete'><i class="icon-sm" data-feather="trash-2"></i></button>
            </form> --}}
                                                    </td>
                                                </tr>
                                                <!-- Move the modal inside the loop -->
                                                <div class="modal fade" id="delete" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi
                                                                </h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form method="POST"
                                                                    action="{{ route('destroy_aduan', $item->id) }}"
                                                                    id="delete_form-{{ $item->id }}"
                                                                    class="forms-sample">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <h5>Apakah anda yakin untuk menghapus data ini?</h5>
                                                                    <br>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">Batal</button>
                                                                        <button type="submit" class="btn btn-primary">Ya, Hapus</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
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
