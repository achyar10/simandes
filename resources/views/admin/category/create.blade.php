@extends('admin.layouts.main')
@section('title', "Tambah $title")
@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route($uri) }}">{{ $title }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">@yield('title')</li>
        </ol>
    </nav>

    <!-- Main content -->
    <div class="card">
        <div class="card-body">
            <form action="{{ route($uri) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-9">
                        <div class="form-group">
                            <label for="">Nama <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name') }}">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3 mt-4">
                        <button type="submit" class="btn btn-success btn-block">Simpan</button>
                        <a href="{{ route($uri) }}" class="btn  btn-secondary btn-block">Batal</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
