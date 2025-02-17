@extends('layouts.app')
@section('content')
{{-- <h1>Nama Event</h1> --}}
{{-- @foreach($categories as $category)
    <div>
        <h2>{{ $category->name }}</h2>
        <p>Harga: Rp{{ number_format($category->price, 2) }}</p>
        <form action="{{ route('checkout') }}" method="POST">
            @csrf
            <input type="hidden" name="ticket_category_id" value="{{ $category->id }}">
            <input type="number" name="quantity" min="1" required>
            <button type="submit">Beli</button>
        </form>
    </div>
@endforeach --}}
<form id="orderForm" action="{{ route('placeOrder') }}" method="POST">
    @csrf
    <h2 class="formbold-form-title">Register now</h2>

    <div>
        <label for="buyer_name" class="formbold-form-label">Nama Lengkap</label>
        <input type="text" name="buyer_name" id="buyer_name" class="formbold-form-input" required>
    </div>

    <div class="formbold-input-flex">
        <div>
            <label for="buyer_email" class="formbold-form-label">Email</label>
            <input type="email" name="buyer_email" id="buyer_email" class="formbold-form-input" required>
        </div>
        <div>
            <label for="phone_number" class="formbold-form-label">Nomor HP</label>
            <input type="text" name="phone_number" id="phone_number" class="formbold-form-input" required>
        </div>
    </div>

    <div class="formbold-input-flex">
        <div>
            <label for="ticket_category_id" class="formbold-form-label">Kategori Tiket</label>
            <select class="formbold-form-input" id="ticket_category_id" name="ticket_category_id" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" data-price="{{ $category->price }}">
                        {{ $category->name }} | Rp{{ number_format($category->price, 2) }}
                    </option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="quantity" class="formbold-form-label">Jumlah Tiket</label>
            <input type="number" name="quantity" id="quantity" class="formbold-form-input" min="1" required>
        </div>
    </div>

    <button type="button" class="formbold-btn" id="previewOrder">Lihat Detail</button>
</form>

<!-- Bootstrap Modal -->
<div class="modal fade" id="orderModal" tabindex="-1" aria-labelledby="orderModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="orderModalLabel">Konfirmasi Pemesanan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p><strong>Nama:</strong> <span id="modalBuyerName"></span></p>
          <p><strong>Email:</strong> <span id="modalBuyerEmail"></span></p>
          <p><strong>Nomor HP:</strong> <span id="modalPhoneNumber"></span></p>
          <p><strong>Kategori Tiket:</strong> <span id="modalTicketCategory"></span></p>
          <p><strong>Harga Satuan:</strong> Rp<span id="modalTicketPrice"></span></p>
          <p><strong>Jumlah Tiket:</strong> <span id="modalQuantity"></span></p>
          <p><strong>Total Harga:</strong> Rp<span id="modalTotalPrice"></span></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary" id="confirmOrder">Konfirmasi & Pesan</button>
        </div>
      </div>
    </div>
  </div>
  

<!-- Bootstrap & JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.getElementById('previewOrder').addEventListener('click', function() {
    // Ambil data dari form
    let buyerName = document.getElementById('buyer_name').value;
    let buyerEmail = document.getElementById('buyer_email').value;
    let phoneNumber = document.getElementById('phone_number').value;
    let ticketCategory = document.getElementById('ticket_category_id');
    let selectedOption = ticketCategory.options[ticketCategory.selectedIndex];
    let ticketName = selectedOption.text;
    let ticketPrice = selectedOption.getAttribute('data-price');
    let quantity = document.getElementById('quantity').value;
    let totalPrice = ticketPrice * quantity;

    // Masukkan data ke modal
    document.getElementById('modalBuyerName').textContent = buyerName;
    document.getElementById('modalBuyerEmail').textContent = buyerEmail;
    document.getElementById('modalPhoneNumber').textContent = phoneNumber;
    document.getElementById('modalTicketCategory').textContent = ticketName;
    document.getElementById('modalTicketPrice').textContent = new Intl.NumberFormat('id-ID').format(ticketPrice);
    document.getElementById('modalQuantity').textContent = quantity;
    document.getElementById('modalTotalPrice').textContent = new Intl.NumberFormat('id-ID').format(totalPrice);

    // Tampilkan modal
    let orderModal = new bootstrap.Modal(document.getElementById('orderModal'));
    orderModal.show();
});

