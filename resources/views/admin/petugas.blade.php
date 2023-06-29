@extends('templates.master')
@section('content')
<nav class="page-breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="#">Master Data</a></li>
<li class="breadcrumb-item"><a href="#">Pengguna</a></li>
<li class="breadcrumb-item active" aria-current="page">Petugas</li>
</ol>
</nav>

<div class="container">
   <div>
  <a href="{{route('petugas.create')}}" type="button" name="create" class="create btn btn-primary btn-xs mb-2 align-middle pt-2 pb-2 float-right"><i class="icon-sm " data-feather="plus"></i>Tambah Data</a>

  @if (Session::has('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{Session::get('success')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif

  <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h6 class="card-title">Data Petugas</h6>
            <div class="table-responsive">
  <table id="dataTableExample" class="table">
    <thead>
      <tr>
        <th width="100px">#</th>
        <th width="400px">Nama</th>
        <th width="400px">Username</th>
        <th width="400px">Email</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @if ($petugas->count() > 0)
      @foreach ($petugas as $item)
      <tr>
        <input type="hidden" class="delete_id" value="{{$item->id}}">
        <td class="align-middle">{{$loop->iteration}}</td>
        <td class="align-middle">{{$item->nama_petugas}}</td>
        <td class="align-middle">{{$item->username}}</td>
        <td class="align-middle">{{$item->email}}</td>
        <td>
          <a href="{{route('petugas.edit',$item->id)}}" type="button" name="edit" class="btn btn-primary btn-xs"><i class="icon-sm" data-feather="edit"></i></a>
          <button type="button" class="btn btn-xs btn-danger btn-flat show-alert-delete-box btn-xs delete-confirm"
          data-toggle="tooltip" title='Delete' data-bs-toggle="modal" data-bs-target="#delete"
          data-id="{{$item->id}}">
          <i class="icon-sm" data-feather="trash-2"></i></button>
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

<div class="modal fade" id="delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST"  id="delete_form" class="forms-sample">
          @csrf
          @method('DELETE')
          <h5>Apakah anda yakin untuk menghapus data ini?</h5>
          <br>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Ya, Hapus</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function () {
    $('.delete-confirm').on('click', function () {
      var id = $(this).data('id');
      var action = "{{ route('petugas.destroy', ':id') }}";
      action = action.replace(':id', id);
      $('#delete_form').attr('action', action);
    });
  });
</script>

@endsection
