<?php

namespace App\Exports;

use App\Models\Purchase;
use Maatwebsite\Excel\Concerns\FromCollection;

class PurchasesExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {

        $purchase = Purchase::select('date', 'orderID', 'total_payment', 'due', 'payment_status')->get();
        return $purchase;
    }
}
