@php
    $data= DB::table('departement')->get();
@endphp
@extends('layouts.master-without-nav')
@section('title')
    Register
@endsection
@section('page-title')
    Register
@endsection
@section('body')

    <body>
    @endsection
    @section('content')
        <div class="authentication-bg min-vh-100">
            <div class="bg-overlay bg-light"></div>
            <div class="container">
                <div class="d-flex flex-column min-vh-100 px-3 pt-4">
                    <div class="row justify-content-center my-auto">
                        <div class="col-md-8 col-lg-6 col-xl-5">

                            <div class="mb-4 pb-2">
                                <a href="/" class="d-block auth-logo">
                                    <img src="{{ URL::asset('build/images/logo-dark.png') }}" alt="" height="80"
                                        class="auth-logo-dark me-start">
                                    <img src="{{ URL::asset('build/images/logo-light.png') }}" alt="" height="80"
                                        class="auth-logo-light me-start">
                                </a>
                            </div>

                            <div class="card">
                                <div class="card-body p-4">
                                    <div class="text-center mt-2">
                                        <h5>Register Akun</h5>
                                    </div>
                                    <div class="p-2 mt-4">
                                        <form method="POST" action="{{ route('register') }}" class="auth-input">
                                            @csrf
                                            <div class="mb-2">
                                                <label for="name" class="form-label">Nama <span
                                                        class="text-danger">*</span></label>
                                                <input id="name" type="text"
                                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                                    value="{{ old('name') }}" required autocomplete="name" autofocus
                                                    placeholder="Masukkan Nama">
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="mb-2">
                                                <label for="email" class="form-label">Email <span
                                                        class="text-danger">*</span></label>
                                                <input id="email" type="email"
                                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                                    value="{{ old('email') }}" required autocomplete="email"
                                                    placeholder="Masukkan Email">
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>


                                            <div class="mb-3">
                                                <label class="form-label" for="password-input">Password <span
                                                        class="text-danger">*</span></label>
                                                <input type="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    name="password" required id="password-input"
                                                    placeholder="Masukkan Password minimal 8 karakter">
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label" for="password-confirm">Confirm
                                                    Password <span class="text-danger">*</span></label>
                                                <input type="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    name="password_confirmation" required id="password-confirm"
                                                    placeholder="Konfirmasi password">
                                            </div>

                                            <div class="mb-2">
                                                <label for="depart" class="form-label">Departement <span
                                                        class="text-danger">*</span></label>
                                                        <select class="form-control" data-trigger name="dept"
                                                        id="choices-single-default validationCustom04" placeholder="" required>
                                                        <option disable selected value>Pilih Departement</option>
                                                        @foreach ($data as $dept)
                                                            <option value="{{ $dept->id_departement }}">{{ $dept->nama_departement }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                @error('depart')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="mt-4">
                                                <button class="btn btn-primary w-100" type="submit">Register</button>
                                            </div>

                                            <div class="mt-4 text-center">
                                                <p class="mb-0">Sudah punya akun ? <a href="{{ route('login') }}"
                                                        class="fw-medium text-primary"> Login</a></p>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>

                        </div><!-- end col -->
                    </div><!-- end row -->

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="text-center p-4">
                                <p>©
                                    <script>
                                        document.write(new Date().getFullYear())
                                    </script> webadmin. Crafted with <i
                                        class="mdi mdi-heart text-danger"></i> by Nanda Habibie Erwin
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div><!-- end container -->
        </div>
        <!-- end authentication section -->
    @endsection
