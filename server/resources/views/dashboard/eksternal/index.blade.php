@extends('layouts.dashboard')

@section('title', 'Eksternal/Stakeholder')

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
        <h3 class="content-header-title mb-0 d-inline-block">Eksternal/Stakeholder</h3>
        <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dashboard">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Eksternal/Stakeholder
                    </li>
                </ol>
            </div>
        </div>
    </div>
    <div class="content-header-right col-md-6 col-12">
        <div class="btn-group float-md-right">
            <button class="btn btn-info rounded-0 mb-1" id="createEksternalButton" type="button">Tambah</button>
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
                <h4 class="card-title">List eksternal/stakeholder</h4>
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
                                <th>Username</th>
                                <th width="10%">Aksi</th>                                
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1; @endphp
                            @foreach($eksternal as $item)
                                <tr>
                                    <td class="text-capitalize">{{ $no++ }}</td>
                                    <td class="text-capitalize">{{ $item->user->name }}</td>
                                    <td>{{ $item->user->username }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown">
                                                <i class="la la-cog"></i>
                                            </button>
                                            <div class="dropdown-menu" style="min-width: 9rem !important">
                                                <button class="dropdown-item editEksternalButton" value="{{ $item->id }}">
                                                    <i class="la la-edit"></i> Ubah
                                                </button>
                                                <button class="dropdown-item editPasswordButton" value="{{ $item->user_id }}">
                                                    <i class="la la-lock"></i> Ubah kata sandi
                                                </button>
                                                <button class="dropdown-item deleteEksternalButton" value="{{ $item->id }}">
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

<div class="modal fade" id="createEksternalModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header btn-info white">
                <h4 class="modal-title white">Tambah eksternal/stakeholder</h4>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{ route('eksternal.store') }}" method="post">
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

<div class="modal fade" id="editEksternalModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header btn-info white">
                <h4 class="modal-title white">Ubah eksternal/stakeholder</h4>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="" id="editEksternalForm" method="post">
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

<div class="modal fade" id="deleteEksternalModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info white">
                <h4 class="modal-title white">Apa anda yakin ingin menghapus data ini?</h4>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="" id="deleteEksternalForm" method="post">
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
        $(document).on("click", "#createEksternalButton", function ()
        {
            $("#createEksternalModal").modal();
        });

        $(document).on("click", ".editEksternalButton", function()
        {
            let id = $(this).val();
            $.ajax(
            {
                method: "GET",
                url: "{{ route('eksternal.index') }}/" + id + "/edit"
            }).done(function (response)
            {
                console.log(response);
                $("#editName").val(response.user.name);
                $("#editUsername").val(response.user.username);
                $("#editEksternalForm").attr("action", "{{ route('eksternal.index') }}/" + id)
                $("#editEksternalModal").modal();
            })
        });

        $(document).on("click", ".deleteInternalButton", function()
        {
            let id = $(this).val();

            $("#deleteEksternalForm").attr("action", "{{ route('eksternal.index') }}/" + id)
            $("#deleteEksternalModal").modal();
        });
    </script>
@endsection
