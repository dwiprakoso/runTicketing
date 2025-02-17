@extends('layouts.app')
@section('content')
<h1>Checkout</h1>
<p>Kategori: {{ $category->name }}</p>
<p>Harga: Rp{{ number_format($category->price, 2) }}</p>
<form action="{{ route('placeOrder') }}" method="POST">
    @csrf
    <input type="hidden" name="ticket_category_id" value="{{ $category->id }}">
    <input type="hidden" name="price" value="{{ $category->price }}">
    <label>Nama: <input type="text" name="buyer_name" required></label>
    <label>Email: <input type="email" name="buyer_email" required></label>
    <label>Jumlah: <input type="number" name="quantity" value="{{ $request->quantity }}" readonly></label>
    <button type="submit">Lanjutkan</button>
</form>
@endsection
