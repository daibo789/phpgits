<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(SysconfigTableSeeder::class);
        $this->call(AccessTableSeeder::class);
        $this->call(Admin_roleTableSeeder::class);
        $this->call(MenuTableSeeder::class);
        $this->call(AdminTableSeeder::class);
        $this->call(ArctypesTableSeeder::class);
        $this->call(PagesTableSeeder::class);
        $this->call(TaglistsTableSeeder::class);
        $this->call(User_ranksTableSeeder::class);

    }
}
