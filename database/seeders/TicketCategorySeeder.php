<?php

namespace Database\Seeders;

use App\Models\TicketCategory;
use Illuminate\Database\Seeder;

class TicketCategorySeeder extends Seeder
{
    public function run()
    {
        TicketCategory::create(['name' => 'VIP', 'price' => 500000]);
        TicketCategory::create(['name' => 'Regular', 'price' => 200000]);
    }
}

