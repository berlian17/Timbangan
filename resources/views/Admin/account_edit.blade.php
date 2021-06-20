@extends('Admin.Template.template')
@section('heading')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Akun</h1>
</div>
@endsection
@section('content')
<div class="card shadow">
    <form method="post" class="form m-5" action="{{ route('admin.editaccount', $data->id) }}">
        @csrf
        <div class="form-floating">
            <input type="text" class="form-control @error('username') is-invalid border-danger @enderror" id="inputUsername" name="username" value="{{ $data->username }}" placeholder="Username">
            <label for="inputUsername">Username</label>
            @error('username')
                <span class="invalid-feedback mb-2 mt-0" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-floating">
            <input type="text" class="form-control mt-3 @error('rfid') is-invalid border-danger @enderror" id="inputRFID" name="rfid" value="{{ $data->rfid }}" placeholder="ID Kartu">
            <label for="inputRFID">ID Kartu</label>
            @error('rfid')
                <span class="invalid-feedback mb-2 mt-0" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-floating">
            <input type="text" class="form-control mt-3 @error('no_telp') is-invalid border-danger @enderror" id="inputNo_telp" name="no_telp" value="{{ $data->no_telp }}" placeholder="Nomor Telepon">
            <label for="inputNo_telp">Nomor Telepon</label>
            @error('no_telp')
                <span class="invalid-feedback mb-2 mt-0" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-floating">
            <textarea class="form-control mt-3 @error('lokasi') is-invalid border-danger @enderror" id="inputLokasi" name="lokasi" style="height: 100px" placeholder="Tempat Tinggal">{{ $data->lokasi }}</textarea>
            <label for="inputLokasi">Tempat Tinggal</label>
            @error('lokasi')
                <span class="invalid-feedback mb-2 mt-0" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-floating">
            <select class="form-select form-control mt-3 p-2 @error('role') is-invalid border-danger @enderror" id="inputRole" name="role" placeholder="Role" aria-label="Default select example">
                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="nasabah" {{ old('role') == 'nasabah' ? 'selected' : '' }}>Nasabah</option>
            </select>
            @error('role')
                <span class="invalid-feedback mb-2 mt-0" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-floating">
            <input type="text" class="form-control mt-3 @error('password') is-invalid border-danger @enderror" id="inputPassword" name="password" value="{{ $data->password }}" placeholder="Password">
            <label for="inputPassword">Password</label>
            @error('password')
                <span class="invalid-feedback mb-2 mt-0" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-floating d-flex justify-content-center">
            <input class="col-md-6 mt-5 btn btn-lg btn-primary" type="submit" name="login" value="Update">
        </div>
    </form>
</div>
@endsection