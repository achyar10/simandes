@extends('admin.layouts.main')
@section('title', 'Ubah Rukun Warga (RW)')
@section('content')
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('rt') }}">Rukun Warga (RW)</a></li>
        <li class="breadcrumb-item active" aria-current="page">@yield('title')</li>
    </ol>
</nav>
<div class="card">
    <div class="card-body">
        <form action="{{ url("admin/rw/$rw->id") }}" method="post">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-9">
                    <div class="form-group">
                        <label for="">Nomor RW</label>
                        <input type="text" class="form-control" value="{{ $rw->number }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Ketua RW</label>
                        <input type="text" name="pic" class="form-control @error('pic') is-invalid @enderror"
                            value="{{ old('pic', $rw->pic) }}">
                        @error('pic')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">No Telepon</label>
                        <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
                            value="{{ old('phone', $rw->phone) }}">
                        @error('phone')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-3 mt-4">
                    <button type="submit" class="btn btn-success btn-block">Ubah</button>
                    <a href="{{ route('rw') }}" class="btn  btn-secondary btn-block">Batal</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
