<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

/**
 * ProductsSeeder Class
 * @package Database\Seeders
 */
class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        foreach ($this->data() as $item) {
            Product::create($item);
        }
    }

    /**
     * @return array
     */
    protected function data() : array
    {
        return [
            [
                "name" => "Плед для пикника с логотипом",
                "src" => "images/products/plaid.png",
                "cost" => 0,
                "setting_id" => 2,
                "settings" => [
                    "#c4c4c4",
                    "#2e2e2e",
                    "#f9b400",
                    "#df3333"
                ]
            ],
            [
                "name" => "Деревянная подставка под горячее с логотипом",
                "src" => "images/products/stand.png",
                "cost" => 0,
                "setting_id" => 2,
                "settings" => [
                    "#c4c4c4",
                    "#2e2e2e",
                    "#f9b400",
                    "#df3333"
                ]
            ],
            [
                "name" => "Панама черная с логотипом",
                "src" => "images/products/droplets.png",
                "cost" => 0,
                "setting_id" => 2,
                "settings" => [
                    "#c4c4c4",
                    "#2e2e2e",
                    "#f9b400",
                    "#df3333"
                ]
            ],
            [
                "name" => "Кепка черная с логотипом",
                "src" => "images/products/cap.png",
                "cost" => 0,
                "setting_id" => 2,
                "settings" => [
                    "#c4c4c4",
                    "#2e2e2e",
                    "#f9b400",
                    "#df3333"
                ]
            ],
            [
                "name" => "Домашние тапочки с логотипом",
                "src" => "images/products/slippers.png",
                "cost" => 0,
                "setting_id" => 2,
                "settings" => [
                    "#c4c4c4",
                    "#2e2e2e",
                    "#f9b400",
                    "#df3333"
                ]
            ],
            [
                "name" => "Носки с логотипом",
                "src" => "images/products/socks.png",
                "cost" => 0,
                "setting_id" => 2,
                "settings" => [
                    "#c4c4c4",
                    "#2e2e2e",
                    "#f9b400",
                    "#df3333"
                ]
            ],
            [
                "name" => "Маска для лица защитная с логотипом",
                "src" => "images/products/mask.png",
                "cost" => 0,
                "setting_id" => 2,
                "settings" => [
                    "#c4c4c4",
                    "#2e2e2e",
                    "#f9b400",
                    "#df3333"
                ]
            ],
            [
                "name" => "Ланчбокс с логотипом",
                "src" => "images/products/lunchbox.png",
                "cost" => 0,
                "setting_id" => 2,
                "settings" => [
                    "#c4c4c4",
                    "#2e2e2e",
                    "#f9b400",
                    "#df3333"
                ]
            ],
            [
                "name" => "Керамическая кружка с логотипом",
                "src" => "images/products/ceramicmag.png",
                "cost" => 0,
                "setting_id" => 2,
                "settings" => [
                    "#c4c4c4",
                    "#2e2e2e",
                    "#f9b400",
                    "#df3333"
                ]
            ],
            [
                "name" => "Аудиоколонка с логотипом",
                "src" => "images/products/speaker.png",
                "cost" => 0,
                "setting_id" => 2,
                "settings" => [
                    "#c4c4c4",
                    "#2e2e2e",
                    "#f9b400",
                    "#df3333"
                ]
            ],
            [
                "name" => "Мультитул с логотипом",
                "src" => "images/products/multitool.png",
                "cost" => 0,
                "setting_id" => 2,
                "settings" => [
                    "#c4c4c4",
                    "#2e2e2e",
                    "#f9b400",
                    "#df3333"
                ]
            ],
            [
                "name" => "Тюбинг с логотипом",
                "src" => "images/products/tubing.png",
                "cost" => 0,
                "setting_id" => 2,
                "settings" => [
                    "#c4c4c4",
                    "#2e2e2e",
                    "#f9b400",
                    "#df3333"
                ]
            ],
            [
                "name" => "Зонт с логотипом",
                "src" => "images/products/umbrella.png",
                "cost" => 0,
                "setting_id" => 2,
                "settings" => [
                    "#c4c4c4",
                    "#2e2e2e",
                    "#f9b400",
                    "#df3333"
                ]
            ],
            [
                "name" => "Значок с логотипом",
                "src" => "images/products/badge.png",
                "cost" => 0,
                "setting_id" => 2,
                "settings" => [
                    "#c4c4c4",
                    "#2e2e2e",
                    "#f9b400",
                    "#df3333"
                ]
            ],
            [
                "name" => "Беспроводное зарядное устройство 15ВТ с логотипом",
                "src" => "images/products/wirelessdevice.png",
                "cost" => 0,
                "setting_id" => 2,
                "settings" => [
                    "#c4c4c4",
                    "#2e2e2e",
                    "#f9b400",
                    "#df3333"
                ]
            ],
            [
                "name" => "Брелок с логотипом",
                "src" => "images/products/trinket.png",
                "cost" => 0,
                "setting_id" => 2,
                "settings" => [
                    "#c4c4c4",
                    "#2e2e2e",
                    "#f9b400",
                    "#df3333"
                ]
            ],
            [
                "name" => "Power Bank с логотипом",
                "src" => "images/products/powerbank.png",
                "cost" => 0,
                "setting_id" => 2,
                "settings" => [
                    "#c4c4c4",
                    "#2e2e2e",
                    "#f9b400",
                    "#df3333"
                ]
            ],
            [
                "name" => "Беспроводное автомобильное зарядное устройство с логотипом",
                "src" => "images/products/wirelesscar.png",
                "cost" => 0,
                "setting_id" => 2,
                "settings" => [
                    "#c4c4c4",
                    "#2e2e2e",
                    "#f9b400",
                    "#df3333"
                ]
            ],
            [
                "name" => "Чехол для карт с логотипом",
                "src" => "images/products/case.png",
                "cost" => 0,
                "setting_id" => 2,
                "settings" => [
                    "#c4c4c4",
                    "#2e2e2e",
                    "#f9b400",
                    "#df3333"
                ]
            ],
            [
                "name" => "Бутылка для воды с логотипом",
                "src" => "images/products/bottleforwater.png",
                "cost" => 0,
                "setting_id" => 2,
                "settings" => [
                    "#c4c4c4",
                    "#2e2e2e",
                    "#f9b400",
                    "#df3333"
                ]
            ],
            [
                "name" => "Ежедневник с логотипом",
                "src" => "images/products/note.png",
                "cost" => 0,
                "setting_id" => 2,
                "settings" => [
                    "#c4c4c4",
                    "#2e2e2e",
                    "#f9b400",
                    "#df3333"
                ]
            ],
            [
                "name" => "Бирка для багажа c логотипом",
                "src" => "images/products/tag.png",
                "cost" => 0,
                "setting_id" => 2,
                "settings" => [
                    "#c4c4c4",
                    "#2e2e2e",
                    "#f9b400",
                    "#df3333"
                ]
            ],
            [
                "name" => "Подушка для перелета с логотипом",
                "src" => "images/products/pillow.png",
                "cost" => 0,
                "setting_id" => 2,
                "settings" => [
                    "#c4c4c4",
                    "#2e2e2e",
                    "#f9b400",
                    "#df3333"
                ]
            ],
            [
                "name" => "Рюкзак с логотипом",
                "src" => "images/products/backpack.png",
                "cost" => 0,
                "setting_id" => 2,
                "settings" => [
                    "#c4c4c4",
                    "#2e2e2e",
                    "#f9b400",
                    "#df3333"
                ]
            ],
            [
                "name" => "Полотенце с логотипом",
                "src" => "images/products/towel.png",
                "cost" => 0,
                "setting_id" => 2,
                "settings" => [
                    "#c4c4c4",
                    "#2e2e2e",
                    "#f9b400",
                    "#df3333"
                ]
            ],
            [
                "name" => "Складная бутылка для воды с логотипом",
                "src" => "images/products/secondbottle.png",
                "cost" => 0,
                "setting_id" => 2,
                "settings" => [
                    "#c4c4c4",
                    "#2e2e2e",
                    "#f9b400",
                    "#df3333"
                ]
            ],
            [
                "name" => "Термокружка с логотипом",
                "src" => "images/products/thermomug.png",
                "cost" => 0,
                "setting_id" => 2,
                "settings" => [
                    "#c4c4c4",
                    "#2e2e2e",
                    "#f9b400",
                    "#df3333"
                ]
            ],
            [
                "name" => "Термос с логотипом",
                "src" => "images/products/thermos.png",
                "cost" => 0,
                "setting_id" => 2,
                "settings" => [
                    "#c4c4c4",
                    "#2e2e2e",
                    "#f9b400",
                    "#df3333"
                ]
            ],
            [
                "name" => "Шопер из светоотражающей ткани с логотипом",
                "src" => "images/products/shoper.png",
                "cost" => 0,
                "setting_id" => 2,
                "settings" => [
                    "#c4c4c4",
                    "#2e2e2e",
                    "#f9b400",
                    "#df3333"
                ]
            ],
            [
                "name" => "Холщовая сумка с логотипом",
                "src" => "images/products/bag.png",
                "cost" => 0,
                "setting_id" => 2,
                "settings" => [
                    "#c4c4c4",
                    "#2e2e2e",
                    "#f9b400",
                    "#df3333"
                ]
            ],
            [
                "name" => "Косметичка с логотипом",
                "src" => "images/products/cosmeticbag.png",
                "cost" => 0,
                "setting_id" => 2,
                "settings" => [
                    "#c4c4c4",
                    "#2e2e2e",
                    "#f9b400",
                    "#df3333"
                ]
            ],
            [
                "name" => "Худи с логотипом",
                "src" => "images/products/hoodie.png",
                "cost" => 0,
                "setting_id" => 2,
                "settings" => [
                    "#c4c4c4",
                    "#2e2e2e",
                    "#f9b400",
                    "#df3333"
                ]
            ],
            [
                "name" => "Футболка с логотипом",
                "src" => "images/products/tshirt.png",
                "cost" => 0,
                "setting_id" => 2,
                "settings" => [
                    "#c4c4c4",
                    "#2e2e2e",
                    "#f9b400",
                    "#df3333"
                ]
            ]
        ];
    }

}
