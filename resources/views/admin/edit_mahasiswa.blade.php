@extends('templates.master')
@section('content')
<div>
    <div class=" grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                <h6 class="card-title">Form Edit Mahasiswa</h6>

                @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{session('success')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                
                <form class="forms-sample" method="POST" action="{{route('mahasiswa.update',$mahasiswa->id)}}">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Nama Mahasiwa</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="nama_mahasiswa" id="exampleInputUsername2" value="{{$mahasiswa->nama_mahasiswa}}" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Username</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control"  name="username"  id="exampleInputEmail2" autocomplete="off" value="{{$mahasiswa->username}}" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="exampleInputMobile" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" name="email" id="exampleInputMobile" value="{{$mahasiswa->email}}" required>
                        </div>
                    </div>
                    <div class="form-group float-end">
                        <a href="{{route('mahasiswa.index')}}" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-primary me-2">Tambah</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection