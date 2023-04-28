@extends('layouts.app')

@section('auth')
<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-lg-5 d-none d-lg-block">
                <img src="{{ asset('dashboardAssets/img/lambang-auth.jpg') }}" alt="" style="width: 100%; height: 100%; object-fit: contain; align-self: center;">
            </div>
            <div class="col-lg-7">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Buat Akun Sistem Antrian Dukcapil </h1>
                    </div>
                    <form action="{{ route('register') }}" class="user" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="name" class="form-control form-control-user @error('name') is-invalid @enderror" id="name" name="name" placeholder="Masukkan Nama Anda ...">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <p>{{ $message }}</p>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" id="email" name="email" placeholder="Masukkan Alamat Email ...">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <p>{{ $message }}</p>
                                </span>
                            @enderror
                        </div>


                        <div class="form-group">
                            <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror" id="password" name="password" placeholder="Masukkan Password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <p>{{ $message }}</p>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror" id="password" name="password_confirmation" placeholder="Masukkan Password">
                            @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <p>{{ $message }}</p>
                                </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-danger btn-user btn-block">Daftar</button>
                        <a class="btn btn-primary btn-user btn-block" href="/login" role="button">Sudah Punya Akun, Masuk !</a>
                    </form>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection