@extends('admin.layouts.main')
@section('title', 'Ubah Pengguna')
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
            <form action="{{ url("admin/user/$user->id") }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-9">
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                value="{{ old('email', $user->email) }}">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Nama Lengkap</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name', $user->name) }}">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Hak Akses</label>
                            <select name="role" class="form-control">
                                <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : null }}>Admin</option>
                                <option value="officer" {{ old('role', $user->role) == 'officer' ? 'selected' : null }}>Staff</option>
                            </select>
                            @error('role')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Status</label>
                            <select name="is_active" class="form-control">
                                <option value="1" {{ old('is_active', $user->is_active) == '1' ? 'selected' : null }}>Aktif</option>
                                <option value="0" {{ old('is_active', $user->is_active) == '0' ? 'selected' : null }}>Tidak Aktif</option>
                            </select>
                            @error('is_active')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3 mt-4">
                        <button type="submit" class="btn btn-success btn-block">Simpan</button>
                        <a href="{{ route('user') }}" class="btn  btn-secondary btn-block">Batal</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
