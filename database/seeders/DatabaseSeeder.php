<?php

namespace Database\Seeders;

use App\Models\Adm;
use App\Models\Editor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();

        Adm::insert([
            'email' => 'email@lionsoft.com',
            'senha' => Hash::make('AdmLion'),
        ]);
        Editor::insert([
            'nome' => 'Jonathan',
            'email' => 'email@lionsoft.com',
            'cpf' => '123456789',
            'senha' => Hash::make('EdtLion'),
            'status' => 0,
        ]);
    }
}
