<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        /*
        |--------------------------------------------------------------------------
        | ADMIN - INVOICE TEMPLATE
        |--------------------------------------------------------------------------
        */

        $parent = Menu::create([
            'name' => 'Invoice Templates',
            'route' => null,
            'icon' => 'fas fa-file-invoice',
            'order' => 30,
            'is_active' => 1
        ]);

        Menu::insert([
    [
        'name' => 'Master Template',
        'route' => 'invoice-templates.index',
        'icon' => 'fas fa-layer-group',
        'parent_id' => $parent->id,
        'order' => 1,
        'is_active' => 1
    ],
    [
        'name' => 'Template Sections',
        'route' => 'invoice-template-sections.list',
        'icon' => 'fas fa-columns',
        'parent_id' => $parent->id,
        'order' => 2,
        'is_active' => 1
    ],
    [
        'name' => 'Template Fields',
        'route' => 'invoice-template-fields.list',
        'icon' => 'fas fa-list',
        'parent_id' => $parent->id,
        'order' => 3,
        'is_active' => 1
    ],
]);
    }
}