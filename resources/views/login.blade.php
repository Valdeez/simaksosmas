@extends('layouts.main')

@section('content')
    <div class="container">
        @if (session('message') == 'gagal')
        <div class="d-flex justify-content-center">
            <div class="col-6 mt-4">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div> 
        </div>
        @endif
        <div class="card-wrapper">
            <div class="login-card">
                <div class="card-header">
                    <div class="icon">
                        <i class='bx bx-user' ></i>
                    </div>
                    <div class="text">
                        Halo Admin
                    </div>
                </div>
                <div class="card-body">
                    <form action="/login" method="POST">
                        @csrf
                        <div class="input-label">
                            <input type="text" id="username" name="username" placeholder="masukkan username..">
                            <label for="username" id="username">Username</label>
                        </div>
                        <div class="input-label mt-2">
                            <input type="password" id="password" name="password" placeholder="masukkan password..">
                            <label for="password" id="password">Password</label>
                        </div>
                        <div class="input-label mt-3">
                            <button class="button btn-login" type="submit">Login</button>
                        </div>
                    </form>
                    <div class="text mt-3">
                        Bukan admin?&nbsp<a href="/petadata">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection