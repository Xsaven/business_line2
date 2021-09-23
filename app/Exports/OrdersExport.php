<?php

namespace App\Exports;

use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;

/**
 * Class StatisticExport.
 */
class OrdersExport implements FromCollection
{
    /**
     * @return Collection
     */
    public function collection()
    {
        $result = [
            ['Дата оформления', 'Товар', 'Параметры', 'Стоимость', 'Телефон', 'Почта','Адрес','Табельный номер','Статус'],
        ];

        /** @var Order[] $users */
        $orders = Order::all();

        foreach ($orders as $order) {
            $result[] = [
                Carbon::parse($order->created_at)->toDateTimeString(),
                $order->products->first()->name,
                $order->products->first()->pivot->value,
                $order->products->first()->cost,
                $order->phone,
                $order->email,
                $order->delivery->address,
                $order->user->number,
                Order::STATUSES[$order->status]
            ];
        }

        return collect($result);
    }
}
