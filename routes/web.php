<?php

use App\Admin\Controllers\CommentariesController;
use App\Admin\Controllers\OrderController;
use App\Admin\Controllers\TaskReportController;
use App\Admin\Controllers\UsersController;
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

//\Road::layout('home')
//    ->web()
//    ->auth()
//    ->component('/home', \App\Components\Vue\Pages\Home::class)
//    ->name('home');

\Road::layout('home')
    ->web()
    ->auth()
    ->component('/task/{task:id}', \App\Components\Vue\Pages\Task::class)
    ->name('task');

\Road::layout('home')
    ->web()
    ->auth()
    ->component('/table', \App\Components\Vue\Pages\Table::class)
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

//\Road::layout('home')
//    ->web()
//    ->auth()
//    ->component('/search', \App\Components\Vue\Pages\Search::class)
//    ->name('search');

\Road::web()
    ->auth()
    ->get('/logout', [\App\Http\Controllers\Controller::class, 'logout'])
    ->name('logout');

Road::web()->middleware(['lte-auth'])->prefix(config('lte.route.prefix'))->prefix('download')->group(function (Roads $road) {
    $road->get('/commentaries/export', [CommentariesController::class, 'export'])
        ->name('commentaries_export');

    $road->get('/users/export', [UsersController::class, 'export'])
        ->name('users_export');

    $road->get('/orders/export', [OrderController::class, 'export'])
        ->name('orders_export');

    $road->get('/task_reports/export', [TaskReportController::class, 'export'])
        ->name('task_report_export');

    $road->get('/table_man/{direction_id}/export', [UsersController::class, 'export_table_man'])
        ->name('table_man_export');

    $road->get('/table_woman/{direction_id}/export', [UsersController::class, 'export_table_woman'])
        ->name('table_woman_export');
});

Route::post('/forgot-password', [\App\Http\Controllers\PasswordResetLinkController::class, 'store'])
    ->middleware(['guest:'.config('fortify.guard')])
    ->name('password.email');

if (Cache::get('home-lock')) {

} else {
    \Road::layout('home')
        ->web()
        ->auth()
        ->component('/{direction:slug}', \App\Components\Vue\Pages\Direction::class)
        ->name('home');
}

