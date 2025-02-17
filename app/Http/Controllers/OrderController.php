<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\TicketCategory;

class OrderController extends Controller
{
    public function showEvent()
    {
        $event = [
            'name' => 'Music Fest 2025',
            'date' => '2025-08-15',
            'location' => 'Jakarta Convention Center',
            'description' => 'Konser musik terbesar tahun ini dengan berbagai artis papan atas!'
        ];
        $categories = TicketCategory::all();
        return view('event.detail', compact('event', 'categories'));
    }
    
        public function checkout(Request $request)
        {
            $category = TicketCategory::findOrFail($request->ticket_category_id);
            return view('checkout', compact('category', 'request'));
        }
    
        public function placeOrder(Request $request)
        {
            $request->validate([
                'ticket_category_id' => 'required|exists:ticket_categories,id',
                'buyer_name' => 'required|string|max:255',
                'buyer_email' => 'required|email|max:255',
                'phone_number' => 'required|string|max:15',
                'quantity' => 'required|integer|min:1',
            ]);

            // Ambil harga tiket dari database
            $category = TicketCategory::findOrFail($request->ticket_category_id);
            $total_price = $request->quantity * $category->price;

            // Simpan order ke database
            $order = Order::create([
                'ticket_category_id' => $request->ticket_category_id,
                'buyer_name' => $request->buyer_name,
                'buyer_email' => $request->buyer_email,
                'phone_number' => $request->phone_number,
                'quantity' => $request->quantity,
                'total_price' => $total_price, // Pastikan nilai ini benar
            ]);

            return redirect()->route('uploadPayment', ['buyer_name' => $order->buyer_name]);
        }

    
        public function uploadPayment($buyer_name)
        {
            $order = Order::where('buyer_name', $buyer_name)->firstOrFail();
            return view('upload_payment', compact('order'));
        }
    
        public function storePayment(Request $request, $buyer_name)
        {
            $order = Order::where('buyer_name', $buyer_name)->firstOrFail();

            if ($request->hasFile('payment_proof')) {
                // Ambil file dari request
                $file = $request->file('payment_proof');

                // Tentukan nama file dengan format yang lebih jelas
                $fileName = time() . '_' . $file->getClientOriginalName();

                // Simpan file ke storage/app/public/payments
                $path = $file->storeAs('payments', $fileName, 'public');

                // Debug untuk memastikan path tersimpan dengan benar
                // dd($path);

                // Update order dengan path file yang tersimpan
                $order->update([
                    'payment_proof' => $path,
                    'status' => 'pending'
                ]);
                
                // dd($order); // Debug untuk melihat apakah data sudah berubah

                return redirect()->route('success')->with('success', 'Bukti pembayaran berhasil diunggah.');
            } else {
                return back()->withErrors(['payment_proof' => 'File tidak terdeteksi!']);
            }
        }
        public function showOrders()
        {
            // Ambil semua pesanan
            $orders = Order::all(); // Bisa ditambahkan pagination jika data banyak

            return view('admin.orders', compact('orders'));
        }
        public function showOrder($id)
        {
            $order = Order::findOrFail($id);

            return view('admin.show_order', compact('order'));
        }



    }
