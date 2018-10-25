<?php

use Illuminate\Database\Seeder;
use App\Model\Product;
use App\Model\Review;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        // create 5 users
        factory(App\User::class,5)->create();
        // create 50 random data of products
        factory(Product::class,50)->create();

        // create 400 random data of review of products
        factory(Review::class,400)->create();
    }
}
