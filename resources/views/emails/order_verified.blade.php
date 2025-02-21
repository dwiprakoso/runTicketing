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
    <p>Notes untuk Penukaran E-Ticket:</p>
    <p class="mt-3">Penukaran E-Ticket:</p>
    <p>E-ticket Anda harus ditukarkan dengan tiket fisik atau wristband pada hari H acara.</p>
    <p class="mt-3">Lokasi Penukaran:</p>
    <p>Informasi detail mengenai lokasi dan waktu penukaran tiket akan diumumkan melalui akun Instagram resmi Ticketify Official. Pastikan Anda mengikuti akun tersebut untuk mendapatkan informasi terkini.
    </p>
    <p class="mt-3">Syarat Penukaran:</p>
    <p>Tunjukkan e-ticket yang telah Anda terima melalui email ini (baik dalam bentuk cetak maupun digital)</p>
    <p class="mt-3">Terima kasih atas partisipasi Anda, dan kami tidak sabar untuk bertemu di acara ini! 🎉</p>
    <p class="mt-3">Thanks,</p>
    <p>Ticketify Team</p>


</body>
</html>
