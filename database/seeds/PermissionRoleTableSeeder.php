<?php

use Illuminate\Database\Seeder;

class PermissionRoleTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        \DB::table('permission_role')->truncate();
        
        $permissions = DB::table('permissions')->get();
        foreach ($permissions as $key => $value) {
            DB::table('permission_role')->insert(array (
                'permission_id' => $value->id,
                'role_id' => 1,
            ));
        }
        
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
