<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['buyer_name', 'buyer_email', 'phone_number', 'ticket_category_id', 'quantity', 'total_price', 'payment_proof', 'status'];


    public function ticketCategory()
    {
        return $this->belongsTo(TicketCategory::class);
    }
}
