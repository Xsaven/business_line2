<?php

namespace App\LteAdmin;

use App\Models\Commentary;
use App\Models\Direction;
use App\Models\Division;
use App\Models\Faq;
use App\Models\Log;
use App\Models\Order;
use App\Models\Position;
use App\Models\Prize;
use App\Models\Product;
use App\Models\ProductSetting;
use App\Models\QuizQuestion;
use App\Models\Setting;
use App\Models\Task;
use App\Models\Track;
use App\Models\User;
use Lar\LteAdmin\Core\NavigatorExtensionProvider;
use Lar\LteAdmin\Interfaces\ActionWorkExtensionInterface;

/**
 * Navigator Class.
 */
class Navigator extends NavigatorExtensionProvider implements ActionWorkExtensionInterface
{
    public function handle() : void
    {
        if (! class_exists(User::class)) {
            return;
        }

        $this->nav_bar_view('admin.navbar_controls');

        $this->item('Комнаты')
            ->resource('rooms', 'CommentaryRoomController')
            ->icon_door_open();

        $this->item(Direction::TITLE)
            ->resource('direction', 'DirectionController')
            ->icon_directions();

        $this->item(Position::TITLE)
            ->resource('position', 'PositionController')
            ->icon_hard_hat();

        $this->item(Division::TITLE)
            ->resource('division', 'DivisionController')
            ->icon_building();

        $this->item(QuizQuestion::TITLE)
            ->resource('quiz_question', 'QuizQuestionController')
            ->icon_building();

        $this->item(User::TITLE)
            ->resource('users', 'UsersController')
            ->icon_users();

        $this->item(Task::TITLE)
            ->resource('task', 'TaskController')
            ->icon_tasks();

        $this->item(Faq::TITLE)
            ->resource('faq', 'FaqController')
            ->icon_question_circle();

        $this->item(Prize::TITLE)
            ->resource('prize', 'PrizeController')
            ->icon_gift();

        $this->item(Product::TITLE)
            ->resource('products', 'ProductController')
            ->icon_gifts();

        $this->item(Order::TITLE)
            ->resource('orders', 'OrderController')
            ->icon_first_order();

        $this->item(Commentary::TITLE)
            ->resource('commentary', 'CommentariesController')
            ->icon_comments();

        $this->item(Log::TITLE)
            ->resource('logs', 'LogController')
            ->icon_list();

        $this->item(Setting::TITLE)
            ->resource('setting', 'SettingsController')
            ->icon_cogs();

        $this->item(ProductSetting::TITLE)
            ->resource('product_settings', 'ProductSettingController')
            ->icon_cogs();

        $this->makeDefaults();
    }
}
