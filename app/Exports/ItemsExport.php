<?php

namespace App\Exports;

use App\Models\Items;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class ItemsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Items::select('item_name','category','reg_date','stock','main_stock')->get();
    }
    public function headings(): array
    {
        return [
            'Product Name',
            'Category',
            'Registration Date',
            'Stock',
            'Main Stock'
        ];
    }
}
