<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;

class RoleSeeder extends Seeder
{
    public function run()
    {
        // Create roles
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $userRole = Role::firstOrCreate(['name' => 'user']);

        // Assign roles to users
        $admin = User::find(1); // Adjust the user ID as needed
        if ($admin) {
            $admin->assignRole($adminRole);
        }

        $user = User::find(2); // Adjust the user ID as needed
        if ($user) {
            $user->assignRole($userRole);
        }
    }
}
