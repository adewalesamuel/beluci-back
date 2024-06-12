<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $menu = Menu::first();

        DB::table('menu_items')->insert([
            [
                'name' => 'Accueil',
                'slug' => 'accueil',
                'icon_url' => '',
                'is_accent' => false,
                'menu_item_id' => null,
                'type' => 'link',
                'menu_id' => $menu->id
            ],
            [
                'name' => 'Services',
                'slug' => 'nos-services',
                'icon_url' => '',
                'is_accent' => false,
                'menu_item_id' => null,
                'type' => 'link',
                'menu_id' => $menu->id
            ],
            [
                'name' => 'Nos évènements',
                'slug' => 'nos-evenements',
                'icon_url' => '',
                'is_accent' => false,
                'menu_item_id' => null,
                'type' => 'link',
                'menu_id' => $menu->id
            ],
            [
                'name' => 'Pem N\'zassa',
                'slug' => 'pem-nzassa',
                'icon_url' => '',
                'is_accent' => false,
                'menu_item_id' => null,
                'type' => 'link',
                'menu_id' => $menu->id
            ],
            [
                'name' => 'Contact',
                'slug' => 'contact',
                'icon_url' => '',
                'is_accent' => false,
                'menu_item_id' => null,
                'type' => 'link',
                'menu_id' => $menu->id
            ],
            [
                'name' => 'Adhérez à la beluci',
                'slug' => 'devenir-membre',
                'icon_url' => '',
                'is_accent' => false,
                'menu_item_id' => null,
                'type' => 'button',
                'menu_id' => $menu->id
            ]
        ]);
    }
}
