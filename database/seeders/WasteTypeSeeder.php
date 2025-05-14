<?php

namespace Database\Seeders;

use App\Models\WasteType;
use Illuminate\Database\Seeder;

class WasteTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $wasteTypes = [
            [
                'name' => 'Kertas',
                'price_per_kg' => 2000,
                'description' => 'Kertas bekas, koran, kardus, dll',
                'status' => 'active',
            ],
            [
                'name' => 'Plastik',
                'price_per_kg' => 3000,
                'description' => 'Botol plastik, wadah plastik, kantong plastik, dll',
                'status' => 'active',
            ],
            [
                'name' => 'Logam',
                'price_per_kg' => 10000,
                'description' => 'Besi, aluminium, dan logam lainnya',
                'status' => 'active',
            ],
            [
                'name' => 'Kaca',
                'price_per_kg' => 1500,
                'description' => 'Botol kaca, potongan kaca, dll',
                'status' => 'active',
            ],
            [
                'name' => 'Elektronik',
                'price_per_kg' => 15000,
                'description' => 'Sampah elektronik, komponen elektronik bekas',
                'status' => 'active',
            ],
        ];

        foreach ($wasteTypes as $wasteType) {
            WasteType::create($wasteType);
        }
    }
}
