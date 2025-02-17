@extends('layouts.app')

@section('content')
    <h2>Detail Pesanan #{{ $order->id }}</h2>
    <table class="table">
        <tr>
            <td><strong>Nama Pembeli:</strong></td>
            <td>{{ $order->buyer_name }}</td>
        </tr>
        <tr>
            <td><strong>Email:</strong></td>
            <td>{{ $order->buyer_email }}</td>
        </tr>
        <tr>
            <td><strong>Nomor HP:</strong></td>
            <td>{{ $order->phone_number }}</td>
        </tr>
        <tr>
            <td><strong>Kategori Tiket:</strong></td>
            <td>{{ $order->ticketCategory->name }}</td>
        </tr>
        <tr>
            <td><strong>Jumlah Tiket:</strong></td>
            <td>{{ $order->quantity }}</td>
        </tr>
        <tr>
            <td><strong>Total Harga:</strong></td>
            <td>Rp{{ number_format($order->total_price, 2) }}</td>
        </tr>
        <tr>
            <td><strong>Bukti Pembayaran:</strong></td>
            <td>
                @if ($order->payment_proof)
                    <img src="{{ asset('storage/' . $order->payment_proof) }}" alt="Bukti Pembayaran" width="300">
                @else
                    <p>Tidak ada bukti pembayaran</p>
                @endif
            </td>
        </tr>
    </table>
@endsection
