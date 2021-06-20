@extends('Admin.Template.template')
@section('heading')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>
@endsection
@section('content')
@if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ $message }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if ($message = Session::get('success1'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ $message }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if ($message = Session::get('success2'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ $message }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if ($message = Session::get('failed'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>{{ $message }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="row">
    <div class="col-xl-4 col-md-4 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Transaksi</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$jumlah_setor}} Kali</div>
                    </div>
                    {{-- <div class="col-auto">
                        <i class="fas fa-pen fa-2x text-gray-300"></i>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-md-4 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Berat</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$jumlah_berat/1000}} Kg</div>
                    </div>
                    {{-- <div class="col-auto">
                        <i class="fas fa-pen fa-2x text-gray-300"></i>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-md-4 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Akun</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlah_akun }}</div>
                    </div>
                    {{-- <div class="col-auto">
                        <i class="fas fa-pen fa-2x text-gray-300"></i>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Table -->
<div class="card shadow py-2 mb-4">
    <div class="mr-5">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h3 class="m-3">Daftar Akun</h3>
            </div>
            <div class="col-md-6 d-flex justify-content-end">
                <a href="{{ route('admin.addaccountpage') }}" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Tambah Akun Baru</span>
                </a>
            </div>
        </div>
    </div>
    
    <div class="card-body mr-4 ml-4">
        <table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" style="width:100%">
            <thead>
                <tr>
                    <th class="th-sm">No</th>
                    <th class="th-sm">ID Kartu</th>
                    <th class="th-sm">Username</th>
                    <th class="th-sm">No Telepon</th>
                    <th class="th-sm">Lokasi</th>
                    <th class="th-sm">Role</th>
                    <th class="th-sm">Tanggal dan Waktu</th>
                    <th class="th-sm">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datas as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->rfid }}</td>
                    <td>{{ $data->username }}</td>
                    <td>{{ $data->no_telp }}</td>
                    <td>{{ $data->lokasi }}</td>
                    <td>{{ $data->role }}</td>
                    <td>{{ $data->created_at }}</td>
                    <td>
                        <a href="./account/delete/{{ $data->id }}" class="btn btn-danger btn-icon-split ml-2">
                            <span class="icon text-white-50">
                                <i class="fas fa-trash"></i>
                            </span>
                            <span class="text">Delete</span>
                        </a>
                        <a href="./account/update/{{ $data->id }}" class="btn btn-primary btn-icon-split ml-2">
                            <span class="icon text-white-50">
                                <i class="fas fa-pen"></i>
                            </span>
                            <span class="text">Edit</span>
                        </a>
                    </td>
                </tr>
              @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection