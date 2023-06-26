@extends('templates.master')
@section('content')
<div>
    <div class=" grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                <h6 class="card-title">Form Tambah Petugas</h6>

                @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{session('success')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                
                <form class="forms-sample" method="POST" action="{{route('petugas.store')}}">
                    @csrf
                    <div class="row mb-3">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Nama Petugas</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="nama_petugas" id="exampleInputUsername2" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Username</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control"  name="username"  id="exampleInputEmail2" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="exampleInputMobile" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" name="email" id="exampleInputMobile" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" name="password" id="exampleInputPassword2" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="form-group float-end">
                        <a href="{{route('petugas.index')}}" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-primary me-2">Tambah</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection