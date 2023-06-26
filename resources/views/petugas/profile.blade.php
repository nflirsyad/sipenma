@extends('templates.master')
@section('content')
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Master Data</a></li>
        <li class="breadcrumb-item active" aria-current="page">Profil</li>
    </ol>
</nav>

@if (session('success'))

<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{session('success')}}</strong>
  </div>

@endif

@if (session('error'))

<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>{{session('error')}}</strong>
  </div>

@endif

    <div class=" grid-margin stretch-card">  
        <div class="card">
            <div class="card-body"> 
                <div class="row mb-4">
                    <h6>Profil</h6>
                </div>
                <form class="forms-sample">
                  <div class="row mb-3">
                      <label for="exampleInputMobile" class="col-sm-3 col-form-label">Username</label>
                      <div class="col-sm-4">
                        <label>:</label>
                          <label type="text" class="col-form-label" id="username">{{\Illuminate\Support\Facades\Auth::user()->username}}</label>
                      </div>
                  </div>
                  <div class="row mb-3">
                      <label for="exampleInputMobile" class="col-sm-3 col-form-label">Email</label>
                      <div class="col-sm-4">
                        <label>:</label>
                          <label type="email" class="col-form-label" id="email">{{\Illuminate\Support\Facades\Auth::user()->email}}</label>
                      </div>
                  </div>
                  <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#edit">Ubah Profil</button>
                  <button type="button" class="btn btn-outline-primary me-2 float-end" data-bs-toggle="modal" data-bs-target="#changePass">Ubah Sandi</button>
                  {{-- <button type="submit" class="btn btn-outline-primary me-2 float-end">Ganti Password</button> --}}
              </form>

            </div>
        </div>
    </div>
  
  <!-- Modal -->
  <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ubah Profil</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{route('petugas_update')}}" method="POST" class="forms-sample">
                @csrf
                <div class="row mb-3">
                    <label for="username" class="col-sm-3 col-form-label">username</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="username" required id="username" value="{{\Illuminate\Support\Facades\Auth::user()->username}}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="exampleInputMobile" class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" name="email" required  id="email"  value="{{\Illuminate\Support\Facades\Auth::user()->email}}">
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="changePass" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ubah Sandi</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{route('petugas_update_password')}}" method="POST" class="forms-sample">
                @csrf
                <div class="row mb-3">
                    <label for="oldPassword" class="col-sm-3 col-form-label">Sandi lama</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control" name="oldPassword" id="oldPassword" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="newPassword" class="col-sm-3 col-form-label">Sandi baru</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control" name="newPassword" id="newPassword" required>
                    </div>
                </div>

                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>

@endsection