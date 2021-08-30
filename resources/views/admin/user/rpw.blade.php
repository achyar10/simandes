@extends('admin.layouts.main')
@section('title', 'Tambah Pengguna')
@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('user') }}">Kelola Pengguna</a></li>
            <li class="breadcrumb-item active" aria-current="page">@yield('title')</li>
        </ol>
    </nav>

    <!-- Main content -->
    <div class="card">
        <div class="card-body">
            <form action="{{ url("user/$user->id/rpw") }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-9">
                        <div class="form-group">
                            <label for="">Password Baru</label>
                            <input type="password" name="password"
                                class="form-control @error('password') is-invalid @enderror"
                                value="{{ old('password') }}">
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Konfirmasi Password</label>
                            <input type="password" name="password_confirmation"
                                class="form-control @error('password') is-invalid @enderror">
                            @error('password_confirmation')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3 mt-4">
                        <button type="submit" class="btn btn-success btn-block">Reset</button>
                        <a href="{{ route('user') }}" class="btn  btn-secondary btn-block">Batal</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
