<?php

namespace App\Admin;

use App\Admin\Controllers\CommentariesController;
use App\Admin\Controllers\CommentaryRoomController;
use App\Admin\Controllers\DirectionController;
use App\Admin\Controllers\DivisionController;
use App\Admin\Controllers\FaqController;
use App\Admin\Controllers\LogController;
use App\Admin\Controllers\PositionController;
use App\Admin\Controllers\PrizeController;
use App\Admin\Controllers\SettingsController;
use App\Admin\Controllers\TaskController;
use App\Admin\Controllers\TaskReportController;
use App\Admin\Controllers\UsersController;
use App\Models\Commentary;
use App\Models\Direction;
use App\Models\Division;
use App\Models\Faq;
use App\Models\Log;
use App\Models\Position;
use App\Models\Prize;
use App\Models\Setting;
use App\Models\Task;
use App\Models\TaskReport;
use App\Models\User;
use LteAdmin\Core\NavigatorExtensionProvider;
use LteAdmin\Interfaces\ActionWorkExtensionInterface;

/**
 * Navigator Class
 * @package App\Admin
 */
class Navigator extends NavigatorExtensionProvider implements ActionWorkExtensionInterface
{
    /**
     * @return void
     */
    public function handle() : void
    {
        $this->nav_bar_view('admin.navbar_controls');

        $this->item('Комнаты')
            ->resource('rooms', CommentaryRoomController::class)
            ->icon_door_open();

        $this->item(Direction::TITLE)
            ->resource('direction', DirectionController::class)
            ->icon_directions();

        $this->item(Position::TITLE)
            ->resource('position', PositionController::class)
            ->icon_hard_hat();

        $this->item(Division::TITLE)
            ->resource('division', DivisionController::class)
            ->icon_building();

        $this->item(User::TITLE)
            ->resource('users', UsersController::class)
            ->icon_users();

        $this->item(Task::TITLE)
            ->resource('task', TaskController::class)
            ->icon_tasks();

        $this->item(TaskReport::TITLE)
            ->resource('task_report', TaskReportController::class)
            ->icon_black_tie();

        $this->item(Faq::TITLE)
            ->resource('faq', FaqController::class)
            ->icon_question_circle();

//        $this->item(Prize::TITLE)
//            ->resource('prize', PrizeController::class)
//            ->icon_gift();

//        $this->item(Order::TITLE)
//            ->resource('orders', OrderController::class)
//            ->icon_first_order();

        $this->item(Commentary::TITLE)
            ->resource('commentary', CommentariesController::class)
            ->icon_comments();

        $this->item(Log::TITLE)
            ->resource('logs', LogController::class)
            ->icon_list();

        $this->item(Setting::TITLE)
            ->resource('setting', SettingsController::class)
            ->icon_cogs();

        $this->makeMenu();

        $this->makeDefaults();

        $this->makeExtensions();
    }

}
