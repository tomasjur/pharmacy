<?php

use Illuminate\Database\Seeder;
use App\Sale;
class SaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Sale::class, 15)->create();
    }
}
