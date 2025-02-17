@extends('layouts.app')

@section('content')
    <h2>Daftar Pesanan</h2>

    <!-- Cek jika ada pesanan -->
    @if ($orders->isEmpty())
        <p>Belum ada pesanan.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>ID Pesanan</th>
                    <th>Nama Pembeli</th>
                    <th>Email</th>
                    <th>Nomor HP</th>
                    <th>Kategori Tiket</th>
                    <th>Jumlah Tiket</th>
                    <th>Total Harga</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->buyer_name }}</td>
                        <td>{{ $order->buyer_email }}</td>
                        <td>{{ $order->phone_number }}</td>
                        <td>{{ $order->ticketCategory->name }}</td>
                        <td>{{ $order->quantity }}</td>
                        <td>Rp{{ number_format($order->total_price, 2) }}</td>
                        <td>{{ ucfirst($order->status) }}</td>
                        <td>
                            <!-- Tombol untuk melihat bukti pembayaran -->
                            <a href="{{ route('admin.showOrder', $order->id) }}" class="btn btn-primary">Lihat Bukti Pembayaran</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
