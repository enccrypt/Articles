<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comment;
use App\Models\User;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Получаем пользователей с user_id 1 и 2
        $users = User::whereIn('id', [1, 2])->get();

        $users->each(function ($user) {
            // Создаем 5 комментариев от каждого пользователя
            Comment::factory()->count(5)->create([
                'user_id' => $user->id
            ]);
        });
    }
}