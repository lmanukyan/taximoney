<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $colors = [
            [
                'name' => 'Красный',
                'price' => 1000,
                'hex' => '#ff0000',
            ],
            [
                'name' => 'Синий',
                'price' => 1000,
                'hex' => '#0000ff',
            ],
            [
                'name' => 'Желтый',
                'price' => 1000,
                'hex' => '#ffff00',
            ]
        ];

        foreach ($colors as $color) {
            Color::create($color);
        }
    }
}
