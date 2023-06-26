@extends('templates.master')
@section('content')
<nav class="page-breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="#">Master Data</a></li>
<li class="breadcrumb-item"><a href="#">Aduan</a></li>
<li class="breadcrumb-item active" aria-current="page">Jenis Aduan</li>
</ol>
</nav>

@if (Session::has('success'))
  <div class="alert alert-success" role="alert">
    {(Session::get('success'))}
  </div>
  @endif

	<div class="row">
        <div class="col-lg-6">
            <div class="col-md-12 grid-margin stretch-card">

              @if (session()->has('message'))
              <h5 class="alert alert-success">{{ session('message') }}</h5>
          @endif

                <div class="card">
                  <div class="card-body">
                    <h6 class="card-title">Data Jenis Aduan</h6>
                    <div class="table-responsive">

                      @if (session()->has('success'))
                      <div class="alert alert-success" role="alert">
                        {{session('success')}}
                      </div>
                      @endif

                      <table id="jenis_aduan_datatable" class="table jenis_aduan_datatable">
                        <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col" width="400px">Jenis Aduan</th>
                              <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                         
                        </tbody>
                    </table>
                    </div>
                  </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Tambah Jenis Aduan</h5>

                <!-- Horizontal Form -->
                <form action="" id="form-store" method="post">
                  @csrf
                  <div class="row mb-4">
                    <span id="form_result"></span>
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Nama Aduan</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="inputText" name="nama">
                    </div>
                  </div>
                  <input type="hidden" name="action" id="action" value="Add" />
                  <div class="float-right">
                  <input type="submit" name="action_button" id="action_button" value="Tambah" class="btn btn-primary float-end" />
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

        
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ubah Jenis Aduan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <form action="" id="form-edit" method="POST" class="forms-sample">
              @csrf
              <div class="row mb-3">
                  <label for="username" class="col-sm-3 col-form-label">Nama Aduan</label>
                  <div class="col-sm-9">
                      <input type="text" class="form-control"name="nama"  id="nama"  required>
                  </div>
                  <input type="hidden" name="action" id="action" value="Edit" />
              <input type="hidden" name="hidden_id" id="hidden_id" />
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <input type="submit" class="btn btn-primary" name="action_button" id="action_button" value="Simpan">
              </div>
          </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <form method="post" id="sample_form" class="forms-sample">
              @csrf
              <h5>Apakah anda yakin untuk menghapus data ini?</h5>
              <br>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" name="ok_button" id="ok_button"  class="btn btn-primary">Ya, Hapus</button>
              </div>
          </form>
      </div>
    </div>
  </div>
</div>

@endsection