<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // inserted dummy data as placeholderX to check if pagination as any problems
        // please remove it as it pleases you. cheers
        $seeder = [
            'Admin',
            'Student',
            'Guest',
            'Staff',
            'Manager',
            'placeholder1',
            'placeholder2',
            'placeholder3',
            'placeholder4',
        ];

        foreach($seeder as $role){
            Role::create(['name' => $role]);
        }

    }
}
