<?php

namespace Database\Seeders;

use App\Models\Adm;
use App\Models\Editor;
use App\Models\Post;
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

        Editor::insert([
            "nome" => "Jonathan",
            "email" => "email@lionsoft.com",
            "cpf" => "123456789",
            "senha" => Hash::make("123"),
        ]);
        Adm::insert([
            "email" => "email@lionsoft.com",
            "senha" => Hash::make("123"),
        ]);

        Post::insert([
            "titulo" => "Teste Titulo",
            "descricao" => "teste descricao",
            "editor_id" => "1"
        ]);
    }
}
