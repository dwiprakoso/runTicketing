@extends('layouts.app')

@section('content')
<h2>Terima kasih! Pesanan Anda sedang diproses.</h2>
<p class="mt-3">Pembayaran anda akan kami verifikasi dalam waktu 1x24 Jam.</p>
<p class="mt-3">Setelah pembayaran terverifikasi, tiket akan kami kirimkan melalui email.</p>
<a href="{{ route('event.detail') }}">Kembali ke Beranda</a>
@endsection
