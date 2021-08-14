@extends('admin.layouts.main')
@section('title', 'Upload RT')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('rt') }}">Rukun Tetangga</a></li>
                            <li class="breadcrumb-item active">@yield('title')</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h4>Petunjuk Singkat</h4>
                                <p>Penginputan data bisa dilakukan dengan mengcopy data dari file Ms. Excel. Format
                                    file excel harus sesuai kebutuhan aplikasi. Silahkan download formatnya <a
                                        href="{{ url('admin/rw/download') }}"><span
                                            class="badge badge-success">Disini</span></a>
                                    <br><br>
                                </p>
                                <hr>
                                <form action="" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="">RW</label>
                                        <select name="rw_id"
                                            class="form-control select2 @error('rw_id') is-invalid @enderror">
                                            <option value="">---Pilih RW---</option>
                                            @foreach ($rws as $row)
                                                <option value="{{ $row->id }}"
                                                    {{ old('rw_id') == $row->id ? 'selected' : null }}>
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
                                        <textarea
                                            placeholder="Copy data yang akan dimasukan dari file excel, dan paste disini"
                                            rows="8" class="form-control @error('rows') is-invalid @enderror"
                                            name="rows"></textarea>
                                        @error('rows')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <button class="btn btn-success" type="submit">Proses</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
