
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Event Ticketing</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            display: flex;
            flex-direction: column;
            height: 100vh;
            background-color: #eef5ff;
            font-family: Arial, sans-serif;
        }
        header {
            width: 100%;
            background-color: #2c3e50;
            color: white;
            padding: 20px;
            text-align: center;
            font-size: 24px;
            font-weight: bold;
        }
        .container {
            display: flex;
            flex: 1;
            padding: 20px;
            gap: 20px;
        }
        .left-section {
            background-color: #3498db;
            color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
            /* display: flex; */
            justify-content: center;
            align-items: center;
            flex-direction: column;
            aspect-ratio: 16 / 9;
            width: 30%;
            max-width: 400px;
        }
        .left-section img {
            max-width: 100%;
            border-radius: 8px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.2);
        }
        .left-section .event-description {
            margin-top: 20px;
            text-align: justify;
        }
        .right-section {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }
        .top-content, .bottom-content {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
        }
        .top-content {
            min-height: 150px;
            border-left: 5px solid #2980b9;
        }
        .bottom-content {
            flex: 1;
        }
        .buttons {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin: 20px 0;
        }
        .buttons div {
            background: linear-gradient(135deg, #2980b9, #6dd5fa);
            padding: 10px 20px;
            color: white;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
        }
        .buttons div:hover {
            background: linear-gradient(135deg, #1e6091, #56c1e6);
        }
    </style>
</head>
<body>
    <header>
        Event Ticketing
    </header>
    <div class="container">
        <div class="right-section">
            <div class="bottom-content"><h2>Daftar Pesanan</h2>

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
            </div>
        </div>
    </div>
</body>
</html>