// Submit form ketika konfirmasi ditekan
document.getElementById('confirmOrder').addEventListener('click', function() {
    let form = document.getElementById('orderForm');

    // Pastikan form tidak kosong sebelum dikirim
    if (form.checkValidity()) {
        form.submit();
    } else {
        alert("Harap isi semua data sebelum mengirim.");
    }
});
</script>

          <style>
            @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
            * {
              margin: 0;
              padding: 0;
              box-sizing: border-box;
            }
            body {
              font-family: 'Inter', sans-serif;
            }
            .formbold-main-wrapper {
              display: flex;
              align-items: center;
              justify-content: center;
              padding: 48px;
            }
          
            .formbold-form-wrapper {
              margin: 0 auto;
              max-width: 550px;
              width: 100%;
              background: white;
            }
          
            .formbold-event-wrapper span {
              font-weight: 500;
              font-size: 16px;
              line-height: 24px;
              letter-spacing: 2.5px;
              color: #6a64f1;
              display: inline-block;
              margin-bottom: 12px;
            }
            .formbold-event-wrapper h3 {
              font-weight: 700;
              font-size: 28px;
              line-height: 34px;
              color: #07074d;
              width: 60%;
              margin-bottom: 15px;
            }
            .formbold-event-wrapper h4 {
              font-weight: 600;
              font-size: 20px;
              line-height: 24px;
              color: #07074d;
              width: 60%;
              margin: 25px 0 15px;
            }
            .formbold-event-wrapper p {
              font-size: 16px;
              line-height: 24px;
              color: #536387;
            }
          
            .formbold-event-details {
              background: #fafafa;
              border: 1px solid #dde3ec;
              border-radius: 5px;
              margin: 25px 0 30px;
            }
            .formbold-event-details h5 {
              color: #07074d;
              font-weight: 600;
              font-size: 18px;
              line-height: 24px;
              padding: 15px 25px;
            }
            .formbold-event-details ul {
              border-top: 1px solid #edeef2;
              padding: 25px;
              margin: 0;
              list-style: none;
              display: flex;
              flex-wrap: wrap;
              row-gap: 14px;
            }
            .formbold-event-details ul li {
              color: #536387;
              font-size: 16px;
              line-height: 24px;
              width: 50%;
              display: flex;
              align-items: center;
              gap: 10px;
            }
          
            .formbold-form-title {
              color: #07074d;
              font-weight: 600;
              font-size: 28px;
              line-height: 35px;
              width: 60%;
              margin-bottom: 30px;
            }
          
            .formbold-input-flex {
              display: flex;
              gap: 20px;
              margin-bottom: 15px;
            }
            .formbold-input-flex > div {
              width: 50%;
            }
            .formbold-form-input {
              width: 100%;
              padding: 13px 22px;
              border-radius: 5px;
              border: 1px solid #dde3ec;
              background: #ffffff;
              font-weight: 500;
              font-size: 16px;
              color: #536387;
              outline: none;
              resize: none;
            }
            .formbold-form-input:focus {
              border-color: #6a64f1;
              box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.05);
            }
            .formbold-form-label {
              color: #536387;
              font-size: 14px;
              line-height: 24px;
              display: block;
              margin-bottom: 10px;
            }
          
            .formbold-policy {
              font-size: 14px;
              line-height: 24px;
              color: #536387;
              width: 70%;
              margin-top: 22px;
            }
            .formbold-policy a {
              color: #6a64f1;
            }
            .formbold-btn {
              text-align: center;
              width: 100%;
              font-size: 16px;
              border-radius: 5px;
              padding: 14px 25px;
              border: none;
              font-weight: 500;
              background-color: #6a64f1;
              color: white;
              cursor: pointer;
              margin-top: 25px;
            }
            .formbold-btn:hover {
              box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.05);
            }
          </style>
@endsection
