@extends('layouts.dashboard')

@section('title', 'Data Buku')

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
    <h3 class="content-header-title mb-0 d-inline-block">Buku</h3>
    <div class="row breadcrumbs-top d-inline-block">
        <div class="breadcrumb-wrapper col-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard">Home</a>
                </li>
                <li class="breadcrumb-item active">Buku
                </li>
            </ol>
        </div>
    </div>
</div>

<div class="content-header-right col-md-6 col-12">
    <div class="btn-group float-md-right">
        <button class="btn btn-info rounded-0 mb-1" id="createBukuButton" type="button">Tambah</button>
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
                <h4 class="card-title">List Sertifikasi Usaha</h4>
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
                                <th>Nama Buku</th>
                                <th>Penerbit</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1; @endphp
                            @foreach($data_buku as $item)
                            <tr>
                                <td class="text-capitalize">{{ $no++ }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown">
                                            <i class="la la-cog"></i>
                                        </button>
                                        <div class="dropdown-menu" style="min-width: 9rem !important">
                                            <button class="dropdown-item editBukuButton" value="{{ $item->id }}">
                                                <i class="la la-edit"></i> Ubah
                                            </button>
                                            <button class="dropdown-item deleteBukuButton" value="{{ $item->id }}">
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
                                <th>Nama Buku</th>
                                <th>Penerbit</th>
                                <th width="10%">Aksi</th>
                            </tr>
                        </tfooter>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="createBukuModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header btn-info white">
                <h4 class="modal-title white">Tambah Sertifikasi Usaha</h4>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{ route('buku.store') }}" method="post">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="">Nama klien</label>
                        <input type="text" name="nama_klien" placeholder="Masukkan nama klien" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Permohonan</label>
                        <input type="text" name="permohonan" placeholder="Masukkan permohonan" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Kajian</label>
                        <input type="text" name="kajian" placeholder="Masukkan kajian" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Perjanjian</label>
                        <input type="text" name="perjanjian" placeholder="Masukkan perjanjian" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Lap. Audit S.2</label>
                        <input type="text" name="lap_audit_s2" placeholder="Masukkan Lap. Audit S.2" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Sertifikat</label>
                        <input type="text" name="sertifikat" placeholder="Masukkan sertifikat" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Lap Audit Sury</label>
                        <input type="text" name="lap_audit_sury" placeholder="Masukkan lap audit sury" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Klasifikasi Bintang</label>
                        <input type="text" name="klasifikasi_bintang" placeholder="Masukkan klasifikasi bintang" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">ISU Auditor</label>
                        <input type="text" name="lsu_auditor" placeholder="Masukkan isu auditor" class="form-control" required>
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

<div class="modal fade" id="editBukuModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header btn-info white">
                <h4 class="modal-title white">Ubah Sertifikasi Usaha</h4>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="" id="editBukuForm" method="post">
                <div class="modal-body">
                    @csrf
                    @method("PUT")
                    <div class="form-group">
                        <label for="">Nama Kliean</label>
                        <input type="text" name="nama_klien" id="editNamaKlien" placeholder="Masukkan nama klien" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Permohonan</label>
                        <input type="text" name="permohonan" id="editPermohonan" placeholder="Masukkan permohonan" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Kajian</label>
                        <input type="text" name="kajian" id="editKajian" placeholder="Masukkan kajian" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Perjanjian</label>
                        <input type="text" name="perjanjian" id="editPerjanjian" placeholder="Masukkan perjanjian" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Lap. Audit S.2</label>
                        <input type="text" name="lap_audit_s2" id="editLapAuditS2" placeholder="Masukkan Lap. Audit S.2" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Sertifikat</label>
                        <input type="text" name="sertifikat" id="editSertifikat" placeholder="Masukkan sertifikat" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Lap Audit Sury</label>
                        <input type="text" name="lap_audit_sury" id="editLapAuditSury" placeholder="Masukkan lap audit sury" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Klasifikasi Bintang</label>
                        <input type="text" name="klasifikasi_bintang" id="editKlasifikasiBintang" placeholder="Masukkan klasifikasi bintang" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">ISU Auditor</label>
                        <input type="text" name="lsu_auditor" id="editIsuAuditor" placeholder="Masukkan isu auditor" class="form-control" required>
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

<div class="modal fade" id="deleteBukuModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info white">
                <h4 class="modal-title white">Apa anda yakin ingin menghapus data ini?</h4>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="" id="deleteBukuForm" method="post">
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
    $(document).on("click", "#createBukuButton", function() {
        $("#createBukuModal").modal();
    });

    $(document).on("click", ".editBukuButton", function() {
        let id = $(this).val();
        $.ajax({
            method: "GET",
            url: "{{ route('buku.index') }}/" + id + "/edit"
        }).done(function(response) {
            console.log(response);
            $("#editNamaKlien").val(response.nama_klien);
            $("#editPermohonan").val(response.permohonan);
            $("#editKajian").val(response.kajian);
            $("#editPerjanjian").val(response.perjanjian);
            $("#editLapAuditS2").val(response.lap_audit_s2);
            $("#editSertifikat").val(response.sertifikat);
            $("#editLapAuditSury").val(response.lap_audit_sury);
            $("#editKlasifikasiBintang").val(response.klasifikasi_bintang);
            $("#editIsuAuditor").val(response.lsu_auditor);
            $("#editBukuForm").attr("action", "{{ route('buku.index') }}/" + id)
            $("#editBukuModal").modal();
        })
    });

    $(document).on("click", ".deleteBukuButton", function() {
        let id = $(this).val();

        $("#deleteBukuForm").attr("action", "{{ route('buku.index') }}/" + id)
        $("#deleteBukuModal").modal();
    });
</script>
@endsection