<?php

use Illuminate\Database\Seeder;
use App\Prescription;
class PrescriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Prescription::class, 40)->create();
    }
}
