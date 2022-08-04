<?php

namespace App\Admin\Controllers;

use App\Admin\Components\Vue\Commentaries;
use App\Admin\Components\Vue\Questions;
use App\Jobs\AdminStatisticJob;
use App\Models\Online;
use App\Models\User;
use Lar\Layout\Tags\SPAN;
use LteAdmin\Components\GridColumnComponent;
use LteAdmin\Delegates\Card;
use LteAdmin\Delegates\CardBody;
use LteAdmin\Delegates\ChartJs;
use LteAdmin\Delegates\SearchForm;
use LteAdmin\Delegates\StatisticPeriod;
use LteAdmin\Page;
use LteAdmin\Controllers\DashboardController as AdminDashboardController;

class DashboardController extends AdminDashboardController
{
    /**
     * @param  Page  $page
     * @param  Card  $card
     * @param  CardBody  $cardBody
     * @param  StatisticPeriod  $statisticPeriod
     * @param  ChartJs  $chartJs
     * @param  SearchForm  $searchForm
     * @return Page|mixed
     */
    public function index(
        Page $page,
        Card $card,
        CardBody $cardBody,
        StatisticPeriod $statisticPeriod,
        ChartJs $chartJs,
        SearchForm $searchForm
    ) {
        if (! \Cache::has('online')) {
            AdminStatisticJob::dispatch();
        }

        $online = \Cache::get('online', 0);

        $onlinePeck = Online::orderByDesc('peck')->first();

        return $page->card(
            $card->title('Статистика'),
            $card->card_body(
                $cardBody->row(
                    $this->row->column()->info_box(
                        'Регистраций',
                        SPAN::create(['total_user_count'], User::where('logins', '!=', '0')->count().' '),
                        'fas fa-users'
                    )->warningType(),
                    $this->row->column()->info_box(
                        'OnLine ',
                        SPAN::create(['total_online_count'], $online.' '),
                        'fas fa-signal'
                    )->primaryType(),
                    $this->row->column()->info_box(
                        'Пиковый OnLine',
                        SPAN::create(['total_online_peck_count'], ($onlinePeck ? $onlinePeck->peck : 0).' '),
                        'fas fa-chart-line'
                    )->infoType(),
                ),
            )
        )->when(admin()->isRootAdmin(), function (Page $page) {
            $page->next()->row(
                $this->cardTableVueCol('Задания', Questions::create()),
                $this->cardTableVueCol('Комментарии', Commentaries::create()),
            );
        })->when(admin()->isRoot(), function (Page $page) {
            $page->next()->row(
                $this->cardTableCol('lte.environment', [$this, 'environmentInfo']),
                $this->cardTableCol('Laravel', [$this, 'laravelInfo']),
                $this->cardTableCol('Composer', [$this, 'composerInfo']),
                $this->cardTableCol('lte.database', [$this, 'databaseInfo']),
            );
        });
    }

    /**
     * @param  string  $title
     * @param $data
     * @return GridColumnComponent
     */
    public function cardTableVueCol(string $title, $data)
    {
        return $this->row->w100()->pl2()->column(
            $this->column->num(6)
                ->m0()
                ->p2()
                ->mb4()
                ->card()
                ->title($title)
                ->h100()
                ->w100()
                ->full_body(['table-responsive'])
                ->appEnd($data)
        );
    }
}
