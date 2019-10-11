<?php

use Illuminate\Database\Seeder;
use App\AgentAdmin;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = AgentAdmin::create([
            'agentName' => 'Anh Tu',
            'agentPrefix' => 'admin_',
            'email' => 'buianhtu3004@gmail.com',
            'password' => bcrypt('123456')
        ]);

        $role = Role::create(['name' => 'Administrator']);

        $permissions = Permission::pluck('id','id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);
    }
}
