<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'allMight@app.com',
            'email_verified_at' => $now->toDateTimeString(),
            'password' => bcrypt('123456'),
        ]);
        $admin->assignRole('admin');

        $users = factory(App\User::class, 30)->create();
        foreach ($users as $user) {
            $user->assignRole('user');
        }
    }
}
