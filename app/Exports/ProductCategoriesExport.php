<?php

namespace App\Exports;

use App\ProductCategory;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ProductCategoriesExport implements FromView
{
    // /**
    // * @return \Illuminate\Support\Collection
    // */
    // public function collection()
    // {
    //     return ProductCategory::all();
    // }

    public function view(): View
    {
        return view('backend.product_category.excel', [
            'listProductCategories' => ProductCategory::all()
        ]);
    }

}
