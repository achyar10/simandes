@extends('admin.layouts.main')
@section('title', 'Warga')
@section('content')
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">@yield('title')</li>
    </ol>
</nav>

<!-- Main content -->
<div class="card">
    <div class="card-body">
        <h4>
            @yield('title')
            <a href="{{ url('admin/citizen/create') }}" class="btn btn-primary mb-3 float-right"><i class="fa fa-plus"></i>
                Tambah</a>
            <a href="{{ url('admin/citizen/import') }}" class="btn btn-light mb-3 float-right mr-2"><i
                    class="fa fa-upload"></i>
                Upload</a>
        </h4>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="thead-light">
                    <tr>
                        <th>No</th>
                        <th>No KK</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>RW</th>
                        <th>RT</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($citizens as $key => $row)
                        <tr>
                            <td>{{ $citizens->firstItem() + $key }}</td>
                            <td>{{ $row->family->number }}</td>
                            <td>{{ $row->nik }}</td>
                            <td>{{ $row->fullname }}</td>
                            <td>{{ $row->rt->rw->number }}</td>
                            <td>{{ $row->rt->number }}</td>
                            <td>
                                <a href="{{ url("admin/citizen/$row->id/edit") }}" class="btn btn-success btn-icon"><i
                                       class="mt-2" data-feather="edit"></i></a>
                                <button type="button" class="btn btn-danger btn-icon btnDelete" data-toggle="modal"
                                    data-target="#showModal" data-id="{{ $row->id }}">
                                    <i data-feather="trash"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="float-left mt-2">
                Showing {{ $citizens->firstItem() }}
                to {{ $citizens->lastItem() }}
                of {{ $citizens->total() }} entries
            </div>
            <div class="float-right">
                {!! $citizens->links() !!}
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="showModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('citizen') }}" method="post">
            @csrf
            @method('delete')
            <input type="hidden" name="id" id="id">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah anda yakin akan menghapus data ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    $('.btnDelete').click(function() {
        const id = $(this).data('id')
        $('#id').val(id)
    })
</script>

@endsection
