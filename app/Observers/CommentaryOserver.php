<?php

namespace App\Observers;

use App\Models\Commentary;
use App\Models\TaskReport;
use App\Models\User;
use App\Notifications\UserNotedYouInTaskNotification;

class CommentaryOserver
{
    public function updating(Commentary $commentary)
    {
        if (
            $commentary->text &&
            str_contains($commentary->text, '@')
        ) {
            $commentary->text = preg_replace_callback("/@([а-яА-Яa-zA-Z0-9_]+)/ui", function ($m) {
                if (isset($m[1])) {
                    $m[1] = explode("_", $m[1]);
                    $name = $m[1][0] ?? null;
                    $lastname = $m[1][1] ?? null;
                    $user = User::whereLogin($name)->first();
                    if (!$user) {
                        $user = User::whereName($name)->whereLastname($lastname)->first();
                    }
                    if ($user) {
                        return "<a href='/user/{$user->id}'>{$user->full_name}</a>";
                    }
                }
                return $m[0];
            }, $commentary->text);
        }
    }

    /**
     * Handle the Commentary "created" event.
     *
     * @param  \App\Models\Commentary  $commentary
     * @return void
     */
    public function created(Commentary $commentary)
    {
        //
    }

    /**
     * Handle the Commentary "updated" event.
     *
     * @param  \App\Models\Commentary  $commentary
     * @return void
     */
    public function updated(Commentary $commentary)
    {
        //
    }

    /**
     * Handle the Commentary "deleted" event.
     *
     * @param  \App\Models\Commentary  $commentary
     * @return void
     */
    public function deleted(Commentary $commentary)
    {
        //
    }

    /**
     * Handle the Commentary "restored" event.
     *
     * @param  \App\Models\Commentary  $commentary
     * @return void
     */
    public function restored(Commentary $commentary)
    {
        //
    }

    /**
     * Handle the Commentary "force deleted" event.
     *
     * @param  \App\Models\Commentary  $commentary
     * @return void
     */
    public function forceDeleted(Commentary $commentary)
    {
        //
    }
}
