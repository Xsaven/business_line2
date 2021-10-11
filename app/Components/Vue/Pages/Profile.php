<?php

namespace App\Components\Vue\Pages;

use App\Components\Vue\Page;
use App\Http\Resources\BalanceResource;
use App\Http\Resources\DivisionResource;
use App\Http\Resources\OrderResource;
use App\Http\Resources\PositionResource;
use App\Http\Resources\TaskReportResource;
use App\Models\Division;
use App\Models\Position;
use App\Repositories\AuthUserRepository;

/**
 * Profile Class.
 * @package App\Components\Vue\Pages
 */
class Profile extends Page
{
    /**
     * Protected variable Element.
     * @var string
     */
    protected $element = 'pages_profile';

    public function __construct($id = null, array $attrs = [], ...$params)
    {
        $attrs['positions'] = PositionResource::collection(Position::all());
        $attrs['divisions'] = DivisionResource::collection(Division::all());
        $attrs['reports'] = TaskReportResource::collection(
            app(AuthUserRepository::class)->userCompleteTaskReports->filter(fn ($i) => $i)
        );
        $attrs['balance'] = BalanceResource::collection(
            app(AuthUserRepository::class)->user->ballances()->orderByDesc('created_at')->get()
        );
        $attrs['orders'] = OrderResource::collection(
            app(AuthUserRepository::class)->myOrders
        );

        parent::__construct($id, $attrs, $params);
    }
}
