@extends('admin.layouts.main')
@section('title', 'Tambah Kartu Keluarga (KK)')
@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('familycard') }}">Kartu Keluarga (KK)</a></li>
            <li class="breadcrumb-item active" aria-current="page">@yield('title')</li>
        </ol>
    </nav>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('familycard') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-9">
                        <div class="form-group">
                            <label for="">Nomor Kartu Keluarga</label>
                            <input type="text" name="number" class="form-control @error('number') is-invalid @enderror"
                                value="{{ old('number') }}">
                            @error('number')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Nama Kepala Keluarga</label>
                            <input type="text" name="head_of_family"
                                class="form-control @error('head_of_family') is-invalid @enderror"
                                value="{{ old('head_of_family') }}">
                            @error('head_of_family')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Alamat</label>
                            <textarea name="address" class="form-control">{{ old('address') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Kode Pos</label>
                            <input type="text" name="zip" class="form-control @error('zip') is-invalid @enderror"
                                value="{{ old('zip') }}">
                            @error('zip')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Cetak</label>
                            <input type="date" name="print_date"
                                class="form-control @error('print_date') is-invalid @enderror"
                                value="{{ old('print_date') }}">
                            @error('print_date')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">RW</label>
                            <select id="rw_id" class="form-control">
                                <option value="">---Pilih RW---</option>
                                @foreach ($rws as $row)
                                    <option value="{{ $row->id }}">{{ $row->number }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div style="display: none" id="showRt">
                            <div class="form-group">
                                <label for="">RT</label>
                                <select name="rt_id" id="rt" class="form-control">
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mt-4">
                        <button type="submit" class="btn btn-success btn-block">Simpan</button>
                        <a href="{{ route('familycard') }}" class="btn  btn-secondary btn-block">Batal</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        $('#rw_id').on('change', function() {
            const id = this.value
            $.ajax({
                url: `/api/hooks/rt/${id}`,
                method: 'GET',
                success: res => {
                    if (res.length > 0) {
                        $('#showRt').show()
                        let rt = ''
                        res.forEach(el => {
                            rt += /*html*/
                                `<option value="${el.id}">${el.number} - ${el.pic}</option>`
                        })
                        $('#rt').html(rt)
                    } else {
                        $('#showRt').hide()
                        $('#rt').html('')
                    }
                }
            })
        })
    </script>


@endsection
