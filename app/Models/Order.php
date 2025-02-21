<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'ticket_category_id', 
        'buyer_name', 
        'buyer_email', 
        'phone_number', 
        'quantity', 
        'total_price',
        'payment_proof', // Pastikan ini ada
        'status'
    ];
    

    public function ticketCategory()
    {
        return $this->belongsTo(TicketCategory::class);
    }
}
