@extends('Nasabah.Template.template')
@section('content')
<div class="row">
    <div class="col-xl-6 col-md-6 mb-4">
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

    <div class="col-xl-6 col-md-6 mb-4">
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
</div>

<!-- Table -->
<div class="card shadow py-2 mb-4">
    <h3 class="m-3">Transaksi</h3>
    <div class="card-body mr-4 ml-4">
        <table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" style="width:100%">
            <thead>
                <tr>
                    <th class="th-sm">No</th>
                    <th class="th-sm">Transaksi ID</th>
                    <th class="th-sm">Berat</th>
                    <th class="th-sm">Jenis</th>
                    <th class="th-sm">Lokasi</th>
                    <th class="th-sm">Tanggal dan Waktu</th>
                    {{-- <th class="th-sm">Action
                    </th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($datas as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->id }}</td>
                    <td>{{ $data->berat }} g</td>
                    <td>{{ $data->jenis }}</td>
                    <td><a class="btn btn-outline-success" href="https://www.google.com/maps/?q={{ $data->lokasi }}">Google Map</a>
                    </td>
                    <td>{{ $data->created_at }}</td>
                </tr>
              @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection