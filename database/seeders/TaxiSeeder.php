<?php

namespace Database\Seeders;

use App\Models\Taxi;
use Illuminate\Database\Seeder;

class TaxiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $carNames = [
            'Toyota Corolla'        => 120000,
            'Honda Civic'           => 150000,
            'Mazda3'                => 160000,
            'Volkswagen Golf'       => 190000,
            'Ford Mustang'          => 200000,
            'Chevrolet Camaro'      => 220000,
            'Dodge Challenger'      => 430000,
            'BMW 3 Series'          => 350000,
            'Mercedes-Benz C-Class' => 550000,
            'Audi A4'               => 300000,
        ];

        foreach ($carNames as $carName => $carPrice) {
            Taxi::factory()->create([
                'name'  => $carName,
                'price' => $carPrice
            ]);
        }
    }
}
