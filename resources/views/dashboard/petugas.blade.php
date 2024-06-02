@extends('template.master')

@section('title', 'Welcome to Petugas')

@section('rowTengah')
    <h1>Selamat datang <span class="bg-primary text-white p-1 rounded-3">{{ $user->nama_petugas }}</span> sebagai Petugas</h1>
    <form action="{{ route('auth.logout') }}" method="POST" onclick="return confirm('Yakin mau logout?')">
        @csrf
        <input type="submit" value="LogOut" class="btn btn-primary">
    </form>
@endsection
