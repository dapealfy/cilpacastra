@extends('layouts.dashboard')

@section('title', 'Data anggota')

@section('style')
<style>
    .page-item.active .page-link {
        color: #FFF !important;
        background-color: #1E9FF2 !important;
        border-color: #1E9FF2 !important;
    }

    .pagination .page-lin {
        color: blue !important;
    }
</style>
@endsection

@section('content-header')
<div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
    <h3 class="content-header-title mb-0 d-inline-block">Anggota</h3>
    <div class="row breadcrumbs-top d-inline-block">
        <div class="breadcrumb-wrapper col-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="pages">Home</a>
                </li>
                <li class="breadcrumb-item active">Anggota
                </li>
            </ol>
        </div>
    </div>
</div>

<div class="content-header-right col-md-6 col-12">
    <div class="btn-group float-md-right">
        <button class="btn btn-info rounded-0 mb-1" id="createanggotaButton" type="button">Tambah</button>
    </div>
</div>

@endsection

@section('content')
@if(session('ERR'))
<div class="alert alert-danger" role="alert">
    {{ session('ERR') }}
</div>
@endif
@if(session('OK'))
<div class="alert alert-success" role="alert">
    {{ session('OK') }}
</div>
@endif
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Daftar Anggota</h4>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                        <li><a data-action="close"><i class="ft-x"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-content collapse show">
                <div class="card-body card-dashboard">
                    <table class="table table-striped table-bordered table-responsive zero-configuration datatable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>NIM</th>
                                <th>PRODI</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1; @endphp
                            @foreach($anggota as $item)
                            <tr>
                                <td class="text-capitalize">{{ $no++ }}</td>
                                <td class="text-capitalize">{{ $item->id }}</td>
                                <td class="text-capitalize">{{ $item->nama }}</td>
                                <td class="text-capitalize">{{ $item->nim }}</td>
                                <td class="text-capitalize">{{ $item->prodi }}</td>
                                @if($item->status == 1)
                                <td class="text-capitalize"><span class="badge badge-success">AKTIF</span></td>
                                @else
                                <td class="text-capitalize"><span class="badge badge-danger">NON-AKTIF</span></td>
                                @endif
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-info dropdown" type="button" data-toggle="dropdown">
                                            <i class="la la-cog"></i>
                                        </button>
                                        <div class="dropdown-menu" style="min-width: 9rem !important">
                                            <button class="dropdown-item editanggotaButton" value="{{ $item->id }}">
                                                <i class="la la-edit"></i> Ubah
                                            </button>
                                            <button class="dropdown-item deleteAnggotaButton" value="{{ $item->id }}">
                                                <i class="la la-trash"></i> Hapus
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="createanggotaModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header btn-info white">
                <h4 class="modal-title white">Tambah Anggota</h4>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{ route('anggota.store') }}" method="post">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" name="nama" placeholder="Nama" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">NIM</label>
                        <input type="text" name="nim" placeholder="NIM" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Program Studi</label>
                        <input type="text" name="prodi" placeholder="Program Srudi" class="form-control" required>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn btn-outline-info">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="editanggotaModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header btn-info white">
                <h4 class="modal-title white">Edit Anggota</h4>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="" id="editanggotaForm" method="post">
                <div class="modal-body">
                    @csrf
                    @method("PUT")
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" name="nama" id="editnama" placeholder="Nama" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">NIM</label>
                        <input type="text" name="nim" id="editnim" placeholder="NIM" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Program Studi</label>
                        <input type="text" name="prodi" id="editprodi" placeholder="Program Studi" class="form-control" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Kembali</button>
                        <button type="submit" class="btn btn-outline-info">Simpan</button>
                    </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteAnggotaModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info white">
                <h4 class="modal-title white">Apa anda yakin ingin menghapus data ini?</h4>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="" id="deleteAnggotaForm" method="post">
                <div class="modal-footer">
                    @csrf
                    @method("DELETE")
                    <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn btn-outline-danger">Iya, hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection

@section('script')
<script>
    $(document).on("change", "#yearSelect", function() {
        console.log('true');
        $("#yearButton").click();
    });
    $(document).on("click", "#createanggotaButton", function() {
        $("#createanggotaModal").modal();
    });

    $(document).on("click", ".editanggotaButton", function() {
        let id = $(this).val();
        $.ajax({
            method: "GET",
            url: "{{ route('anggota.index') }}/" + id + "/edit"
        }).done(function(response) {
            console.log(response);
            $("#editnama").val(response.nama);
            $("#editnim").val(response.nim);
            $("#editprodi").val(response.prodi);
            $("#editanggotaForm").attr("action", "{{ route('anggota.index') }}/" + id)
            $("#editanggotaModal").modal();
        })
    });

    $(document).on("click", ".deleteAnggotaButton", function() {
        let id = $(this).val();

        $("#deleteAnggotaForm").attr("action", "{{ route('anggota.index') }}/" + id)
        $("#deleteAnggotaModal").modal();
    });
</script>
@endsection