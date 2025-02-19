<!DOCTYPE html>
<html>
<head>
    <title>Konfirmasi Pemesanan Tiket</title>
</head>
<body>
    <h2>Halo, {{ $order->buyer_name }}</h2>
    <p>Terima kasih telah melakukan pemesanan tiket untuk acara <strong>{{ $order->ticketCategory->name }}</strong>.</p>
    <p><strong>Kategori Tiket:</strong> {{ $order->ticketCategory->name }}</p>
    <p><strong>Jumlah Tiket:</strong> {{ $order->quantity }}</p>
    <p><strong>Total Harga:</strong> Rp{{ number_format($order->total_price, 0, ',', '.') }}</p>
    <br>
    <p>Silakan upload bukti pembayaran pada link berikut:</p>
    <p><a href="{{ $paymentLink }}" target="_blank">Upload Bukti Pembayaran</a></p>
    <br>
    <p>Terima kasih!</p>
</body>
</html>
