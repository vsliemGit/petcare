<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(ProductCategoriesTableSeeder::class);
        $this->call(BrandsTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(ProductDetailsTableSeeder::class);
        $this->call(TransfersTableSeeder::class);
        $this->call(PaymentsTableSeeder::class);
        $this->call(ServicesTableSeeder::class);
        $this->call(ServiceDetailsTableSeeder::class);
        $this->call(BannersTableSeeder::class); 
        $this->call(StoresTableSeeder::class);        
    }
    
}
