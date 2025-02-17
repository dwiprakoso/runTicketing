@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class=" shadow-sm">
        <div class="">
            <h2 class="mb-0">Rincian Pemesanan</h2>
        </div>
        <div class="">
            <table class="table">
                <tr>
                    <th>Nama Pembeli</th>
                    <td>{{ $order->buyer_name }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $order->buyer_email }}</td>
                </tr>
                <tr>
                    <th>Nomor HP</th>
                    <td>{{ $order->phone_number }}</td>
                </tr>
                <tr>
                    <th>Kategori Tiket</th>
                    <td>{{ $order->ticketCategory->name }}</td>
                </tr>
                <tr>
                    <th>Jumlah Tiket</th>
                    <td>{{ $order->quantity }}</td>
                </tr>
                <tr>
                    <th>Total Harga</th>
                    <td>Rp{{ number_format($order->total_price, 2) }}</td>
                </tr>
            </table>
            <p class="mt-3">Silakan unggah bukti pembayaran Anda.</p>
            <form action="{{ route('storePayment', ['buyer_name' => $order->buyer_name]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Upload Bukti Pembayaran:</label>
                    <input type="file" name="payment_proof" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-success">Kirim</button>
            </form>
        </div>
    </div>
</div>
@endsection
