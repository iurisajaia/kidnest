<?php

namespace Database\Seeders;

use App\Enums\UserRoleEnum;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!DB::table('roles')->count()) {
            foreach (UserRoleEnum::getValues() as $role) {
                Role::create([
                    'title' => $role['title'],
                    'key' => $role['key']
                ]);
            }
        }

    }
}
