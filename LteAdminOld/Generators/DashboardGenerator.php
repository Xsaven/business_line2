<?php

namespace LteAdminOld\Generators;

use App\Jobs\AdminStatisticJob;
use App\Models\Online;
use App\Models\User;
use App\Models\Vote;
use Lar\Layout\Tags\SPAN;
use Lar\LteAdmin\Segments\Tagable\CardBody;
use Lar\LteAdmin\Segments\Tagable\ModelInfoTable;
use Lar\LteAdmin\Segments\Tagable\ModelTable;
use Lar\LteAdmin\Segments\Tagable\Row;
use LteAdminOld\Components\Vue\Commentaries;
use LteAdminOld\Components\Vue\Questions;

/**
 * DashboardGenerator Class.
 * @package App\LteAdmin\Generators
 */
class DashboardGenerator extends \Lar\LteAdmin\Controllers\Generators\DashboardGenerator
{
    public function stats()
    {
        $this->div->row(function (Row $row) {
            $row->col()->info_box(
                'Регистраций',
                SPAN::create(['total_user_count'], User::where('logins', '!=', '0')->count().' '),
                'fas fa-users'
            )->warning();

            if (! \Cache::has('online')) {
                AdminStatisticJob::dispatch();
            }

            $online = \Cache::get('online', 0);
            //$online = \App\Models\User::select('id')->get()->filter(fn ($i) => $i->online())->count();

            $row->col()->info_box(
                'OnLine ',
                [
                    SPAN::create(['total_online_count'], $online.' '),
                ],
                'fas fa-signal'
            )->primary();

            $online = Online::orderByDesc('peck')->first();

            $row->col()->info_box(
                'Пиковый OnLine',
                SPAN::create(['total_online_peck_count'], ($online ? $online->peck : 0).' '),
                'fas fa-chart-line'
            )->info();
        });
    }

    public function switchers()
    {
        $this->div->row(function (Row $row) {
        });
    }

    public function vote()
    {
        $this->div->row(function (Row $row) {
            $card = $row->col(6)->mb4()->card('Задания')->h100()->success();

            $card->foolBody(function (CardBody $body) {
                $body->appEnd(Questions::create());
            });

            $card = $row->col(6)->mb4()->card('Комментарии')->h100()->warning();

            $card->foolBody(function (CardBody $body) {
                $body->appEnd(Commentaries::create());
            });
        });
    }
}
