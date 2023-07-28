@extends('layout.app')

@section('content')
    <h1>Selamat datang di halaman utama!</h1>
    <p>Ini adalah halaman beranda situs kami.</p>
    <a href="{{ route('register') }}" type="button" class="btn btn-primary">Register</a>
    <a href="{{ route('login_admin') }}" type="button" class="btn btn-primary">Login Admin</a>
    <a href="{{ route('login_cashier') }}" type="button" class="btn btn-primary">Login Cashier</a>
    <a href="{{ route('logout') }}" type="button" class="btn btn-primary">Logout</a>
@endsection