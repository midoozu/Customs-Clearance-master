<?php

use App\Permission;
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
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 18,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 19,
                'title' => 'customs_clearance_access',
            ],
            [
                'id'    => 20,
                'title' => 'client_create',
            ],
            [
                'id'    => 21,
                'title' => 'client_edit',
            ],
            [
                'id'    => 22,
                'title' => 'client_show',
            ],
            [
                'id'    => 23,
                'title' => 'client_delete',
            ],
            [
                'id'    => 24,
                'title' => 'client_access',
            ],
            [
                'id'    => 25,
                'title' => 'shipping_and_clearance_create',
            ],
            [
                'id'    => 26,
                'title' => 'shipping_and_clearance_edit',
            ],
            [
                'id'    => 27,
                'title' => 'shipping_and_clearance_show',
            ],
            [
                'id'    => 28,
                'title' => 'shipping_and_clearance_delete',
            ],
            [
                'id'    => 29,
                'title' => 'shipping_and_clearance_access',
            ],
            [
                'id'    => 30,
                'title' => 'invoice_create',
            ],
            [
                'id'    => 31,
                'title' => 'invoice_edit',
            ],
            [
                'id'    => 32,
                'title' => 'invoice_show',
            ],
            [
                'id'    => 33,
                'title' => 'invoice_delete',
            ],
            [
                'id'    => 34,
                'title' => 'invoice_access',
            ],
            [
                'id'    => 35,
                'title' => 'setting_access',
            ],
            [
                'id'    => 36,
                'title' => 'invoices_type_create',
            ],
            [
                'id'    => 37,
                'title' => 'invoices_type_edit',
            ],
            [
                'id'    => 38,
                'title' => 'invoices_type_show',
            ],
            [
                'id'    => 39,
                'title' => 'invoices_type_delete',
            ],
            [
                'id'    => 40,
                'title' => 'invoices_type_access',
            ],
            [
                'id'    => 41,
                'title' => 'payment_type_create',
            ],
            [
                'id'    => 42,
                'title' => 'payment_type_edit',
            ],
            [
                'id'    => 43,
                'title' => 'payment_type_show',
            ],
            [
                'id'    => 44,
                'title' => 'payment_type_delete',
            ],
            [
                'id'    => 45,
                'title' => 'payment_type_access',
            ],
            [
                'id'    => 46,
                'title' => 'invoice_translate_create',
            ],
            [
                'id'    => 47,
                'title' => 'invoice_translate_edit',
            ],
            [
                'id'    => 48,
                'title' => 'invoice_translate_show',
            ],
            [
                'id'    => 49,
                'title' => 'invoice_translate_delete',
            ],
            [
                'id'    => 50,
                'title' => 'invoice_translate_access',
            ],
            [
                'id'    => 51,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
