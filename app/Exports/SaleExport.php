<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;

class SaleExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $order = Order::select('id', 'order_id', 'invoice', 'order_date', 'paymentmethod', 'total_amount', 'received_amount', 'discount', 'vat', 'discount_tk', 'due', 'vat_tk', 'order_status')->get();
        return $order;
    }
}
