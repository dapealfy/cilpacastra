@extends('layouts.dashboard')

@section('title', 'Sertifikasi Profesi')

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
    <h3 class="content-header-title mb-0 d-inline-block">Sertifikasi Profesi</h3>
    <div class="row breadcrumbs-top d-inline-block">
        <div class="breadcrumb-wrapper col-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard">Home</a>
                </li>
                <li class="breadcrumb-item active">Sertifikasi Profesi
                </li>
            </ol>
        </div>
    </div>
</div>
<div class="content-header-right col-md-6 col-12">
    <div class="btn-group float-md-right">
        <button type="button" class="btn btn-success rounded-0 mb-1 mr-2" data-toggle="modal" data-target="#importExcel">Import</button>
        <button class="btn btn-info rounded-0 mb-1" id="createSertifikasiProfesiButton" type="button">Tambah</button>
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
                <h4 class="card-title">List Sertifikasi Profesi</h4>
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
                                <th>Tanggal</th>
                                <th>TUK</th>
                                <th>Provinsi</th>
                                <th>Pendidikan</th>
                                <th>Industri</th>
                                <th>Grand total</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1; @endphp
                            @foreach($sertifikasi_profesi as $item)
                            <tr>
                                <td class="text-capitalize">{{ $no++ }}</td>
                                <td class="text-capitalize">{{ $item->tanggal }}</td>
                                <td>{{ $item->tuk }}</td>
                                <td>{{ $item->provinsi }}</td>
                                <td>{{ $item->pendidikan }}</td>
                                <td>{{ $item->industri }}</td>
                                <td>{{ $item->grand_total }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown">
                                            <i class="la la-cog"></i>
                                        </button>
                                        <div class="dropdown-menu" style="min-width: 9rem !important">
                                            <button class="dropdown-item editSertifikasiProfesiButton" value="{{ $item->id }}">
                                                <i class="la la-edit"></i> Ubah
                                            </button>
                                            <button class="dropdown-item deleteSertifikasiProfesiButton" value="{{ $item->id }}">
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
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>TUK</th>
                                <th>Provinsi</th>
                                <th>Pendidikan</th>
                                <th>Industri</th>
                                <th>Grand total</th>
                                <th width="10%">Aksi</th>
                            </tr>
                        </tfooter>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="createSertifikasiProfesiModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header btn-info white">
                <h4 class="modal-title white">Tambah Sertifikasi Profesi</h4>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{ route('sertifikasi-profesi.store') }}" method="post">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="">Tanggal</label>
                        <input type="text" name="tanggal" placeholder="Masukkan tanggal" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">TUK</label>
                        <input type="text" name="tuk" placeholder="Masukkan tuk" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Provinsi</label>
                        <input type="text" name="provinsi" placeholder="Masukkan provinsi" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Pendidikan</label>
                        <input type="text" name="pendidikan" placeholder="Masukkan pendidikan" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Industri</label>
                        <input type="text" name="industri" placeholder="Masukkan industri" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Grand Total</label>
                        <input type="text" name="grand_total" placeholder="Masukkan grand_total" class="form-control" required>
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

<div class="modal fade" id="editSertifikasiProfesiModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header btn-info white">
                <h4 class="modal-title white">Ubah Sertifikasi Profesi</h4>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="" id="editSertifikasiProfesiForm" method="post">
                <div class="modal-body">
                    @csrf
                    @method("PUT")
                    <div class="form-group">
                        <label for="">Tanggal</label>
                        <input type="text" name="tanggal" id="editTanggal" placeholder="Masukkan tanggal" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">TUK</label>
                        <input type="text" name="tuk" id="editTuk" placeholder="Masukkan tuk" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Provinsi</label>
                        <input type="text" name="provinsi" id="editProvinsi" placeholder="Masukkan provinsi" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Pendidikan</label>
                        <input type="text" name="pendidikan" id="editPendidikan" placeholder="Masukkan pendidikan" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Industri</label>
                        <input type="text" name="industri" id="editIndustri" placeholder="Masukkan industri" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Grand Total</label>
                        <input type="text" name="grand_total" id="editGrandTotal" placeholder="Masukkan grand_total" class="form-control" required>
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

<div class="modal fade" id="deleteSertifikasiProfesiModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info white">
                <h4 class="modal-title white">Apa anda yakin ingin menghapus data ini?</h4>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="" id="deleteSertifikasiProfesiForm" method="post">
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
        <form method="post" action="/sertifikasi-profesi-import" enctype="multipart/form-data">
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
    $(document).on("click", "#createSertifikasiProfesiButton", function() {
        $("#createSertifikasiProfesiModal").modal();
    });

    $(document).on("click", ".editSertifikasiProfesiButton", function() {
        let id = $(this).val();
        $.ajax({
            method: "GET",
            url: "{{ route('sertifikasi-profesi.index') }}/" + id + "/edit"
        }).done(function(response) {
            console.log(response);
            $("#editTanggal").val(response.tanggal);
            $("#editTuk").val(response.tuk);
            $("#editProvinsi").val(response.provinsi);
            $("#editPendidikan").val(response.pendidikan);
            $("#editIndustri").val(response.industri);
            $("#editGrandTotal").val(response.grand_total);
            $("#editSertifikasiProfesiForm").attr("action", "{{ route('sertifikasi-profesi.index') }}/" + id)
            $("#editSertifikasiProfesiModal").modal();
        })
    });

    $(document).on("click", ".deleteSertifikasiProfesiButton", function() {
        let id = $(this).val();

        $("#deleteSertifikasiProfesiForm").attr("action", "{{ route('sertifikasi-profesi.index') }}/" + id)
        $("#deleteSertifikasiProfesiModal").modal();
    });
</script>
@endsection