<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Notifications\DatabaseNotification;

class ClearUserNotifyCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'n_clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        foreach (User::where('password', '!=', 'none')->get() as $user) {
            /** @var User $user */
            $ids = $user->notifications()->orderByDesc('created_at')->limit(30)->pluck('id');

            if ($ids->count()) {

                $user->notifications()->whereNotIn('id', $ids)
                    ->delete();
            }
        }

//        foreach (DatabaseNotification::all() as $notify) {
//
//            $notify->update(['data' => $notify->data]);
//
//            DatabaseNotification::where('id', '!=', $notify->id)
//                ->where('notifiable_type', $notify->notifiable_type)
//                ->where('data', $notify->data)
//                ->where('notifiable_id', $notify->notifiable_id)
//                ->delete();
//        }

        return 0;
    }
}
