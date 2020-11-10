@extends('layouts.dashboard')

@section('title', 'Internal')

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
    <h3 class="content-header-title mb-0 d-inline-block">Data Bidang Hotel</h3>
    <div class="row breadcrumbs-top d-inline-block">
        <div class="breadcrumb-wrapper col-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard">Home</a>
                </li>
                <li class="breadcrumb-item active">Data Hotel
                </li>
            </ol>
        </div>
    </div>
</div>
<div class="content-header-right col-md-6 col-12">
    <div class="btn-group float-md-right">
        <button type="button" class="btn btn-success rounded-0 mb-1 mr-2" data-toggle="modal" data-target="#importExcel">Import</button>
        <button class="btn btn-info rounded-0 mb-1" id="createInternalButton" type="button">Tambah</button>
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
                <h4 class="card-title">List internal</h4>
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
                    <table class="table table-striped table-bordered zero-configuration datatable">
                        <thead>
                            <tr>
                                <th rowspan="2">No</th>
                                <th colspan="4">Nama Bidang Usaha</th>
                                <th rowspan="2">Jumlah Kamar</th>
                                <th rowspan="2">Jumlah Tempat Tidur</th>
                                <th colspan="3">Jumlah Pekerja</th>
                                <th rowspan="2">Fasilitas</th>
                            </tr>
                            <tr>
                                <th>Nama Usaha</th>
                                <th>Nama Pemilik / Pimpinan</th>
                                <th>Klasifikasi</th>
                                <th>Alamat / No Telp / No Fax</th>
                                <th>L</th>
                                <th>P</th>
                                <th>Jml</th>
                                <th width="10%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1; @endphp
                            @foreach($databidang_hotel as $item)
                            <tr>
                                <td class="text-capitalize">{{ $no++ }}</td>
                                <td class="text-capitalize">{{ $item->nama_usaha }}</td>
                                <td class="text-capitalize">{{ $item->pemilik }}</td>
                                <td class="text-capitalize">{{ $item->klasifikasi }}</td>
                                <td class="text-capitalize">{{ $item->alamat_notelp }}</td>
                                <td>{{ $item->jumlah_kamar }}</td>
                                <td>{{ $item->jumlah_tempat_tidur }}</td>
                                <td>{{ $item->jumlah_pekerja_laki }}</td>
                                <td>{{ $item->jumlah_pekerja_perempuan }}</td>
                                <td>{{ $item->jumlah_pekerja }}</td>
                                <td>{{ $item->fasilitas }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown">
                                            <i class="la la-cog"></i>
                                        </button>
                                        <div class="dropdown-menu" style="min-width: 9rem !important">
                                            <button class="dropdown-item editInternalButton" value="{{ $item->id }}">
                                                <i class="la la-edit"></i> Ubah
                                            </button>
                                            <button class="dropdown-item deleteInternalButton" value="{{ $item->id }}">
                                                <i class="la la-trash"></i> Hapus
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfooter>
                            <tr>
                                <th colspan="4">Rekap Hotel</th>
                                <th>Total Kamar</th>
                                <th>Username</th>
                                <th>Username</th>
                                <th>Username</th>
                                <th>Username</th>
                                <th>Username</th>
                                <th width="10%">Aksi</th>
                            </tr>
                        </tfooter>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="createInternalModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header btn-info white">
                <h4 class="modal-title white">Tambah internal</h4>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{ route('internal.store') }}" method="post">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" name="name" placeholder="Masukkan nama" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Username</label>
                        <input type="text" name="username" placeholder="Masukkan username" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" minlength="6" maxlength="16" name="password" placeholder="Masukkan password" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn btn-outline-info">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="editInternalModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header btn-info white">
                <h4 class="modal-title white">Ubah internal</h4>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="" id="editInternalForm" method="post">
                <div class="modal-body">
                    @csrf
                    @method("PUT")
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" name="name" placeholder="Masukkan nama" class="form-control" id="editName" required>
                    </div>
                    <div class="form-group">
                        <label for="">Alamat e-mail</label>
                        <input type="text" name="username" placeholder="Masukkan username" class="form-control" id="editUsername" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn btn-outline-info">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteInternalModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info white">
                <h4 class="modal-title white">Apa anda yakin ingin menghapus data ini?</h4>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="" id="deleteInternalForm" method="post">
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

<!-- Import Excel -->
<div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" action="/databidang-hotel-import" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header bg-info white">
                    <h5 class="modal-title white" id="exampleModalLabel">Import Excel</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">

                    {{ csrf_field() }}

                    <label>Pilih file excel</label>
                    <div class="form-group">
                        <input type="file" name="file" required="required">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn btn-outline-info">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).on("click", "#createInternalButton", function() {
        $("#createInternalModal").modal();
    });

    $(document).on("click", ".editInternalButton", function() {
        let id = $(this).val();
        $.ajax({
            method: "GET",
            url: "{{ route('internal.index') }}/" + id + "/edit"
        }).done(function(response) {
            console.log(response);
            $("#editName").val(response.user.name);
            $("#editUsername").val(response.user.username);
            $("#editInternalForm").attr("action", "{{ route('internal.index') }}/" + id)
            $("#editInternalModal").modal();
        })
    });

    $(document).on("click", ".deleteInternalButton", function() {
        let id = $(this).val();

        $("#deleteInternalForm").attr("action", "{{ route('internal.index') }}/" + id)
        $("#deleteInternalModal").modal();
    });
</script>
@endsection