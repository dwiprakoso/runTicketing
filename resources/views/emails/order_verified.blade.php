<!DOCTYPE html>
<html>
<head>
    <title>Pesanan Anda Telah Diverifikasi</title>
</head>
<body>
    <h2>Halo, {{ $order->buyer_name }}</h2>
    <p>Pesanan Anda dengan ID <strong>#{{ $order->id }}</strong> telah berhasil diverifikasi.</p>
    <p>Terima kasih telah membeli tiket di event kami!</p>
    <p>Detail Pemesanan:</p>
    <ul>
        <li>Kategori Tiket: {{ $order->ticketCategory->name }}</li>
        <li>Jumlah Tiket: {{ $order->quantity }}</li>
        <li>Total Harga: Rp{{ number_format($order->total_price, 2) }}</li>
    </ul>
    <p>Silakan tunjukkan email ini saat menghadiri acara.</p>
    <p>Salam,</p>
    <p>Panitia Event</p>
</body>
</html>
