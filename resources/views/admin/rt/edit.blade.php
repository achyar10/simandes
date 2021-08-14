@extends('admin.layouts.main')
@section('title', 'Ubah Rukun Tetangga (RT)')
@section('content')
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('rt') }}">Rukun Tetangga (RT)</a></li>
        <li class="breadcrumb-item active" aria-current="page">@yield('title')</li>
    </ol>
</nav>
<div class="card">
    <div class="card-body">
        <form action="{{ url("admin/rt/$rt->id") }}" method="post">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-9">
                    <div class="form-group">
                        <label for="">RW</label>
                        <select name="rw_id" class="form-control select2 @error('rw_id') is-invalid @enderror">
                            <option value="">---Pilih RW---</option>
                            @foreach ($rws as $row)
                                <option value="{{ $row->id }}"
                                    {{ old('rw_id', $rt->rw_id) == $row->id ? 'selected' : null }}>
                                    {{ $row->number }}</option>
                            @endforeach
                        </select>
                        @error('rw_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Nomor RT</label>
                        <input type="text" class="form-control" value="{{ $rt->number }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Ketua RT</label>
                        <input type="text" name="pic" class="form-control @error('pic') is-invalid @enderror"
                            value="{{ old('pic', $rt->pic) }}">
                        @error('pic')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">No Telepon</label>
                        <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
                            value="{{ old('phone', $rt->phone) }}">
                        @error('phone')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-3 mt-4">
                    <button type="submit" class="btn btn-success btn-block">Ubah</button>
                    <a href="{{ route('rt') }}" class="btn  btn-secondary btn-block">Batal</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
