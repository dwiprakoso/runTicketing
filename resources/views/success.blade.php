@extends('layouts.app')

@section('content')
<h2>Terima kasih! Pesanan Anda sedang diproses.</h2>
<a href="{{ route('event.detail') }}">Kembali ke Beranda</a>
@endsection
