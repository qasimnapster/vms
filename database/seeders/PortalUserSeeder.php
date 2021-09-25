<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin\PortalUser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
// use Carbon/Carbon;

class PortalUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PortalUser::insert([
            'first_name' => 'Admin',
            'last_name' => 'Admin',
            'email' => 'admin@vms.com',
            'password' => Hash::make('12345678'),
            'created_at' => Carbon::now(),
        ]);
    }
}
