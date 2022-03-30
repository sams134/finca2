<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Type::create(['gender' => Type::GENDER_MALE, 'name' => 'Chivo']);
        Type::create(['gender' => Type::GENDER_MALE, 'name' => 'Novillo']);
        Type::create(['gender' => Type::GENDER_MALE, 'name' => 'Toro']);
        Type::create(['gender' => Type::GENDER_FEMALE, 'name' => 'Chiva']);
        Type::create(['gender' => Type::GENDER_FEMALE, 'name' => 'Novilla']);
        Type::create(['gender' => Type::GENDER_FEMALE, 'name' => 'Cargada']);
        Type::create(['gender' => Type::GENDER_FEMALE, 'name' => 'Vaca']); //vaca debe de ser 7 para pruebas y crearle hijos
    }
}
