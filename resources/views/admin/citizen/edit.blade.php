@extends('admin.layouts.main')
@section('title', 'Ubah Warga')
@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('citizen') }}">Warga</a></li>
            <li class="breadcrumb-item active" aria-current="page">@yield('title')</li>
        </ol>
    </nav>
    <div class="card">
        <div class="card-body">
            <form action="{{ url("admin/citizen/$citizen->id") }}" method="post">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-md-9">
                        <div class="form-group">
                            <label for="">Kartu Keluarga (KK)</label>
                            <select name="family_id" class="form-control select2 @error('family_id') is-invalid @enderror">
                                <option value="">---Pilih Kartu Keluarga---</option>
                                @foreach ($familycards as $row)
                                    <option value="{{ $row->id }}"
                                        {{ old('family_id', $citizen->family_id) == $row->id ? 'selected' : null }}>
                                        {{ $row->number }} - {{ $row->head_of_family }}</option>
                                @endforeach
                            </select>
                            @error('family_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">NIK <span class="text-danger">*</span></label>
                            <input type="text" name="nik" class="form-control @error('nik') is-invalid @enderror"
                                value="{{ old('nik', $citizen->nik) }}">
                            @error('nik')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Nama Lengkap <span class="text-danger">*</span></label>
                            <input type="text" name="fullname" class="form-control @error('fullname') is-invalid @enderror"
                                value="{{ old('fullname', $citizen->fullname) }}">
                            @error('fullname')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Jenis Kelamin <span class="text-danger">*</span></label>
                                    <select id="gender" name="gender"
                                        class="form-control @error('gender') is-invalid @enderror">
                                        <option value="LAKI-LAKI"
                                            {{ old('gender', $citizen->gender) == 'LAKI-LAKI' ? 'selected' : null }}>
                                            LAKI-LAKI</option>
                                        <option value="PEREMPUAN"
                                            {{ old('gender', $citizen->gender) == 'PEREMPUAN' ? 'selected' : null }}>
                                            PEREMPUAN</option>
                                    </select>
                                    @error('gender')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Golongan Darah</label>
                                    <select id="blood_type" name="blood_type"
                                        class="form-control @error('blood_type') is-invalid @enderror">
                                        <option value="">Tidak tahu</option>
                                        <option value="A"
                                            {{ old('blood_type', $citizen->blood_type) == 'A' ? 'selected' : null }}>A
                                        </option>
                                        <option value="B"
                                            {{ old('blood_type', $citizen->blood_type) == 'B' ? 'selected' : null }}>B
                                        </option>
                                        <option value="AB"
                                            {{ old('blood_type', $citizen->blood_type) == 'AB' ? 'selected' : null }}>AB
                                        </option>
                                        <option value="O"
                                            {{ old('blood_type', $citizen->blood_type) == 'O' ? 'selected' : null }}>O
                                        </option>
                                    </select>
                                    @error('blood_type')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Tempat Lahir <span class="text-danger">*</span></label>
                                    <input type="text" name="pob" class="form-control @error('pob') is-invalid @enderror"
                                        value="{{ old('pob', $citizen->pob) }}">
                                    @error('pob')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Tanggal Lahir <span class="text-danger">*</span></label>
                                    <input type="date" name="dob" class="form-control @error('dob') is-invalid @enderror"
                                        value="{{ old('dob', $citizen->dob) }}">
                                    @error('dob')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Status Perkawinan <span class="text-danger">*</span></label>
                                    <select id="status_married" name="status_married"
                                        class="form-control @error('status_married') is-invalid @enderror">
                                        <option value="BELUM KAWIN"
                                            {{ old('status_married', $citizen->status_married) == 'BELUM KAWIN' ? 'selected' : null }}>
                                            BELUM KAWIN</option>
                                        <option value="KAWIN"
                                            {{ old('status_married', $citizen->status_married) == 'KAWIN' ? 'selected' : null }}>
                                            KAWIN</option>
                                        <option value="JANDA/DUDA"
                                            {{ old('status_married', $citizen->status_married) == 'JANDA/DUDA' ? 'selected' : null }}>
                                            JANDA/DUDA</option>
                                    </select>
                                    @error('status_married')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Hubungan Dalam Keluarga <span class="text-danger">*</span></label>
                                    <select id="relationship" name="relationship"
                                        class="form-control @error('relationship') is-invalid @enderror">
                                        <option value="KEPALA KELUARGA"
                                            {{ old('status_married', $citizen->status_married) == 'JANDA/DUDA' ? 'selected' : null }}>
                                            KEPALA KELUARGA</option>
                                        <option value="SUAMI"
                                            {{ old('relationship', $citizen->relationship) == 'SUAMI' ? 'selected' : null }}>
                                            SUAMI</option>
                                        <option value="ISTRI"
                                            {{ old('relationship', $citizen->relationship) == 'ISTRI' ? 'selected' : null }}>
                                            ISTRI</option>
                                        <option value="ANAK"
                                            {{ old('relationship', $citizen->relationship) == 'ANAK' ? 'selected' : null }}>
                                            ANAK</option>
                                        <option value="MENANTU"
                                            {{ old('relationship', $citizen->relationship) == 'MENANTU' ? 'selected' : null }}>
                                            MENANTU</option>
                                        <option value="MERTUA"
                                            {{ old('relationship', $citizen->relationship) == 'MERTUA' ? 'selected' : null }}>
                                            MERTUA</option>
                                        <option value="ORANG TUA"
                                            {{ old('relationship', $citizen->relationship) == 'ORANG TUA' ? 'selected' : null }}>
                                            ORANG TUA</option>
                                        <option value="CUCU"
                                            {{ old('relationship', $citizen->relationship) == 'CUCU' ? 'selected' : null }}>
                                            CUCU</option>
                                        <option value="LAINNYA"
                                            {{ old('relationship', $citizen->relationship) == 'LAINNYA' ? 'selected' : null }}>
                                            LAINNYA</option>
                                    </select>
                                    @error('relationship')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Agama <span class="text-danger">*</span></label>
                            <select id="religion" name="religion"
                                class="form-control @error('religion') is-invalid @enderror">
                                <option value="ISLAM"
                                    {{ old('religion', $citizen->religion) == 'ISLAM' ? 'selected' : null }}>ISLAM
                                </option>
                                <option value="KRISTEN"
                                    {{ old('religion', $citizen->religion) == 'KRISTEN' ? 'selected' : null }}>KRISTEN
                                </option>
                                <option value="KATHOLIK"
                                    {{ old('religion', $citizen->religion) == 'KATHOLIK' ? 'selected' : null }}>KATHOLIK
                                </option>
                                <option value="HINDU"
                                    {{ old('religion', $citizen->religion) == 'HINDU' ? 'selected' : null }}>HINDU
                                </option>
                                <option value="BUDHA"
                                    {{ old('religion', $citizen->religion) == 'BUDHA' ? 'selected' : null }}>BUDHA
                                </option>
                                <option value="KHONGHUCU"
                                    {{ old('religion', $citizen->religion) == 'KHONGHUCU' ? 'selected' : null }}>
                                    KHONGHUCU</option>
                            </select>
                            @error('religion')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Alamat</label>
                            <textarea name="address" class="form-control">{{ old('address', $citizen->address) }}</textarea>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Pendidikan <span class="text-danger">*</span></label>
                                    <select name="education_id"
                                        class="form-control select2 @error('education_id') is-invalid @enderror">
                                        <option value="">---Pilih Pendidikan---</option>
                                        @foreach ($education as $row)
                                            <option value="{{ $row->id }}"
                                                {{ old('education_id', $citizen->education_id) == $row->id ? 'selected' : null }}>
                                                {{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('education_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Pekerjaan <span class="text-danger">*</span></label>
                                    <select name="work_id"
                                        class="form-control select2 @error('work_id') is-invalid @enderror">
                                        <option value="">---Pilih Pekerjaan---</option>
                                        @foreach ($works as $row)
                                            <option value="{{ $row->id }}"
                                                {{ old('work_id', $citizen->work_id) == $row->id ? 'selected' : null }}>
                                                {{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('work_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mt-4">
                        <button type="submit" class="btn btn-success btn-block">Simpan</button>
                        <a href="{{ route('citizen') }}" class="btn  btn-secondary btn-block">Batal</a>
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
