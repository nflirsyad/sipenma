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
  <a href="{{route('create_aduan')}}" type="button" name="create" class="create btn btn-primary btn-xs mb-2 align-middle pt-2 pb-2 float-right"><i class="icon-sm " data-feather="plus"></i>Tambah Data</a>
  
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
      @if ($mahasiswa->count() > 0)
      @foreach ($mahasiswa as $item)
      <tr>
        <input type="hidden" class="delete_id" value="{{$item->id}}">
        <td class="align-middle">{{$loop->iteration}}</td>
        <td class="align-middle">{{$item->jenis_aduan}}</td>
        <td class="align-middle">{{$item->judul_aduan}}</td>
        <td class="align-middle">{{$item->deskripsi}}</td>
        <td class="align-middle"><span class="badge rounded-pill bg-warning">Sedang diverifikasi</span></td>
        <td class="align-middle">{{$item->gambar}}</td>
        <td>
          <form method="POST" action="{{ route('mahasiswa.destroy', $item->id) }}">
            <a href="{{route('mahasiswa.edit',$item->id)}}" type="button" name="edit" class="btn btn-primary btn-xs"><i class="icon-sm" data-feather="edit"></i></a>
              @csrf
              @method('delete')
              <input name="_method" type="hidden" value="DELETE">
              <button type="submit" class="btn btn-xs btn-danger btn-flat show-alert-delete-box btn-xs delete-confirm" data-toggle="tooltip" title='Delete'><i class="icon-sm" data-feather="trash-2"></i></button>
            </form>
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