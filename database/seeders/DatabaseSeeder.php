<?php

// database/seeders/ItemSeeder.php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('item')->insert([
            'name' => 'Product 1',
            'description' => 'Description of Product 1',
            'quantity' => 10,
            'price' => 29.99,
            'category' => 'Electronics',
            'variationID' => 'VAR001',
            'brandID' => 1,
            // Add other fields as needed
            'created_time' => now(),
            'update_time' => now(),
        ]);

        // Add more records as needed
    }
}
