<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'setting_create',
            ],
            [
                'id'    => 18,
                'title' => 'setting_edit',
            ],
            [
                'id'    => 19,
                'title' => 'setting_show',
            ],
            [
                'id'    => 20,
                'title' => 'setting_delete',
            ],
            [
                'id'    => 21,
                'title' => 'setting_access',
            ],
            [
                'id'    => 22,
                'title' => 'website_create',
            ],
            [
                'id'    => 23,
                'title' => 'website_edit',
            ],
            [
                'id'    => 24,
                'title' => 'website_show',
            ],
            [
                'id'    => 25,
                'title' => 'website_delete',
            ],
            [
                'id'    => 26,
                'title' => 'website_access',
            ],
            [
                'id'    => 27,
                'title' => 'service_create',
            ],
            [
                'id'    => 28,
                'title' => 'service_edit',
            ],
            [
                'id'    => 29,
                'title' => 'service_show',
            ],
            [
                'id'    => 30,
                'title' => 'service_delete',
            ],
            [
                'id'    => 31,
                'title' => 'service_access',
            ],
            [
                'id'    => 32,
                'title' => 'team_create',
            ],
            [
                'id'    => 33,
                'title' => 'team_edit',
            ],
            [
                'id'    => 34,
                'title' => 'team_show',
            ],
            [
                'id'    => 35,
                'title' => 'team_delete',
            ],
            [
                'id'    => 36,
                'title' => 'team_access',
            ],
            [
                'id'    => 37,
                'title' => 'testimonial_create',
            ],
            [
                'id'    => 38,
                'title' => 'testimonial_edit',
            ],
            [
                'id'    => 39,
                'title' => 'testimonial_show',
            ],
            [
                'id'    => 40,
                'title' => 'testimonial_delete',
            ],
            [
                'id'    => 41,
                'title' => 'testimonial_access',
            ],
            [
                'id'    => 42,
                'title' => 'gallery_collection_create',
            ],
            [
                'id'    => 43,
                'title' => 'gallery_collection_edit',
            ],
            [
                'id'    => 44,
                'title' => 'gallery_collection_show',
            ],
            [
                'id'    => 45,
                'title' => 'gallery_collection_delete',
            ],
            [
                'id'    => 46,
                'title' => 'gallery_collection_access',
            ],
            [
                'id'    => 47,
                'title' => 'certificate_create',
            ],
            [
                'id'    => 48,
                'title' => 'certificate_edit',
            ],
            [
                'id'    => 49,
                'title' => 'certificate_show',
            ],
            [
                'id'    => 50,
                'title' => 'certificate_delete',
            ],
            [
                'id'    => 51,
                'title' => 'certificate_access',
            ],
            [
                'id'    => 52,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
