<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class ProductExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Product::select('product_name','buying_price','selling_price','profit','reg_date','stock','main_stock')->get();
    }

    public function headings(): array
    {
        return [
            'Product Name',
            'Buying Price',
            'Sellind Price',
            'Profit',
            'Registration Date',
            'Stock',
            'Main Stock'
        ];
    }
}
