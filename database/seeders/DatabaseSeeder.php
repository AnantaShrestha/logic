<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public $adminPassword = '$2y$10$JcmAHe5eUZ2rS0jU1GWr/.xhwCnh2RU13qwjTPcqfmtZXjZxcryPO';
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \DB::connection('mysql')->table('admin_user')->insert(
            [
                ['id' => '1', 'username' =>'admin', 'password' => $this->adminPassword, 'email' => 'ianantashrestha@gmail.com', 'name' => 'Administrator', 'avatar' => '/admin/avatar/user.jpg', 'created_at' => date('Y-m-d H:i:s')],
            ]
        );
        \DB::statement("INSERT INTO `admin_menu` (`id`, `parent_id`, `sort`, `title`, `icon`, `uri`, `created_at`, `updated_at`) VALUES
            (1, 0, 0, 'Main Menu', NULL, NULL, '2021-10-22 23:35:10', '2021-10-23 01:48:12'),
            (2, 1, 0, 'Dashboard', 'fab fa-windows', NULL, '2021-10-22 23:36:01', '2021-10-22 23:36:01'),
            (3, 0, 0, 'Settings', NULL, 'admin/role/create', '2021-10-22 23:39:25', '2021-10-22 23:39:25'),
            (4, 2, 0, 'Home', NULL, 'admin/index', '2021-10-22 23:41:12', '2021-10-22 23:41:12'),
            (5, 3, 0, 'Admin Global', 'fas fa-bars', NULL, '2021-10-22 23:42:19', '2021-10-22 23:42:19'),
            (6, 5, 0, 'Admin Menu', NULL, NULL, '2021-10-22 23:43:58', '2021-10-22 23:43:58'),
            (7, 3, 0, 'User Management', 'far fa-user', NULL, '2021-10-22 23:44:38', '2021-10-22 23:44:38'),
            (8, 7, 0, 'Roles', NULL, NULL, '2021-10-22 23:45:01', '2021-10-22 23:45:01'),
            (9, 7, 0, 'Permission', NULL, NULL, '2021-10-22 23:45:16', '2021-10-22 23:45:16'),
            (10, 7, 0, 'User', NULL, NULL, '2021-10-22 23:45:31', '2021-10-22 23:45:31'),
            (11, 8, 0, 'Create Role', NULL, 'admin/role/create', '2021-10-23 02:23:12', '2021-10-23 02:23:12'),
            (12, 8, 0, 'List of Role', NULL, 'admin/role/index', '2021-10-23 02:23:51', '2021-10-23 02:23:51'),
            (13, 9, 0, 'Create Permission', NULL, 'admin/permission/create', '2021-10-23 02:24:20', '2021-10-23 02:24:20'),
            (14, 9, 0, 'List of Permission', NULL, 'admin/permission/index', '2021-10-23 02:25:36', '2021-10-23 02:25:36'),
            (15, 10, 0, 'Create User', NULL, 'admin/user/create', '2021-10-23 02:25:58', '2021-10-23 02:25:58'),
            (16, 10, 0, 'List Of User', NULL, 'admin/user/index', '2021-10-23 02:26:27', '2021-10-23 02:26:27'),
            (17, 6, 0, 'List of Menu', NULL, 'admin/menu/index', '2021-10-23 02:26:50', '2021-10-23 02:27:03')");
        \DB::statement("INSERT INTO `permissions` (`id`, `name`, `slug`, `http_uri`, `created_at`, `updated_at`) VALUES
        (1, 'Administrator', 'administrator', 'admin/*', '2021-10-23 12:42:10', '2021-10-23 12:42:10'),
        (2, 'Permission Control', 'role-permission-manager', 'admin/permission/index,admin/permission/create,admin/permission/edit/{id},admin/permission/delete/{id}', '2021-10-23 13:05:44', '2021-10-23 13:06:42'),
        (3, 'Role Control', 'role-control', 'admin/role/index,admin/role/create,admin/role/edit/{id},admin/role/delete/{id}', '2021-10-23 13:07:01', '2021-10-23 13:07:01'),
        (4, 'Menu Control', 'menu-control', 'admin/menu/index,admin/menu/edit/{id},admin/menu/delete/{id},admin/menu/create', '2021-10-23 13:07:19', '2021-10-23 13:07:19'),
        (5, 'User Control', 'user-control', 'admin/user/index,admin/user/create,admin/user/edit/{id},admin/user/delete/{id}', '2021-10-23 13:07:47', '2021-10-23 13:07:47')
        ");
        \DB::statement("INSERT INTO `roles` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
            (1, 'System Admin', 'administrator', '2021-10-23 12:42:30', '2021-10-23 12:42:30'),
            (2, 'User Management Manager', 'user-management-manager', '2021-10-23 13:08:52', '2021-10-23 13:08:52')");

        \DB::statement("INSERT INTO `admin_role` (`role_id`, `admin_id`, `created_at`, `updated_at`) VALUES
                (1, 1, NULL, NULL)");
    }

   
}
