<?php

namespace Database\Seeders;

use App\Models\Comment_type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Comment_type::create(['id'=>1,'name' => 'Comentarios']);
        comment_type::create(['id'=>2,'name' => 'Pesa','icon' => 'fas fa-weight']);
    }
}
