@extends('templates.master')
@section('content')
    <div class="row">
        @if (Str::length(Auth::guard('petugas')->user())>0)
        <h2>Selamat Datang {{\Illuminate\Support\Facades\Auth::guard('petugas')->user()->nama_petugas}}</h2>
         @elseif (Str::length(Auth::guard('mahasiswa')->user())>0)   
         <h2>Selamat Datang {{\Illuminate\Support\Facades\Auth::guard('mahasiswa')->user()->nama_mahasiswa}}</h2>
         @elseif (Str::length(Auth::guard('web')->user())>0)   
         <h2>Selamat Datang {{\Illuminate\Support\Facades\Auth::guard('web')->user()->username}}</h2>
        @endif
        {{-- <h2>Selamat Datang {{\Illuminate\Support\Facades\Auth::user()->petugas()->username}}</h2> --}}
    </div>
@endsection
