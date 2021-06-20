@extends('Auth.Template.template')
@section('content')
    <header class="masthead mb-auto">
        <div class="row">
            <div class="inner">
                <h1 class="masthead-brand text-success fw-bold">Tracy</h1>
                <nav class="nav nav-masthead justify-content-center">
                    <a class="nav-link active" href="#">Home</a>
                    <a class="nav-link" href="#">Apa itu Tracy ?</a>
                    <a class="nav-link" href="#">Tentang Kami</a>
                </nav>
            </div>
        </div>
    </header>
    
    <main role="main" class="inner cover">
        <div class="row mb-5">
            @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ $message }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>
        <div class="row">
            <div class="col-8">
                <h3 class="cover-heading text-success"><b>Tabung Sampah Hijaukan Dunia.</b> </h3>
                <p class="lead text-white" id="runningText" ></p>
                <p class="lead text-white" id="runningText2" ></p>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-outline-light" data-toggle="modal"
                    data-target="#exampleModalCenter" >
                    Alur Pendaftaran >
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-dark" id="exampleModalLongTitle">Alur Pendaftaran:</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <ol class="text-dark">
                                    <li>Lapor kepada admin kelurahan </li>
                                    <li>Kamu melakukan pendaftaran di kelurahan</li>
                                    <li>Masukkan username dan password</li>
                                    <li>Login ke akunmu di website ini dan pantau tabunganmu tiap hari</li>
                                </ol>
                                <p class="text-dark"><b>#Jenis Sampah Yang Disetor: Sampah Organik</b> </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- card -->
            <div class="col-4">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <div class="text-center text-success">
                            <h1 class="h3 mt-2 mb-4 fw-bold">Silahkan Login</h1>
                                <form method="post" class="form" action="{{ route('login') }}">
                                @csrf
                                <div class="form-floating">
                                    <input type="text" class="form-control @error('username') is-invalid border-danger @enderror" id="inputUsername" name="username" value="{{old('username')}}" placeholder="Username">
                                    <label for="inputUsername">Username</label>
                                    @error('username')
                                        <span class="invalid-feedback mb-2 mt-0" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-floating">
                                    <input type="password" class="form-control mt-2 @error('password') is-invalid border-danger @enderror" id="inputPassword" name="password" placeholder="Password">
                                    <label for="inputPassword">Password</label>
                                    @error('password')
                                        <span class="invalid-feedback mb-2 mt-0" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="checkbox m-3">
                                    <label>
                                        <input type="checkbox" name="rememberMe" value="remember-me"> Remember me
                                    </label>
                                </div>
                                <input class="col-md-12 btn btn-lg btn-success" type="submit" name="login" value="Sign In">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection