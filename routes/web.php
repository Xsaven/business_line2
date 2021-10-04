<?php

use Illuminate\Support\Facades\Route;
use Lar\Roads\Roads;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

\Road::layout('auth')
    ->web()
    ->guest()
    ->component('/', \App\Components\Vue\Pages\Auth::class)
    ->name('login');

\Road::layout('auth')
    ->web()
    ->guest()
    ->component('/new_password', \App\Components\Vue\Pages\NewPassword::class)
    ->name('password.reset');

\Road::layout('auth')
    ->web()
    ->component('/guest_support', \App\Components\Vue\Pages\GuestSupport::class)
    ->name('guest_support');

\Road::layout('home')
    ->web()
    ->auth()
    ->component('/home', \App\Components\Vue\Pages\Home::class)
    ->name('home');

\Road::layout('home')
    ->web()
    ->auth()
    ->component('/direction/{direction:slug}', \App\Components\Vue\Pages\Direction::class)
    ->name('direction');

\Road::layout('home')
    ->web()
    ->auth()
    ->component('/task/{task:id}', \App\Components\Vue\Pages\Task::class)
    ->name('task');

\Road::layout('home')
    ->web()
    ->auth()
    ->component('/table/{direction:id}', \App\Components\Vue\Pages\Table::class)
    ->name('table');

\Road::layout('home')
    ->web()
    ->auth()
    ->component('/products', \App\Components\Vue\Pages\Product::class)
    ->name('products');

\Road::layout('home')
    ->web()
    ->component('/faq', \App\Components\Vue\Pages\FAQ::class)
    ->name('faq');

\Road::layout('home')
    ->web()
    ->component('/rules', \App\Components\Vue\Pages\Rule::class)
    ->name('rules');

\Road::layout('home')
    ->web()
    ->auth()
    ->component('/support', \App\Components\Vue\Pages\Support::class)
    ->name('support');

\Road::layout('home')
    ->web()
    ->auth()
    ->component('/profile', \App\Components\Vue\Pages\Profile::class)
    ->name('profile');

\Road::layout('home')
    ->web()
    ->auth()
    ->component('/user/{user:id}', \App\Components\Vue\Pages\User::class)
    ->name('user');

\Road::layout('home')
    ->web()
    ->auth()
    ->component('/search', \App\Components\Vue\Pages\Search::class)
    ->name('search');

\Road::web()
    ->auth()
    ->get('/logout', [\App\Http\Controllers\Controller::class, 'logout'])
    ->name('logout');

Road::web()->middleware(['lte-auth'])->prefix(config('lte.route.prefix'))->prefix('download')->group(function (Roads $road) {
    $road->get('/commentaries/export', ['\App\LteAdmin\Controllers\CommentariesController', 'export'])
        ->name('commentaries_export');

    $road->get('/users/export', ['\App\LteAdmin\Controllers\UsersController', 'export'])
        ->name('users_export');

    $road->get('/orders/export', ['\App\LteAdmin\Controllers\OrderController', 'export'])
        ->name('orders_export');

    $road->get('/task_reports/export', ['\App\LteAdmin\Controllers\TaskReportController', 'export'])
        ->name('task_report_export');

    $road->get('/table_likes/{direction_id}/export', ['\App\LteAdmin\Controllers\UsersController', 'export_table_likes'])
        ->name('table_likes_export');

    $road->get('/table_balls/{direction_id}/export', ['\App\LteAdmin\Controllers\UsersController', 'export_table_balls'])
        ->name('table_balls_export');
});

Route::post('/forgot-password', [\App\Http\Controllers\PasswordResetLinkController::class, 'store'])
    ->middleware(['guest:'.config('fortify.guard')])
    ->name('password.email');
