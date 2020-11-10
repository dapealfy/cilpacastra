@extends('layouts.dashboard')

@section('title', 'Guest House')

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
    <h3 class="content-header-title mb-0 d-inline-block">Data Bidang Guest House</h3>
    <div class="row breadcrumbs-top d-inline-block">
        <div class="breadcrumb-wrapper col-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard">Home</a>
                </li>
                <li class="breadcrumb-item active">Data Bidang Guest House
                </li>
            </ol>
        </div>
    </div>
</div>
<div class="content-header-right col-md-6 col-12">
    <div class="btn-group float-md-right">
        <button type="button" class="btn btn-success rounded-0 mb-1 mr-2" data-toggle="modal" data-target="#importExcel">Import</button>
        <button class="btn btn-info rounded-0 mb-1" id="createDataBidangGuestHouseButton" type="button">Tambah</button>
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
                <h4 class="card-title">List Data Bidang Guest House</h4>
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
                                <th>No</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Pemilik</th>
                                <th>Keterangan</th>
                                <th>Kelurahan</th>
                                <th width="10%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1; @endphp
                            @foreach($databidang_guesthouse as $item)
                            <tr>
                                <td class="text-capitalize">{{ $no++ }}</td>
                                <td class="text-capitalize">{{ $item->nama }}</td>
                                <td class="text-capitalize">{{ $item->alamat }}</td>
                                <td class="text-capitalize">{{ $item->pemilik }}</td>
                                <td class="text-capitalize">{{ $item->keterangan }}</td>
                                <td class="text-capitalize">{{ $item->kelurahan }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown">
                                            <i class="la la-cog"></i>
                                        </button>
                                        <div class="dropdown-menu" style="min-width: 9rem !important">
                                            <button class="dropdown-item editDataBidangGuestHouseButton" value="{{ $item->id }}">
                                                <i class="la la-edit"></i> Ubah
                                            </button>
                                            <button class="dropdown-item deleteDataBidangGuestHouseButton" value="{{ $item->id }}">
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
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Pemilik</th>
                                <th>Keterangan</th>
                                <th>Kelurahan</th>
                                <th width="10%">Aksi</th>
                            </tr>
                        </tfooter>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="createDataBidangGuestHouseModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header btn-info white">
                <h4 class="modal-title white">Tambah Data Bidang GuestHouse</h4>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{ route('databidang-guesthouse.store') }}" method="post">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="">Nama Usaha</label>
                        <input type="text" name="nama" placeholder="Masukkan nama usaha" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Alamat</label>
                        <input type="text" name="alamat" placeholder="Masukkan alamat" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Pemilik</label>
                        <input type="text" name="pemilik" placeholder="Masukkan nama pemilik" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Keterangan</label>
                        <input type="text" name="keterangan" placeholder="Masukkan keterangan" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Kelurahan</label>
                        <input type="text" name="kelurahan" placeholder="Masukkan kelurahan" class="form-control" required>
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

<div class="modal fade" id="editDataBidangGuestHouseModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header btn-info white">
                <h4 class="modal-title white">Ubah Guest House</h4>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="" id="editDataBidangGuestHouseForm" method="post">
                <div class="modal-body">
                    @csrf
                    @method("PUT")
                    <div class="form-group">
                        <label for="">Nama Usaha</label>
                        <input type="text" name="nama" id="nama" placeholder="Masukkan nama usaha" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Alamat</label>
                        <input type="text" name="alamat" id="alamat" placeholder="Masukkan alamat" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Pemilik</label>
                        <input type="text" name="pemilik" id="pemilik" placeholder="Masukkan nama pemilik" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Keterangan</label>
                        <input type="text" name="keterangan" id="keterangan" placeholder="Masukkan keterangan" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Kelurahan</label>
                        <input type="text" name="kelurahan" id="kelurahan" placeholder="Masukkan kelurahan" class="form-control" required>
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

<div class="modal fade" id="deleteDataBidangGuestHouseModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info white">
                <h4 class="modal-title white">Apa anda yakin ingin menghapus data ini?</h4>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="" id="deleteDataBidangGuestHouseForm" method="post">
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
        <form method="post" action="/databidang-guesthouse-import" enctype="multipart/form-data">
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
    $(document).on("click", "#createDataBidangGuestHouseButton", function() {
        $("#createDataBidangGuestHouseModal").modal();
    });

    $(document).on("click", ".editDataBidangGuestHouseButton", function() {
        let id = $(this).val();
        $.ajax({
            method: "GET",
            url: "{{ route('databidang-guesthouse.index') }}/" + id + "/edit"
        }).done(function(response) {
            console.log(response);
            $("#nama").val(response.nama);
            $("#alamat").val(response.alamat);
            $("#pemilik").val(response.pemilik);
            $("#keterangan").val(response.keterangan);
            $("#kelurahan").val(response.kelurahan);
            $("#editDataBidangGuestHouseForm").attr("action", "{{ route('databidang-guesthouse.index') }}/" + id)
            $("#editDataBidangGuestHouseModal").modal();
        })
    });

    $(document).on("click", ".deleteDataBidangGuestHouseButton", function() {
        let id = $(this).val();

        $("#deleteDataBidangGuestHouseForm").attr("action", "{{ route('databidang-guesthouse.index') }}/" + id)
        $("#deleteDataBidangGuestHouseModal").modal();
    });
</script>
@endsection