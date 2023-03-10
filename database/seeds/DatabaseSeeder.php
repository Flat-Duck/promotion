<?php

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
        // $this->call(UsersTableSeeder::class);
    //    $this->call(ProviderTableSeeder::class);
      //  $this->call(ServiceTableSeeder::class);
        $this->call(AdminsTableSeeder::class);
        $this->call(DepartmentsSeeder::class);
        $this->call(SpecializationSeeder::class);
    }
}
