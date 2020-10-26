<?php

namespace App\Imports;

use App\ProductCategory;
use Maatwebsite\Excel\Concerns\ToModel;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ProductCategoriesImport implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new ProductCategory([
            'pro_category_name' => $row[2],
            'pro_category_slug' => $row[3],
            'pro_category_desc' => $row[4],
            'pro_category_status' => $row[5],
            'pro_category_created_at' => Carbon::parse($row[6])->format('Y-m-d H:i:s'),
            'pro_category_updated_at' => Carbon::parse($row[7])->format('Y-m-d H:i:s'),
        ]);
    }

    public function startRow(): int
    {
        return 2;
    }
}
