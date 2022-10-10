<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\PostComment;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
        ]);
    
        echo "Creating 1k Posts\n";
        
        Post::factory()
            ->count(1000)
            ->for(User::factory()->state([
                'role' => 3,
            ]))
            ->create();
        
        echo "Ok\n";
    
        echo "Creating 50 comments\n";
    
        PostComment::factory()
            ->count(50)
            ->create();
    
        echo "Ok\n";
    
        echo "Creating 50k users, please wait.\n";
        
        User::factory()
            ->count(50000)
            ->create();
    
        echo "Ok.\n";
    }
}
